<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function login(){
        if($this->input->is_ajax_request()) {
					
			$status = 0;
			$message = "Missing Parameters";
            if (isset($_POST)) {
                $params = (object)$this->input->post();
				
                if (!isset($params->user_email) || empty($params->user_email)) {
					$message = "Enter your email address";
                }
                else if (!isset($params->user_password) || empty($params->user_password)) {
                    $message = "Enter you password";
                }
                else {
                    if(filter_var($params->user_email, FILTER_VALIDATE_EMAIL)){
                        if ($this->user->verify(trim($params->user_email), $this->encrypt->sha1(trim($params->user_password)), trim($params->remember))) {
							$status = 1;
                            $message = "Verified, Please wait...";
                        }
                        else {
                            $message = "Invalid account or password";
                        }
                    }
                    else {
                        $message = "Invalid email address";
                    } // validate email
                }
            }
			
			$response = array('s' => $status, 'm' => $message);
            echo json_encode($response);
        }
        else {
            redirect(base_url());
        }
    }

    public function logout(){
		$this->session->sess_destroy();
        $this->user->remove_cookie('email');

        // remove access token
        if($this->mod_user->removeToken($this->_user->user_id)){
            redirect(base_url());
        }

        redirect(base_url());
    }

    public function account_settings(){
        if(!$this->user->is_logged_in()){ redirect(base_url()); }

        $contentdata['script'] = array('admin', 'common');
        $contentdata['styles'] = NULL;
        
        $pagedata = $this->_page_defaults('Account Settings', 'account', '', 'account_settings_modal');

        $contentdata['page'] = $this->load->view('page/account_settings', $pagedata, TRUE);
        
        $this->templateLoader($contentdata);
    }
}
