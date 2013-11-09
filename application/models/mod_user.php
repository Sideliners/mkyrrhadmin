<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_user extends CI_Model{

    private $user = 'user';
	private $user_type = 'user_type';

    function getUser($email, $password = NULL){
		$this->db->cache_off();
		
		$this->db->select('*');
		$this->db->from($this->user);
		$this->db->join($this->user_type, "{$this->user_type}.user_type_id = {$this->user}.user_type");
		
        $this->db->where("{$this->user}.user_email", $email);

        if(!is_null($password)){
            $this->db->where("{$this->user}.user_password", $password);
        }
        $this->db->where("{$this->user}.user_status", 1);
        $this->db->where("{$this->user}.user_type !=", 4);

        $query = $this->db->get();

        if($query->num_rows() > 0){
            return $query->row();
        }

        return FALSE;
    }

    function authUser($uid, $accessToken){
        $this->db->where('user_id', $uid);
        $this->db->update($this->user, array('access_token' => $accessToken));

        return $this->db->affected_rows();
    }

    function removeToken($uid){
        $this->db->where('user_id', $uid);
        $this->db->update($this->user, array('access_token' => ''));

        return $this->db->affected_rows();
    }
	
	/*
	 * superadmin models
	 *
	 */
	function get_accounts($limit, $start){
		$this->db->cache_off();
		$this->db->where('user_type != 1');
		$this->db->limit($limit, $start);
		
		$query = $this->db->get($this->user);
		
		return ($query->num_rows() > 0)? $query->result() : NULL;
	}
	
	function get_total(){
		$this->db->cache_off();
		$this->db->where('user_type != 1');
		
		$query = $this->db->get($this->user);
		
		return $query->num_rows();
	}
	
	function get_types(){
		$this->db->where_in('user_type_id', array(2, 3));
		
		$query = $this->db->get($this->user_type);
		
		return $query->result();
	}
}