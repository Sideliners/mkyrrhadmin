<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_article extends CI_Model{

    private $article = 'article';
    private $product = 'product';
    private $user = 'user';

    function getArticle($id){
		$this->db->cache_off();
		
        $this->db->select('*');
        $this->db->from($this->article);
        $this->db->join($this->user, "{$this->article}.user_id = {$this->user}.user_id", 'right');
        $this->db->where("{$this->article}.article_id", $id);

        $query = $this->db->get();

        if($query->num_rows() > 0) return $query->row();

        return FALSE;
    }

    function get_total(){
        $query = $this->db->get($this->article);

        return $query->num_rows();
    }

    function get_all($limit, $start){
        $this->db->cache_off();
        $this->db->order_by('date_created', 'desc');

        $query = $this->db->get($this->article, $limit, $start);

        if($query->num_rows() > 0) return $query->result();

        return FALSE;
    }

    function create_article($data, $prod_id){
        $data['date_created'] = date('Y-m-d H:i:s');

        $query = $this->db->insert($this->article, $data);

        if($query) return $this->db->insert_id();

        return FALSE;
    }

    function update_article($data, $aid){
        $data['last_modified'] = date('Y-m-d H:i:s');

        $this->db->where('article_id', $aid);
        $query = $this->db->update($this->article, $data);

        if($query) return $this->db->affected_rows();

        return FALSE;
    }
	
	#old

    function get_prod_article($article_id){
		$this->db->cache_off();
		
        $this->db->select('*');
        $this->db->from($this->article);
        $this->db->join($this->user, "{$this->article}.user_id = {$this->user}.user_id", 'right');
        $this->db->where("{$this->article}.article_id", $article_id);

        $query = $this->db->get();

        if($query->num_rows() > 0) return $query->row();

        return FALSE;
    }

    function get_total_search($str){
        $this->db->cache_off();
        $this->db->like('title', $str);
        $this->db->order_by('date_created', 'desc');

        $query = $this->db->get($this->article);

        return $query->num_rows();
    }

    function get_articles_search($limit, $start, $str){
        $this->db->cache_off();
        $this->db->like('title', $str);
        $this->db->order_by('date_created', 'desc');

        $query = $this->db->get($this->article, $limit, $start);

        if($query->num_rows() > 0) return $query->result();

        return FALSE;
    }

    function status_update($aid, $status, $is_batch = NULL){
        if(!is_null($is_batch) && $is_batch == 1){
            $this->db->where_in('article_id', $aid);
        }
        else{
            $this->db->where($id);
        }

        $this->db->update($this->article, array('status' => $status));

        return $this->db->affected_rows();
    }
	
	 function delete($aid){
		 /* delete article */
		 
        $this->db->where('article_id',$aid);
        $this->db->delete($this->article);

        return $this->db->affected_rows();
    }
}
