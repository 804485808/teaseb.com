<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Release extends MY_Controller {
    public function index(){
        $this->load->library('image');
        $this->load->model('comm_model','comm');
        $this->load->model('info_model','info');
        $this->load->model('category_model','category');
        $this->load->model('sell_model','sell');
        header('Content-type:text/html;charset=utf-8');

       $data = $this->input->post();

        $saveSell['title'] = $data['title'];
        $saveSell['reser_price'] = $data['reserve_price'];
        $saveSell['price'] = $data['price'];
        $saveSell['option_value'] = $this->option_value($data['option_value']);
        $saveSell['thumb'] = $this->thumb($data['thumb']);
        $saveSell['category_str'] = $data['category'];
        $saveSell['yuanurl'] = $data['yuanurl'];
        $saveSell['content'] = $data['content'];

        //category
        $cateName = $saveSell['category_str'];
        $re = $this->comm->find('category',array('catname'=>$cateName));
        if(!$re){
            $this->db->insert('wl_category',array('catname'=>$cateName,'status'=>1));
        }else{
            $this->db->update('wl_category',array('status'=>1),array('catname'=>$cateName));
        }
        $thisCat=$this->comm->find('category',array('catname'=>$cateName));
    }

    /**
     * option-value
     * @param $tempTable
     * @return string
     */
    public function option_value($tempTable){
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

        return $optionStr;
    }

    /**
     * thumb
     * @param $tempUrl
     */
    public function thumb($tempUrl){
        $thumbArr = explode('&&',$tempUrl);
        $thumbStr = '';
        for($i=0;$i<3;$i++){
            if($thumbArr[$i]){
                $tempUrl = $this->downImg('http:'.$thumbArr[$i]);
                $thumbStr .= $tempUrl.'&';
            }
        }
        $thumbStr = substr($thumbStr,0,-1);
        return $thumbStr;
    }

    /**
     * 下载图片 加水印
     * @param $thumb
     * @return bool|mixed
     */
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
}