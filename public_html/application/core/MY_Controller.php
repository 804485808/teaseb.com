<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class MY_Controller extends CI_Controller {

    public $topCategory;
    public $showCategory;
	function __construct(){
		parent::__construct();
        header("content-type:text/html;charset=utf-8");
		$this->load->model('comm_model','comm');
        $this->load->model('category_model','category');
 		$this->load->library('encrypt');
		$username = $this->input->cookie('username', TRUE);
		$hash_1 = $this->input->cookie('hash_1', TRUE);
		$this->username = $this->encrypt->decode($username,$hash_1);

        $topCategory = $this->category->getTopCategory();
        $showCategory = array();
        foreach($topCategory as $k=>$v){
            $re = $this->comm->findAll('category',array('parentid'=>$v['catid']));
            $showCategory[$v['catid']] = $re;
        }
        $this->topCategory = $topCategory;
        $this->showCategory = $showCategory;
	}
}