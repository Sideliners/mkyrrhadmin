<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_enterprise extends CI_Model{
	
	private $enterprise = 'enterprise';
	private $enterprise_artisan = 'enterprise_artisan';
	private $enterprise_album = 'enterprise_album';
	private $collection = 'collection';
	private $collection_enterprise = 'collection_enterprise';
	private $artisan = 'artisan';
	private $article = 'article';
	private $user = 'user';
	
	function get_all(){
		$this->db->cache_off();
		
		$query = $this->db->get($this->enterprise);
		
		return $query->result();
	}
	
	function get_enterprise($id) {
		$this->db->cache_off();
		
		$this->db->select('*');
		$this->db->from($this->enterprise);
		$this->db->join($this->enterprise_album, "{$this->enterprise_album}.enterprise_id = {$this->enterprise}.enterprise_id", 'left');
		$this->db->where("{$this->enterprise}.enterprise_id", $id);
		//$this->db->where("{$this->enterprise_album}.is_primary", 1);
		
		$query = $this->db->get();
				
		return $query->row();
	}	

    function get_total(){
        $query = $this->db->get($this->enterprise);

        return $query->num_rows();
    }

    function get_enterprises($limit, $start, $search = NULL){
        $this->db->cache_off();
		
		if(!is_null($search)) $this->db->like('enterprise_name', $search);
		
		$this->db->order_by('date_created', 'desc');
		
        $query = $this->db->get($this->enterprise, $limit, $start);

        return $query->result();
    }
	
	function get_artisans($enterprise_id){
		$this->db->select('*');
		$this->db->from($this->enterprise_artisan);
		$this->db->join($this->enterprise, "{$this->enterprise}.enterprise_id = {$this->enterprise_artisan}.enterprise_id");
		$this->db->join($this->artisan, "{$this->artisan}.artisan_id = {$this->enterprise_artisan}.artisan_id");
		
		$this->db->where("{$this->enterprise}.enterprise_id", $enterprise_id);
        $query = $this->db->get();
		
		if($query->num_rows() > 0) return $query->result();
		
		return FALSE;		
	}
	
	function get_album($entr_id){
		$this->db->where('enterprise_id', $entr_id);
		
		$image = $this->db->get($this->enterprise_album);
		
		return $image->result();
	}
	
	function get_article($article_id){
		$this->db->cache_off();
		
        $this->db->select('*');
        $this->db->from($this->article);
        $this->db->join($this->user, "{$this->article}.user_id = {$this->user}.user_id", 'right');
        $this->db->where("{$this->article}.article_id", $article_id);

        $query = $this->db->get();

        if($query->num_rows() > 0) return $query->row();

        return FALSE;
	}
	
	function add_enterprise($data){
		$data['date_created'] = date('Y-m-d H:i:s');
		
		$this->db->insert($this->enterprise, $data);
		
		return $this->db->insert_id();
	}	
	
	function update_enterprise($data, $id){
		$data['last_modified'] = date('Y-m-d H:i:s');
		
		$this->db->where('enterprise_id', $id);
		$query = $this->db->update($this->enterprise, $data);
		
		if($query){
			return TRUE;
		}
		
		return FALSE;
	}
	
	function delete($id){	
			
		$this->db->where('enterprise_id', $id);
		$query = $this->db->delete($this->enterprise);
		
		return $this->db->affected_rows();
	}
	
	function batch_update($status, $id){
        $this->db->where_in('enterprise_id', $id);
        $this->db->update($this->enterprise, array('enterprise_status' => $status));

        return $this->db->affected_rows();
    }
	
	function add_photo($data){
		$data['date_added'] = date('Y-m-d H:i:s');
		
		$this->db->insert($this->enterprise_album, $data);
		
		return $this->db->insert_id();
	}
	
	function set_primary_photo($data, $enterprise_id, $photo_id){
		if($this->revert_photos($enterprise_id)){
			$this->db->where('enterprise_album_id', $photo_id);
			$this->db->where('enterprise_id', $enterprise_id);
			
			$update = $this->db->update($this->enterprise_album, $data);
			
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
	
	private function revert_photos($enterprise_id){
		$this->db->where('enterprise_id', $enterprise_id);
		
		$revert = $this->db->update($this->enterprise_album, array('is_primary' => 0));
		
		if($revert) return TRUE;
		
		return FALSE;
	}
	
	function primary_image($enterprise_id){
		$this->db->where('enterprise_id', $enterprise_id);
		$this->db->where('is_primary', 1);
		
		$image = $this->db->get($this->enterprise_album);

        if($image->num_rows() > 0) return $image->row();

        return FALSE;
	}
	
	function get_collection($enterprise_id){
		$this->db->cache_off();
		
		$this->db->select('*');
		$this->db->from($this->collection_enterprise);
		$this->db->join($this->collection, "{$this->collection}.collection_id = {$this->collection_enterprise}.collection_id");
		$this->db->where("{$this->collection_enterprise}.enterprise_id", $enterprise_id);
		
		$query = $this->db->get();
		
		return $query->result();
	}
}