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

            $pagedata['page_title'] = 'Search Result : Products';
            $pagedata['string'] = $str;
            $pagedata['page'] = 'products';
            $pagedata['sub_page'] = 'productslist';
            $pagedata['user'] = $this->_user;

            $pagedata['products'] = $this->mod_product->search_products($perpage, $page, $str);
            $pagedata['pagination'] = ($total > $perpage)? $this->paginate($url, $total, $perpage) : '';

            $contentdata['page'] = $this->load->view('page/search_products', $pagedata, TRUE);
			$this->templateLoader($contentdata);
        }
        else{
            $this->load->view('page/login');
        }
    }

    public function articles(){
        $contentdata['script'] = array('admin');

        if($this->user->is_logged_in()){
            $str = $this->input->post('search');
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $perpage = 10;
            $url = base_url('articles/listings');
            $total = $this->mod_articles->get_total_search($str);

            $pagedata['page_title'] = 'Articles';
            $pagedata['page'] = 'prod_articles';
            $pagedata['sub_page'] = 'articlelist';
            $pagedata['user'] = $this->_user;

            $pagedata['articles'] = $this->mod_articles->get_articles_search($perpage, $page, $str);
            $pagedata['pagination'] = $this->paginate($url, $total, $perpage);

            $contentdata['page'] = $this->load->view('page/search_articles', $pagedata, TRUE);
			$this->templateLoader($contentdata);
        }
        else{
            $this->load->view('page/login');
        }
    }
}
