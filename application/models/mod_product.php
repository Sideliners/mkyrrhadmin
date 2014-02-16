<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_product extends CI_Model{

    private $product = 'product';
    private $product_album = 'product_album';
	private $artisan = 'artisan';
	private $artisan_product = 'artisan_product';
	private $article = 'article';
	private $enterprise = 'enterprise';
	private $enterprise_artisan = 'enterprise_artisan';
	private $collection = 'collection';
	private $collection_prod = 'collection_product';

    function getProducts($limit = NULL, $start = NULL){
		$this->db->cache_off();
		
        $this->db->select("*");
		
		$this->db->from($this->product);
		$this->db->join($this->product_album, "{$this->product_album}.product_id = {$this->product}.product_id", 'left');
		
		$this->db->where("{$this->product_album}.is_primary", 1);

		$this->db->order_by("{$this->product}.date_created",'desc');
		
		if(!is_null($limit) && !is_null($start)) $this->db->limit($limit, $start);

		$query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->result();
        }

        return FALSE;
    }

    function search_products($limit, $start, $str){
		$this->db->cache_off();
		
		$this->db->select("*");
		$this->db->from($this->product);
		$this->db->join($this->product_album, "{$this->product_album}.product_id = {$this->product}.product_id", 'right');
		$this->db->where("{$this->product_album}.is_primary", 1);
        $this->db->like("{$this->product}.product_name", $str);

		$this->db->order_by("{$this->product}.date_created",'desc');
		$this->db->limit($limit, $start);

		$query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->result();
        }

        return FALSE;
    }
	
    function get_total(){
		$this->db->cache_off();
		
        $this->db->select('*');
        $this->db->from($this->collection_prod);
		$this->db->join($this->product, "{$this->product}.product_id = {$this->collection_prod}.product_id", 'left');
		$this->db->join($this->product_album, "{$this->product_album}.product_id = {$this->product}.product_id", 'left');
		$this->db->join($this->collection, "{$this->collection}.collection_id = {$this->collection_prod}.collection_id", 'left');
		
		$this->db->where("{$this->product_album}.is_primary", 1);

		$query = $this->db->get();
		
		if($query->num_rows() > 0){
            return $query->num_rows();
        }

        return 0;
    }
	
	function get_product($id){
		$this->db->cache_off();
		
		$this->db->select('*');
		$this->db->from($this->collection_prod);
		$this->db->join($this->product, "{$this->product}.product_id = {$this->collection_prod}.product_id", 'left');
		$this->db->join($this->product_album, "{$this->product_album}.product_id = {$this->product}.product_id", 'left');
		$this->db->join($this->collection, "{$this->collection}.collection_id = {$this->collection_prod}.collection_id", 'left');
		
		$this->db->where("{$this->product_album}.is_primary", 1);
		$this->db->where("{$this->product}.product_id", $id);
		
		$query = $this->db->get();
		
		if($query->num_rows() > 0) return $query->row();
		
		return FALSE;
	}
	
	function get_prod_artisan($pid){
		$this->db->select('*');
		$this->db->from($this->artisan_product);
		$this->db->join($this->artisan, "{$this->artisan}.artisan_id = {$this->artisan_product}.artisan_id");
		$this->db->join($this->product, "{$this->product}.product_id = {$this->artisan_product}.product_id");
		$this->db->where("{$this->product}.product_id", $pid);
		
		$query = $this->db->get();
		
		return $query->result();
	}

    function batch_update($status, $pid){
        $this->db->where_in('product_id', $pid);
        $this->db->update($this->product, array('product_status' => $status));

        return $this->db->affected_rows();
    }
		
	function add($data){
		$data['date_created'] = date('Y-m-d H:i:s');
		
		$this->db->insert($this->product, $data);
		
		return $this->db->insert_id();
	}
	
	function add_variant($data){
		$this->db->insert($this->product_variant, $data);
		
		return $this->db->insert_id();
	}

	function update_prod($data, $pid){
        $data['product_last_modified'] = date('Y-m-d H:i:s');
		
		$this->db->where('product_id', $pid);
		$query = $this->db->update($this->product, $data);
		
		if($query) return $this->db->affected_rows();
		
		return FALSE;
	}

    function get_total_search($str){
        $this->db->select('*');
        $this->db->from($this->product);
        //$this->db->join($this->article, "{$this->article}.article_id = {$this->product}.article_id", 'left');
        //$this->db->join($this->collection, "{$this->collection}.collection_id = {$this->article}.collection_id", 'left');
        $this->db->like("{$this->product}.product_name", $str);

		$query = $this->db->get();

        return $query->num_rows();
    }

    function get_album($id){
		$this->db->where('product_id', $id);
		
		$image = $this->db->get($this->product_album);
		
		return $image->result();
    }

	function add_photo($data){
		$data['date_added'] = date('Y-m-d H:i:s');
		
		$this->db->insert($this->product_album, $data);
		
		return $this->db->insert_id();
	}
	
	function get_collection($product_id){
		$this->db->cache_off();
		
		$this->db->select('*');
		$this->db->from($this->collection_prod);
		$this->db->join($this->collection, "{$this->collection}.collection_id = {$this->collection_prod}.collection_id");
		$this->db->where("{$this->collection_prod}.product_id", $product_id);
		
		$query = $this->db->get();
		
		return $query->result();
	}
	
	function set_primary_photo($data, $product_id, $photo_id){
		if($this->revert_photos($product_id)){
			$this->db->where('product_album_id', $photo_id);
			$this->db->where('product_id', $product_id);
			
			$update = $this->db->update($this->product_album, $data);
			
			if($update){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
		else{
			return FALSE;
		}
	}
	
	private function revert_photos($product_id){
		$this->db->where('product_id', $product_id);
		$revert = $this->db->update($this->product_album, array('is_primary' => 0));
		
		if($revert) return TRUE;
		
		return FALSE;
	}

    // old
	
	
	function insert_to_category($cat, $id){
		$query = $this->db->insert($this->prod_cat, array('category_id' => $cat, 'product_id' => $id));
		
		if($query) return TRUE;
		
		return FALSE;
	}

	function delete($pid){
		// product table
		$sql1 = "DELETE  FROM {$this->product} WHERE product_id = {$pid}";
		
		if($this->delete_photos($pid)){
			$prod_delete = $this->db->query($sql1);
			
			if($prod_delete){			
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
		else{
			return FALSE;
		}
	}
	
	private function delete_photos($pid){
		$sql1 = "DELETE  FROM {$this->product_album} WHERE product_id = {$pid}";
		$prod_delete = $this->db->query($sql1);
		
		if($prod_delete){			
            return TRUE;
		}
		else{
			return FALSE;
		}
	}

    function revert_hl(){
        $this->db->update($this->product, array('is_highlighted' => 0));
		
        return $this->db->affected_rows();
    }
	
	function get_artisan_products($artisan_id) {
		// returns products of artisan
		$this->db->cache_off();
				
		$this->db->where('artisan_id', $artisan_id);
		$query = $this->db->get($this->product);
		
		if($query->num_rows() > 0) return $query->result();		
		
		return FALSE;
	}	
}
