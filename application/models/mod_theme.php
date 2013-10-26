<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mod_theme extends CI_Model{

    private $theme = 'theme';

    function getThemeLists($order_by, $sorted){
		$this->db->order_by($order_by, $sorted);
        $query = $this->db->get($this->theme);

        return $query->result();
    }
}
