<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error extends MY_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function page_not_found(){
		$pagedata['page_title'] = 'Page Not Found';
		$pagedata['page'] = '404';
		$pagedata['sub_page'] = '404';

        $contentdata['styles'] = NULL;

        if($this->user->is_logged_in()){
			$contentdata['script'] = array('admin');
			$pagedata['user'] = $this->_user;
		}
		
		$contentdata['page'] = $this->load->view('page/error', $pagedata, TRUE);
        $this->templateLoader($contentdata);
    }
}
