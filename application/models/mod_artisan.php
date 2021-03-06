<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_artisan extends CI_Model{

    private $artisan = 'artisan';
	private $artisan_album = 'artisan_album';
	private $artisan_product = 'artisan_product';
	private $enterprise = 'enterprise';
	private $enterprise_artisan = 'enterprise_artisan';
	private $product = 'product';
	private $article = 'article';

    function get_artisans($limit = NULL, $start = NULL, $search = NULL){
        $this->db->cache_off();
		
		$this->db->select('*');
		$this->db->from($this->artisan);
		
		if(!is_null($search)){
			$this->db->like('artisan_name', $search);
		}
		
        $this->db->order_by("date_created", 'desc');
        
        if(!is_null($limit) && !is_null($start)) $this->db->limit($limit, $start);
		
        $query = $this->db->get();

        return $query->result();
    }
	
	function get_enterprise($aid){
		$this->db->cache_off();
		
		$this->db->select('*');
		$this->db->from($this->enterprise_artisan);
		$this->db->join($this->artisan, "{$this->artisan}.artisan_id = {$this->enterprise_artisan}.artisan_id");
		$this->db->join($this->enterprise, "{$this->enterprise}.enterprise_id = {$this->enterprise_artisan}.enterprise_id");
		$this->db->where("{$this->artisan}.artisan_id", $aid);
		
		$query = $this->db->get();
		
		if($query->num_rows() > 0) return $query->result();
		
		return FALSE;
	}
	
	function get_products($artisan_id){
		$this->db->cache_off();
		
		$this->db->select('*');
		$this->db->from($this->artisan_product);
		$this->db->join($this->product, "{$this->product}.product_id = {$this->artisan_product}.product_id");
		$this->db->join($this->artisan, "{$this->artisan}.artisan_id = {$this->artisan_product}.artisan_id");
		$this->db->where("{$this->artisan}.artisan_id", $artisan_id);
		
		$query = $this->db->get();
		
		if($query->num_rows() > 0) return $query->result();
		
		return FALSE;
	}
	
	function primary_image($artisan_id){
		$this->db->where('artisan_id', $artisan_id);
		$this->db->where('is_primary', 1);
		
		$image = $this->db->get($this->artisan_album);

        if($image->num_rows() > 0) return $image->row();

        return FALSE;
	}
	
	function get_album($artisan_id){
		$this->db->where('artisan_id', $artisan_id);
		
		$image = $this->db->get($this->artisan_album);
		
		return $image->result();
	}

    function get_total(){
        $query = $this->db->get($this->artisan);

        return $query->num_rows();
    }
	
	function add_artisan($data){
		$data['date_created'] = date('Y-m-d H:i:s');
		$this->db->insert($this->artisan, $data);
		
		return $this->db->insert_id();
	}
	
	function get_artisan($aid){
		$this->db->cache_off();
		
		$this->db->select('*');
		$this->db->from($this->artisan);
		$this->db->join($this->article, "{$this->article}.article_id = {$this->artisan}.article_id", "left");
		
		$this->db->where("{$this->artisan}.artisan_id", $aid);
		$query = $this->db->get();
		
		return $query->row();
	}
	
	function add_photo($data){
		$data['date_added'] = date('Y-m-d H:i:s');
		
		$this->db->insert($this->artisan_album, $data);
		
		return $this->db->insert_id();
	}
	
	function delete($aid){	
			
		$this->db->where('artisan_id', $aid);
		$query = $this->db->delete($this->artisan);
		
		return $this->db->affected_rows();
	}
	
	function get_artisan_products($artisan_id){
				
		$this->db->where('artisan_id', $artisan_id);
        $query = $this->db->get($this->product);
		
		if($query->num_rows() > 0) return $query->result();
		
		return FALSE;		
	}	
	
	function batch_update($status, $id){
        $this->db->where_in('artisan_id', $id);
        $this->db->update($this->artisan, array('artisan_status' => $status));

        return $this->db->affected_rows();
    }

	function add_product($data){
		$data['date_added'] = date('Y-m-d H:i:s');
		
		$insert = $this->db->insert($this->artisan_product, $data);
		
		if($insert) return $this->db->insert_id();;
		
		return FALSE;
	}
	
	function update_artisan($data, $id){
		$data['last_modified'] = date('Y-m-d H:i:s');
		
		$this->db->where('artisan_id', $id);
		$update = $this->db->update($this->artisan, $data);
		
		if($update) return TRUE;
		
		return FALSE;
	}
	
	function set_primary_photo($data, $artisan_id, $photo_id){
		if($this->revert_photos($artisan_id)){
			$this->db->where('artisan_album_id', $photo_id);
			$this->db->where('artisan_id', $artisan_id);
			
			$update = $this->db->update($this->artisan_album, $data);
			
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
	
	function reset_image($artisan_id){
		if($this->revert_photos($artisan_id)){
			return TRUE;
		}
		
		return FALSE;
	}
	
	private function revert_photos($artisan_id){
		$this->db->where('artisan_id', $artisan_id);
		$revert = $this->db->update($this->artisan_album, array('is_primary' => 0));
		
		if($revert) return TRUE;
		
		return FALSE;
	}
	
	function add_enterprise($data){
		$data['date_added'] = date('Y-m-d H:i:s');
		
		$this->db->insert($this->enterprise_artisan, $data);
		
		return $this->db->insert_id();
	}
}
