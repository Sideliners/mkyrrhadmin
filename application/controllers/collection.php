<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Collection extends MY_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function listings(){
        if($this->user->is_logged_in()){
			$contentdata['script'] = array('admin', 'common', 'collections');
            $contentdata['styles'] = NULL;
			
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $perpage = 10;
            $url = base_url('collection/listings');
            $total = $this->mod_collection->get_total();
			
			$pagedata = $this->_page_defaults('Collections', 'collections', 'collectionlist');

            if(isset($_POST['do_batch_action'])){
                $items = $this->input->post('collection_item');
                $status = $this->input->post('batch_actions');

                if($status != '' && is_numeric($status)){
                    if(is_array($items)){
                         $batch_update = $this->mod_collection->batch_update($status, $items);

                        if($batch_update > 0){
                            $pagedata['response'] = '<div class="alert alert-success">Collection(s) updated</div>';
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

            $pagedata['collections'] = $this->mod_collection->get_collections($perpage, $page);
            $pagedata['pagination'] = $this->paginate($url, $total, $perpage);

            $contentdata['page'] = $this->load->view('page/collections_list', $pagedata, TRUE);
			$this->templateLoader($contentdata);
        }
        else{
            $this->load->view('page/login');
        }
    }
			
	public function create(){
        if($this->user->is_logged_in()){
            $pagedata['page_title'] = 'Add Collection';
            $pagedata['page'] = 'collections';
            $pagedata['sub_page'] = 'collectionlist';
            $pagedata['user'] = $this->_user;

            $contentdata['script'] = array('admin', 'collections', 'chosen.jquery.min', 'jquery.inputlimiter.1.3.1.min');
            $contentdata['styles'] = array('chosen');

            if(isset($_POST['save_collection'])){
			
				if($this->form_validation->run('create_collection') == FALSE){
					$pagedata['error'] = validation_errors('<div class="alert alert-error">', '</div>');
				}
				else{
					$entr_response = 0;
					
					$collection_data = array(
						'collection_name' => $this->input->post('collection_name'),
						'date_created' => date('Y-m-d H:i:s')
					);					
					
					$collection_id = $this->mod_collection->add_collection($collection_data);					
					
					if($collection_id){						
						$pagedata['response'] = '<div class="alert alert-success">Collection Added!</div>';
					}
					else{
						$pagedata['response'] = '<div class="alert alert-error">Failed to create collection, Please contact the Administrator for assistance.</div>';
					}
				} // form validation
            }
			
            $contentdata['page'] = $this->load->view('page/add_collection', $pagedata, TRUE);
			
			$this->templateLoader($contentdata);
        }
        else{
            $this->load->view('page/login');
        }
	}

	public function details($collection_id = NULL){
        if($this->user->is_logged_in()){			
			if(!is_null($collection_id) && is_numeric($collection_id)){
				$collection = $this->mod_collection->get_collection($collection_id);
				
				if(is_object($collection)){
					$contentdata['script'] = array('admin', 'collections');
                    $contentdata['styles'] = array('chosen');

					$pagedata = $this->_page_defaults('Edit Collection - '. $collection->collection_name, 'collections', 'collectionlist');					
					$pagedata['collection'] = $collection;
					$pagedata['collection_product'] = $this->mod_collection->get_collection_product($collection_id);
					$pagedata['collection_artisan'] = $this->mod_collection->get_collection_artisan($collection_id);
					$pagedata['collection_enterprise'] = $this->mod_collection->get_collection_enterprise($collection_id);
					
					$contentdata['page'] = $this->load->view('page/collection', $pagedata, TRUE);
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
					$update = $this->mod_collection->update_collection(array('collection_name' => trim($data)), $id);
					
					if($update){
						$jsondata = array('status' => 1, 'response' => 'Collection\'s name updated');
					}
					else{
						$jsondata = array('status' => 0, 'response' => 'Failed to update collection\'s name');
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
			$collection_id = $this->input->post('collection_id');
			
			if(is_numeric($collection_id)) {
				$collection = $this->mod_collection->get_collection($collection_id);
				
				// delete artisan
				$deleted = $this->mod_collection->delete($collection_id);				
				if($deleted){
					$jsondata = array('status' => 1, 'response' => 'Collection deleted');
				}
				else{
					$jsondata = array('status' => 0, 'response' => 'Failed to delete collection');
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
			$id = $this->input->post('collection_id');
			$status = $this->input->post('status');
			
			if(is_numeric($id) && is_numeric($status)){
				$update = $this->mod_collection->update_collection(array('collection_status' => $status), $id);
				
				if($update){
					$jsondata = array('status' => 1, 'response' => 'Collection\'s status updated');
				}
				else{
					$jsondata = array('status' => 0, 'response' => 'Failed to update collection\'s status');
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
}
