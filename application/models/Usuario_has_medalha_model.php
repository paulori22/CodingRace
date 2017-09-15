<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_has_medalha_model extends MY_Model {

    function __construct() {
        parent::__construct();
        $this->table = 'Usuario_has_Medalha';
    }

    public function getTodasMedalhas($ra, $curso_pin) {

    $sql = "SELECT Medalha.Nome, Medalha.Descricao, Medalha.Imagem, Usuario_has_Medalha.Data_Conquista\n"

    . "FROM `Usuario_has_Medalha`\n"

    . "JOIN Medalha ON Usuario_has_Medalha.idMedalha = Medalha.idMedalha\n"

    . "WHERE Medalha.Curso_PIN=$curso_pin AND Usuario_has_Medalha.Usuario_RA = $ra";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function getConquistasMaisRecentes($ra)
    {
        $this->db->join('Medalha','Medalha.idMedalha = Usuario_has_Medalha.idMedalha');
        $this->db->where('Usuario_RA',$ra);
        $this->db->order_by('Data_Conquista','DESC');
        $this->db->limit(5);

        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function getTotalMedalhas($ra){

        if(is_null($ra))
            return false;

        $this->db->select('COUNT(idUsuario_has_medalha) AS TotalMedalhas');
        $this->db->where('Usuario_RA',$ra);


        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            return $query->row()->TotalMedalhas;
        } else {
            return null;
        }

    }

}
