<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sell_list extends MY_Controller {
	function __construct(){
		parent::__construct();
        $this->load->helper('inflector');
        $this->load->model('category_default_option_model','categoryDO');
        $this->load->model('category_option_model','category_option');
        $this->load->model('sell_model','sell');

        $this->load->service("sell_service");
        $this->load->service("option_service");
        $this->load->service("tagindex_service");
	}

    public function index(){
        $site = $this->config->item('site');
        $data['site'] = $site;

        $data['topCategory'] = $this->topCategory;
        $data['showCategory'] = $this->showCategory;

        $urlRe = $this->uri->rsegment(3,0);
        $urlReArr = explode('_',$urlRe);
        if(!$urlRe){
            show_404();
            die;
        }

        $catid = $urlReArr[1];
        $thisCat = $this->category->getCategory($catid);
        $data['thisCat'] = $thisCat;

        //category
        $spRe = $this->sell_service->getCategorySellGroupBy($catid,5000,"catid","@count desc");
        $category = array();
        foreach($spRe['matches'] as $k=>$v){
            $tempCatid = $v['attrs']['catid'];
            $tempNum = $v['attrs']['@count'];

            $re = $this->category->getCategory($tempCatid);
            $re['num'] = $tempNum;
            $category[$tempCatid] = $re;
        }
        $data['category'] = $category;

        //brand
        $spRe = $this->sell_service->getCategorySellGroupBy($catid,5000,"brandid","@count desc");
        $brand  = array();
        foreach($spRe['matches'] as $k=>$v){
            $tempBrandid = $v['attrs']['brandid'];
            $tempNum = $v['attrs']['@count'];

            $re = $this->comm->find('brand',array('brandId'=>$tempBrandid));
            $re['num'] = $tempNum;
            $brand[$tempBrandid] = $re;
        }
        $data['brand'] = $brand;

        //product
        $page = $this->uri->rsegment(4,0);
        $page = intval($page);
        $page_size = 21;

        $spRe = $this->sell_service->getCategorySellItems($catid,$page,$page_size);
        $products = array();
        $sell_count = $spRe['total'];
        foreach($spRe['itemid'] as $k=>$v){
            $re = $this->sell->getSell($v);
            $products[] = $re;
        }
        $data['products'] = $products;

        //分页
        $data['total_count']=$sell_count;
        $base_url = site_url("sell_list/index/catid_".$catid);
        $data['total_page']=ceil($sell_count/$page_size);
        $this->load->library('pagination');
        $config['base_url'] = $base_url;
        $config['total_rows'] = $sell_count ? $sell_count : 0;
        $config['per_page'] = $page_size;
        $config['uri_segment'] = 3;
        $config['num_links'] = 4;
        $config['suffix'] = $this->config->item('url_suffix');
        $config['first_link']='first';
        $config['last_link']='last';
        $config['anchor_class'] = "class='pro_page' rel='nofollow'";
        $config['cur_tag_open'] = '<span class="current">';
        $config['cur_tag_close'] = '</span>';
        $this->pagination->initialize($config);
        $data['pages'] = $pages = $this->pagination->create_links();

        $this->load->view('header',$data);
        $this->load->view('sell_list',$data);
    }



}