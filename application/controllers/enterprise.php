<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Enterprise extends MY_Controller{

    public function __construct(){
        parent::__construct();
    }

	public function index($enterprise_id = NULL){
		if($this->user->is_logged_in()){
			if(!is_null($enterprise_id) && is_numeric($enterprise_id)){
				$enterprise = $this->mod_enterprise->get_enterprise($enterprise_id);
				
				if(is_object($enterprise)){
					$contentdata['script'] = array('admin', 'jquery.inputlimiter.1.3.1.min', 'chosen.jquery.min', 'enterprises');
            		$contentdata['styles'] = array('chosen');
					
					$pagedata = $this->_page_defaults('Edit Enterprise - '. $enterprise->enterprise_name, 'prod_enterprises', 'enterpriseslist');
					
					if(isset($_POST['save_enterprise_image'])){
						if(is_numeric($enterprise_id)){
							$upload = (object)$this->upload_image($enterprise_id);
		
							if($upload->status){
								$photo_id = $this->mod_enterprise->add_photo(array('enterprise_image' => $upload->response->file_name, 'enterprise_id' => $enterprise_id));
								
								if($this->input->post('is_primary')){
									$make_primary = $this->mod_enterprise->set_primary_photo(array('is_primary' => 1), $enterprise_id, $photo_id);
								}
								
								if($photo_id){
									$pagedata['response'] = '<div class="alert alert-success">Enterprise image updated</div>';
								}
								else{
									$pagedata['response'] = '<div class="alert alert-error">Failed to update Enterprise image</div>';
								}
							}
							else{
								$pagedata['response'] = $upload->response;
							}
						}
						else{
							$pagedata['response'] = '<div class="alert alert-error">Invalid parameters</div>';
						}
					}
					
					$enterprise = $this->mod_enterprise->get_enterprise($enterprise_id);
					
					$pagedata['enterprise'] = $enterprise;
					$pagedata['album'] = $this->mod_enterprise->get_album($enterprise_id);
					$pagedata['artisans'] = $this->mod_enterprise->get_artisans($enterprise_id);
					$pagedata['article'] = $this->mod_enterprise->get_article($enterprise->article_id);
					$pagedata['collections']	= $this->mod_enterprise->get_collection($enterprise_id);
					
					$contentdata['page'] = $this->load->view('page/enterprise', $pagedata, TRUE);
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
	
    public function listings(){
        if($this->user->is_logged_in()){
			$contentdata['script'] = array('admin', 'jquery.inputlimiter.1.3.1.min', 'chosen.jquery.min', 'enterprises');
            $contentdata['styles'] = array('chosen');
			
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $perpage = 10;
            $url = base_url('enterprise/listings');
            $total = $this->mod_enterprise->get_total();
			
			$pagedata = $this->_page_defaults('Enterprises', 'prod_enterprises', 'enterpriseslist');

			if(isset($_POST['do_batch_action'])){
                $items = $this->input->post('enterprise_item');
                $status = $this->input->post('batch_actions');
				
				if($this->form_validation->run('batch_update_enterprise') == FALSE){
					$pagedata['response'] = validation_errors('<div class="alert alert-error">', '</div>');
				}
				else{
					if(is_array($items)){
                         $batch_update = $this->mod_enterprise->batch_update($status, $items);

                        if($batch_update > 0){
                            $pagedata['response'] = '<div class="alert alert-success">Enterprise(s) updated</div>';
                        }
                        else{
                            $pagedata['response'] = '<div class="alert alert-info">No changes made</div>';
                        }
                    }
                    else{
                        $pagedata['response'] = '<div class="alert alert-error">Invalid Parameters</div>';
                    }
				} // form validation
            }

            $pagedata['enterprises'] = $this->_enterprises($perpage, $page);
            $pagedata['pagination'] = $this->paginate($url, $total, $perpage);

            $contentdata['page'] = $this->load->view('page/enterprise_list', $pagedata, TRUE);
			$this->templateLoader($contentdata);
        }
        else{
            $this->load->view('page/login');
        }
    }
	
	private function _enterprises($perpage, $page){
		$enterprises = $this->mod_enterprise->get_enterprises($perpage, $page);
		$status = 'Unpublished';
		$data = '';
		
		foreach($enterprises as $row){
			$data.= '<li class="span3" style="margin-left: 0px; margin-right: 1.5%;">';
			$data.= '<div class="thumbnail">';
			$data.= '<div class="enterprise_checkbox pull-left"><input type="checkbox" class="ace enterprise-item" name="enterprise_item[]" value="'.$row->enterprise_id.'" /><span class="lbl"></span></div>';
			
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
	
	public function create(){
        if($this->user->is_logged_in()){
			$contentdata['script'] = array('admin', 'enterprises', 'jquery.inputlimiter.1.3.1.min', 'chosen.jquery.min');
			$contentdata['styles'] = array('chosen');
			
			$pagedata = $this->_page_defaults('Add Enterprise', 'prod_enterprises', 'enterpriseslist');

            if(isset($_POST['save_enterprise'])){
				if($this->form_validation->run('create_enterprise') == FALSE){
					$pagedata['response'] = validation_errors('<div class="alert alert-error"><i class="icon-warning"></i> ', '</div>');
				}
				else{
					$collection_response = 0;
					
					$data = array(
						'enterprise_name' => $this->input->post('enterprise_name'),
						'enterprise_description' => $this->input->post('enterprise_description'),
						'enterprise_status' => 1,
						'date_created' => date('Y-m-d H:i:s')
					);
					
					$enterprise_id = $this->mod_enterprise->add_enterprise($data);
					
					$theme = $this->input->post('theme_name');
					$theme_cnt = count($theme);
					
					for($i = 0; $i < $theme_cnt; ++$i){
						$collection_response += $this->mod_collection->add_enterprise(array('collection_id' => $theme[$i], 'enterprise_id' => $enterprise_id));
					}
					
					if($enterprise_id && $collection_response){
						$upload = (object)$this->upload_image($enterprise_id);
						
						if($upload->status){
							$add_image = $this->mod_enterprise->add_photo(array('enterprise_image ' => $upload->response->file_name, 'enterprise_id' => $enterprise_id, 'is_primary' => 1));
							
							if($add_image){
								$pagedata['response'] = '<div class="alert alert-success">Enterprise Added!</div>';
							}
							else{
								$pagedata['response'] = '<div class="alert alert-error">Failed to Add Image</div>';
							}
						}
						else{
							$pagedata['response'] = $upload->response;
						}
					}
					else{
						$pagedata['response'] = '<div class="alert alert-error">Failed to created Enterprise</div>';
					}
				} // form validation
            }
			
			$pagedata['collections'] = $this->mod_collection->get_all();
			
            $contentdata['page'] = $this->load->view('page/add_enterprise', $pagedata, TRUE);
			
			$this->templateLoader($contentdata);
        }
        else{
            $this->load->view('page/login');
        }
	}

	public function update(){
		if(!$this->input->is_ajax_request()) redirect(site_url('404_override'));
		
		if($this->user->is_logged_in()){
			$enterprise_id = $this->input->post('enterprise_id');
			
			$label = NULL;
			
			if(isset($_POST['name'])) {
				$label = 'name';
				$field_name = 'enterprise_name';
				$value = $this->input->post('name');
			}
			if(isset($_POST['description'])){
				$label = 'description';
				$field_name = 'enterprise_description';
				$value = $this->input->post('description');
			}			
			
			$status = 0;
			$response = "Invalid Parameters"; # default response
			
			if (!is_null($label)){
				if(is_numeric($enterprise_id) && !empty($value)){
					$data = array($field_name => trim($value));
					$update = $this->mod_enterprise->update_enterprise($data, $enterprise_id);
					
					$success_message = 'Enterprise\'s ' . $label . ' updated';
					$failed_message = 'Failed to update enterprise\'s ' . $label;
					
					if($update) {
						$status		= 1;
						$response	= $success_message; 
					}
					else {
						$response	= $failed_message; 
					}
				}
			}
		}
		else{
			$status = 2;
			$response = "Your session has expired";
        }
		
		$jsondata = array('status' => $status, 'response' =>  $response);
        echo json_encode($jsondata);
	}
		
	public function delete(){
		if(!$this->input->is_ajax_request()) redirect(site_url('404_override'));
		
		if($this->user->is_logged_in()){
			$enterprise_id = $this->input->post('enterprise_id');
			
			if(is_numeric($enterprise_id)) {
				// delete enterprise
				$deleted = $this->mod_enterprise->delete($enterprise_id);								
				if($deleted){				
					$jsondata = array('status' => 1, 'response' => 'Enterprise deleted.');
				}
				else{
					$jsondata = array('status' => 0, 'response' => 'Failed to delete enterprise');
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
			$id = $this->input->post('id');
			$status = $this->input->post('status');
			
			if(is_numeric($id) && is_numeric($status)){
				$update = $this->mod_enterprise->update_enterprise(array('enterprise_status' => $status), $id);
				
				if($update){
					$jsondata = array('status' => 1, 'response' => 'Enterprise status updated');
				}
				else{
					$jsondata = array('status' => 0, 'response' => 'Failed to update Enterprise\'s status');
				}
			}
			else{
				$jsondata = array('status' => 1, 'response' => 'Invalid Parameters');
			}
		}
		else{
			$jsondata = array('status' => 2, 'response' => 'Your session has expired');
		}
		
		echo json_encode($jsondata);
	}
	
	private function upload_image($id){
		$config['file_name'] = $id.'_'.date('YmdHis');
		$config['upload_path'] = $this->config->item('enterprise_upload_path');
		$config['allowed_types'] = 'gif|jpg|pjpeg|jpeg|png|x-png';
		$config['max_size']	= '1024';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		
		$this->load->library('upload', $config);
		
		if($this->upload->do_upload('enterprise_image')){
			return array('status' => TRUE, 'response' => (object)$this->upload->data());
		}
		
		return array('status' => FALSE, 'response' => $this->upload->display_errors('<div class="alert alert-error">', '</div>'));
	}
}
 