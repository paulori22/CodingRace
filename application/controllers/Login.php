<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->helper('date');
        $this->load->model('usuarios_model');
        $validacao = self::Validar('login');

        if($validacao) {
            $ra = $this->input->post('ra');
            $senha = $this->input->post('senha');
            $data['ra'] = $ra;
            $query = $this->usuarios_model->Login($ra, $senha);
            if ($query) {
                foreach ($query as $item) {
                    $tipo_usuario = $item['Tipo_Usuario'];
                }
                $data['logged'] = true;
                $data['tipo_usuario'] = $tipo_usuario;
                $this->session->set_userdata($data);

                if ($tipo_usuario == 0) {
                    redirect('home_admin');
                } elseif ($tipo_usuario == 1) {
                    redirect('home_professor');
                } else {

                    //verificar horário para troféu

                    self::HomeAluno();

                    $data_login =  date('Y/m/d H:i:s', now());
                    $this->verificaTrofeu($data_login);



                }
            } else {
                $this->session->set_flashdata('usuario_naoencontrado', 'Usuário ou senha incorreto!');
                redirect('Login');
            }
        }else{
            $this->load->view('login_view');
        }
    }

    public function Logout()
    {
        $this->session->set_userdata('logged', false);
        redirect($this->index());
    }

    public function NovoUsuario(){
        $this->load->model('usuarios_model');
        $validacao = self::Validar('novo_usuario');

        if ($validacao){
            $nome = $this->input->post('nome');
            $senha = $this->input->post('senha');
            $email = $this->input->post('email');
            $ra = $this->input->post('ra');
            $dados_usuario = array(
                'Nome' => $nome,
                'Email' => $email,
                'Senha' => $senha,
                'RA' => $ra,
                'Status' => 0,
                'Tipo_Usuario' => 2
            );
            $status = $this->usuarios_model->Inserir($dados_usuario);
            if(!$status)
            {
                $this->session->set_flashdata('error', 'Não foi possível inserir o usuário!');
                $data['nome'] = $this->session->userdata('nome');
                $data['title'] = "Projeto TFG - Novo Usuário";
                $data['header'] = "Novo Usuário";

                /** Carrega a view */
                $this->load->view('commons/header',$data);
                $this->load->view('usuario/novousuario_view');
                $this->load->view('commons/footer');
            }else{
                $this->session->set_flashdata('success', 'Usuário inserido com sucesso!');
                $this->index();
            }
        }else{
            $data['nome'] = $this->session->userdata('nome');
            $data['title'] = "Projeto TFG - Novo Usuário";
            $data['header'] = "Novo Usuário";

            /** Carrega a view */
            $this->load->view('commons/header',$data);
            $this->load->view('usuario/novousuario_view');
            $this->load->view('commons/footer');
        }

    }

    public function verificaTrofeu($data_login){

        $this->load->model('usuario_has_trofeu_model');
        $this->load->model('trofeu_model');

        $ra = $this->session->userdata('ra');

        $hora_login = intval(DateTime::createFromFormat("Y/m/d H:i:s", $data_login)->format('H'));

        if($hora_login >= 1 &&  $hora_login < 5){

            $idTrofeu = 1;

            if(!$this->usuario_has_trofeu_model->verificaSeUsuarioTemTrofeu($idTrofeu, $ra)){

                //Se usuario ainda não tem o troféu ele ganha
                $data_conquista = date('Y/m/d H:i:s', now());
                $dados_trofeu = array(
                    'Usuario_RA' => $ra,
                    'idTrofeu' => $idTrofeu,
                    'Data_Conquista' => $data_conquista,
                );

                $status = $this->usuario_has_trofeu_model->Inserir($dados_trofeu);

                if($status){

                    $data['id_modal'] = 12;
                    $data['conquista'] = $this->trofeu_model->getTrofeuByID($idTrofeu);

                    $this->load->view('commons/modal_conquista',$data);
                }

            }

        }elseif ($hora_login >= 5 &&  $hora_login <= 7){

            $idTrofeu = 2;

            if(!$this->usuario_has_trofeu_model->verificaSeUsuarioTemTrofeu($idTrofeu, $ra)){

                //Se usuario ainda não tem o troféu ele ganha
                $data_conquista = date('Y/m/d H:i:s', now());
                $dados_trofeu = array(
                    'Usuario_RA' => $ra,
                    'idTrofeu' => $idTrofeu,
                    'Data_Conquista' => $data_conquista,
                );

                $status = $this->usuario_has_trofeu_model->Inserir($dados_trofeu);

                if($status){

                    $data['id_modal'] = 12;
                    $data['conquista'] = $this->trofeu_model->getTrofeuByID($idTrofeu);

                    $this->load->view('commons/modal_conquista',$data);
                }

            }

        }

    }

    public function Validar($operacao)
    {
        if ($operacao == 'novo_usuario') {
            $this->form_validation->set_rules('ra', 'RA', 'required|is_unique[Usuario.RA]');
            $this->form_validation->set_rules('nome', 'Nome', 'required');
            $this->form_validation->set_rules('senha', 'Senha', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('confirmar_email', 'Confirmar Email', 'required|matches[email]');
            $this->form_validation->set_error_delimiters('<div class=\'w3-container w3-center w3-red\'><p class="error">', '</p></div>');
        }
        elseif ($operacao == 'login'){
            $this->form_validation->set_rules('ra', 'RA', 'required|is_numeric');
            $this->form_validation->set_rules('senha', 'Senha', 'required');
            $this->form_validation->set_error_delimiters('<div class=\'w3-container w3-center w3-red\'><p class="error">', '</p></div>');
        }
        return $this->form_validation->run();
    }

    public function HomeAluno() {
        $this->load->model('usuario_has_medalha_model');
        $this->load->model('usuario_has_resposta_model');
        $this->load->model('usuario_has_curso_model');
        $this->load->model('usuario_has_medalha_model');
        $this->load->model('usuario_has_trofeu_model');
        $this->load->helper('date');

        $data['nome'] = $this->session->userdata('nome');
        $data['ra'] = $this->session->userdata('ra');
        $data['title'] = "Projeto TFG - Home";
        $data['header'] = "Home";

        $datestring = '%d/%m/%Y - %H:%i:%s';
        $data['data'] = mdate($datestring,now());

        $data['conquista'] = $this->usuario_has_medalha_model->getConquistasMaisRecentes($data['ra']);

        $informacoes_estatistica = array(
            "exercicios_realizados" => $this->usuario_has_resposta_model->getTotalExerciciosRealizado($data['ra']),
            "exercicios_acertados" => $this->usuario_has_resposta_model->getTotalAcertos($data['ra']),
            "exercicios_acertados_primeira" => $this->usuario_has_resposta_model->getTotalAcertosDePrimeira($data['ra']),
            "exercicios_errados" => $this->usuario_has_resposta_model->getTotalErrados($data['ra']),
            "pontos" => $this->usuario_has_curso_model->getTotalPontosObtidos($data['ra']),
            "medalhas" =>$this->usuario_has_medalha_model->getTotalMedalhas($data['ra']),
            "trofeus" =>$this->usuario_has_trofeu_model->getTotalTrofeus($data['ra']),
        );

        $data['estatistica'] = $informacoes_estatistica;

        $this->load->view('commons/header', $data);
        $this->load->view('homealuno_view');
        $this->load->view('commons/footer');
    }
}
