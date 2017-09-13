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



}