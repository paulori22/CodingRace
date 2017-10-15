<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nivel_model extends MY_Model
{

    function __construct()
    {
        parent::__construct();
        $this->table = 'Nivel';
    }

    public function getNivelExp($xp){

        $this->db->select_min('Nivel');
        $this->db->select_min('XP');
        $this->db->where('XP >=',$xp);

        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }



    }

}
