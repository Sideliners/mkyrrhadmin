<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends MY_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function listings(){
        if($this->user->is_logged_in()){
			$contentdata['script'] = array('admin', 'common', 'tinymce/tinymce.min', 'pages', 'chosen.jquery.min', 'jquery.inputlimiter.1.3.1.min');
            $contentdata['styles'] = NULL;
			
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $perpage = 10;
            $url = base_url('page/listings');
            $total = $this->mod_page->get_total();
			
			$pagedata = $this->_page_defaults('Pages', 'pages', 'pagelist');

            if(isset($_POST['do_batch_action'])){
                $items = $this->input->post('page_item');
                $status = $this->input->post('batch_actions');

                if($status != '' && is_numeric($status)){
                    if(is_array($items)){
                         $batch_update = $this->mod_page->batch_update($status, $items);

                        if($batch_update > 0){
                            $pagedata['response'] = '<div class="alert alert-success">Page(s) updated</div>';
                        }
                        else{
                            $pagedata['response'] = '<div class="alert alert-info">No changes made</div>';
                        }
                    }
                    else{
                        $pagedata['response'] = '<div class="alert alert-error">Invalid Parameters</div>';
                    }
                }
                else{
                    $pagedata['response'] = '<div class="alert alert-error">Invalid Parameters</div>';
                }
            }

            $pagedata['pages'] = $this->mod_page->get_pages($perpage, $page);
            $pagedata['pagination'] = $this->paginate($url, $total, $perpage);

            $contentdata['page'] = $this->load->view('page/pages_list', $pagedata, TRUE);
			$this->templateLoader($contentdata);
        }
        else{
            $this->load->view('page/login');
        }
    }
			
	public function create(){
        if($this->user->is_logged_in()){
            $pagedata['page_title'] = 'Add Page';
            $pagedata['page'] = 'pages';
            $pagedata['sub_page'] = 'pagelist';
            $pagedata['user'] = $this->_user;

            $contentdata['script'] = array('admin', 'tinymce/tinymce.min', 'pages', 'chosen.jquery.min', 'jquery.inputlimiter.1.3.1.min');
            $contentdata['styles'] = array('chosen');

            if(isset($_POST['save_page'])){
				if($this->form_validation->run('create_page') == FALSE){
					$pagedata['error'] = validation_errors('<div class="alert alert-error">', '</div>');
				}
				else{
					$entr_response = 0;
					
					$page_data = array(
						'page_name' => $this->input->post('page_name'),
						'page_uri' => $this->input->post('page_uri'),
						'page_description' => $this->input->post('page_description'),
						'page_body' => $this->input->post('page_body'),
						'user_id' => $this->_user->user_id
					);					
					
					$page_id = $this->mod_page->add_page($page_data);					
					
					if($page_id){
						unset($_POST);
						$pagedata['response'] = '<div class="alert alert-success">Page Added!</div>';
						
					}
					else{
						$pagedata['response'] = '<div class="alert alert-error">Failed to create page, Please contact the Administrator for assistance.</div>';
					}
				} // form validation
            }
			
            $contentdata['page'] = $this->load->view('page/add_page', $pagedata, TRUE);
			
			$this->templateLoader($contentdata);
        }
        else{
            $this->load->view('page/login');
        }
	}

	public function details($page_id = NULL){
        if($this->user->is_logged_in()){
			if(!is_null($page_id) && is_numeric($page_id)){
				$page_data = $this->mod_page->get_page($page_id);
				
				if(is_object($page_data)){
					$contentdata['script'] = array('admin', 'tinymce/tinymce.min', 'pages', 'chosen.jquery.min', 'jquery.inputlimiter.1.3.1.min');
                    $contentdata['styles'] = array('chosen');

					$pagedata = $this->_page_defaults('Edit Page - '. $page_data->page_name, 'pages', 'pagelist');
					$pagedata['page_data'] = $page_data;
					
					$contentdata['page'] = $this->load->view('page/page', $pagedata, TRUE);
				}
				else{
					redirect(site_url('404_override'));
				}
			}
			else{
				redirect(site_url('404_override'));
			}
			
			$this->templateLoader($contentdata);
		}
		else{
            $this->load->view('page/login');
        }
	}
	
	public function update(){
		if(!$this->input->is_ajax_request()) redirect(site_url('404_override'));
		
		if($this->user->is_logged_in()){
			$id = $this->input->post('id');
			
			if(isset($_POST['name'])){
				$data = $this->input->post('name');
				
				if(is_numeric($id) && is_string($data) && $data != ''){
					$update = $this->mod_page->update_page(array('page_name' => trim($data)), $id);
					
					if($update){
						$jsondata = array('status' => 1, 'response' => 'Page\'s name updated');
					}
					else{
						$jsondata = array('status' => 0, 'response' => 'Failed to update page\'s name');
					}
				}
				else{
					$jsondata = array('status' => 0, 'response' => 'Invalid Parameters');
				}
			}
			else if(isset($_POST['description'])){
				$data = $this->input->post('description');
				
				if(is_numeric($id) && is_string($data) && $data != ''){
					$update = $this->mod_page->update_page(array('page_description' => trim($data)), $id);
					
					if($update){
						$jsondata = array('status' => 1, 'response' => 'Page\'s description updated');
					}
					else{
						$jsondata = array('status' => 0, 'response' => 'Failed to update page\'s description');
					}
				}
				else{
					$jsondata = array('status' => 0, 'response' => 'Invalid Parameters');
				}
			}
			else if(isset($_POST['page_body'])){
				$data = $this->input->post('page_body');
				
				if(is_numeric($id) && is_string($data) && $data != ''){
					$update = $this->mod_page->update_page(array('page_body' => trim($data)), $id);
					
					if($update){
						$jsondata = array('status' => 1, 'response' => 'Page\'s body updated');
					}
					else{
						$jsondata = array('status' => 0, 'response' => 'Failed to update page\'s body');
					}
				}
				else{
					$jsondata = array('status' => 0, 'response' => 'Invalid Parameters');
				}
			}
			else{
				$jsondata = array('status' => 0, 'response' => 'Invalid Parameters');
			}
		}
		else{
            $jsondata = array('status' => 2, 'response' => 'Your session has expired');
        }

        echo json_encode($jsondata);
	}
		
	public function delete(){
		if(!$this->input->is_ajax_request()) redirect(site_url('404_override'));
		
		if($this->user->is_logged_in()){
			$page_id = $this->input->post('page_id');
			
			if(is_numeric($page_id)) {
				$page = $this->mod_page->get_page($page_id);
								
				$deleted = $this->mod_page->delete($page_id);				
				if($deleted){
					$jsondata = array('status' => 1, 'response' => 'Page deleted');
				}
				else{
					$jsondata = array('status' => 0, 'response' => 'Failed to delete page');
				}
			}
			else{
				$jsondata = array('status' => 0, 'response' => 'Invalid Parameters');
			}
		}
		else{
            $jsondata = array('status' => 2, 'response' => 'Your session has expired');
        }

        echo json_encode($jsondata);
	}
	
	public function update_status(){
		if(!$this->input->is_ajax_request()) redirect(site_url('404_override'));
		
		if($this->user->is_logged_in()){
			$id = $this->input->post('page_id');
			$status = $this->input->post('status');
			
			if(is_numeric($id) && is_numeric($status)){
				$update = $this->mod_page->update_page(array('page_status' => $status), $id);
				
				if($update){
					$jsondata = array('status' => 1, 'response' => 'Page\'s status updated');
				}
				else{
					$jsondata = array('status' => 0, 'response' => 'Failed to update page\'s status');
				}
			}
			else{
				$jsondata = array('status' => 0, 'response' => 'Invalid Parameters');
			}
		}
		else{
			$jsondata = array('status' => 2, 'response' => 'Your session has expired');
		}
		
		echo json_encode($jsondata);
	}
	
	function clean_url() {
	
		$string = $this->input->post('string');
		$data = array(
					"clean_url" => $this->clean_string($string)
				);
		echo json_encode($data);
	}
}
