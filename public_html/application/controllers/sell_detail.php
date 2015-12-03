<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sell_detail extends MY_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('comm_model','comm');
        $this->load->model('sell_model','sell');
        $this->load->model('category_option_model','category_option');
	}
	
	public function index(){
        $site = $this->config->item('site');
        $data['site'] = $site;

        $data['topCategory'] = $this->topCategory;
        $data['showCategory'] = $this->showCategory;

        $urlRe = $this->uri->rsegment(3,0);
        $urlRe = explode('_',$urlRe);
        $itemid = $urlRe[1];
        $product = $this->sell->getSell($itemid);
        $re = $this->category_option->getSellOption($itemid);
        $product['attr'] = $re;
        $data['product'] = $product;
        dump($product);die;
        $this->load->view('header',$data);
        $this->load->view('sell_detail');
    }
}