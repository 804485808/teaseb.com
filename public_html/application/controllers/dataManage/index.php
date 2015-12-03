<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class index extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->library('image');
        header('Content-type:text/html;charset=utf-8');
    }

    public function data(){

        $page = $this->uri->rsegment(3,0);

        $file = "E:/teaseb_com/taobaoData/".$page.".txt";
        $data = file_get_contents($file);
//        $data = iconv("UTF-8", "GB2312//IGNORE", $data);
//        echo $data;die;
        if(!$data){
            die('文件不存在');
        }

        //淘宝

        $re = $this->preTaobao($data,$page);
        if($re){
            $page = intval($page);
            $page = $page+1;
            $url = site_url('dataManage/index/data/'.$page);
            echo "<script>window.location.href='".$url."'</script>";
        }else{
            echo "出错";
        }


//聚美
     /*  $saveSell = $this->preJumei($data,$page);

        $saveSell['textnum'] = $page;
       $re = $this->saveInfo($saveSell);
     $page = intval($page);
        $page = $page+1;
        if($re){
            $url = site_url('dataManage/index/data/'.$page);
            echo "<script>window.location.href='".$url."'</script>";
        }else{
            echo "出错";
        }*/

    }

    //下载图片 加水印
    public function downImg($thumb){
        $tempThumb = $this->image->getImage($thumb);
        if($tempThumb){
            $this->image->imageWaterMark($tempThumb, 5, 'E:\teaseb_com\img\teaseb\sell_img\water\back1.jpg');
            $tempThumb = str_replace('E:/teaseb_com', '', $tempThumb);
            return $tempThumb;
        }else{
            return false;
        }
    }

    //入库
    public function saveInfo($data){
        $this->load->model('comm_model','comm');
        $this->load->model('info_model','info');

        //Option_value
        $option_value = '';
        foreach($data['option_value'] as $k=>$v){
            $option_value .= $v['option'].":".$v['value']."&";
        }
        $option_value = substr($option_value,0,-1);
        $data['option_value'] = $option_value;

        //thumb
        $thumb = '';
        foreach($data['thumb'] as $k=>$v){
            if($v) {
                $thumb .= $v . "&";
            }
        }
        $thumb = substr($thumb,0,-1);
        $data['thumb'] = $thumb;

//        dump($data);die;
        $inData = $this->info->creatData($data);
        $re = $this->db->insert('info',$inData);
        if($re){
            return true;
        }else{
            return false;
        }
    }

    //jumei
    public function preJumei($data,$page){
        $saveSell = array();

//title
        preg_match_all("/title:(.*)price/Uis",$data,$re);
        $title = trim(strip_tags($re[1][0]));
        if(!$title){
            die('title 不存在');
        }
        $saveSell['title'] = $title;

        $this->load->model('comm_model','comm');
        $re = $this->comm->find('info',array('title'=>$title));



        //判断是否已入库
        if($re){
            $page = intval($page);
            $page = $page+1;
            $url = site_url('dataManage/index/data/'.$page);
            echo "<script>window.location.href='".$url."'</script>";
        }else{
            echo "GO";
        }

//price
        preg_match_all("/price:(.*)thumb/Uis",$data,$re);
        $price = trim(strip_tags($re[1][0]));
        if(strstr($price,'reserve_price')){
            preg_match_all("/(.*)reserve_price:/Uis",$price,$re);
            $price = trim(strip_tags($re[1][0]));

            preg_match_all("/reserve_price:(.*)thumb:/Uis",$data,$re);
            if(strstr($re[1][0],'标签')){
            }else{
                $reser_price = $re[1][0];
                $saveSell['reser_price'] = $reser_price;
            }
        }

        $saveSell['price'] = $price;
        if(!$price){
            die('price 不存在');
        }

//option_value
        preg_match_all("/canshu:(.*)content/Uis",$data,$re);
        $tempTable = $re[1][0];

        //explain
        preg_match_all("/<p class=\"mar_t15\">(.*)<\/p>/Uis",$tempTable,$re);
        $explain = trim(strip_tags($re[1][0]));
        $saveSell['explain'] = $explain;

        //value
        preg_match_all("/<tbody>(.*)<\/tbody>/Uis",$tempTable,$re);
        $tempValue = $re[1][0];
        $tempArr = explode('</tr>',$tempValue);
        unset($tempArr[0]);

        foreach($tempArr as $k=>$v){

            if(preg_match_all("/<td><b>(.*)(：)*\s*<\/b><\/td>/Uis", $v, $re)) {
                $saveSell['option_value'][$k]['option'] = str_replace("&nbsp;", "", trim(strip_tags($re[1][0])));
            }

            if(preg_match_all("/<td><span(.*)>(.*)\s*<\/span><\/td>/Uis", $v, $re)){
                $saveSell['option_value'][$k]['value'] = str_replace("&nbsp;", "", trim(strip_tags($re[2][0])));
            }

        }
        $saveSell['option_value'] = array_filter($saveSell['option_value']);

//thumb
        preg_match_all("/thumb:(.*)canshu/Uis",$data,$re);
        $tempUrl =  $re[1][0];
        preg_match_all("/jqimg='(.*)'/Uis",$tempUrl,$turl);
        $thumb = $turl[1][0];

        $urlArr = explode('/',$thumb);
        $endUrl = $urlArr[count($urlArr)-1];

        //下载图片 加水印
        $tempUrl = $this->downImg($thumb);
        $saveSell['thumb'][0] = $tempUrl?$tempUrl:'';
        for($i=1;$i<4;$i++){
            $arr = explode('_',$endUrl);

            $downloadImg = str_replace($arr[0],$arr[0]."_".$i,$endUrl);

            $downloadImg = str_replace($endUrl,$downloadImg,$thumb);

            // sell:thumb
            $tempUrl = $this->downImg($downloadImg);
            $saveSell['thumb'][$i] = $tempUrl?$tempUrl:'';
        }

//content
        preg_match_all("/content:(.*)\s*<\/textarea>\s*fangfa/Uis",$data,$re);
        $tempContent = trim($re[1][0]);
        if(!$tempContent){
            preg_match_all("/content:(.*)\s*fangfa/Uis",$data,$re);
            $tempContent = trim($re[1][0]);
        }

        if(!$tempContent){
            die('content 不存在');
        }

        //下载content图片
        preg_match_all("/<img\s*src=\"(.*)\"/Uis",$tempContent,$re);
        $tempArrImg = $re[1];
        foreach($tempArrImg as $k=>$v){
            $thumb = $this->downImg($v);
            $tempContent = str_replace($v,$thumb,$tempContent);
        }

        $saveSell['content'] = $tempContent;

//Instructions

        preg_match_all("/fangfa:\s*(.*)\s*<\/textarea>/Uis",$data,$re);
        $tempInstructions = trim($re[1][0]);

        //下载Instructions图片
        preg_match_all("/<img\s*src=\"(.*)\"/Uis",$tempInstructions,$re);
        $tempArrImg = $re[1];
        foreach($tempArrImg as $k=>$v){
            $thumb = $this->downImg($v);
            $tempInstructions = str_replace($v,$thumb,$tempInstructions);
        }
        $saveSell['instructions'] = $tempInstructions;

//category
        preg_match_all("/<a\s*href=\'(.*)\'\s*target=\'_blank\'\s*>(.*)<\/a><em>>/Uis",$data,$re);
        $tempCategoryArr = $re[2];
        $tempCateStr = '';
        foreach($tempCategoryArr as $k=>$v){
            $tempCateStr .= $v.",";
        }
        $cateStr = substr($tempCateStr,0,-1);
        $saveSell['category_str'] = $cateStr;
        if(!$cateStr){
            die('category 不存在');
        }

//yuanUrl
        preg_match_all("/yuanurl:(.*)$/Uis",$data,$re);
        $saveSell['yuanurl'] =trim($re[1][0]);
        return $saveSell;
    }

    //taobao
    public function preTaobao($data,$page){
        $saveSell = array();

//title
        preg_match_all("/title:(.*)price/Uis",$data,$re);
        $title = trim(strip_tags($re[1][0]));
        if(!$title){
            return true;
            die('title 不存在');
        }
        $saveSell['title'] = $title;


//price
        preg_match_all("/price:(.*)thumb/Uis",$data,$re);
        $price = trim(strip_tags($re[1][0]));
        if(strstr($price,'reserve_price')){
            preg_match_all("/(.*)reserve_price:/Uis",$price,$re);
            $price = trim(strip_tags($re[1][0]));

            preg_match_all("/reserve_price:(.*)thumb:/Uis",$data,$re);
            if(strstr($re[1][0],'标签')){
            }else{
                $reser_price = $re[1][0];
                $saveSell['reser_price'] = $reser_price;
            }
        }

//判断是否已入库
        $this->load->model('comm_model','comm');
        $re = $this->comm->find('info',array('title'=>$title,'price'=>$price));

        if($re){
            $page = intval($page);
            $page = $page+1;
            $url = site_url('dataManage/index/data/'.$page);
            echo "<script>window.location.href='".$url."'</script>";
        }else{
            echo "GO";
        }


        $saveSell['price'] = $price;
        if(!$price){
            die('price 不存在');
        }

//option_value
        preg_match_all("/canshu:(.*)category:/Uis",$data,$re);
        $tempTable = $re[1][0];
        if(strstr($tempTable,'&')) {
            $tempArr = explode('&', $tempTable);
                foreach ($tempArr as $k => $v) {
                    $reArr = explode(':', $v);
                    $str = '';
                    foreach ($reArr as $kk => $vv) {
                        if ($kk == 0) {
                            $str = $vv . ':';
                        } else {
//                    $str .= trim($vv);";
                            $encode = mb_detect_encoding($vv, array('ASCII', 'GB2312', 'GBK', 'UTF-8'));
                            if ($encode != 'UTF-8') {
                                $vv = mb_convert_encoding($vv, 'UTF-8');
                            }


                            if (mb_substr($vv, 0, 1) == chr(0xC2) . chr(0xA0)) {
                                $vv = str_replace(chr(0xC2) . chr(0xA0), ',', $vv);
                                $str .= substr($vv, 1);
                            } else {
                                $str .= str_replace(chr(0xC2) . chr(0xA0), ',', $vv);
                            }
//                    echo $str;die;

                        }
                    }

                    $tempArr[$k] = $str;
                }

                $optionStr = implode('&', $tempArr);
                if (!$optionStr) {
                    die('参数不存在');
                }
            }else{
            $optionStr='';
            }


        $saveSell['option_value'] = $optionStr;

//thumb
        preg_match_all("/thumb:(.*)canshu/Uis",$data,$re);
        $tempUrl =  $re[1][0];
//        echo $tempUrl;die;
        $thumbArr = explode('&&',$tempUrl);
        $thumbStr = '';
        for($i=0;$i<3;$i++){
            if($thumbArr[$i]){
                $tempUrl = $this->downImg('http:'.$thumbArr[$i]);
                $thumbStr .= $tempUrl.'&';
            }
        }
        $thumbStr = substr($thumbStr,0,-1);

        $saveSell['thumb'] = $thumbStr?$thumbStr:'';

//category
        preg_match_all("/category:(.*)yuanurl/Uis",$data,$re);
        $cateStr = $re[1][0];
        if(!$cateStr){
            die('category 不存在');
        }
        if($cateStr=='护肤'){
            $cateStr = '面部护肤';
        }
        $saveSell['category_str'] = $cateStr;

//yuanUrl
        preg_match_all("/yuanurl:(.*)$/Uis",$data,$re);
        $saveSell['yuanurl'] =trim($re[1][0]);
        if(!$saveSell['yuanurl']){
            die('原url不存在');
        }
        $saveSell['type'] = '1';
        $saveSell['textnum'] = $page;

        $this->load->model('comm_model','comm');
        $this->load->model('info_model','info');



        $inData = $this->info->creatData($saveSell);
        $re = $this->db->insert('info',$inData);
        if($re){
            return true;
        }else{
            die('入库失败');
        }

    }

}