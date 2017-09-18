<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trofeu_model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'Trofeu';
    }
    
    public function getTrofeuByID($id)
    {
        if (is_null($id))
            return false;
        $this->db->where('idTrofeu', $id);
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }
        
    }

}