<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller{

    protected $_user;

    public function __construct(){
        parent::__construct();

        if($this->user->is_logged_in()) $this->userLoggedDetails();
    }

    function templateLoader($contentdata){
        $navdata['site_title'] = $this->site_name();

        $script = array_pop(array_reverse($contentdata));

        $templatedata['scripts'] = $this->page_script($script);
        $templatedata['styles'] = $this->page_css($contentdata['styles']);

        $templatedata['header_elements'] = $this->header_elements();

        if($this->session->userdata('email')){
            //$templatedata['modals'] = $this->load->view('template/modals', NULL, TRUE);
            $templatedata['navigation'] = $this->load->view('partials/navigation', $navdata, TRUE);
            $templatedata['sidemenu'] = $this->load->view('partials/sidemenu', $navdata, TRUE);
        }

        $templatedata['content'] = $this->load->view('template/content', $contentdata, TRUE);

        $this->load->view('template/main', $templatedata);
    }

    private function header_elements(){
        $elems = "<link href='".base_url()."assets/css/template.css' rel='stylesheet' />\n";
        $elems.= "\t<link href='".base_url()."assets/css/bootstrap.css' rel='stylesheet' />\n";
        $elems.= "\t<link href='".base_url()."assets/css/jasny-bootstrap.css' rel='stylesheet' />\n";
        $elems.= "\t<link href='".base_url()."assets/css/font-awesome.css' rel='stylesheet'>\n";
        $elems.= "\t<link href='".base_url()."assets/css/jquery-ui-1.8.20.custom.css' rel='stylesheet'>\n";

        $elems.= "\t<!--[if IE 7]>\n\t<link href='".base_url()."assets/css/font-awesome-ie7.min.css' rel='stylesheet' />\n\t<![endif]-->\n";

        $elems.= "\t<link rel='stylesheet' href='".base_url()."assets/css/opensans.css' />\n";
        $elems.= "\t<link rel='stylesheet' href='".base_url()."assets/theme/w8.min.css' />\n";
        $elems.= "\t<link rel='stylesheet' href='".base_url()."assets/theme/w8-skins.min.css' />\n";
        $elems.= "\t<link rel='stylesheet' href='".base_url()."assets/theme/ace.min.css' />\n";

        $elems.= "\t<script type='text/javascript'>var site_url = '".site_url()."';</script>\n";
        $elems.= "\t<script src='".base_url()."assets/js/jquery-1.10.2.js' type='text/javascript'></script>\n";
        $elems.= "\t<script src='".base_url()."assets/js/jquery-ui-1.8.20.custom.min.js' type='text/javascript'></script>\n";
        $elems.= "\t<script src='".base_url()."assets/js/bootstrap.js' type='text/javascript'></script>\n";
        $elems.= "\t<script src='".base_url()."assets/js/jasny-bootstrap.js' type='text/javascript'></script>\n";

        $elems.= "\t<script src='".base_url()."assets/js/theme/ace-elements.min.js' type='text/javascript'></script>\n";
        $elems.= "\t<script src='".base_url()."assets/js/theme/ace.min.js' type='text/javascript'></script>\n";

        return $elems;
    }

    private function page_script($script){
        $count = count($script);
        $scripts = '';

        for($i = 0; $i < $count; ++$i){
            if($script[$i] != ""){
                $scripts.= "<script type='text/javascript' src='".base_url()."assets/js/page/".$script[$i].".js'></script>\n\t";
            }
        }

        return $scripts;
    }

    private function page_css($css){
        $count = count($css);
        $style = '';

        for($i = 0; $i < $count; ++$i){
            if($css[$i] != ""){
                $style.= "<link rel='stylesheet' href='".base_url('assets/css/page/'.$css[$i].'.css')."' />\n\t";
            }
        }

        return $style;
    }

    function _page_defaults($page_title, $page, $sub_page = '', $modal = NULL){
        $pagedata['page_title'] = $page_title;
        $pagedata['page'] = $page;
        $pagedata['sub_page'] = $sub_page;
        $pagedata['user'] = $this->_user;
		$pagedata['global_modal'] = $this->load->view('template/modals', NULL, TRUE);

        if(!is_null($modal))
            $pagedata['modal'] = $this->load->view('template/modals/'.$modal, NULL, TRUE);

        return $pagedata;
    }

    function site_name(){
        $title = $this->config->item('sitename');
        return $title;
    }

    function paginate($url, $total_rows, $per_page){
        $this->load->library('pagination');

        $config['base_url'] = $url;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        $config['full_tag_open'] = '<ul>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo;';
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['full_tag_close'] = '</u>';

        $this->pagination->initialize($config); 

        return $this->pagination->create_links();
    }
	
	function _validate_email($email){
		$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
		
		if(preg_match($regex, $email)){
			return TRUE;
		}
		
		return FALSE;
	}
	
	function _getUserDetails($email){		
		
		$this->_user = $this->mod_user->getUserDetails($email);
		
		return $this->_user;
	}

    private function userLoggedDetails(){
        $this->_user = $this->mod_user->getUser($this->session->userdata('email'));
    }
}
