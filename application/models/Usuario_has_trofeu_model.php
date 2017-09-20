<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_has_trofeu_model extends MY_Model {

    function __construct() {
        parent::__construct();
        $this->table = 'Usuario_has_Trofeu';
    }

    public function getTodosTrofeus($ra, $curso_pin) {

    $sql = "SELECT Trofeu.Nome, Trofeu.Descricao, Trofeu.Imagem, Usuario_has_Trofeu.Data_Conquista\n"

    . "FROM `Usuario_has_Trofeu`\n"

    . "JOIN Trofeu ON Usuario_has_Trofeu.idTrofeu = Trofeu.idTrofeu\n"

    . "WHERE Trofeu.Curso_PIN=$curso_pin AND Usuario_has_Trofeu.Usuario_RA = $ra";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function getTotalTrofeus($ra){

        if(is_null($ra))
            return false;

        $this->db->select('COUNT(idUsuario_has_Trofeu) AS TotalTrofeu');
        $this->db->where('Usuario_RA',$ra);


        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            return $query->row()->TotalTrofeu;
        } else {
            return null;
        }

    }

    public function verificaSeUsuarioTemTrofeu($idTrofeu){

        $this->db->select('idUsuario_has_trofeu');
        $this->db->where('idTrofeu',$idTrofeu);

        $query = $this->db->get($this->table);

        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }


    }

}
