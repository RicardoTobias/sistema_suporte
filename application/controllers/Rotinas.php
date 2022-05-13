<?php

defined('BASEPATH') or exit('Ação não permitida');

class Rotinas extends CI_Controller
{

    // Buscar a tabela do banco de dados
    public $tabela      = 'rotina';
    //
    public $tabelaFK_1  = 'agrupador_rotina';

    // ID da tabela
    public $idTabela    = 'id_rotina';

    // Definindo rota da página
    public $rota        = 'rotinas';

    // template
    private $template1 = 'template/layout_1';

    // Caminho da página na estrutura VIEW
    public $v_index     = 'rotinas/index';
    public $v_add       = 'rotinas/adicionar';
    public $v_edita     = 'rotinas/editar';
    public $v_visualizar= 'rotinas/visualizar';

    // Título e Descrição da página/rotina
    public $titulo      = 'Rotinas';
    public $descricao   = 'Rotinas do sistema';
    public $author      = 'Ricardo Santos Tobias';

    //
    public function __construct()
    {
        //
        parent::__construct();

        // Carregando Models
        $this->load->model('Core_Sistema_model');
        $this->load->model('Rotina_model');

        //
        if (!$this->ion_auth->logged_in()) {
            redirect('login', 'refresh');
        }

        // Esta rotina só é acessada com o perfil administrador
        if (!$this->ion_auth->in_group('admin')) {
            $this->session->set_flashdata('message', 'Seu usuário não tem permissão para acessar a rotina!');
            redirect('/');
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

            'url' => $this->rota,

            // Estilo da página
            'styles' => array(
                'public/vendor/datatables/dataTables.bootstrap4.min.css',
            ),

            // Scripts da página
            'scripts' => array(
                'public/vendor/datatables/jquery.dataTables.min.js',
                'public/vendor/datatables/dataTables.bootstrap4.min.js',
                'public/js/demo/datatables-demo.js'
            ),

            'alert' => array(
                'error'     => 'danger',
                'success'   => 'success',
                'delete'    => 'alert',
                'save'      => 'primary'
            ),

            // Recuperando dados do banco de dados
            'agrupador'     => $this->Core_Sistema_model->getAll('agrupador_rotina', array('D_E_L_E_T_' => NULL), 'nome_resumido ASC'),
            'listarDados'   => $this->Rotina_model->getAll(),

        );

        // Carregando a página principal
        $this->template->load($this->template1, $this->v_index, $data);
    }

    //
    public function adicionar()
    {

        // Setando o template
        $this->_set_template();

        // Chamando a função que valida os campos
        $this->_validaCampo();

        // Caso a validação tiver passado, será executado a rotina abaixo
        if ($this->form_validation->run()) {

            //
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

                // Scripts da página
                'scripts' => array(
                    'public/vendor/bootstrap/js/bootstrap.bundle.min.js',
                    'public/vendor/jquery-easing/jquery.easing.min.js',
                ),

                'tabelaFK_1' => $this->Core_Sistema_model->getAll('agrupador_rotina')

            );

            // Carregando a página principal
            $this->template->load($this->template1, $this->v_add, $data);
        }
    }

    //
    public function editar($id = null)
    {

        // Setando o template
        $this->_set_template();

        // Valida se o ID existe na tabela
        if (!$id || !$this->ion_auth->user($id)->row()) {

            $this->_retornaSessao('error');
            redirect($this->rota);
        } else {

            // Chamando a função que valida os campos
            $this->_validaCampo();
            $this->form_validation->set_rules('user_id', 'User ID', 'trim|integer|required');

            // Caso a validação tiver passado, será executado a rotina abaixo
            if ($this->form_validation->run()) {

                $user_id = $this->input->post('user_id');

                $new_data = array(
                    'username' => $this->input->post('username'),
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'company' => $this->input->post('company'),
                    'phone' => $this->input->post('phone')
                );

                $this->ion_auth->update($user_id, $new_data);

                //Update the groups user belongs to
                $groups = $this->input->post('groups');

                if (isset($groups) && !empty($groups)) {
                    $this->ion_auth->remove_from_group('', $user_id);
                    foreach ($groups as $group) {
                        $this->ion_auth->add_to_group($group, $user_id);
                    }
                }

                $this->session->set_flashdata('message', $this->ion_auth->messages());

                redirect($this->rota);
            } else {

                // A rotina abaixo é para visualizar os dados a serem editados
                $data = array(

                    //Retorna título e descrição da página
                    'titulo'    => $this->titulo,
                    'descricao' => 'Editando perfil de ' . $this->descricao,

                    // Estilo da página
                    'styles' => array(
                        'public/css/bootstrap-select.css'
                    ),

                    // Scripts da página
                    'scripts' => array(
                        'public/vendor/jquery-easing/jquery.easing.min.js',
                        'public/js/bootstrap-select.js'
                    ),

                    'groups'                        => $this->ion_auth->groups()->result(),
                    'usergroups'                    => array(),
                    'dados'                         => $this->ion_auth->user((int) $id)->row(),

                );

                if ($usergroups = $this->ion_auth->get_users_groups($id)->result()) {
                    foreach ($usergroups as $group) {
                        $data['usergroups'][] = $group->id;
                    }
                }

                //$this->debug($data['dados']);

                // Carregando a página principal
                $this->template->load($this->template1, $this->v_edita, $data);
            }
        }
    }

    //
    public function visualizar($id = null)
    {

        // Setando o template
        $this->_set_template();

        // Valida se o ID existe na tabela
        if (!$id || !$this->ion_auth->user($id)->row()) {

            $this->_retornaSessao('error');
            redirect($this->rota);
        } else {


            // A rotina abaixo é para visualizar os dados a serem editados
            $data = array(

                //Retorna título e descrição da página
                'titulo'    => $this->titulo,
                'descricao' => 'Visualizando perfil de ' . $this->descricao,

                // Estilo da página
                'styles' => array(
                    'public/css/bootstrap-select.css'
                ),

                // Scripts da página
                'scripts' => array(
                    'public/vendor/jquery-easing/jquery.easing.min.js',
                    'public/js/bootstrap-select.js'
                ),

                'usergroups'                    => $this->ion_auth->get_users_groups($id)->result(),
                'dados'                         => $this->ion_auth->user((int) $id)->row(),

            );

            //$this->debug($data['dados']);

            // Carregando a página principal
            $this->template->load($this->template1, $this->v_visualizar, $data);

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
    private function _validaCampo()
    {

        // Definindo regras de validação
        $this->form_validation->set_rules('rotina', 'rotina', 'trim|required');
        $this->form_validation->set_rules('evento', 'evento', 'trim');
        $this->form_validation->set_rules('caminho_rotina', 'caminho da rotina', 'trim');
        $this->form_validation->set_rules('funcao', 'função/programa', 'trim');
        $this->form_validation->set_rules('agrupador_rotina_id', '', 'trim|required');
    }

    //
    private function _camposTabelas()
    {

        //
        $data = [
            'agrupador_rotina_id' => $this->input->post('agrupador_rotina_id'),
            'rotina' => $this->input->post('rotina'),
            'evento' => $this->input->post('evento'),
            'funcao' => $this->input->post('funcao'),
            'caminho_rotina' => $this->input->post('caminho_rotina')
        ];

        return $data;
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
                return $this->session->set_flashdata('success', 'Registro incluído/alterado com sucesso');
                break;
        }
    }

    private function debug($data = array())
    {
        echo "<pre>";
        print_r($data);
        exit();

        return;
    }
}
