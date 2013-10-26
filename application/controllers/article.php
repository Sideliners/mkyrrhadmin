<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends MY_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function listings(){
        if($this->user->is_logged_in()){
			$contentdata['script'] = array('admin', 'articles');
            $contentdata['styles'] = NULL;

            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $perpage = 10;
            $url = base_url('articles/listings');
            $total = $this->mod_article->get_total();

            $pagedata['page_title'] = 'Articles';
            $pagedata['page'] = 'prod_articles';
            $pagedata['sub_page'] = 'articlelist';
            $pagedata['user'] = $this->_user;

            array_push($contentdata['script'], 'articles');

            $pagedata['articles'] = $this->mod_article->get_all($perpage, $page);
            $pagedata['pagination'] = $this->paginate($url, $total, $perpage);

            $contentdata['page'] = $this->load->view('page/articles_list', $pagedata, TRUE);
			$this->templateLoader($contentdata);
        }
        else{
            $this->load->view('page/login');
        }
    }

    public function create(){
        if($this->user->is_logged_in()){
			$contentdata['script'] = array('admin', 'tinymce/tinymce.min', 'articles', 'chosen.jquery.min');
            $contentdata['styles'] = array('chosen');
			
            $prod_id = $this->uri->segment(3);

            if(!is_numeric($prod_id)) redirect(site_url('404_override'));

            $prod = $this->mod_product->get_product($prod_id);

			$pagedata = $this->_page_defaults('Article for '.$prod->product_name, 'prod_articles', 'newarticle');

            if(isset($_POST['save_article'])){
                if($this->form_validation->run('create_article') == FALSE){
                    $pagedata['response'] = validation_errors('<div class="alert alert-danger">', '</div>');
                }
                else{
                    if(!is_numeric($prod_id)){
                        $pagedata['response'] = '<div class="alert alert-danger">Invalid Parameters</div>';
                    }
                    else{
                        $upload = (object)$this->upload_image($prod_id);

                        if($upload->status){
                            $article_data = array(
                                'article_image' => $upload->response->file_name,
                                'article_title' => $this->input->post('article_title'),
                                'article_body' => $this->input->post('article_body'),
                                'article_type_id' => 1,
                                'user_id' => $this->_user->user_id,
                            );
                            
                            $article_id = $this->mod_article->create_article($article_data, $prod_id);

                            if($article_id){
                                $update = $this->mod_product->update_prod(array('article_id' => $article_id), $prod_id);

                                if($update){
                                    $pagedata['response'] = '<div class="alert alert-success">Article Created!</div>';
                                }
                                else{
                                    $pagedata['response'] = '<div class="alert alert-danger>Failed to create Article</div>"';
                                }
                            }
                            else{
                                $pagedata['response'] = '<div class="alert alert-danger>Failed to create Article</div>"';
                            }
                        }
                        else{
                            $pagedata['response'] = $upload->response;
                        }
                    }
                } // form validation
            }

            $pagedata['collections'] = $this->mod_collection->get_all();

            $contentdata['page'] = $this->load->view('page/add_article', $pagedata, TRUE);
			
			$this->templateLoader($contentdata);
        }
        else{
            $this->load->view('page/login');
        }
    }
	
	private function upload_image($id){
		$config['file_name'] = $id.'_'.date('YmdHis');
		$config['upload_path'] = $this->config->item('article_upload_path');
		$config['allowed_types'] = 'gif|jpg|pjpeg|jpeg|png|x-png';
		$config['max_size']	= '1024';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		
		$this->load->library('upload', $config);
		
		if($this->upload->do_upload('article_image')){
			return array('status' => TRUE, 'response' => (object)$this->upload->data());
		}
		
		return array('status' => FALSE, 'response' => $this->upload->display_errors('<div class="alert alert-error">', '</div>'));
	}

    public function view(){
        if($this->user->is_logged_in()){
            $aid = $this->uri->segment(2);

            if(!is_numeric($aid)) redirect(site_url('404_override'));

            $article = $this->mod_article->getArticle($aid);

            if(is_object($article)){
                $contentdata['script'] = array('admin', 'articles');
                $contentdata['styles'] = NULL;

                $pagedata = $this->_page_defaults($article->article_title, 'products', 'articleview');
                $pagedata['article'] = $article;

                $contentdata['page'] = $this->load->view('page/article', $pagedata, TRUE);
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
        if($this->user->is_logged_in()){
            $aid = $this->uri->segment(2);
            $content = $this->uri->segment(3);
            $prod_id = $this->uri->segment(4);

            if(!is_numeric($aid) && !is_numeric($prod_id) && !is_string($content)) redirect(site_url('404_override'));

			$contentdata['script'] = array('admin', 'tinymce/tinymce.min', 'articles', 'chosen.jquery.min');
            $contentdata['styles'] = array('chosen');

            if(is_numeric($aid)){
                $article = $this->mod_article->getArticle($aid);

                if(is_object($article)){
                    $pagedata = $this->_page_defaults($article->article_title, 'products', 'articleview');

                    if(isset($_POST['save_article'])){
                        if($this->form_validation->run('create_article') == FALSE){
                            $pagedata['response'] = validation_errors('<div class="alert alert-danger">', '</div>');
                        }
                        else{
                            if($_FILES['article_image']['error'] == 0){
                                $upload = (object)$this->upload_image($prod_id);

                                if($upload->status){
                                    if($this->do_update($aid, $update->response->file_name)){
                                        $pagedata['response'] = '<div class="alert alert-success">Article Updated!</div>';
                                    }
                                    else{
                                        $pagedata['response'] = '<div class="alert alert-danger">Failed to create Article</div>';
                                    }
                                }
                                else{
                                    $pagedata['response'] = $upload->response;
                                }
                            }
                            else{
                                if($this->do_update($aid)){
                                    $pagedata['response'] = '<div class="alert alert-success">Article Updated!</div>';
                                }
                                else{
                                    $pagedata['response'] = '<div class="alert alert-danger">Failed to create Article</div>';
                                }
                            }
                        }
                    } // POST

                    $pagedata['collections'] = $this->mod_collection->get_all();
                    $pagedata['article'] = $this->mod_article->getArticle($aid);

                    $contentdata['page'] = $this->load->view('page/update_article', $pagedata, TRUE);
                }
                else{
                    redirect(site_url('404_override'));
                }
            }
			$this->templateLoader($contentdata);
        }
        else{
            $this->load->view('page/login');
        }
    }

    private function do_update($aid, $image = NULL){
        $article_data = array(
            'article_title' => $this->input->post('article_title'),
            'article_body' => $this->input->post('article_body'),
            'user_id' => $this->_user->user_id,
            'collection_id' => $this->input->post('collection')
        );

        if(!is_null($image)) $article_data['article_image'] = $image;
        
        $article_id = $this->mod_article->update_article($article_data, $aid);

        if($article_id){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
	
	public function create_artisan($artisan_id){
        $contentdata['script'] = array('admin');
		
        if($this->user->is_logged_in()){
            $pagedata['page_title'] = 'Articles';
            $pagedata['page'] = 'artisan_articles';
            $pagedata['sub_page'] = 'newarticle';
            $pagedata['user'] = $this->_user;

            $artisan_id = $this->input->post('id');
            $artisan = $this->mod_artisan->get_artisan($artisan_id);

            if(isset($_POST['save_article'])){
                if($this->form_validation->run('create_article') == FALSE){
                    $pagedata['error'] = validation_errors();
                }
                else{
					$filename = basename($_FILES['article_image']['name']);
					$tempname = $_FILES['article_image']['tmp_name'];
					$filetype = $_FILES['article_image']['type'];
					$filesize = $_FILES['article_image']['size'];

					$req_size = 327680;
                    $type = explode("/", $filetype);
					
                    $path = $this->config->item('articles_upload_path');

					$file_types = $this->config->item('filetypes');

					if($_FILES['article_image']['error'] == 0){
						if(in_array($filetype, $file_types)){
							if($filesize <= $req_size){
                                $newfilename = date('YmdHis').'.'.$type[1];

                                $article_data = array(
                                    'article_image' => $newfilename,
                                    'title' => $this->input->post('article_title'),
                                    'body' => $this->input->post('article_body'),
                                    'user_id' => $this->_user->user_id,
                                    'status' => 1,
                                    'date_created' => date('Y-m-d H:i:s')
                                );

								if(move_uploaded_file($tempname, $path.$newfilename)){
                                    $article_id = $this->mod_articles->create_article($article_data, $artisan_id);

                                    if(is_numeric($article_id)){
                                        $update = $this->mod_artisan->update_artisan(array('article_id' => $article_id), $artisan_id);

                                        if($update){
                                            $pagedata['success'] = 'Article create for '. $artisan->artisan_name;
                                        }
                                        else{
                                            $pagedata['error'] = 'Article Error2 : Please try again later';
                                        }
                                    }
                                    else{
										$pagedata['error'] = 'Article Error1 : Please try again later';
                                    }
                                }
                                else{
									$pagedata['error'] = 'Image Error : Failed to upload file';
                                } // moving validation
                            }
                            else{
								$pagedata['error'] = 'Image Error : File size exceeded';
                            } // size validation
                        }
                        else{
							$pagedata['error'] = 'Image Error : Invalid type of file';
                        } // file type validation
                    }
                    else{
						$pagedata['error'] = 'Image Error #'.$_FILES['article_image']['error'].': Please select image';
                    }
                } // form validation
            }

            array_push($contentdata['script'], 'articles');
            $contentdata['page'] = $this->load->view('page/add_article', $pagedata, TRUE);
			
			$this->templateLoader($contentdata);
        }
        else{
            $this->load->view('page/login');
        }		
    }
	
	public function create_enterprise($enterprise_id){
        $contentdata['script'] = array('admin');
		
        if($this->user->is_logged_in()){
            $pagedata['page_title'] = 'Articles';
            $pagedata['page'] = 'enterprise_articles';
            $pagedata['sub_page'] = 'newarticle';
            $pagedata['user'] = $this->_user;

            $enterprise_id = $this->input->post('id');
            $enterprise = $this->mod_enterprise->get_enterprise($enterprise_id);

            if(isset($_POST['save_article'])){
                if($this->form_validation->run('create_article') == FALSE){
                    $pagedata['error'] = validation_errors();
                }
                else{
					$filename = basename($_FILES['article_image']['name']);
					$tempname = $_FILES['article_image']['tmp_name'];
					$filetype = $_FILES['article_image']['type'];
					$filesize = $_FILES['article_image']['size'];

					$req_size = 327680;
                    $type = explode("/", $filetype);
					
                    $path = $this->config->item('articles_upload_path');

					$file_types = $this->config->item('filetypes');

					if($_FILES['article_image']['error'] == 0){
						if(in_array($filetype, $file_types)){
							if($filesize <= $req_size){
                                $newfilename = date('YmdHis').'.'.$type[1];

                                $article_data = array(
                                    'article_image' => $newfilename,
                                    'title' => $this->input->post('article_title'),
                                    'body' => $this->input->post('article_body'),
                                    'user_id' => $this->_user->user_id,
                                    'status' => 1,
                                    'date_created' => date('Y-m-d H:i:s')
                                );

								if(move_uploaded_file($tempname, $path.$newfilename)){
                                    $article_id = $this->mod_articles->create_article($article_data, $artisan_id);

                                    if(is_numeric($article_id)){
                                        $update = $this->mod_enterprise->update_enterprise(array('article_id' => $article_id), $enterprise_id);

                                        if($update){
                                            $pagedata['success'] = 'Article create for '. $enterprise->enterprise_name;
                                        }
                                        else{
                                            $pagedata['error'] = 'Article Error : Please try again later';
                                        }
                                    }
                                    else{
										$pagedata['error'] = 'Article Error : Please try again later';
                                    }
                                }
                                else{
									$pagedata['error'] = 'Image Error : Failed to upload file';
                                } // moving validation
                            }
                            else{
								$pagedata['error'] = 'Image Error : File size exceeded';
                            } // size validation
                        }
                        else{
							$pagedata['error'] = 'Image Error : Invalid type of file';
                        } // file type validation
                    }
                    else{
						$pagedata['error'] = 'Image Error #'.$_FILES['enterprise_image']['error'].': Please select image';
                    }
                } // form validation
            }

            array_push($contentdata['script'], 'articles');
            $contentdata['page'] = $this->load->view('page/add_article', $pagedata, TRUE);
			
			$this->templateLoader($contentdata);
        }
        else{
            $this->load->view('page/login');
        }		
    }
}
