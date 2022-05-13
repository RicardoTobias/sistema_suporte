<?php

defined('BASEPATH') or exit('Ação não permitida');

class Usuarios extends CI_Controller
{

    // Definindo rota da página
    public $rota        = 'usuarios';

    // template
    private $template1 = 'template/layout_1';

    // Caminho da página na estrutura VIEW
    public $v_index     = 'usuarios/index';
    public $v_add       = 'usuarios/adicionar';
    public $v_edita     = 'usuarios/editar';
    public $v_visualizar= 'usuarios/visualizar';

    // Título e Descrição da página/rotina
    public $titulo      = 'Usuários';
    public $descricao   = 'Usuários do sistema';
    public $author      = 'Ricardo Santos Tobias';

    //
    public function __construct()
    {
        //
        parent::__construct();

        // Carregando as bibliotecas PHP
        $this->load->library('session');

        if (!$this->ion_auth->logged_in()) {
            //redirect them to the login page
            redirect('login', 'refresh');
        }

        if (!$this->ion_auth->in_group('admin')) {
            $this->session->set_flashdata('message', 'You must be a gangsta OR a hoodrat to view this page');
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
                'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js',
                'public/vendor/jquery-easing/jquery.easing.min.js',
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
            'listarDados'   => $this->ion_auth->users()->result(),

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

        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'senha', 'required');
        $this->form_validation->set_rules('password_confirm', 'confirmação de senha', 'required|matches[password]');

        // Caso a validação tiver passado, será executado a rotina abaixo
        if ($this->form_validation->run()) {

            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $group_ids = $this->input->post('groups');

            $additional_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'username' => $this->input->post('username'),
                'company' => $this->input->post('company'),
                'phone' => $this->input->post('phone')
            );

            //$this->debug($this->input->post());

            $this->ion_auth->register($username, $password, $email, $additional_data, $group_ids);

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

                'groups' => $this->ion_auth->groups()->result()

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

                    'groups' => $this->ion_auth->groups()->result(),
                    'usergroups' => array(),
                    'dados' => $this->ion_auth->user((int) $id)->row(),

                );

                if ($usergroups = $this->ion_auth->get_users_groups($id)->result()) {
                    foreach ($usergroups as $group) {
                        $data['usergroups'][] = $group->id;
                    }
                }

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

                'usergroups' => $this->ion_auth->get_users_groups($id)->result(),
                'dados' => $this->ion_auth->user((int) $id)->row(),

            );

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
        $this->form_validation->set_rules('first_name', 'nome', 'trim|required');
        $this->form_validation->set_rules('last_name', 'sobrenome', 'trim|required');
        $this->form_validation->set_rules('company', 'empresa', 'trim');
        $this->form_validation->set_rules('phone', 'celular', 'trim');
        $this->form_validation->set_rules('username', 'usuário', 'trim|required');
        $this->form_validation->set_rules('groups[]', 'grupos de usuários', 'required|integer');
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

    private function debug($data = array())
    {
        echo "<pre>";
        print_r($data);
        exit();

        return;
    }
}
