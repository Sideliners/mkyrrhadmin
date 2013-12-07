<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_page extends CI_Model{
    private $page = 'page';
	
    function get_all(){
		$this->db->cache_off();
		
        $query = $this->db->get($this->page);

        if($query->num_rows() > 0) return $query->result();

        return FALSE;
    }
		
    function get_total(){
        $query = $this->db->get($this->page);

        return $query->num_rows();
    }
		
	function batch_update($status, $id){
        $this->db->where_in('page_id', $id);
        $this->db->update($this->page, array('page_status' => $status));

        return $this->db->affected_rows();
    }	
	
    function get_pages($limit = NULL, $start = NULL, $search = NULL){
        $this->db->cache_off();
		
		$this->db->select('*');
		$this->db->from($this->page);
		
		if(!is_null($search)){
			$this->db->like('page_name', $search);
		}
		
        $this->db->order_by("date_created", 'desc');
        
        if(!is_null($limit) && !is_null($start)) $this->db->limit($limit, $start);
		
        $query = $this->db->get();

        return $query->result();
    }	
	
	function add_page($data){
		$this->db->insert($this->page, $data);
		
		return $this->db->insert_id();
	}
			
	function get_page($id){
		$this->db->cache_off();
		
		$this->db->where("page_id", $id);
		
		$query = $this->db->get($this->page);
		if($query->num_rows() > 0) return $query->row();
		
		return FALSE;
	}
		
	function update_page($data, $id){
		$data['last_modified'] = date('Y-m-d H:i:s');
		
		$this->db->where('page_id', $id);
		$update = $this->db->update($this->page, $data);
		
		if($update) return TRUE;
		
		return FALSE;
	}
		
	function delete($id){	
			
		$this->db->where('page_id', $id);
		$query = $this->db->delete($this->page);
		
		return $this->db->affected_rows();
	}
}
