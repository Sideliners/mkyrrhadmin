<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends MY_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function products(){
        if($this->user->is_logged_in()){
            $contentdata['script'] = array('admin', 'prod_list', 'common');
            $contentdata['styles'] = NULL;

            $str = $this->input->post('search');
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $perpage = 10;
            $url = base_url('search/products');
            $total = $this->mod_product->get_total_search($str);
			
			$pagedata = $this->_page_defaults('Search Result : Products', 'products', 'productslist');
			
			$pagedata['string'] = $str;
            $pagedata['products'] = $this->mod_product->search_products($perpage, $page, $str);
            $pagedata['pagination'] = ($total > $perpage)? $this->paginate($url, $total, $perpage) : '';

            $contentdata['page'] = $this->load->view('page/search_products', $pagedata, TRUE);
			$this->templateLoader($contentdata);
        }
        else{
            $this->load->view('page/login');
        }
    }
	
	public function artisans(){
        if($this->user->is_logged_in()){
			$contentdata['script'] = array('admin', 'artisans');
            $contentdata['styles'] = NULL;
			
			$str = $this->input->post('search');
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $perpage = 10;
            $url = base_url('search/artisans');
            $total = $this->mod_artisan->get_total();
			
			$pagedata = $this->_page_defaults('Artisans', 'prod_artisans', 'artisanslist');

			$pagedata['string'] = $str;
            $pagedata['artisans'] = $this->_get_artisans($perpage, $page, $str);
			$pagedata['pagination'] = ($total > $perpage)? $this->paginate($url, $total, $perpage) : '';

            $contentdata['page'] = $this->load->view('page/search_artisans', $pagedata, TRUE);
			
			$this->templateLoader($contentdata);
        }
        else{
            $this->load->view('page/login');
        }
    }
	
	private function _get_artisans($perpage, $page, $str){
		$artisans = $this->mod_artisan->get_artisans($perpage, $page, $str);
		$status = 'Unpublished';
		$data = '';

        if(empty($artisans)) return NULL;
		
		foreach($artisans as $row){
			$data.= '<li class="span3" style="margin-left: 0px; margin-right: 1.5%;">';
			$data.= '<div class="thumbnail">';
			
			$image = $this->mod_artisan->primary_image($row->artisan_id);
			
			if(is_object($image)){
				$data.= '<div class="center-cropped artisan-listing" style="background-image: url(\''.base_url('uploads/images/artisans/'.$image->artisan_image).'\');">';
			}
			else{
				$data.= '<div class="center-cropped artisan-listing" style="background-color: #CCC; color: #FFF;"><i class="icon-user icon-4x"></i>';
			}
			
			$data.= '</div>';
			
			if($row->artisan_status == 1){
				$status = 'Published';
			}
			
			$data.= '
				<div class="caption">
					<h5><a href="'.site_url('artisan/details/'.$row->artisan_id).'">'.$row->artisan_name.'</a><br /><small>('.$status.')</small></h5>
					<p>'.substr(strip_tags($row->artisan_description), 0, 150).'..</p>
					<div><a href="'.site_url('artisan/details/'.$row->artisan_id).'" class="label label-lg label-pink arrowed-right"><i class="icon-edit"></i> Details</span></a>
				</div>
			';
			$data.= '</div>';
			$data.= '</li>';
		}
		
		return $data;
	}
	
	public function enterprise(){
        if($this->user->is_logged_in()){
			$contentdata['script'] = array('admin', 'jquery.inputlimiter.1.3.1.min', 'chosen.jquery.min', 'enterprises');
           	$contentdata['styles'] = array('chosen');
			
			$str = $this->input->post('search');
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $perpage = 10;
            $url = base_url('enterprise/listings');
            $total = $this->mod_enterprise->get_total();
			
			$pagedata = $this->_page_defaults('Enterprises', 'prod_enterprises', 'enterpriseslist');

			$pagedata['string'] = $str;
            $pagedata['enterprises'] = $this->_enterprises($perpage, $page, $str);
            $pagedata['pagination'] = ($total > $perpage)? $this->paginate($url, $total, $perpage) : '';

            $contentdata['page'] = $this->load->view('page/search_enterprise', $pagedata, TRUE);
			$this->templateLoader($contentdata);
        }
        else{
            $this->load->view('page/login');
        }
    }
	
	private function _enterprises($perpage, $page, $str){
		$enterprises = $this->mod_enterprise->get_enterprises($perpage, $page, $str);
		$status = 'Unpublished';
		$data = '';
		
		foreach($enterprises as $row){
			$data.= '<li class="span3" style="margin-left: 0px; margin-right: 1.5%;">';
			$data.= '<div class="thumbnail">';
			
			$image = $this->mod_enterprise->primary_image($row->enterprise_id);
			
			if(is_object($image)){
				$data.= '<div class="center-cropped artisan-listing" style="background-image: url(\''.base_url('uploads/images/enterprises/'.$image->enterprise_image).'\');">';
			}
			else{
				$data.= '<div class="center-cropped artisan-listing" style="background-color: #CCC; color: #FFF;"><i class="icon-user icon-4x"></i>';
			}
			
			$data.= '</div>';
			
			if($row->enterprise_status == 1){
				$status = 'Published';
			}
			
			$data.= '
				<div class="caption">
					<h5><a href="'.site_url('enterprise/details/'.$row->enterprise_id).'">'.$row->enterprise_name.'</a><br /><small>('.$status.')</small></h5>
					<p>'.substr(strip_tags($row->enterprise_description), 0, 150).'..</p>
					<div><a href="'.site_url('enterprise/details/'.$row->enterprise_id).'" class="label label-lg label-pink arrowed-right"><i class="icon-edit"></i> Details</span></a>
				</div>
			';
			$data.= '</div>';
			$data.= '</li>';
		}
		
		return $data;
	}

    public function articles(){
        if($this->user->is_logged_in()){
			$contentdata['script'] = array('admin', 'articles');
            $contentdata['styles'] = NULL;
			
			$str = $this->input->post('search');
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $perpage = 10;
            $url = base_url('articles/listings');
            $total = $this->mod_article->get_total();
			
			$pagedata = $this->_page_defaults('Articles', 'prod_articles', 'articlelist');

            $pagedata['articles'] = $this->mod_article->get_all($perpage, $page, $str);
            $pagedata['pagination'] = $this->paginate($url, $total, $perpage);

            $contentdata['page'] = $this->load->view('page/articles_list', $pagedata, TRUE);
			$this->templateLoader($contentdata);
        }
        else{
            $this->load->view('page/login');
        }
	}
}
