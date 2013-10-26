<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_collection extends CI_Model{
    private $collection = 'collection';

    function get_all(){
        $query = $this->db->get($this->collection);

        if($query->num_rows() > 0) return $query->result();

        return FALSE;
    }
}
