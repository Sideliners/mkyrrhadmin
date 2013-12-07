<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_collection extends CI_Model{
	private $artisan = 'artisan';
    private $collection = 'collection';
	private $collection_artisan = 'collection_artisan';
	private $collection_product = 'collection_product';
	private $collection_enterprise = 'collection_enterprise';
	private $enterprise = 'enterprise';
	private $product = 'product';

    function get_all(){
		$this->db->cache_off();
		
        $query = $this->db->get($this->collection);

        if($query->num_rows() > 0) return $query->result();

        return FALSE;
    }
	
	function add_product($data){
		$data['date_added'] = date('Y-m-d H:i:s');
		
		$insert = $this->db->insert($this->collection_product, $data);
		
		if($insert) return 1;
		
		return 0;
	}
	
	function add_enterprise($data){
		$data['date_added'] = date('Y-m-d H:i:s');
		
		$insert = $this->db->insert($this->collection_enterprise, $data);
		
		if($insert) return 1;
		
		return 0;
	}
		
    function get_total(){
        $query = $this->db->get($this->collection);

        return $query->num_rows();
    }
		
	function batch_update($status, $id){
        $this->db->where_in('collection_id', $id);
        $this->db->update($this->collection, array('collection_status' => $status));

        return $this->db->affected_rows();
    }	
	
    function get_collections($limit = NULL, $start = NULL, $search = NULL){
        $this->db->cache_off();
		
		$this->db->select('*');
		$this->db->from($this->collection);
		
		if(!is_null($search)){
			$this->db->like('collection_name', $search);
		}
		
        $this->db->order_by("date_created", 'desc');
        
        if(!is_null($limit) && !is_null($start)) $this->db->limit($limit, $start);
		
        $query = $this->db->get();

        return $query->result();
    }	
	
	function add_collection($data){
		$this->db->insert($this->collection, $data);
		
		return $this->db->insert_id();
	}
			
	function get_collection($id){
		$this->db->cache_off();
		
		$this->db->where("collection_id", $id);
		
		$query = $this->db->get($this->collection);
		if($query->num_rows() > 0) return $query->row();
		
		return FALSE;
	}
	
	function get_collection_product($id){
		$this->db->cache_off();
		
		$this->db->select('*');
		$this->db->from($this->collection);
		$this->db->join($this->collection_product, "{$this->collection_product}.collection_id = {$this->collection}.collection_id");
		$this->db->join($this->product, "{$this->product}.product_id = {$this->collection_product}.product_id");
		
		$this->db->where("{$this->collection}.collection_id", $id);
		$query = $this->db->get();
		
		if($query->num_rows() > 0) return $query->result();
		
		return FALSE;
	}
	
	function get_collection_artisan($id){
		$this->db->cache_off();
		
		$this->db->select('*');
		$this->db->from($this->collection);
		$this->db->join($this->collection_artisan, "{$this->collection_artisan}.collection_id = {$this->collection}.collection_id");
		$this->db->join($this->artisan, "{$this->artisan}.artisan_id = {$this->collection_artisan}.artisan_id");
		
		$this->db->where("{$this->collection}.collection_id", $id);
		$query = $this->db->get();
		
		if($query->num_rows() > 0) return $query->result();
		
		return FALSE;
	}
	
	function get_collection_enterprise($id){
		$this->db->cache_off();
		
		$this->db->select('*');
		$this->db->from($this->collection);
		$this->db->join($this->collection_enterprise, "{$this->collection_enterprise}.collection_id = {$this->collection}.collection_id");
		$this->db->join($this->enterprise, "{$this->enterprise}.enterprise_id = {$this->collection_enterprise}.enterprise_id");
		
		$this->db->where("{$this->collection}.collection_id", $id);
		$query = $this->db->get();
		
		if($query->num_rows() > 0) return $query->result();
		
		return FALSE;
	}	
		
	function update_collection($data, $id){
		$data['last_modified'] = date('Y-m-d H:i:s');
		
		$this->db->where('collection_id', $id);
		$update = $this->db->update($this->collection, $data);
		
		if($update) return TRUE;
		
		return FALSE;
	}
		
	function delete($id){	
			
		$this->db->where('collection_id', $id);
		$query = $this->db->delete($this->collection);
		
		return $this->db->affected_rows();
	}	
	
    function get_total_search($str){
        $this->db->select('*');
        $this->db->from($this->collection);
        
        $this->db->like("{$this->collection}.collection_name", $str);
		$query = $this->db->get();
        return $query->num_rows();
    }
}
