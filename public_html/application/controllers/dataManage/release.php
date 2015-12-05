<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Release extends MY_Controller {
    public function index(){
       $data = $this->input->post();
        dump($data);
        echo "成功";
    }
}