<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_products extends CI_Model{

    private $product = 'product';
    private $prod_cat = 'product_category';
	private $artisan = 'artisan';

    function getProducts($limit, $start){
        $sql = "
            SELECT *
            FROM {$this->prod_cat} AS pc
            JOIN {$this->product} AS p
                ON p.product_id = pc.product_id
            GROUP BY p.product_name
            ORDER BY p.date_created DESC
            LIMIT {$start}, {$limit}
        ";
        $this->db->cache_off();
        $query = $this->db->query($sql);

        if($query->num_rows() > 0){
            return $query->result();
        }

        return FALSE;
    }

    function batch_update($status, $pid){
        $this->db->where_in('product_id', $pid);
        $this->db->update($this->product, array('product_status' => $status));

        return $this->db->affected_rows();
    }

    function get_total(){
        $sql = "
            SELECT *
            FROM {$this->prod_cat} AS pc
            JOIN {$this->product} AS p
                ON p.product_id = pc.product_id
            JOIN artisan AS a
                ON a.artisan_id = p.artisan_id
            GROUP BY p.product_name
            ORDER BY p.date_created DESC
        ";

        $this->db->cache_off();
        $query = $this->db->query($sql);

        return $query->num_rows();
    }

    function search_products($limit, $start, $str){
        $sql = "
            SELECT *
            FROM {$this->prod_cat} AS pc
            JOIN {$this->product} AS p
                ON p.product_id = pc.product_id
            JOIN artisan AS a
                ON a.artisan_id = p.artisan_id
            WHERE p.product_name LIKE '%{$str}%'
            GROUP BY p.product_name
            ORDER BY p.date_created DESC
            LIMIT {$start}, {$limit}
        ";
        $this->db->cache_off();
        $query = $this->db->query($sql);

        if($query->num_rows() > 0){
            return $query->result();
        }

        return FALSE;
    }

    function get_total_search($str){
        $sql = "
            SELECT *
            FROM {$this->prod_cat} AS pc
            JOIN {$this->product} AS p
                ON p.product_id = pc.product_id
            JOIN artisan AS a
                ON a.artisan_id = p.artisan_id
            WHERE p.product_name LIKE '%{$str}%'
            GROUP BY p.product_name
            ORDER BY p.date_created DESC
        ";

        $this->db->cache_off();
        $query = $this->db->query($sql);

        return $query->num_rows();
    }
	
	function add_product($data){
		$this->db->insert($this->product, $data);
		
		return $this->db->insert_id();
	}
	
	function insert_to_category($cat, $id){
		$query = $this->db->insert($this->prod_cat, array('category_id' => $cat, 'product_id' => $id));
		
		if($query) return TRUE;
		
		return FALSE;
	}
	
	function get_product($pid){
		$this->db->where('product_id', intval($pid));
		$query = $this->db->get($this->product);
		
		if($query->num_rows() > 0) return $query->row();
		
		return FALSE;
	}
	
	function get_prod_artisan($pid){
		$this->db->select('*');
		$this->db->from($this->product);
		$this->db->join($this->artisan, "{$this->artisan}.artisan_id = {$this->product}.artisan_id");
		$this->db->where("{$this->product}.product_id", $pid);
		
		$query = $this->db->get();
		
		return $query->row();
	}
	
	function update_prod($data, $pid){
        $data['last_modified'] = date('Y-m-d H:i:s');
		$this->db->where('product_id', $pid);
		$query = $this->db->update($this->product, $data);
		
		if($query) return $this->db->affected_rows();
		
		return FALSE;
	}
	
	function delete($pid){
		// product table
		$sql1 = "DELETE  FROM {$this->product} WHERE product_id = {$pid}";
		$prod_delete = $this->db->query($sql1);
		
		if($prod_delete){			
			$sql2 = "DELETE  FROM {$this->prod_cat} WHERE product_id = {$pid}";
			$cat_delete = $this->db->query($sql2);
			
			if($cat_delete){
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

    function revert_hl(){
        $this->db->update($this->product, array('is_highlighted' => 0));
		
        return $this->db->affected_rows();
    }
	
	function get_artisan_products($artisan_id) {
		/* returns products of artisan */
		$this->db->cache_off();
				
		$this->db->where('artisan_id', $artisan_id);
		$query = $this->db->get($this->product);
		
		if($query->num_rows() > 0) return $query->result();		
		
		return FALSE;
	}
	
}
