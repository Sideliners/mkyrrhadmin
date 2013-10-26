<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        if($this->user->is_logged_in()){
            $pagedata = $this->_page_defaults('Dashboard', 'dashboard', '');

            $contentdata['script'] = array('admin');
            $contentdata['styles'] = NULL;
            $contentdata['page'] = $this->load->view('page/home', $pagedata, TRUE);
            
			$this->templateLoader($contentdata);
        }
        else{
            $this->load->view('page/login');
        }
    }
}
