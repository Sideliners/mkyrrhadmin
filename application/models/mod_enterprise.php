<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_enterprise extends CI_Model{
	
	private $enterprise = 'enterprise';
	private $artisan = 'artisan';
	private $enterprise_artisan = 'enterprise_artisan';
	
	function get_all(){
		$this->db->cache_off();
		
		$query = $this->db->get($this->enterprise);
		
		return $query->result();
	}
	
	function get_enterprise($id) {
		$this->db->cache_off();
		
		$this->db->where('enterprise_id', $id);
		$query = $this->db->get($this->enterprise);
				
		return $query->row();
	}	

    function get_total(){
        $query = $this->db->get($this->enterprise);

        return $query->num_rows();
    }

    function get_enterprises($limit, $start){
        $this->db->cache_off();
		$this->db->order_by('date_created', 'desc');
		
        $query = $this->db->get($this->enterprise, $limit, $start);

        return $query->result();
    }
	
	function add_enterprise($data){
		$this->db->insert($this->enterprise, $data);
		
		return $this->db->insert_id();
	}	
	
	function update_enterprise($data, $id){
		$data['last_modified'] = date('Y-m-d H:i:s');
		
		$this->db->where('enterprise_id', $id);
		$query = $this->db->update($this->enterprise, $data);
		
		return $this->db->affected_rows();
	}	
	
	function get_enterprise_artisans($enterprise_id){
		$this->db->select('*');
		$this->db->from($this->enterprise_artisan);
		$this->db->join($this->enterprise, "{$this->enterprise}.enterprise_id = {$this->enterprise_artisan}.enterprise_id");
		$this->db->join($this->artisan, "{$this->artisan}.artisan_id = {$this->enterprise_artisan}.artisan_id");
		
		$this->db->where("{$this->enterprise}.enterprise_id", $enterprise_id);
        $query = $this->db->get();
		
		if($query->num_rows() > 0) return $query->result();
		
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

}