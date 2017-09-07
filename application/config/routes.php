<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = 'Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/** Rota Novo Usuário */

$route['new_user'] = 'Login/NovoUsuario';

/** Rotas para Admin */

/** Rotas Home */
$route['home_admin'] = 'Admin/HomeAdmin';

/** Rotas Usuários */
$route['usuarios_admin'] = 'Admin/Usuarios';
$route['editarusuario_admin/(:num)'] = 'Admin/EditaUsuario/$1';
$route['excluirusuario_admin/(:num)'] = 'Admin/ExcluiUsuario/$1';
$route['salvarusuario_admin'] = 'Admin/CadUsuario';
$route['atualizarusuario_admin'] = 'Admin/AtualizaUsuario';

/** Rotas Cursos */
$route['cursos_admin'] = 'Admin/Cursos';
$route['editarcurso_admin/(:num)'] = 'Admin/EditaCurso/$1';
$route['excluircurso_admin/(:num)'] = 'Admin/ExcluiCurso/$1';
$route['salvarcurso_admin'] = 'Admin/CadCurso';
$route['atualizarcurso_admin'] = 'Admin/AtualizaCurso';

/** Rotas Tópicos */
$route['topicos_admin'] = 'Admin/Topicos';
$route['editartopico_admin/(:num)'] = 'Admin/EditaTopico/$1';
$route['excluirtopico_admin/(:num)'] = 'Admin/ExcluiTopico/$1';
$route['salvartopico_admin'] = 'Admin/CadTopico';
$route['adicionartopicocurso_admin/(:num)'] = 'Admin/CadTopicoCurso/$1';
$route['excluirtopicocurso_admin/(:num)/(:num)'] = 'Admin/ExcluiTopicoCurso/$1/$2';
$route['atualizartopico_admin'] = 'Admin/AtualizaTopico';

/** Rotas para Exercícios */
$route['salvarexercicio_admin/(:num)'] = 'Admin/CadExercicio/$1';
$route['excluirexercicio_admin/(:num)/(:num)'] = 'Admin/ExcluiExercicioTopico/$1/$2';
$route['editarexercicio_admin/(:num)'] = 'Admin/EditaExercicio/$1';
$route['atualizarexercicio_admin/(:num)/(:num)'] = 'Admin/AtualizaExercicio/$1/$2';

/** Rotas para Professores */

/** Rotas Home */
$route['home_professor'] = 'Professor/HomeProfessor';

/** Rotas Usuários */
$route['editarusuario_professor/(:num)'] = 'Professor/EditaUsuario/$1';
$route['atualizarusuario_professor'] = 'Professor/AtualizaUsuario';

/** Rotas Cursos */
$route['cursos_professor'] = 'Professor/Cursos';
$route['editarcurso_professor/(:num)'] = 'Professor/EditaCurso/$1';
$route['atualizarcurso_professor'] = 'Professor/AtualizaCurso';

/** Rotas para cursos de usuario */
$route['cursoscadastrados_professor'] = 'Professor/CursosUsuario';
$route['cadastracursos_professor'] = 'Professor/CadCursoUsuario';
$route['excluircursousuario_professor/(:num)'] = 'Professor/ExcluiCursoUsuario/$1';


/** Rotas Tópicos */
$route['topicos_professor'] = 'Professor/Topicos';
$route['editartopico_professor/(:num)'] = 'Professor/EditaTopico/$1';
$route['excluirtopico_professor/(:num)'] = 'Professor/ExcluiTopico/$1';
$route['salvartopico_professor'] = 'Professor/CadTopico';
$route['adicionartopicocurso_professor/(:num)'] = 'Professor/CadTopicoCurso/$1';
$route['excluirtopicocurso_professor/(:num)/(:num)'] = 'Professor/ExcluiTopicoCurso/$1/$2';
$route['atualizartopico_professor'] = 'Professor/AtualizaTopico';

/** Rotas para Exercícios */
$route['salvarexercicio_professor/(:num)'] = 'Professor/CadExercicio/$1';
$route['excluirexercicio_professor/(:num)/(:num)'] = 'Professor/ExcluiExercicioTopico/$1/$2';
$route['editarexercicio_professor/(:num)'] = 'Professor/EditaExercicio/$1';
$route['atualizarexercicio_professor/(:num)/(:num)'] = 'Professor/AtualizaExercicio/$1/$2';

/** Rotas para Alunos */

/** Rotas para edição de usuários */
$route['editarusuario_aluno/(:num)'] = 'Aluno/EditaUsuario/$1';
$route['atualizarusuario_aluno'] = 'Aluno/AtualizaUsuario';

/** Rotas Home */
$route['home_aluno'] = 'Aluno/HomeAluno';

/** Rotas Cursos */
$route['cursos_aluno'] = 'Aluno/CursosUsuario';
$route['realizacurso_aluno/(:num)'] = 'Aluno/Topicos_Cursos/$1';

/** Rota Leaderboard */

$route['leaderboard'] = 'Aluno/Leaderboard';
$route['leaderboard_curso/(:num)'] = 'Aluno/LeaderboardCurso/$1';

/** Rota Conquistas */

$route['minhas_conquistas'] = 'Aluno/Minhas_Conquistas';
$route['minhas_conquistas/(:num)'] = 'Aluno/Minhas_ConquistasCurso/$1';

/** Rotas para cursos de usuario */
$route['cadastracursos_aluno'] = 'Aluno/CadCursoUsuario';
$route['excluircursousuario_aluno/(:num)'] = 'Aluno/ExcluiCursoUsuario/$1';

/** Rotas para realizar exercicio Tópicos Aluno */
$route['realizartopico_aluno/(:num)'] = 'Aluno/ExerciciosTopico/$1';

/** Rotas para realizar exercicios */
$route['realizaexercicio_aluno/(:num)'] = 'Aluno/RealizaExercicio/$1';
$route['confereexercicio_aluno/(:num)'] = 'Aluno/ConfereExercicio/$1';

/** Rota Logout */
$route['logout'] = 'Login/Logout';
