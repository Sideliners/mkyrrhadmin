<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_collection extends CI_Model{
    private $collection = 'collection';
	private $collection_product = 'collection_product';

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
}
