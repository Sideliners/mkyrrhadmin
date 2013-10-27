<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Artisan extends MY_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function listings(){
        if($this->user->is_logged_in()){
			$contentdata['script'] = array('admin', 'artisans');
            $contentdata['styles'] = NULL;
			
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $perpage = 10;
            $url = base_url('artisans/listings');
            $total = $this->mod_artisan->get_total();
			
			$pagedata = $this->_page_defaults('Artisans', 'prod_artisans', 'artisanslist');

            if(isset($_POST['do_batch_action'])){
                $items = $this->input->post('artisan_item');
                $status = $this->input->post('batch_actions');

                if($status != '' && is_numeric($status)){
                    if(is_array($items)){
                         $batch_update = $this->mod_artisan->batch_update($status, $items);

                        if($batch_update > 0){
                            $pagedata['response'] = '<div class="alert alert-success">Artisan(s) updated</div>';
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

            $pagedata['artisans'] = $this->_artisans($perpage, $page);
            $pagedata['pagination'] = $this->paginate($url, $total, $perpage);

            $contentdata['page'] = $this->load->view('page/artisans_list', $pagedata, TRUE);
			$this->templateLoader($contentdata);
        }
        else{
            $this->load->view('page/login');
        }
    }
	
	private function _artisans($perpage, $page){
		$artisans = $this->mod_artisan->get_artisans($perpage, $page);
		$status = 'Unpublished';
		$data = '';
		
		foreach($artisans as $row){
			$data.= '<li class="span3" style="margin-left: 0px; margin-right: 1.5%;">';
			$data.= '<div class="thumbnail">';
			$data.= '<div class="artisan_checkbox pull-left"><input type="checkbox" class="ace artisans-item" name="artisan_item[]" value="'.$row->artisan_id.'" /><span class="lbl"></span></div>';
			
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

	public function details($artisan_id = NULL){
        if($this->user->is_logged_in()){			
			if(!is_null($artisan_id) && is_numeric($artisan_id)){
				$artisan = $this->mod_artisan->get_artisan($artisan_id);
				
				if(is_object($artisan)){
					$contentdata['script'] = array('admin', 'jquery.inputlimiter.1.3.1.min', 'chosen.jquery.min', 'artisans');
                    $contentdata['styles'] = array('chosen');

					$pagedata = $this->_page_defaults('Edit Artisan - '. $artisan->artisan_name, 'prod_artisans', 'artisanslist');
					
					if(isset($_POST['save_artisan_image'])){
						$upload = (object)$this->upload_image($artisan_id);
						
						if($upload->status === TRUE){
							$photo_id = $this->mod_artisan->add_photo(array('artisan_image' => $upload->response->file_name, 'artisan_id' => $artisan_id));
							
							if($this->input->post('is_primary')){
								$make_primary = $this->mod_artisan->set_primary_photo(array('is_primary' => 1), $artisan_id, $photo_id);
							}
							
							if($photo_id){
								$pagedata['response'] = '<div class="alert alert-success">A new artisan image was added</div>';
							}
							else{
								$pagedata['response'] = '<div class="alert alert-error">Failed to add artisan image</div>';
							}
						}
						else{
							$pagedata['response'] = $upload->response;
						}
					}
					else if(isset($_POST['save_artisan_product'])){
						$add_response = 0;
						$products = $this->input->post('product_list');
						$product_cnt = count($products);
						
						for($i = 0; $i < $product_cnt; ++$i){
							$add_response += $this->mod_artisan->add_product(array('artisan_id' => $artisan_id, 'product_id' => $products[$i]));
						}
						
						if($add_response){
							$pagedata['response'] = '<div class="alert alert-success">Product(s) was added</div>';
						}
						else{
							$pagedata['response'] = '<div class="alert alert-error">Failed to add product(s)</div>';
						}
					}
					
					$pagedata['artisan'] = $this->mod_artisan->get_artisan($artisan_id);
					$pagedata['photo'] = $this->mod_artisan->primary_image($artisan_id);
					$pagedata['album'] = $this->mod_artisan->get_album($artisan_id);
					$pagedata['enterprises'] = $this->mod_artisan->get_enterprise($artisan_id);
					$pagedata['products'] = $this->mod_artisan->get_products($artisan_id);
					$pagedata['product_list'] = $this->mod_product->getProducts();
					
					$contentdata['page'] = $this->load->view('page/artisan', $pagedata, TRUE);
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
	
	private function upload_image($id){
		$config['file_name'] = $id.'_'.date('YmdHis');
		$config['upload_path'] = $this->config->item('artisans_upload_path');
		$config['allowed_types'] = 'gif|jpg|pjpeg|jpeg|png|x-png';
		$config['max_size']	= '1024';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		
		$this->load->library('upload', $config);
		
		if($this->upload->do_upload('artisan_image')){
			return array('status' => TRUE, 'response' => (object)$this->upload->data());
		}
		
		return array('status' => FALSE, 'response' => $this->upload->display_errors('<div class="alert alert-error">', '</div>'));
	}
	
	public function create(){
        if($this->user->is_logged_in()){
            $pagedata['page_title'] = 'Add Artisan';
            $pagedata['page'] = 'prod_artisans';
            $pagedata['sub_page'] = 'artisanslist';
            $pagedata['user'] = $this->_user;

            $contentdata['script'] = array('admin', 'artisans', 'chosen.jquery.min', 'jquery.inputlimiter.1.3.1.min');
            $contentdata['styles'] = array('chosen');

            if(isset($_POST['save_artisan'])){
				if($this->form_validation->run('create_artisan') == FALSE){
					$pagedata['error'] = validation_errors('<div class="alert alert-error">', '</div>');
				}
				else{
					$entr_response = 0;
					
					$artisan_data = array(
						'artisan_name' => $this->input->post('artisan_name'),
						'artisan_description' => $this->input->post('artisan_description')
					);
					
					$enterprise = $this->input->post('enterprise');
					$enterprise_cnt = count($enterprise);
					
					$artisan_id = $this->mod_artisan->add_artisan($artisan_data);
					
					for($i = 0; $i < $enterprise_cnt; ++$i){
						$entr_response += $this->mod_artisan->add_enterprise(array('enterprise_id' => $enterprise[$i], 'artisan_id' => $artisan_id));
					}
					
					if($artisan_id && $entr_response){
						$upload = (object)$this->upload_image($artisan_id);
						
						if($upload->status){
							$add_image = $this->mod_artisan->add_photo(array('artisan_image ' => $upload->response->file_name, 'artisan_id' => $artisan_id, 'is_primary' => 1));
							
							if($add_image){
								$pagedata['response'] = '<div class="alert alert-success">Artisan Added!</div>';
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
						$pagedata['response'] = '<div class="alert alert-error">Failed to create artisan, Please contact the Administrator for assistance.</div>';
					}
				} // form validation
            }
			
			$pagedata['enterprises'] = $this->mod_enterprise->get_all();

            $contentdata['page'] = $this->load->view('page/add_artisan', $pagedata, TRUE);
			
			$this->templateLoader($contentdata);
        }
        else{
            $this->load->view('page/login');
        }
	}
	
	public function update(){
		if(!$this->input->is_ajax_request()) redirect(site_url('404_override'));
		
		if($this->user->is_logged_in()){
			$artid = $this->input->post('art_id');
			
			if(isset($_POST['name'])){
				$data = $this->input->post('name');
				
				if(is_numeric($artid) && is_string($data) && $data != ''){
					$update = $this->mod_artisan->update_artisan(array('artisan_name' => trim($data)), $artid);
					
					if($update){
						$jsondata = array('status' => 1, 'response' => 'Artisan\'s name updated');
					}
					else{
						$jsondata = array('status' => 0, 'response' => 'Failed to update artisan\'s name');
					}
				}
				else{
					$jsondata = array('status' => 0, 'response' => 'Invalid Parameters');
				}
			}
			elseif(isset($_POST['desc'])){
				$data = $this->input->post('desc');
				
				if(is_numeric($artid) && is_string($data) && !empty($data)){
					$update = $this->mod_artisan->update_artisan(array('artisan_description' => trim($data)), $artid);
					
					if($update){
						$jsondata = array('status' => 1, 'response' => 'Artisan\'s description updated');
					}
					else{
						$jsondata = array('status' => 0, 'response' => 'Failed to update artisan\'s description');
					}
				}
				else{
					$jsondata = array('status' => 0, 'response' => 'Invalid Parameters');
				}
			}
			elseif(isset($_POST['entr'])){
				$data = $this->input->post('entr');
				
				if(is_numeric($artid) && is_string($data) && $data != ''){
					$update = $this->mod_artisan->update_artisan(array('enterprise_id' => trim($data)), $artid);
					
					if($update){
						$jsondata = array('status' => 1, 'response' => 'Artisan\'s enterprise updated');
					}
					else{
						$jsondata = array('status' => 0, 'response' => 'Failed to update artisan\'s enterprise');
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
			$artisan_id = $this->input->post('artisan_id');
			
			if(is_numeric($artisan_id)) {
				$artisan = $this->mod_artisan->get_artisan($artisan_id);
				
				// delete artisan
				$deleted = $this->mod_artisan->delete($artisan_id);				
				if($deleted){
					// delete artisan's related items
					
					$products = 0;					
					$articles = 0;
					if ($artisan_products = $this->mod_artisan->get_artisan_products($artisan_id)) {
						foreach ($artisan_products as $product) {
							if ($article = $this->mod_articles->get_article($product->article_id)) {
								// delete product's article
								if ($this->mod_articles->delete($article->article_id)) {
									//  delete product
									if ($this->mod_products->delete($product->product_id)) {
										$products++;
									} // delete product
								} // delete product's article
							}
						}
					}
					
					// delete artisan's article
					if ($article = $this->mod_articles->get_article($artisan->article_id)) {
						if ($this->mod_articles->delete($article->article_id)) {
							$articles++;
						}						
					} // delete artisan's article
					
					$jsondata = array('status' => 1, 'response' => 'Artisan deleted. Related Items Deleted: '.$products.' products, '.$articles.' articles');
				}
				else{
					$jsondata = array('status' => 0, 'response' => 'Failed to delete artisan');
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
			$id = intval($this->input->post('id'));
			$status = intval($this->input->post('status'));
			
			if(is_numeric($id)){
				if ($artisan = $this->mod_artisan->get_artisan($id)) {
					if ($artisan->article_id > 0) {
						if(is_numeric($status)){
							$response = $this->mod_artisan->update_artisan(array('artisan_status' => $status), $id);
							
							if($response){
								$products = 0;
								$articles = 0;
								if ($artisan_products = $this->mod_artisan->get_artisan_products($id)) {
									foreach ($artisan_products as $product) {
										if ($article = $this->mod_articles->get_article($product->article_id)) {											
											if ( $this->mod_articles->update_article( array( 'status' => $status ), $article->article_id ) ) {												
												if ($this->mod_products->update_prod(array('product_status' => $status), $product->product_id)) {
													$products++;
												}
											}
										}
									}
								}
								
								if ($article = $this->mod_articles->get_article($artisan->article_id)) {
									if ( $this->mod_articles->update_article( array( 'status' => $status ), $article->article_id ) ) {
										$articles++;
									}
								}								
								$jsondata = array('status' => 1, 'response' => 'Artisan\'s status updated. Related Items Updated: ' . $articles . ' articles, ' . $products . ' products');
							}
							else{
								$jsondata = array('status' => 0, 'response' => 'Failed to update artisan\'s status');
							}
						}
						else{
							$jsondata = array('status' => 0, 'response' => 'Invalid Parameters');
						}
					}
					else {
						$jsondata = array('status' => 0, 'response' => 'Please provide an article for this artisan');
					}
				}
				else {
					$jsondata = array('status' => 0, 'response' => 'Hacker Detected!');
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
