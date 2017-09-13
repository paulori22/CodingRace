<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Aluno extends MY_Controller {

    public function __construct() {
        parent::__construct();

        $usuario = $this->session->userdata('tipo_usuario');
        if ($usuario == 0 || $usuario == null) {
            echo 'Você não tem permissão para entrar nessa página';
            die();
        } elseif ($usuario == 1 || $usuario == null) {
            echo 'Você não tem permissão para entrar nessa página';
            die();
        }
    }

    public function HomeAluno() {
        $data['nome'] = $this->session->userdata('nome');
        $data['ra'] = $this->session->userdata('ra');
        $data['title'] = "Projeto TFG - Home";
        $data['header'] = "Home";

        $this->load->view('commons/header', $data);
        $this->load->view('homealuno_view');
        $this->load->view('commons/footer');
    }

    public function Leaderboard() {
        $this->load->model('usuario_has_curso_model');
        $this->load->model('usuarios_model');
        $this->load->model('cursos_model');

        $data['nome'] = $this->session->userdata('nome');
        $data['ra'] = $this->session->userdata('ra');
        $data['title'] = "Projeto TFG - Leaderboard";

        if ($this->usuario_has_curso_model->QuantidadeCursosAluno($data['ra']) == 1) {

            $curso_PIN = $this->usuario_has_curso_model->CursosUsuario($data['ra'])[0]['Curso_PIN'];
            $data['curso'] = $this->cursos_model->GetByPIN($curso_PIN);
            $data['total_pontos_curso'] = $this->cursos_model->GetTotalPontosCurso($curso_PIN);

            $data['header'] = "Leaderboard - " . $data['curso']['Nome'];
            $data['alunos_curso'] = $this->usuario_has_curso_model->UsuariosCursoLeaderboard($curso_PIN);

            $this->load->view('commons/header', $data);
            $this->load->view('leaderboard/leaderboard');
            $this->load->view('commons/footer');
        } else {
            $data['header'] = "Escolha o curso que deseja ver o Leaderboard";
            $pin = $this->usuario_has_curso_model->CursosUsuario($data['ra']);
            $data['cursos'] = $this->cursos_model->GetBySomePIN($pin);

            $this->load->view('commons/header', $data);
            $this->load->view('leaderboard/cursos_view');
            $this->load->view('commons/footer');
        }
    }

    public function LeaderboardCurso($curso_PIN) {

        $this->load->model('usuario_has_curso_model');
        $this->load->model('usuarios_model');
        $this->load->model('cursos_model');

        $data['nome'] = $this->session->userdata('nome');
        $data['ra'] = $this->session->userdata('ra');
        $data['title'] = "Projeto TFG - Leaderboard";

        $data['curso'] = $this->cursos_model->GetByPIN($curso_PIN);
        $data['total_pontos_curso'] = $this->cursos_model->GetTotalPontosCurso($curso_PIN);

        $data['header'] = "Leaderboard - " . $data['curso']['Nome'];
        $data['alunos_curso'] = $this->usuario_has_curso_model->UsuariosCursoLeaderboard($curso_PIN);

        $this->load->view('commons/header', $data);
        $this->load->view('leaderboard/leaderboard');
        $this->load->view('commons/footer');
    }

    public function Minhas_Conquistas() {
        $this->load->model('usuario_has_curso_model');
        $this->load->model('usuarios_model');
        $this->load->model('cursos_model');
        $this->load->model('usuario_has_medalha_model');
        $this->load->model('usuario_has_trofeu_model');

        $data['nome'] = $this->session->userdata('nome');
        $data['ra'] = $this->session->userdata('ra');
        $data['title'] = "Projeto TFG - Minhas Conquistas";

        if ($this->usuario_has_curso_model->QuantidadeCursosAluno($data['ra']) == 1) {

            $curso_PIN = $this->usuario_has_curso_model->CursosUsuario($data['ra'])[0]['Curso_PIN'];
            $data['curso'] = $this->cursos_model->GetByPIN($curso_PIN);

            $data['header'] = "Minhas Conquistas - " . $data['curso']['Nome'];

            $data['medalhas'] = $this->usuario_has_medalha_model->getTodasMedalhas($data['ra'],$curso_PIN);

            $data['trofeus'] = $this->usuario_has_trofeu_model->getTodosTrofeus($data['ra'],$curso_PIN);


            $this->load->view('commons/header', $data);
            $this->load->view('minhas_conquistas/minhas_conquistas');
            $this->load->view('commons/footer');
        } else {
            $data['header'] = "Escolha o curso que deseja ver Minhas Conquistas";
            $pin = $this->usuario_has_curso_model->CursosUsuario($data['ra']);
            $data['cursos'] = $this->cursos_model->GetBySomePIN($pin);

            $this->load->view('commons/header', $data);
            $this->load->view('minhas_conquistas/cursos_view');
            $this->load->view('commons/footer');
        }
    }

    public function Minhas_ConquistasCurso($curso_PIN) {

        $this->load->model('usuario_has_curso_model');
        $this->load->model('usuarios_model');
        $this->load->model('cursos_model');
        $this->load->model('usuario_has_medalha_model');
        $this->load->model('usuario_has_trofeu_model');

        $data['nome'] = $this->session->userdata('nome');
        $data['ra'] = $this->session->userdata('ra');
        $data['title'] = "Projeto TFG - Minhas Conquistas";

        $data['curso'] = $this->cursos_model->GetByPIN($curso_PIN);
        
        $data['medalhas'] = $this->usuario_has_medalha_model->getTodasMedalhas($data['ra'],$curso_PIN);

        $data['trofeus'] = $this->usuario_has_trofeu_model->getTodosTrofeus($data['ra'],$curso_PIN);

        $data['header'] = "Minhas Conquistas - " . $data['curso']['Nome'];


        $this->load->view('commons/header', $data);
        $this->load->view('minhas_conquistas/minhas_conquistas');
        $this->load->view('commons/footer');
    }

    public function EditaUsuario($ra) {
        if ($ra == $this->session->userdata('ra')) {
            $this->load->model('usuarios_model');

            if (is_null($ra))
                redirect('usuarios_admin');

            $data['usuario'] = $this->usuarios_model->GetByRA($ra);

            $data['nome'] = $this->session->userdata('nome');
            $data['ra'] = $this->session->userdata('ra');
            $data['title'] = "Projeto TFG - Edita Usuário";
            $data['header'] = "Edita Usuário";

            /** Carrega a view */
            $this->load->view('commons/header', $data);
            $this->load->view('usuario/editarusuario_view');
            $this->load->view('commons/footer');
        }else {
            echo 'Você não tem permissão para editar outro usuário';
            die();
        }
    }

    public function AtualizaUsuario() {
        $this->load->model('usuarios_model');
        $validacao = self::Validar('editar_usuario');
        $ra = $this->input->post('ra');

        if ($validacao) {
            $nome = $this->input->post('nome');
            $email = $this->input->post('email');

            $dados_usuario = array(
                'Nome' => $nome,
                'Email' => $email,
            );

            $status = $this->usuarios_model->AtualizaUsuario($ra, $dados_usuario);

            if (!$status) {
                $this->session->set_flashdata('error', 'Não foi possível atualizar o usuário.');
                self::EditaUsuario($ra);
            } else {
                $this->session->set_flashdata('success', 'Usuário atualizado com sucesso.');
                redirect('home_aluno');
            }
        } else {
            self::EditaUsuario($ra);
        }
    }

    /** Funções CRUD para Cursos */

    /** Funções CRUD cursos cadastrados */
    public function CursosUsuario() {
        $this->load->model('usuario_has_curso_model');
        $this->load->model('cursos_model');

        $data['ra'] = $this->session->userdata('ra');
        $ra = $data['ra'];
        $data['nome'] = $this->session->userdata('nome');
        $data['title'] = "Projeto TFG - Minhas Disciplinas";
        $data['header'] = "Minhas Disciplinas";

        $pin = $this->usuario_has_curso_model->CursosUsuario($ra);
        $data['cursos'] = $this->cursos_model->GetBySomePIN($pin);

        $this->load->view('commons/header', $data);
        $this->load->view('curso/cursos_view');
        $this->load->view('commons/footer');
    }

    public function CadCursoUsuario() {
        $this->load->model('usuario_has_curso_model');
        $ra = $this->session->userdata('ra');
        $pin = $this->input->post('PIN');

        $dados_curso_cadastrado = array(
            'Usuario_RA' => $ra,
            'Curso_PIN' => $pin,
        );

        if (is_null($pin) || $pin == "") {
            echo "<script> window.alert('Favor inserir um curso')</script>";
            $this->CursosUsuario();
        } else {

            $validacurso = $this->usuario_has_curso_model->BuscaCursoCadastrado($ra, $pin);

            if ($validacurso) {
                $status = $this->usuario_has_curso_model->Inserir($dados_curso_cadastrado);
                if (!$status) {
                    echo "<script> window.alert('Não foi possível cadastrar o curso')</script>";
                    $this->CursosUsuario();
                } else {
                    echo "<script> window.alert('Curso cadastrado com sucesso')</script>";
                    $this->CursosUsuario();
                }
            } else {
                echo "<script> window.alert('Curso já cadastrado para esse usuário')</script>";
                $this->CursosUsuario();
            }
        }
    }

    public function ExcluiCursoUsuario($pin) {
        $this->load->model('usuario_has_curso_model');
        $ra = $this->session->userdata('ra');

        if (is_null($pin)) {
            $this->session->set_flashdata('error', 'Não foi possível excluir o curso.');
            redirect('cursoscadastrados_aluno');
        } else {
            $data[''] = $this->usuario_has_curso_model->ExcluirCursoCadastrado($pin, $ra);
            $this->session->set_flashdata('success', 'Curso excluído com sucesso.');
            redirect('cursoscadastrados_aluno');
        }
    }

    public function Topicos_Cursos($pin) {
        $this->load->model('usuario_has_curso_model');
        $this->load->model('usuarios_model');
        $this->load->model('curso_has_topico_model');
        $this->load->model('topicos_model');
        $this->load->model('exercicio_model');

        if (is_null($pin))
            redirect('cursoscadastrados_aluno');

        $idTopico = $this->curso_has_topico_model->TopicosCursos($pin);
        $data['topicos'] = $this->topicos_model->GetBySomeId($idTopico);

        $ids = array();
        foreach ($idTopico as $dados) {
            $ids[] = $dados['Topico_idTopico'];
        }

        // $data['exercicios_topicos'] = array();
        foreach ($data['topicos'] as $row) {

            $data['exercicios_topicos'][$row['Nome']] = $this->exercicio_model->GetListaExerciciosAlunoTopico($row['idTopico'], $this->session->userdata('ra'), $pin);
        }

        $this->session->set_userdata('Curso_PIN', $pin);

        $data['nome'] = $this->session->userdata('nome');
        $data['ra'] = $this->session->userdata('ra');
        $data['title'] = "Projeto TFG - Discplina ";
        $data['header'] = "Disciplina";

        /** Carrega a view */
        $this->load->view('commons/header', $data);
        $this->load->view('cursos_alunos/cursoaluno_view');
        $this->load->view('commons/footer');
    }

    /** FUnções para resolução do Exercício */
    public function ExerciciosTopico($idTopico) {
        $this->load->model('exercicio_model');
        $this->load->model('usuario_has_resposta_model');

        $data['exercicios'] = $this->exercicio_model->GetByTopicoOrderByBloom($idTopico);



        $data['nome'] = $this->session->userdata('nome');
        $data['ra'] = $this->session->userdata('ra');
        $data['title'] = "Projeto TFG - Exercícios ";
        $data['header'] = "Exercícios";

        /** Carrega a view */
        $this->load->view('commons/header', $data);
        $this->load->view('exercicio/exercicios_view');
        $this->load->view('commons/footer');
    }

    function RealizaExercicio($idExercicio) {
        $this->load->model('exercicio_model');
        $this->load->model('qme_model');
        $this->load->model('topicos_model');


        $data['exercicio'] = $this->exercicio_model->GetById($idExercicio);
        $data['alternativas'] = $this->qme_model->GetByIdExercicio($idExercicio);
        $data['topico'] = $this->topicos_model->GetById($data['exercicio']['Topico_idTopico']);

        $data['exercicios'] = $this->exercicio_model->GetListaExerciciosAlunoTopico($data['exercicio']['Topico_idTopico'], $this->session->userdata('ra'), $this->session->userdata('Curso_PIN'));

        $data['status']['green'] = 0;
        $data['status']['red'] = 0;

        $data['nome'] = $this->session->userdata('nome');
        $data['ra'] = $this->session->userdata('ra');
        $data['title'] = "Projeto TFG - Exercício";
        $data['header'] = "Exercício";

        /** Carrega a view */
        $this->load->view('commons/header', $data);
        $this->load->view('exercicio/realizaexercicio_view');
        $this->load->view('commons/footer');
    }

    public function ConfereExercicio($idExercicio) {
        $this->load->model('exercicio_model');
        $this->load->model('qme_model');
        $this->load->model('usuario_has_resposta_model');
        $this->load->model('usuario_has_curso_model');
        $this->load->model('curso_has_topico_model');
        $this->load->model('medalha_model');

        $opcao = $this->input->post('opcao');

        $exercicio = $this->exercicio_model->GetById($idExercicio);

        $alternativa = $this->qme_model->GetByIdExercicio($idExercicio);

        $ra = $this->session->userdata('ra');
        $curso_pin = $this->session->userdata('Curso_PIN');
        date_default_timezone_set('America/Sao_Paulo');
        $data_exercicio = date('Y/m/d H:i:s', time());

        if ($opcao == $alternativa['Alternativa']) {

            $dados_resposta = array(
                'Usuario_RA' => $ra,
                'Curso_PIN' => $curso_pin,
                'Exercicio_idExercicio' => $idExercicio,
                'Historico_Respostas' => $data_exercicio,
                'Dificuldade' => 1,
                'Resposta_Correta' => 1,
                'Resposta' => $opcao,
            );
            $status = $this->usuario_has_resposta_model->Inserir($dados_resposta);

            if (!$status) {
                $this->session->set_flashdata('error', 'Não foi possível inserir o histórico!');
                self::ExerciciosTopico($exercicio['Topico_idTopico']);
            } else {

                $tentativas = $this->usuario_has_resposta_model->GetTentativasExercicios($idExercicio, $ra, $curso_pin);
                $data['pontos'] = $this->usuario_has_curso_model->AdicionarPontosCursoAluno($exercicio['Pontos'], $ra, $curso_pin, $tentativas);

                $this->load->view('commons/modal_acertou_exercicio',$data);

                $this->session->set_flashdata('error', 'Histórico inserido com sucesso!');

                $this->verificaMedalhas($exercicio['Topico_idTopico']);

                $proximo_exercicio = $this->exercicio_model->GetProximoExercicio($idExercicio, $exercicio['Topico_idTopico']);
                
                if (is_null($proximo_exercicio)) {
                    self::Topicos_Cursos($curso_pin);
                } else {
                    self::RealizaExercicio($proximo_exercicio);
                }
            }
        } elseif(!is_null($opcao)) {

            $dados_resposta = array(
                'Usuario_RA' => $ra,
                'Curso_PIN' => $curso_pin,
                'Exercicio_idExercicio' => $idExercicio,
                'Historico_Respostas' => $data_exercicio,
                'Dificuldade' => 1,
                'Resposta' => $opcao,
            );
            $status = $this->usuario_has_resposta_model->Inserir($dados_resposta);
            if (!$status) {
                $this->session->set_flashdata('error', 'Não foi possível inserir o histórico!');
                self::RealizaExercicio($idExercicio);
            } else {

                $data['tentativas'] = $this->usuario_has_resposta_model->GetTentativasExercicios($idExercicio, $ra, $curso_pin);
                $this->load->view('commons/modal_errou_exercicio',$data);

                $this->session->set_flashdata('error', 'Histórico inserido com sucesso!');
                if($data['tentativas'] < 3)
                    self::RealizaExercicio($idExercicio);
                else{
                    $proximo_exercicio = $this->exercicio_model->GetProximoExercicio($idExercicio, $exercicio['Topico_idTopico']);

                    if (is_null($proximo_exercicio)) {
                        self::Topicos_Cursos($curso_pin);
                    } else {
                        self::RealizaExercicio($proximo_exercicio);
                    }

                }

            }
        }else{

            self::Topicos_Cursos($curso_pin);
        }
    }

    public function verificaMedalhas($id_topico) {
        $this->load->model('exercicio_model');
        $this->load->model('usuario_has_medalha_model');
        
        $ra = $this->session->userdata('ra');
        $pin = $this->session->userdata('Curso_PIN');

        if($id_topico==3 || $id_topico==4){

            if($this->exercicio_model->acertouPrimeiraQuestaoDoTopico($id_topico,$ra,$pin)){

                switch ($id_topico) {
                    case 3:
                        $idMedalha = 3;
                        break;
                    case 4:
                        $idMedalha = 4;
                        break;
                    default:
                        break;
                }
                date_default_timezone_set('America/Sao_Paulo');
                $data_conquista = date('Y/m/d H:i:s', time());
                $dados_medalha = array(
                    'Usuario_RA' => $ra,
                    'idMedalha' => $idMedalha,
                    'Data_Conquista' => $data_conquista,
                );
                $status = $this->usuario_has_medalha_model->Inserir($dados_medalha);
                if($status){
                    $data['conquista'] = $this->medalha_model->getMedalhaID($idMedalha);
                    $this->load->view('commons/modal_conquista',$data);
                }
            }
        }

        if ($this->exercicio_model->acertouTodosOsExerciciosDoTopico($id_topico, $ra, $pin)) {

            switch ($id_topico) {
                case 1:
                    $idMedalha = 1;
                    break;
                case 2:
                    $idMedalha = 2;
                    break;
                case 3:
                    $idMedalha = 9;
                    break;
                case 4:
                    $idMedalha = 5;
                    break;
                case 5:
                    $idMedalha = 10;
                    break;
                case 6:
                    $idMedalha = 6;
                    break;
                case 7:
                    $idMedalha = 7;
                    break;
                case 8:
                    $idMedalha = 8;
                    break;
                default:
                    $idMedalha = NULL;
                    break;
            }

            date_default_timezone_set('America/Sao_Paulo');
            $data_conquista = date('Y/m/d H:i:s', time());
            $dados_medalha = array(
                'Usuario_RA' => $ra,
                'idMedalha' => $idMedalha,
                'Data_Conquista' => $data_conquista,
            );
            $status = $this->usuario_has_medalha_model->Inserir($dados_medalha);
            if($status){
                $data['conquista'] = $this->medalha_model->getMedalhaID($idMedalha);
                $this->load->view('commons/modal_conquista',$data);
            }
        }

    }

    public function Validar($operacao) {
        if ($operacao == 'novo_usuario') {
            $this->form_validation->set_rules('ra', 'RA', 'required|is_unique[Usuario.RA]');
            $this->form_validation->set_rules('nome', 'Nome', 'required');
            $this->form_validation->set_rules('senha', 'Senha', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('confirmar_email', 'Confirmar Email', 'required|matches[email]');
            $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
        } elseif ($operacao == 'editar_usuario') {
            $this->form_validation->set_rules('ra', 'RA', 'required');
            $this->form_validation->set_rules('nome', 'Nome', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('confirmar_email', 'Confirmar Email', 'required|matches[email]');
            $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
        } elseif ($operacao == 'novo_curso') {
            $this->form_validation->set_rules('pin', 'PIN', 'required|is_unique[Curso.PIN]');
            $this->form_validation->set_rules('nome', 'Nome', 'required');
            $this->form_validation->set_rules('ano', 'Ano', 'required');
            $this->form_validation->set_rules('periodo', 'Periodo', 'required');
            $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
        } elseif ($operacao == 'editar_curso') {
            $this->form_validation->set_rules('pin', 'PIN', 'required');
            $this->form_validation->set_rules('nome', 'Nome', 'required');
            $this->form_validation->set_rules('ano', 'Ano', 'required');
            $this->form_validation->set_rules('periodo', 'Periodo', 'required');
            $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
        } elseif ($operacao == 'novo_topico') {
            $this->form_validation->set_rules('nome', 'Nome', 'required');
            $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
        } elseif ($operacao == 'editar_topico') {
            $this->form_validation->set_rules('nome', 'Nome', 'required');
            $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
        } elseif ($operacao == 'novo_exercicio') {
            $this->form_validation->set_rules('exercicio', 'Pergunta', 'required');
            $this->form_validation->set_rules('bloom', 'Categoria de Bloom', 'required');
            $this->form_validation->set_rules('tipo_exercicio', 'Tipo de Exercício', 'required');
            $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
        }

        return $this->form_validation->run();
    }

}
