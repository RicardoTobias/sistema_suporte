<?php

defined('BASEPATH') or exit('Ação não permitida');

class Menu extends CI_Controller
{

    // Buscar a tabela do banco de dados
    public $tabela      = 'Menu';
    public $tabelaFK_1  = 'Categorias';

    // ID da tabela
    public $idTabela    = 'ID_Menu';
    
    // Definindo rota da página
    public $rota        = 'menu';

    // Caminho da página na estrutura VIEW
    public $v_index     = 'menu/index';
    public $v_add       = 'menu/adicionar';
    public $v_edita     = 'menu/editar';

    // Título e Descrição da página/rotina
    public $titulo      = 'Menu';

    public $descricao   = 'Menu';

    public $author      = 'Ricardo Santos Tobias';

    //
    public function __construct()
    {
        parent::__construct();

        // Carregando MODEL's
        $this->load->model('Core_Sistema_model');
        $this->load->model('Menu_model');

        if (!$this->ion_auth->logged_in()) {
            //redirect them to the login page
            redirect('login', 'refresh');
        }

    }

    //
    public function camposTabelas()
    {

        //
        $data = [
            'ID_Menu'           => $this->input->post('ID_Menu'),
            'Menu'              => $this->input->post('Menu'),
            'Link'              => $this->input->post('Link'),
            'MenuCategoriaID'   => $this->input->post('MenuCategoriaID'),
            'Ativo'             => $this->input->post('Ativo'),
        ];

        return $data;
    }

    //
    public function validaCampo()
    {

        // Definindo regras de validação
        $this->form_validation->set_rules('ID_Menu',        '', 'trim');
        $this->form_validation->set_rules('Menu',           '', 'trim');
        $this->form_validation->set_rules('Link',           '', 'trim');
        $this->form_validation->set_rules('MenuCategoriaID','', 'trim');
        $this->form_validation->set_rules('Ativo',          '', 'trim');
    }

    //
    public function index()
    {

        // Setando o template
        $this->template->set('titulo',      $this->titulo);
        $this->template->set('descricao',   $this->descricao);
        $this->template->set('author',      $this->author);

        // 
        $data = array(

            // Titulo e descrição da página
            'titulo'    => $this->titulo,
            'descricao' => $this->descricao,
            'nomeTabela' => $this->tabela,

            'url' => $this->rota,

            // Estilo da página
            'styles' => array(
                'public/vendor/fontawesome-free/css/all.min.css',
                'public/css/sb-admin-2.min.css',
                'public/vendor/datatables/dataTables.bootstrap4.min.css',
                'public/css/styles.css'
            ),

            // Scripts da página
            'scripts' => array(
                'public/vendor/jquery/jquery.min.js',
                'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js',
                'public/vendor/bootstrap/js/bootstrap.bundle.min.js',
                'public/vendor/jquery-easing/jquery.easing.min.js',
                'public/js/sb-admin-2.min.js',
                'public/vendor/datatables/jquery.dataTables.min.js',
                'public/vendor/datatables/dataTables.bootstrap4.min.js',
                'public/js/demo/datatables-demo.js',
                'public/js/app.js'
            ),

            // BreadCrumb
            'breadcrumb' => array(
                'Início'                    => '/',
                'Menu'                      => $this->rota
            ),

            'alert' => array(
                'error'     => 'danger',
                'success'   => 'success',
                'delete'    => 'alert',
                'save'      => 'primary'
            ),

            // Recuperando dados do banco de dados
            'listarDados'   => $this->Menu_model->getAll(),

            //Verificando se as opções de filtro estão ativos
            'filtro'        => FALSE

        );

        // Carregando a página principal
        $this->template->load('template/layout_1', $this->v_index, $data);
    }

    //
    public function adicionar()
    {

        // Setando o template
        $this->template->set('titulo', $this->titulo);
        $this->template->set('descricao', $this->descricao);
        $this->template->set('author', $this->author);

        // Chamando a função que valida os campos
        $this->validaCampo();

        // Caso a validação tiver passado, será executado a rotina abaixo
        if ($this->form_validation->run()) {

            // Recuperando Dados Digitados no Formulário
            $data = $this->camposTabelas();

            // Caso tiver algum valor Nulo, será removido do array para não validar no banco de dados
            foreach ($data as $key => $val) {
                if ($val == NULL) {
                    unset($data[$key]);
                }
            }

            // Sanitizando os dados
            $data = html_escape($data);

            // Chamando a função para alterar os dados da tabela
            $this->Core_Sistema_model->insert($this->tabela, $data);

            // redireciona a página principal
            $this->retornaSessao('success');
            redirect($this->rota);

        } else {

            // A rotina abaixo é para visualizar os dados a serem editados
            $data = array(

                //Retorna título e descrição da página
                'titulo'        => 'Alterar dados ' . $this->titulo,
                'descricao'     => $this->descricao,
                'nomeTabela'    => $this->tabela,

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
                    'Início' => '/',
                    'Categoria Menu' => $this->rota,
                    'Adicionar Menu' => $this->rota
                ),

                'tabelaFK_1'        => $this->Core_Sistema_model->getAll($this->tabelaFK_1)

            );


            // Carregando a página principal
            $this->template->load('template/layout_1', 'menu/adicionar', $data);
        }
    }

    //
    public function editar($id = null)
    {

        // Setando o template
        $this->template->set('titulo', $this->titulo);
        $this->template->set('descricao', $this->descricao);
        $this->template->set('author', $this->author);

        // Valida se o ID existe na tabela
        if (!$id || !$this->Core_Sistema_model->getByID($this->tabela, array($this->idTabela => $id))) {

            $this->retornaSessao('error');
            redirect($this->rota);

        } else {

            // Chamando a função que valida os campos
            $this->validaCampo();

            // Caso a validação tiver passado, será executado a rotina abaixo
            if ($this->form_validation->run()) {

                // Recuperando Dados Digitados no Formulário
                $data = $this->camposTabelas();

                // Caso tiver algum valor Nulo, será removido do array para não validar no banco de dados
                foreach ($data as $key => $val) {
                    if ($val == NULL) {
                        unset($data[$key]);
                    }
                }

                // Sanitizando os dados
                $data = html_escape($data);

                // Chamando a função para alterar os dados da tabela
                $this->Core_Sistema_model->update($this->tabela, $data, array($this->idTabela => $id));

                // redireciona a página principal
                $this->retornaSessao('success');
                redirect($this->rota);

            } else {

                // A rotina abaixo é para visualizar os dados a serem editados
                $data = array(

                    //Retorna título e descrição da página
                    'titulo'                => 'Alterar dados ' . $this->titulo,
                    'descricao'             => $this->descricao,
                    'nomeTabela'            => $this->tabela,

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
                    'breadcrumb'        => array(
                        'Início'        => '/',
                        'Menu'          => $this->rota,
                        'Editar Menu'   => $this->rota
                    ),

                    'tabelaFK_1'        => $this->Core_Sistema_model->getAll($this->tabelaFK_1),

                    'dados'             => $this->Menu_model->getByID($this->tabela, array($this->idTabela => $id))
                    
                );

                // Carregando a página principal
                $this->template->load('template/layout_1', 'menu/editar', $data);

            }
        }
    }

    //
    public function delete_recupera($id = null)
    {

        // Valida se o ID existe na tabela
        if (!$id || !$this->Core_Sistema_model->getByID($this->tabela, array($this->idTabela => $id))) {

            $this->retornaSessao('error');
            redirect($this->rota);

        } else {

            // Recuperando Dados Digitados no Formulário
            $data = elements(
                'D_E_L_E_T_',
                $this->input->post()
            );

            // Sanitizando os Dados
            $data = html_escape($data);

            // Atualizando os Registros
            $this->Core_Sistema_model->update($this->tabela, $data, array($this->idTabela => $id));

            // Sessões
            // Operador ternário
            ($data['D_E_L_E_T_'] == '*') ?
                $this->retornaSessao('delete') :
                $this->retornaSessao('save');

            //
            redirect($this->rota);
        }
    }

    //
    public function filtrarDados()
    {

        $data = $this->camposTabelas();

        foreach ($data as $key => $val) {
            if ($val == NULL) {
                unset($data[$key]);
            }
        }

        $data = html_escape($data);

        $dataFilter = array(

            //Retorna título e descrição da página
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,

            //Recuperando dados do banco de dados
            'listarDados' => $this->Core_model->getAll($this->tabela, $data),

            //Verificando se as opções de filtro estão ativos
            'filtro' => TRUE

        );

        $this->load->view($this->v_index, $dataFilter);
    }

    

    //
    private function retornaSessao($data = null)
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
