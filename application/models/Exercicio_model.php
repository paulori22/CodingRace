<?php

/**
 * Created by PhpStorm.
 * User: ranieri
 * Date: 12/03/17
 * Time: 22:54
 */
class Exercicio_model extends MY_Model {

    function __construct() {
        parent::__construct();
        $this->table = 'Exercicio';
    }

    function GetById($id) {
        if (is_null($id))
            return false;
        $this->db->where('idExercicio', $id);
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return null;
        }
    }

    function GetByTopico($idTopico) {
        if (is_null($idTopico))
            return false;
        $this->db->where('Topico_idTopico', $idTopico);
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }

    function GetByTopicoMaisId($idTopico) {
        if (is_null($idTopico))
            return false;
        $sql = "SELECT @n := @n + 1 n, Exercicio.idExercicio\n"
                . "FROM `Exercicio`, (SELECT @n := 0) m\n"
                . "WHERE `Topico_idTopico`=$idTopico";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }

    function GetByTopicoOrderByBloom($idTopico, $sort = 'Categoria_Bloom', $order = 'asc') {
        if (is_null($idTopico))
            return false;
        $this->db->where('Topico_idTopico', $idTopico);
        $this->db->order_by($sort, $order);
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }

    function getTotalNumberOfExercicesOfTopic($idTopico) {
        if (is_null($idTopico))
            return false;
        $this->db->where('Topico_idTopico', $idTopico);
        $query = $this->db->get($this->table);
        return $query->num_rows();
    }

    function AtualizaExercicio($id, $data) {
        if (is_null($id) || !isset($data))
            return false;
        $this->db->where('idExercicio', $id);
        return $this->db->update($this->table, $data);
    }

    function ExcluirExercicio($idExercicio) {
        if (is_null($idExercicio))
            return false;
        $this->db->where('idExercicio', $idExercicio);
        return $this->db->delete($this->table);
    }

    function InserirRetornandoId($data) {
        if (!isset($data))
            return false;
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

}
