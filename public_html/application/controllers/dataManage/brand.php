<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class brand extends My_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('sell_model','sell');
        $this->load->model('brand_model','brand');
    }

    public function index(){
        $page = $this->uri->rsegment(3,0);
        $limit = $page.",".($page+50);
        $sRe = $this->sell->SelectCommon('*','','','',array('itemid'=>'asc'),$limit);
        if(!$sRe){
            die("处理完毕");
        }
        foreach($sRe as $k=>$v){
            $bRe = $this->comm->find('brand',array('name'=>$v['brand']));
            if(!$bRe){
                $addArr = array(
                    'name'=>$v['brand'],
                    'addtime'=>time()
                );

                $this->db->insert('brand',$addArr);
                $brandid = mysql_insert_id();
                $this->db->update('sell',array('brandid'=>$brandid),array('itemid'=>$v['itemid']));
            }else{
                $this->db->update('sell',array('brandid'=>$bRe['brandId']),array('itemid'=>$v['itemid']));

            }
        }
        $url = site_url('dataManage/brand/index/'.($page+50));

        echo "<script>window.location.href='{$url}'</script>";
    }
}