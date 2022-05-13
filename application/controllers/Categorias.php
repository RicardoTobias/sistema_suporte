<?php

defined('BASEPATH') or exit('Ação não permitida');

class Categorias extends CI_Controller
{

    // Buscar a tabela do banco de dados
    public $tabela      = 'Categorias';

    // ID da tabela
    public $idTabela    = 'ID_Categoria';

    // Definindo rota da página
    public $rota        = 'categorias';

    // template
    private $template1 = 'template/layout_1';

    // Caminho da página na estrutura VIEW
    public $v_index     = 'Categorias/index';
    public $v_add       = 'Categorias/adicionar';
    public $v_edita     = 'Categorias/editar';

    // Título e Descrição da página/rotina
    public $titulo      = 'Categoria para o menu';
    public $descricao   = 'Categorias dos menus';
    public $author      = 'Ricardo Santos Tobias';

    //
    public function __construct()
    {
        parent::__construct();

        // Carregando MODEL's
        $this->load->model('Core_Sistema_model');

        //
        if (!$this->ion_auth->logged_in()) {
            //redirect them to the login page
            redirect('login', 'refresh');
        }

    }

    //
    public function index()
    {

        $this->_set_template();

        // 
        $data = array(

            // Titulo e descrição da página
            'titulo'    => $this->titulo,
            'descricao' => $this->descricao,
            'nomeTabela' => $this->tabela,

            'url' => $this->rota,

            // Estilo da página
            'styles' => array(
                'public/vendor/datatables/dataTables.bootstrap4.min.css'
            ),

            // Scripts da página
            'scripts' => array(
                'public/vendor/datatables/jquery.dataTables.min.js',
                'public/vendor/datatables/dataTables.bootstrap4.min.js',
                'public/js/demo/datatables-demo.js',
                'public/js/app.js'
            ),

            'alert' => array(
                'error'     => 'danger',
                'success'   => 'success',
                'delete'    => 'alert',
                'save'      => 'primary'
            ),

            // Recuperando dados do banco de dados
            'listarDados'   => $this->Core_Sistema_model->getAll($this->tabela),

            //Verificando se as opções de filtro estão ativos
            'filtro' => FALSE

        );

        // Carregando a página principal
        $this->template->load($this->template1, $this->v_index, $data);
    }

    //
    public function adicionar()
    {

        $this->_set_template();

        // Chamando a função que valida os campos
        $this->_validaCampo();

        // Caso a validação tiver passado, será executado a rotina abaixo
        if ($this->form_validation->run()) {

            // Recuperando Dados Digitados no Formulário
            $data = $this->_camposTabelas();

            // Sanitizando os dados
            $data = html_escape($data);

            // Chamando a função para alterar os dados da tabela
            $this->Core_Sistema_model->insert($this->tabela, $data);

            // redireciona a página principal
            $this->_retornaSessao('success');
            redirect($this->rota);

        } else {

            // A rotina abaixo é para visualizar os dados a serem editados
            $data = array(

                //Retorna título e descrição da página
                'titulo'    => 'Alterar dados ' . $this->titulo,
                'descricao' => $this->descricao,
                'nomeTabela' => $this->tabela,

                // Estilo da página
                'styles' => array(
                    'public/vendor/fontawesome-free/css/all.min.css',
                    'public/css/sb-admin-2.min.css',
                    'public/css/styles.css'
                ),

                // Scripts da página
                'scripts' => array(
                    'public/vendor/jquery/jquery.min.js',
                    'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js',
                    'public/vendor/bootstrap/js/bootstrap.bundle.min.js',
                    'public/vendor/jquery-easing/jquery.easing.min.js',
                    'public/js/sb-admin-2.min.js',
                    'public/js/app.js'
                ),

                // BreadCrumb
                'breadcrumb' => array(
                    'Início'                => '/',
                    'Categoria Menu'   => $this->rota,
                    'Adicionar Categoria Menu' => $this->rota
                )

            );


            // Carregando a página principal
            $this->template->load($this->template1, $this->v_add, $data);
        }
    }

    //
    public function editar($id = null)
    {

        $this->_set_template();

        // Valida se o ID existe na tabela
        if (!$id || !$this->Core_Sistema_model->getByID($this->tabela, array($this->idTabela => $id))) {

            $this->_retornaSessao('error');
            redirect($this->rota);

        } else {

            // Chamando a função que valida os campos
            $this->_validaCampo();

            // Caso a validação tiver passado, será executado a rotina abaixo
            if ($this->form_validation->run()) {

                // Recuperando Dados Digitados no Formulário
                $data = $this->_camposTabelas();

                // Sanitizando os dados
                $data = html_escape($data);

                // Chamando a função para alterar os dados da tabela
                $this->Core_Sistema_model->update($this->tabela, $data, array($this->idTabela => $id));

                // redireciona a página principal
                $this->_retornaSessao('success');
                redirect($this->rota);

            } else {

                // A rotina abaixo é para visualizar os dados a serem editados
                $data = array(

                    //Retorna título e descrição da página
                    'titulo'    => 'Alterar dados ' . $this->titulo,
                    'descricao' => $this->descricao,
                    'nomeTabela' => $this->tabela,

                    // Estilo da página
                    'styles' => array(
                        'public/vendor/fontawesome-free/css/all.min.css',
                        'public/css/sb-admin-2.min.css',
                        'public/css/styles.css'
                    ),

                    // Scripts da página
                    'scripts' => array(
                        'public/vendor/jquery/jquery.min.js',
                        'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js',
                        'public/vendor/bootstrap/js/bootstrap.bundle.min.js',
                        'public/vendor/jquery-easing/jquery.easing.min.js',
                        'public/js/sb-admin-2.min.js',
                        'public/js/app.js'
                    ),

                    'dados' => $this->Core_Sistema_model->getByID($this->tabela, array($this->idTabela => $id))
                );

                // Carregando a página principal
                $this->template->load($this->template1, $this->v_edita, $data);
                
            }
        }
    }

    //
    private function _set_template()
    {
        // Setando o template
        $this->template->set('titulo',      $this->titulo);
        $this->template->set('descricao',   $this->descricao);
        $this->template->set('author',      $this->author);
    }

    //
    private function _camposTabelas()
    {

        //
        $data = [
            'ID_Categoria'      => $this->input->post('ID_Categoria'),
            'MenuCategoria'     => $this->input->post('MenuCategoria'),
            'Ativo'             => $this->input->post('Ativo'),
        ];

        return $data;
    }

    //
    private function _validaCampo()
    {

        // Definindo regras de validação
        $this->form_validation->set_rules('ID_Categoria',   '', 'trim');
        $this->form_validation->set_rules('MenuCategoria',  '', 'trim');
        $this->form_validation->set_rules('Ativo',          '', 'trim');
    }

    //
    private function _retornaSessao($data = null)
    {

        switch ($data) {

            case ($data == 'delete'):
                return $this->session->set_flashdata('delete', 'Registro excluído com sucesso!');
                break;

            case ($data == 'save'):
                return $this->session->set_flashdata('save', 'Registro recuperado com sucesso!');
                break;

            case ($data == 'error'):
                return $this->session->set_flashdata('error', 'Registro não encontrado');
                break;

            case ($data == 'success'):
                return $this->session->set_flashdata('success', 'Registro alterado com sucesso');
                break;
        }
    }
    
}
