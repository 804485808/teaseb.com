<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Main extends MY_Controller {
	function __construct(){
		parent::__construct();
        $this->load->model('tagindex_model','tagindex');
        $this->load->model('sell_model','sell');
	}
	
	public function index(){
        $site = $this->config->item('site');
        $data['site'] = $site;
        //LastProducts
        $newProducts = $this->comm->findAll('sell',array('status'=>'3'),'addtime desc','',10);
        $data['LastProducts'] = $newProducts;

        $topCategory = $this->category->getTopCategory();
        $showCategory = array();
        foreach($topCategory as $k=>$v){
            $re = $this->comm->findAll('category',array('parentid'=>$v['catid']));
            $showCategory[$v['catid']] = $re;
        }
        $data['topCategory'] = $topCategory;
        $data['showCategory'] = $showCategory;

        $this->load->view('header',$data);
        $this->load->view('main',$data);

	}

    public function test(){
        $this->load->view('test');
    }





}


