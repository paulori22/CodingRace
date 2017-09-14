<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_has_curso_model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'Usuario_has_Curso';
    }

    public function BuscaCursoCadastrado($ra, $pin)
    {
        if(is_null($pin))
            return false;
        $this->db->select('Usuario_RA');
        $this->db->where('Curso_PIN', $pin);
        $this->db->where('Usuario_RA', $ra);
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function QuantidadeCursosUsuario($pin)
    {
        if(is_null($pin))
            return false;

        $this->db->select('Usuario_RA');
        $this->db->where('Curso_PIN', $pin);
        $query = $this->db->get($this->table);
        return $query->num_rows();
    }

    public function CursosUsuario($ra)
    {
        if(is_null($ra))
            return false;
        $this->db->select('Curso_PIN');
        $this->db->where('Usuario_RA', $ra);
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }
    

    public function UsuariosCurso($pin)
    {
        if(is_null($pin))
            return false;
        $this->db->select('Usuario_RA');
        $this->db->where('Curso_PIN', $pin);
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }
    
    public function UsuariosCursoLeaderboard($pin){
        if(is_null($pin))
            return false;

        $sql = "SELECT Usuario.Nome, Usuario_has_Curso.Pontuacao, COUNT(Usuario_has_Medalha.idUsuario_has_medalha) as Qtd_Medalha, COUNT(Usuario_has_Trofeu.idUsuario_has_Trofeu) as Qtd_Trofeu\n"
            . "FROM Usuario_has_Curso\n"
            . "JOIN Usuario ON Usuario_has_Curso.Usuario_RA=Usuario.RA\n"
            . "LEFT JOIN Usuario_has_Medalha ON Usuario_has_Medalha.Usuario_RA = Usuario_has_Curso.Usuario_RA\n"
            . "LEFT JOIN Usuario_has_Trofeu ON Usuario_has_Trofeu.Usuario_RA = Usuario_has_Curso.Usuario_RA\n"
            . "WHERE Usuario_has_Curso.Curso_PIN = $pin AND Usuario.Tipo_Usuario=2\n"
            . "GROUP BY Usuario.RA\n"
            . "ORDER BY Usuario_has_Curso.Pontuacao DESC";
        
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }
    }

    public function ExcluirCursoCadastrado($pin, $ra){
        if(is_null($pin))
            return false;
        $this->db->where('Curso_PIN', $pin);
        $this->db->where('Usuario_RA', $ra);
        return $this->db->delete($this->table);
    }
    
    public function QuantidadeCursosAluno($ra){
        if(is_null($ra))
            return false;
        $this->db->select('idUsuario_has_Curso');
        $this->db->where('Usuario_RA', $ra);
        $query = $this->db->get($this->table);

        return $query->num_rows();

    }
    
    public function AdicionarPontosCursoAluno($pontos,$ra,$pin,$tentativas)
    {
        if(is_null($pontos)  || is_null($ra) || is_null($pin))
            return false;

        if($tentativas==1){
            $this->db->set('Pontuacao','Pontuacao + '.$pontos,FALSE);
            $pontos_ganhos = $pontos;

        }elseif($tentativas==2){
            $pontos_ganhos = (int)($pontos*(80/100));
            $this->db->set('Pontuacao','Pontuacao + '.$pontos_ganhos,FALSE);

        }else{
            $pontos_ganhos = (int)($pontos*(60/100));
            $this->db->set('Pontuacao','Pontuacao + '.$pontos_ganhos,FALSE);

        }
        
        $this->db->where('Usuario_RA',$ra);
        $this->db->where('Curso_PIN',$pin);
        
        
        $query = $this->db->update($this->table);

        if ($query) {
            return $pontos_ganhos;
        } else {
            return null;
        }
    }
}