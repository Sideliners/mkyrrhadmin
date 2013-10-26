<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_category extends CI_Model{

    private $category = 'category';
    private $prod_cat = 'product_category';

    function getProdCats($prodid){
        $this->db->select("{$this->category}.category_name");
        $this->db->from($this->prod_cat);
        $this->db->join($this->category, "{$this->category}.category_id = {$this->prod_cat}.category_id");
        $this->db->where("{$this->prod_cat}.product_id", $prodid);

        $query = $this->db->get();

        foreach($query->result_array() as $row){
            $arr[] = $row['category_name'];
        }

        $categories = implode(", ", $arr);

        return $categories;
    }
	
	function get_all(){
		$query = $this->db->get($this->category);
		
		return $query->result();
	}
	
	function check_prodcat($data, $pid){
		$this->db->where('category_id', $data);
		$this->db->where('product_id', $pid);
		$query = $this->db->get($this->prod_cat);
		
		if($query->num_rows() > 0) return $query->result();
		
		return FALSE;
	}
}
