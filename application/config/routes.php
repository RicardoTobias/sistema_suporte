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

$route['default_controller']                    = 'home';

$route['404_override']                          = '';
$route['translate_uri_dashes']                  = FALSE;

//Complemento Cadastral
$route['complemento-cadastral']                 = 'ComplementoCadastral/index';
$route['complemento-cadastral/filtrar-dados']   = 'ComplementoCadastral/filtrarDados';
$route['complemento-cadastral/editar/(:num)']   = 'ComplementoCadastral/editar/$1';
$route['complemento-cadastral/excluir/(:num)']  = 'ComplementoCadastral/delete_recupera/$1';
$route['complemento-cadastral/ativar/(:num)']   = 'ComplementoCadastral/delete_recupera/$1';

// Estabelecimentos
$route['estabelecimentos']                      = 'Estabelecimento/index';
$route['estabelecimentos/filtrar-dados']        = 'Estabelecimento/filtrarDados';
$route['estabelecimentos/editar/(:num)']        = 'Estabelecimento/editar/$1';
$route['estabelecimentos/excluir/(:num)']       = 'Estabelecimento/delete_recupera/$1';
$route['estabelecimentos/ativar/(:num)']        = 'Estabelecimento/delete_recupera/$1';

// Admissão Preliminar
$route['admissao-preliminar']                   = 'AdmissaoPreliminar/index';
$route['admissao-preliminar/filtrar-dados']     = 'AdmissaoPreliminar/filtrarDados';
$route['admissao-preliminar/editar/(:num)']     = 'AdmissaoPreliminar/editar/$1';
$route['admissao-preliminar/excluir/(:num)']    = 'AdmissaoPreliminar/delete_recupera/$1';
$route['admissao-preliminar/ativar/(:num)']     = 'AdmissaoPreliminar/delete_recupera/$1';

// Identificador de Rubrica
$route['identificador-rubricas']                = 'IdentificadorRubricas/index';
$route['identificador-rubricas/filtrar-dados']  = 'IdentificadorRubricas/filtrarDados';
$route['identificador-rubricas/editar/(:num)']  = 'IdentificadorRubricas/editar/$1';
$route['identificador-rubricas/excluir/(:num)'] = 'IdentificadorRubricas/delete_recupera/$1';
$route['identificador-rubricas/ativar/(:num)']  = 'IdentificadorRubricas/delete_recupera/$1';

// Código de Lotação Tributária
$route['lotacao-tributaria']                    = 'Lotacao/index';
$route['lotacao-tributaria/filtrar-dados']      = 'Lotacao/filtrarDados';
$route['lotacao-tributaria/editar/(:num)']      = 'Lotacao/editar/$1';
$route['lotacao-tributaria/excluir/(:num)']     = 'Lotacao/delete_recupera/$1';
$route['lotacao-tributaria/ativar/(:num)']      = 'Lotacao/delete_recupera/$1';

// Rubricas
$route['rubricas']                              = 'Rubricas/index';
$route['rubricas/filtrar-dados']                = 'Rubricas/filtrarDados';
$route['rubricas/editar/(:num)']                = 'Rubricas/editar/$1';
$route['rubricas/excluir/(:num)']               = 'Rubricas/delete_recupera/$1';
$route['rubricas/ativar/(:num)']                = 'Rubricas/delete_recupera/$1';

/** BANCO DE DADOS PERSONALIZADO */
// Categorias
$route['categorias']                            = 'Categorias/index';
$route['categorias/adicionar']                  = 'Categorias/adicionar';
$route['categorias/editar/(:num)']              = 'Categorias/editar/$1';
$route['categorias/excluir/(:num)']             = 'Categorias/delete_recupera/$1';
$route['categorias/ativar/(:num)']              = 'Categorias/delete_recupera/$1';

// Menu
$route['menu']                                  = 'Menu/index';
$route['menu/adicionar']                        = 'Menu/adicionar';
$route['menu/editar/(:num)']                    = 'Menu/editar/$1';
$route['menu/excluir/(:num)']                   = 'Menu/delete_recupera/$1';
$route['menu/ativar/(:num)']                    = 'Menu/delete_recupera/$1';

// Usuários
$route['usuarios']                              = 'Usuarios/index';
$route['usuarios/adicionar']                    = 'Usuarios/adicionar';
$route['usuarios/editar/(:num)']                = 'Usuarios/editar/$1';
$route['usuarios/visualizar/(:num)']            = 'Usuarios/visualizar/$1';
$route['usuarios/excluir/(:num)']               = 'Usuarios/delete/$1';

// Login
$route['login']                                 = 'Auth/login';
$route['logout']                                = 'Auth/logout';

// Agrupador de rotinas
$route['agrupador-de-rotinas']                  = 'AgrupadorRotinas/index';
$route['agrupador-de-rotinas/adicionar']        = 'AgrupadorRotinas/adicionar';
$route['agrupador-de-rotinas/editar/(:num)']    = 'AgrupadorRotinas/editar/$1';
$route['agrupador-de-rotinas/excluir/(:num)']   = 'AgrupadorRotinas/delete_recupera/$1';
$route['agrupador-de-rotinas/ativar/(:num)']    = 'AgrupadorRotinas/delete_recupera/$1';
$route['agrupador-de-rotinas/registros_inativos'] = 'AgrupadorRotinas/registros-inativos';

// Rotinas
$route['rotinas']                               = 'Rotinas/index';
$route['rotinas/adicionar']                     = 'Rotinas/adicionar';
$route['rotinas/editar/(:num)']                 = 'Rotinas/editar/$1';

// Artigos
$route['artigos']                               = 'Artigos/index';
$route['artigos/adicionar']                     = 'Artigos/adicionar';
$route['artigos/editar/(:num)']                 = 'Artigos/editar/$1';

// Issues
$route['issues']                                = 'Issues/index';
$route['issues/adicionar']                      = 'Issues/adicionar';
$route['issues/editar/(:num)']                  = 'Issues/editar/$1';

// Procedimentos
$route['procedimentos']                         = 'Procedimentos/index';
$route['procedimentos/adicionar']               = 'Procedimentos/adicionar';
$route['procedimentos/editar/(:num)']           = 'Procedimentos/editar/$1';

// Processos
$route['processos']                             = 'Processos/index';
$route['processos/adicionar']                   = 'Processos/adicionar';
$route['processos/editar/(:num)']               = 'Processos/editar/$1';

$route['email'] = 'Sendingemail_Controller';