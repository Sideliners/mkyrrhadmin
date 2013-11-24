<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends MY_Controller{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		if($this->user->is_logged_in()){
			$contentdata['script'] = array('admin', 'product', 'common', 'chosen.jquery.min', 'jquery.inputlimiter.1.3.1.min');
            $contentdata['styles'] = array('chosen');
			
			if(!is_numeric($this->uri->segment('2'))) redirect(base_url('404_override'));
			
			$pagedata = $this->_page_defaults('Product', 'products', 'productslist');
			
			$product_id = intval($this->uri->segment('2'));			
			
			if(isset($_POST['save_album_image'])){
				if(is_numeric($product_id)){
					$upload = (object)$this->upload_image($product_id);

					if($upload->status){
						$photo_id = $this->mod_product->add_photo(array('product_image' => $upload->response->file_name, 'product_id' => $product_id));
						
						if($this->input->post('is_primary')){
							$make_primary = $this->mod_product->set_primary_photo(array('is_primary' => 1), $product_id, $photo_id);
						}
						
						if($photo_id){
							$pagedata['response'] = '<div class="alert alert-success">Product image updated</div>';
						}
						else{
							$pagedata['response'] = '<div class="alert alert-error">Failed to update product image</div>';
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
			
			$pagedata['product']		= $this->mod_product->get_product($product_id);
			$pagedata['artisans']		= $this->mod_product->get_prod_artisan($product_id);
			$pagedata['article']			= $this->mod_article->getArticle($pagedata['product']->article_id);
			$pagedata['collections']	= $this->mod_product->get_collection($product_id);
			$pagedata['album']			= $this->mod_product->get_album($product_id);
			
			$contentdata['page'] = $this->load->view('page/product', $pagedata, TRUE);		
			$this->templateLoader($contentdata);
		}
		else{
			$this->load->view('page/login');
		}
	}
	
	public function lists(){		
        if($this->user->is_logged_in()){			
            $contentdata['script'] = array('admin', 'prod_list', 'common');
            $contentdata['styles'] = NULL;
            
            $pagedata = $this->_page_defaults('Products', 'products', 'productslist', 'product_list');
			
			# preparing pagination
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $perpage = 10;
            $url = base_url('product/lists');
            $total = $this->mod_product->get_total();
			
			# Batch Action
			$success_message = "Product status updated";
			$no_changes_message = "No changes has been made";

            if(isset($_POST['do_batch_action'])){
                if($this->form_validation->run('batch_action_product') == FALSE){
                    $pagedata['error'] = validation_errors('<div class="alert alert-error"><i class="icon-warning-sign"></i> ', '</div>');
                }
                else{
                    $items = $this->input->post('product_item'); // array
                    $status = $this->input->post('batch_actions');

                    if($status != '' && is_numeric($status)) {
                        if(is_array($items)){
                            if($this->mod_product->batch_update($status, $items)) {
                                $pagedata['success'] = $success_message;
                            }
                            else {
                                $pagedata['no_changes'] = $no_changes_message;
                            }
                        }
                        else {
                            $pagedata['error'] = 'Invalid Parameters';
                        }
                    }
                    else {
                        $pagedata['error'] = 'Invalid Parameters';
                    }
                }
            }

            $pagedata['products'] = $this->mod_product->getProducts($perpage, $page);
            $pagedata['pagination'] = ($total > $perpage)? $this->paginate($url, $total, $perpage) : '';

            $contentdata['page'] = $this->load->view('page/product_list', $pagedata, TRUE);

			$this->templateLoader($contentdata);
        }
        else {
            $this->load->view('page/login');
        }
    }
	
	public function create(){
        if($this->user->is_logged_in()){
            $contentdata['script'] = array('admin', 'product', 'jquery.inputlimiter.1.3.1.min', 'chosen.jquery.min');
            $contentdata['styles'] = array('chosen');

            $pagedata = $this->_page_defaults('New Product', 'products', 'productslist');
			
			if (isset($_POST['save_product'])) {
				if ($this->form_validation->run('create_product') == FALSE) {
					$pagedata['response'] = validation_errors('<div class="alert alert-error">', '</div>');
				}
				else {
					$collection_response = 0;
					$artisan_response = 0;
					
					$prod_data = array(
						'product_name'			=> $this->input->post('product_name'),
						'product_description'	=> $this->input->post('prod_desc'),
						'product_quantity'		=> $this->input->post('product_quantity'),
						'width'							=> $this->input->post('product_width'),
						'height'							=> $this->input->post('product_height'),
						'length'							=> $this->input->post('product_length'),
						'weight'						=> $this->input->post('product_weight'),
						'price'							=> $this->input->post('product_price'),
						'date_created'				=> date('Y-m-d H:i:s')
					);
					$product_id = $this->mod_product->add($prod_data);
					
					$theme = $this->input->post('theme_name');
					$theme_cnt = count($theme);
					
					for($i = 0; $i < $theme_cnt; ++$i){
						$collection_response += $this->mod_collection->add_product(array('collection_id' => $theme[$i], 'product_id' => $product_id));
					}
					
					$artisan = $this->input->post('artisan_name');
					$artisan_cnt = count($artisan);
					
					for($i = 0; $i < $artisan_cnt; ++$i){
						$artisan_response += $this->mod_artisan->add_product(array('artisan_id' => $artisan[$i], 'product_id' => $product_id));
					}
					
					if($product_id && $collection_response && $artisan_response){
						$upload = (object)$this->upload_image($product_id);
						
						if($upload->status){
							$add_image = $this->mod_product->add_photo(array('product_image' => $upload->response->file_name, 'product_id' => $product_id, 'is_primary' => 1));
							
							if($add_image){
								$pagedata['response'] = '<div class="alert alert-success">Product Added!</div>';
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
						$pagedata['response'] = '<div class="alert alert-error">Failed to create product, Please contact the Administrator for assistance.</div>';
					}
				} // form validation
			}
			
			$pagedata['collections'] = $this->mod_collection->get_all();
            $pagedata['artisans'] = $this->mod_artisan->get_artisans();
			
			$contentdata['page'] = $this->load->view('page/add_product', $pagedata, TRUE);
			$this->templateLoader($contentdata);
        }
        else{
            $this->load->view('page/login');
        }
    }
		
	private function upload_image($id){
		$config['file_name'] = $id.'_'.date('YmdHis');
		$config['upload_path'] = $this->config->item('product_upload_path');
		$config['allowed_types'] = 'gif|jpg|pjpeg|jpeg|png|x-png';
		$config['max_size']	= '1024';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		
		$this->load->library('upload', $config);
		
		if($this->upload->do_upload('product_image')){
			return array('status' => TRUE, 'response' => (object)$this->upload->data());
		}
		
		return array('status' => FALSE, 'response' => $this->upload->display_errors('<div class="alert alert-error">', '</div>'));
	}
	
	public function get_product(){
		if(!$this->input->is_ajax_request()) redirect(site_url('404_override'));
		
		if($this->user->is_logged_in()){
			$prod_id = intval($this->input->post('pid'));
			$prod_data = $this->mod_product->getProduct($prod_id);
			
			if(is_object($prod_data)){
				$jsondata = array('status' => 1, 'response' => $prod_data);
			}
			else{
				$jsondata = array('status' => 0, 'response' => 'Information not available');
			}
		}
		else{
			$jsondata = array('status' => 2, 'response' => 'Your session has expired');
		}
		
		echo json_encode($jsondata);
	}
	
	public function update_name(){
		if(!$this->input->is_ajax_request()) redirect(site_url('404_override'));
		
		if($this->user->is_logged_in()){
			$name = $this->input->post('product_name');
			$prod_id = intval($this->input->post('product_id'));
			
			if((is_numeric($prod_id) && $prod_id != 0) && $name != ''){
				  $data = array('product_name' => $name);
				  
				  $update = $this->mod_product->update_prod($data, $prod_id);
				  
				  if($update){
					  $jsondata = array('status' => 1, 'response' => 'Name updated');
				  }
				  else{
					  $jsondata = array('status' => 3, 'response' => 'No changes has been made');
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
	
	public function update_desc(){
		if(!$this->input->is_ajax_request()) redirect(site_url('404_override'));
		
		if($this->user->is_logged_in()){
			$desc = $this->input->post('description');
			$prod_id = intval($this->input->post('product_id'));
			
			if((is_numeric($prod_id) && $prod_id != 0) && $desc != ''){
				$data = array('product_description' => $desc);
				$update = $this->mod_product->update_prod($data, $prod_id);
				
				if($update){
					$jsondata = array('status' => 1, 'response' => 'Description updated');
				}
				else{
					$jsondata = array('status' => 3, 'response' => 'No changes has been made');
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
	
	public function get_category(){
		if(!$this->input->is_ajax_request()) redirect(site_url('404_override'));
		
		if($this->user->is_logged_in()){
			$prod_id = intval($this->input->post('pid'));
			$categories = $this->mod_category->getProdCats($prod_id);
			
			if(!empty($categories)){
				$category = explode(',', $categories);
				
				$response = '<ul>';
				foreach($category as $cat){
					$response.= "<li>{$cat}</li>";
				}
				$response.= '<ul>';
				
				$jsondata = array('status' => 1, 'response' => $response);
			}
			else{
				$jsondata = array('status' => 1, 'response' => 'No categories');
			}
		}
		else{
			$jsondata = array('status' => 2, 'response' => 'Your session has expired');
		}
		
		echo json_encode($jsondata);
	}
	
	public function update_category(){
		if(!$this->input->is_ajax_request()) redirect(site_url('404_override'));
		
		if($this->user->is_logged_in()){
			$prod_id = intval($this->input->post('pid'));
			$categories = $this->input->post('cat');
			
			if(is_numeric($prod_id)){
				if(is_array($categories)){
					// loop and check first if already assigned
					foreach($categories as $cat){
						$check_cat = $this->mod_category->check_prodcat($cat, $prod_id);
						if(!$check_cat){
							// you know what to do
							$add = $this->mod_products->insert_to_category($cat, $prod_id);
						}
					}
					$jsondata = array('status' => 1, 'response' => 'Categories updated');
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
	
	public function update_artisan(){
		if(!$this->input->is_ajax_request()) redirect(site_url('404_override'));
		
		if($this->user->is_logged_in()){
			$prod_id = intval($this->input->post('pid'));
			$artisan = intval($this->input->post('artisan'));
			
			if(is_numeric($prod_id)){
				if(is_numeric($artisan)){
					$response = $this->mod_products->update_prod(array('artisan_id' => $artisan), $prod_id);
					
					if($response){
						$jsondata = array('status' => 1, 'response' => 'product\'s artisan updated');
					}
					else{
						$jsondata = array('status' => 3, 'response' => 'No changes has been made');
					}
				}
				else{
					$jsondata = array('status' => 0, 'response' => 'Invalid Parameters');
				}
			}
			else{
				$jsondata = array('status' => 1, 'response' => 'No categories');
			}
		}
		else{
			$jsondata = array('status' => 2, 'response' => 'Your session has expired');
		}
		
		echo json_encode($jsondata);
	}
	
	public function update_details(){
		if(!$this->input->is_ajax_request()) redirect(site_url('404_override'));
		
		if($this->user->is_logged_in()){
			$prod_id = intval($this->input->post('pid'));
			$price = floatval($this->input->post('price'));
			$weight = floatval($this->input->post('weight'));
			$height = floatval($this->input->post('height'));
			$stock = intval($this->input->post('stock'));
			
			if(is_numeric($prod_id)){
				if(is_numeric($price) && is_numeric($weight) && is_numeric($stock)){
					$data = array(
						'price' => $price,
						'weight' => $weight,
						'height' => $height,
						'product_quantity' => $stock
					);
					
					$response = $this->mod_product->update_prod($data, $prod_id);
					
					if($response){
						$jsondata = array('status' => 1, 'response' => 'Product\'s details updated');
					}
					else{
						$jsondata = array('status' => 3, 'response' => 'No changes has been made');
					}
				}
				else{
					$jsondata = array('status' => 0, 'response' => 'Invalid Parameters');
				}
			}
			else{
				$jsondata = array('status' => 1, 'response' => 'No categories');
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
			$prod_id = intval($this->input->post('id'));
			$status = intval($this->input->post('status'));
			
			if(is_numeric($prod_id) && is_numeric($status)){
                $response = $this->mod_product->update_prod(array('product_status' => $status), $prod_id);
                
                if($response){
                    $jsondata = array('status' => 1, 'response' => 'Product\'s status updated.');
                }
                else{
                    $jsondata = array('status' => 0, 'response' => 'Failed to update product\'s status');
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
	
	public function delete() {
		if(!$this->input->is_ajax_request()) redirect(site_url('404_override'));
		
		if($this->user->is_logged_in()){
			$product_id = $this->input->post('id');
			
			if(is_numeric($product_id)) {
				$deleted = $this->mod_product->delete($product_id);				

				if($deleted){
					$jsondata = array('status' => 1, 'response' => 'Product deleted');
				} // delete product
				else{
					$jsondata = array('status' => 0, 'response' => 'Failed to delete product');
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

    private function get_article($article_id){
        $article = $this->mod_articles->get_prod_article($article_id);

        if(is_object($article)) return $article;

        return FALSE;
    }

    public function set_highlight(){
        if(!$this->input->is_ajax_request()) redirect(site_url('404_override'));

        if($this->user->is_logged_in()){
			$prod_id = intval($this->input->post('pid'));
			$status = intval($this->input->post('hl'));
			
			if(is_numeric($prod_id)){
				if(is_numeric($status)){
                    // revert all data first
                    if($this->mod_products->revert_hl()){
                        $response = $this->mod_products->update_prod(array('is_highlighted' => $status), $prod_id);
                        
                        if($response){
                            $jsondata = array('status' => 1, 'response' => 'Product is now highlighted');
                        }
                        else{
                            $jsondata = array('status' => 0, 'response' => 'Failed to update product\'s status');
                        }
                    }
                    else{
                        $jsondata = array('status' => 0, 'response' => 'Failed to set product');
                    }
				}
				else{
					$jsondata = array('status' => 0, 'response' => 'Invalid Parameters');
				}
			}
			else{
				$jsondata = array('status' => 1, 'response' => 'No categories');
			}
        }
		else{
			$jsondata = array('status' => 2, 'response' => 'Your session has expired');
		}
		
		echo json_encode($jsondata);
    }
}
