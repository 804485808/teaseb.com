<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class data extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->library('image');
        $this->load->model('comm_model','comm');
        $this->load->model('info_model','info');
        $this->load->model('category_model','category');
        $this->load->model('sell_model','sell');

        header('Content-type:text/html;charset=utf-8');
    }

    public function index(){
//        die;
        $page = $this->uri->rsegment(3,0);
        $itemid = intval($page);
        $All = $this->comm->find('info',array('itemid'=>$itemid));
        if(!$All){
//            die($itemid);die;
            die('处理完毕');
        }


//        die;
//jumei_category
       /* $allCategoy = $All['category_str'];
        $catArr = explode(',',$allCategoy);
        $re = $this->category->category($catArr);
        $category = end($catArr);
        $thisCat = $this->comm->find('category',array('catname'=>$category));*/

//taobao_category
        $cateName = $All['category_str'];
        $re = $this->comm->find('category',array('catname'=>$cateName));
        if(!$re){
            $this->db->insert('wl_category',array('catname'=>$cateName,'status'=>1));
        }else{
            $this->db->update('wl_category',array('status'=>1),array('catname'=>$cateName));
        }
        $thisCat=$this->comm->find('category',array('catname'=>$cateName));

//thumb

        $tempThumb = explode('&',$All['thumb']);
        foreach($tempThumb as $k=>$v){
            $temp = $k?$k:'';
            $kk = "thumb".$temp;
            $All[$kk] = $v;
        }

        $All['addtime'] = time();
        $insertData = $this->sell->creatData($All);
        unset($insertData['itemid']);
        $insertData['reser_price'] = $All['reser_price'];
        $insertData['catid'] = $thisCat['catid'];
        $this->db->insert('sell',$insertData);
        $itemid = mysql_insert_id();

//content
        $content = $All['content'];
        if($content) {
            $sell_data['content'] = $content;
            $sell_data['itemid'] = $itemid;
            $this->db->insert('sell_data', $sell_data);
        }

//option_value

        $allOptionValue = $All['option_value'];
        $optionValueArr = explode('&',$allOptionValue);


        $oid = '';
        foreach($optionValueArr as $k=>$v){
            $tempOption = explode(':',$v);
            $tempOid = $this->option_value($tempOption,$thisCat['catid'],$itemid);
            $oid .= $tempOid.",";
        }
        $oid = substr($oid,0,-1);
        $this->db->update('sell',array('pptword'=>$oid),array('itemid'=>$itemid));

        $page = $page+1;
        $url = site_url('dataManage/data/index/'.$page);
        echo "<script>window.location.href='".$url."'</script>";

    }

    public function option_value($option_value,$catid,$itemid){
        $option = $option_value[0];
        $value = $option_value[1];

        if($option == '品牌'){
            $this->db->update('sell',array('brand'=>$value),array('itemid'=>$itemid));
        }

        //category_option
        $optionRe = $this->comm->find('category_option',array('name'=>$option,'catid'=>$catid));
        if(!$optionRe){
            $insertData['catid'] = $catid;
            $insertData['name'] = $option;
            $insertData['item'] = 1;
            $this->db->insert('category_option',$insertData);
            $oid = mysql_insert_id();
        }else{
            $this->db->set('item', 'item+1', FALSE);
            $this->db->where(array('oid'=>$optionRe['oid']));
            $this->db->update('category_option');
            $oid = $optionRe['oid'];
        }

        //category_default_option and category_value
        $deOptionRe1 = $this->comm->find('category_default_option',array('value'=>$value,'oid'=>$oid,'catid'=>$catid));
        $deOptionRe2 = $this->comm->find('category_default_option',array('value'=>$value));

        if($deOptionRe1){
            $did = $deOptionRe1['id'];
            $this->db->set('num','num+1',false);
            $this->db->where('id',$deOptionRe1['id']);
            $this->db->update('wl_category_default_option');

            $category_value['value'] = $value?$value:'';
            $category_value['oid'] = $oid?$oid:'';
            $category_value['itemid'] = $itemid?$itemid:'';
            $category_value['did'] = $did?$did:'';
            $category_value['catid'] = $catid?$catid:'';

            $this->db->insert('category_value',$category_value);

        }else if($deOptionRe2){
            $did = $deOptionRe2['id'];
            $optionArray=array(
                'value'=>$value?$value:'',
                'oid'=>$oid?$oid:'',
                'catid'=>$catid?$catid:'',
                'num'=>'1',
                'id'=>$did?$did:''
            );
            $re = $this->addDefaultOption($optionArray);
            if($re){
                $optionValue = array(
                    'value'=>$value?$value:'',
                    'oid'=>$oid?$oid:'',
                    'catid'=>$catid?$catid:'',
                    'itemid'=>$itemid?$itemid:'',
                    'did'=>$did?$did:''
                );

                $this->db->insert('wl_category_value',$optionValue);

            }
        }else{
            $optionArray=array(
                'value'=>$value?$value:'',
                'oid'=>$oid?$oid:'',
                'catid'=>$catid?$catid:'',
                'num'=>'1'
            );

            $re = $this->addDefaultOption($optionArray);

            if($re){
                $optionValue = array(
                    'value'=>$value?$value:'',
                    'oid'=>$oid?$oid:'',
                    'catid'=>$catid?$catid:'',
                    'itemid'=>$itemid?$itemid:'',
                    'did'=>$re?$re:''
                );

                $this->db->insert('wl_category_value',$optionValue);

            }
        }
        return $oid;
    }

    /**
     * 添加 default_option
     * @param $arr
     * @return bool
     */
    public function addDefaultOption($arr){
        if(!$arr['id']) {

            $sql = "select max(id) as mid from wl_category_default_option";
            $query = $this->db->query($sql);
            $re = $query->row_array();

            $arr['id'] = $re['mid'] + 1;
        }
        if($this->db->insert('wl_category_default_option',$arr)){
            return $arr['id'];
        }else{
            return false;
        }

    }



}