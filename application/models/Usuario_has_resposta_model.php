<?php

/**
 * Created by PhpStorm.
 * User: ranieri
 * Date: 30/05/17
 * Time: 17:28
 */
class Usuario_has_resposta_model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'Usuario_has_Resposta';
    }
    
    function GetTentativasExercicios($idExercicio,$ra,$curso_pin) {
        
        if (is_null($idExercicio) || is_null($ra))
            return false;
        
        $sql = "SELECT COUNT(`idUsuario_has_Resposta`) as Tentativas\n"
                . "FROM `Usuario_has_Resposta`\n"
                . "WHERE `Exercicio_idExercicio` = $idExercicio AND `Usuario_RA` = $ra AND Curso_PIN = $curso_pin";
        
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->row()->Tentativas;
        } else {
            return null;
        }
    }

    function getTotalExerciciosRealizado($ra){

        if(is_null($ra))
            return false;


        $this->db->where('Usuario_RA',$ra);
        $this->db->group_by('Curso_PIN');
        $this->db->group_by('Exercicio_idExercicio');

        $query = $this->db->get($this->table);

        return $query->num_rows();

    }

    function getTotalAcertos($ra){

        if(is_null($ra))
            return false;
        $this->db->select('COUNT(idUsuario_has_Resposta) AS TotalAcertos');
        $this->db->where('Usuario_RA',$ra);
        $this->db->where('Resposta_Correta',1);

        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            return $query->row()->TotalAcertos;
        } else {
            return null;
        }
    }

    function getTotalAcertosDePrimeira($ra){

        if(is_null($ra))
            return false;

        $this->db->select('idUsuario_has_Resposta');
        $this->db->where('Usuario_RA',$ra);
        $this->db->group_by('Exercicio_idExercicio');
        $this->db->group_by('Curso_PIN');
        $this->db->having('SUM(Resposta_Correta)',1);
        $this->db->having('COUNT(Usuario_RA)',1);

        $query = $this->db->get($this->table);

        return $query->num_rows();

    }

    function getTotalErrados($ra){

        if(is_null($ra))
            return false;

        $this->db->select('idUsuario_has_Resposta');
        $this->db->where('Usuario_RA',$ra);
        $this->db->group_by('Exercicio_idExercicio');
        $this->db->group_by('Curso_PIN');
        $this->db->having('SUM(Resposta_Correta)',0);
        $this->db->having('COUNT(Usuario_RA)',3);

        $query = $this->db->get($this->table);

        return $query->num_rows();

    }

    function getTotalErrosPorCategoriaDeBloom($curso_PIN, $categoria_bloom){

        $this->db->select('idUsuario_has_Resposta, Resposta_Correta');
        $this->db->join('Exercicio','Usuario_has_Resposta.Exercicio_idExercicio = Exercicio.idExercicio');
        $this->db->where('Curso_PIN',$curso_PIN);
        $this->db->where('Exercicio.Categoria_Bloom',$categoria_bloom);
        $this->db->where('Resposta_Correta',0);

        $query = $this->db->get($this->table);

        return $query->num_rows();

    }

    function getTotalErrosPorTopicoID($curso_PIN, $topico_id){

        $this->db->select('idUsuario_has_Resposta, Resposta_Correta');
        $this->db->join('Exercicio','Usuario_has_Resposta.Exercicio_idExercicio = Exercicio.idExercicio');
        $this->db->where('Curso_PIN',$curso_PIN);
        $this->db->where('Exercicio.Topico_idTopico',$topico_id);
        $this->db->where('Resposta_Correta',0);

        $query = $this->db->get($this->table);

        return $query->num_rows();
    }


}