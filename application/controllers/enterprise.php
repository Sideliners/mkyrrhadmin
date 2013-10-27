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
					$contentdata['script'] = array('admin', 'enterprises');
					$contentdata['styles'] = NULL;
					
					$pagedata = $this->_page_defaults('Edit Enterprise - '. $enterprise->enterprise_name, 'prod_enterprises', 'enterpriseslist');
					
					if(isset($_POST['save_enterprise_image'])){
						$filename = basename($_FILES['enterprise_image']['name']);
						$tempname = $_FILES['enterprise_image']['tmp_name'];
						$filetype = $_FILES['enterprise_image']['type'];
						$filesize = ($_FILES['enterprise_image']['size'] / 1024);
						$uploadError = $_FILES['enterprise_image']['error'];
						
						$req_size = 4096; // kilobytes
						$type = explode("/", $filetype);
						
						$path = $this->config->item('enterprises_upload_path');
						
						$filetypes = $this->config->item('filetypes');
						
						if($uploadError == 0){
							if(in_array($filetype, $filetypes) && $filesize <= $req_size){
								$newfilename = date('YmdHis').'.'.$type[1];
								
								if(move_uploaded_file($tempname, $path.$newfilename)){
									$update = $this->mod_enterprise->update_enterprise(array('enterprise_image' => $newfilename), $enterprise_id);
									
									if($update){
										$pagedata['success'] = 'Enterprise update';
									}
									else{
										$pagedata['error'] = $update;
									}
								}
								else{
									$pagedata['error'] = 'Image Error : Failed to upload image';
								}
							}
							else{
								$pagedata['error'] = 'Image Error : Invalid Image';
							}
						}
						else{
							$pagedata['error'] = 'Image Error : Select Image for this Enterprise';
						}
					}
					
					$enterprise = $this->mod_enterprise->get_enterprise($enterprise_id);
					$enterprise->article = ''; //$this->mod_articles->get_prod_article($enterprise->article_id);
					$enterprise->artisans = $this->mod_enterprise->get_enterprise_artisans($enterprise->enterprise_id);
					
					$pagedata['enterprise'] = $enterprise;
					
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
			$contentdata['script'] = array('admin', 'enterprises');
			$contentdata['styles'] = NULL;
			
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

            $pagedata['enterprises'] = $this->mod_enterprise->get_enterprises($perpage, $page);
            $pagedata['pagination'] = $this->paginate($url, $total, $perpage);

            $contentdata['page'] = $this->load->view('page/enterprise_list', $pagedata, TRUE);
			$this->templateLoader($contentdata);
        }
        else{
            $this->load->view('page/login');
        }
    }
	
	public function create(){
		$contentdata['script'] = array('admin');

        if($this->user->is_logged_in()){
            $pagedata['page_title'] = 'Add Enterprise';
            $pagedata['page'] = 'prod_enterprises';
            $pagedata['sub_page'] = 'enterpriseslist';
            $pagedata['user'] = $this->_user;

            array_push($contentdata['script'], 'enterprises');

            if(isset($_POST['save_enterprise'])){
				if($this->form_validation->run('create_enterprise') == FALSE){
					$pagedata['error'] = validation_errors();
				}
				else{
					$filename = basename($_FILES['enterprise_image']['name']);
					$tempname = $_FILES['enterprise_image']['tmp_name'];
					$filetype = $_FILES['enterprise_image']['type'];
					$filesize = ($_FILES['enterprise_image']['size'] / 1024);
					$uploadError = $_FILES['enterprise_image']['error'];
					
					$req_size = 4096; // kilobytes
					$type = explode("/", $filetype);
					
					$path = $this->config->item('enterprises_upload_path');
					
					$filetypes = $this->config->item('filetypes');
					
					if($uploadError == 0){
						if(in_array($filetype, $filetypes) && $filesize <= $req_size){
							$newfilename = date('YmdHis').'.'.$type[1];
							
							if(move_uploaded_file($tempname, $path.$newfilename)){
								unset($_POST['save_enterprise']);
								$params = $this->input->post();
								$params['enterprise_image'] = mysql_real_escape_string($newfilename);
								
								$enterprise_id = $this->mod_enterprise->add_enterprise($params);
								
								if($enterprise_id){
									$pagedata['success'] = 'Enterprise created';
								}
								else{
									$pagedata['error'] = $enterprise_id;
								}
							}
							else{
								$pagedata['error'] = 'Image Error : Failed to upload image';
							}
						}
						else{
							$pagedata['error'] = 'Image Error : Invalid Image';
						}
					} // image error validation
					else{
						$pagedata['error'] = 'Image Error : Select Image for this Enterprise';
					}					
				} // form validation
            }

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
			if( isset($_POST['name']) ) {
				$label = 'name';
				$field_name = 'enterprise_name';
				$value = $this->input->post('name');
			}
			elseif(isset($_POST['description'])){
				$label = 'description';
				$field_name = 'enterprise_description';
				$value = $this->input->post('description');
			}			
			
			$status = 0;
			$reponse = "Invalid Parameters"; # default response
			
			if (!is_null($label)) {
				if( is_numeric($enterprise_id) && is_string($value) && $value != '' ){
					$data = array($field_name => trim($value));
					$update = $this->mod_enterprise->update_enterprise($data, $enterprise_id);
					
					$success_message = 'Enterprise\'s ' . $label . ' updated';
					$failed_message = 'Failed to update enterprise\'s ' . $name;
					
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
			$reponse = "Your session has expired";
        }
		
		$jsondata = array('status' => $status, 'response' =>  $response);
        echo json_encode($jsondata);
	}
		
	public function delete(){
		if(!$this->input->is_ajax_request()) redirect(site_url('404_override'));
		
		if($this->user->is_logged_in()){
			$enterprise_id = $this->input->post('enterprise_id');
			
			if(is_numeric($enterprise_id)) {
				$enterprise = $this->mod_enterprise->get_enterprise($enterprise_id);
				
				// delete enterprise
				$deleted = $this->mod_enterprise->delete($enterprise_id);								
				if($deleted){				
					// delete enterprise's related items				
					
					$products = 0;
					$artisans = 0;	
					$articles = 0;				
					if ($enterprise_artisans = $this->mod_enterprise->get_enterprise_artisans($enterprise_id)) {						
						foreach ($enterprise_artisans as $artisan) {
														
							if ($article = $this->mod_articles->get_article($artisan->article_id)) {
								// delete artisan's article
								if ($this->mod_articles->delete($article->article_id)) {
									// delete artisan
									if ($this->mod_artisan->delete($artisan->artisan_id)) {
										$artisans++;
									} // delete artisan
								} // delete artisan's article
							}							
							
							if ($artisan_products = $this->mod_artisan->get_artisan_products($artisan->artisan_id)) {
								// delete artisan's products
								foreach ($artisan_products as $product) {									
									if ($article = $this->mod_articles->get_article($product->article_id)) {
										// delete product's article
										if ($this->mod_articles->delete($article->article_id)) {
											// delete product
											if ($this->mod_products->delete($product->product_id)) {
												$products++;
											} // delete product
										} // delete product's article
									} 
								} // delete artisan's products
							}
						}
					}
					
					if ($article = $this->mod_articles->get_article($enterprise->article_id)) {
						// delete enterprise's article
						if ($this->mod_articles->delete($article->article_id)) {
							$articles++;
						} // delete enterprise's article
					}
					
					$jsondata = array('status' => 1, 'response' => 'Enterprise deleted. Related Items Deleted: '.$artisans.' artisans, '.$products.' products, '.$articles.' articles');
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
			$id = intval($this->input->post('id'));
			$status = intval($this->input->post('status'));
			
			if(is_numeric($id)){
				if ($enterprise = $this->mod_enterprise->get_enterprise($id)) {
					if ($enterprise->article_id > 0) {
						if(is_numeric($status)){
							$response = $this->mod_enterprise->update_enterprise(array('enterprise_status' => $status), $id);
							
							if($response){
								$products = 0;
								$artisans = 0;	
								$articles = 0;				
								if ($enterprise_artisans = $this->mod_enterprise->get_enterprise_artisans($id)) {						
									foreach ($enterprise_artisans as $artisan) {
																	
										if ($article = $this->mod_articles->get_article($artisan->article_id)) {
											if ($this->mod_articles->update_article(array('status' => $status), $article->article_id)) {												
												if ($this->mod_artisan->update_artisan(array('artisan_status' => $status), $artisan->artisan_id)) {
													$artisans++;
												}
											}
										}
										
										if ($artisan_products = $this->mod_artisan->get_artisan_products($artisan->artisan_id)) {											
											foreach ($artisan_products as $product) {
												if ($article = $this->mod_articles->get_article($product->article_id)) {
													if ($this->mod_articles->update_article(array('status' => $status), $article->article_id)) {														
														if ($this->mod_products->update_prod(array('product_status' => $status), $product->product_id)) {
															$products++;
														}
													}
												} 
											}
										}
									}
								}
								
								if ($article = $this->mod_articles->get_article($enterprise->article_id)) {									
									if ($this->mod_articles->update_article(array('status' => $status), $article->article_id)) {
										$articles++;
									}
								}
								
								$jsondata = array('status' => 1, 'response' => 'Enterprise status updated. Related Items Updated: '.$artisans.' artisans, '.$products.' products, '.$articles.' articles');
							}
							else{
								$jsondata = array('status' => 0, 'response' => 'Failed to update enterprise\'s status');
							}
						}
						else{
							$jsondata = array('status' => 0, 'response' => 'Invalid Parameters');
						}
					}
					else {
						$jsondata = array('status' => 0, 'response' => 'Please provide an article for this enterprise');
					}
				}
				else {
					$jsondata = array('status' => 0, 'response' => 'Hacker Detected!');
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
}
 