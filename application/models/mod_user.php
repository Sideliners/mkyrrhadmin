<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_user extends CI_Model{

    private $user = 'user';

    function getUser($email, $password = NULL){
        $this->db->where('user_email', $email);

        if(!is_null($password)){
            $this->db->where('user_password', $password);
        }
        $this->db->where('user_status', 1);
        $this->db->where('user_type !=', 4);

        $query = $this->db->get($this->user);

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
}
