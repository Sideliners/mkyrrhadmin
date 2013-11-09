<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Superadmin extends MY_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function accounts(){
        if($this->user->is_logged_in()){
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $perpage = 10;
            $url = base_url('product/lists');
            $total = $this->mod_user->get_total();
			
            $pagedata = $this->_page_defaults('Accounts', 'accounts', '');
			
			$pagedata['accounts'] = $this->mod_user->get_accounts($perpage, $page);

            $contentdata['script'] = array('admin');
            $contentdata['styles'] = NULL;
            $contentdata['page'] = $this->load->view('page/account_list', $pagedata, TRUE);
            
			$this->templateLoader($contentdata);
        }
        else{
            $this->load->view('page/login');
        }
    }
	
	public function create(){
		if($this->user->is_logged_in()){
            $pagedata = $this->_page_defaults('Create Account', 'accounts', '');
			
			if(isset($_POST['create_account'])){
				if($this->form_validation->run('create_account') === FALSE){
					$pagedata['response'] = validation_errors('<div class="alert alert-error"><i class="icon-warning-sign"></i> ', '</div>');
				}
				else{
					$password = $this->random_password();
				} // form validation
			}
			
			$pagedata['usertypes'] = $this->mod_user->get_types();
			
            $contentdata['script'] = array('admin');
            $contentdata['styles'] = NULL;
            $contentdata['page'] = $this->load->view('page/add_account', $pagedata, TRUE);
            
			$this->templateLoader($contentdata);
        }
        else{
            $this->load->view('page/login');
        }
	}
	
	private function random_password(){
	}
}
