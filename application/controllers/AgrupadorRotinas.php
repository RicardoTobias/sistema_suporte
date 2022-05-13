<?php

defined('BASEPATH') or exit('Ação não permitida');

class AgrupadorRotinas extends CI_Controller
{

    // Buscar a tabela do banco de dados
    public $tabela      = 'agrupador_rotina';

    // ID da tabela
    public $idTabela    = 'id_agrupador_rotina';

    // Definindo rota da página
    public $rota        = 'agrupador-de-rotinas';

    // template
    private $template1 = 'template/layout_1';

    // Caminho da página na estrutura VIEW
    public $v_index     = 'AgrupadorRotinas/index';
    public $v_add       = 'AgrupadorRotinas/adicionar';
    public $v_edita     = 'AgrupadorRotinas/editar';

    // Título e Descrição da página/rotina
    public $titulo      = 'Agrupador de Rotinas';
    public $descricao   = 'Rotina para cadastro de agrupador das rotinas referente ao TAF';
    public $author      = 'Ricardo Santos Tobias';

    //
    public function __construct()
    {
        parent::__construct();

        // Carregando MODEL's
        $this->load->model('Core_Sistema_model');

        if (!$this->ion_auth->logged_in()) {
            // Redireciona para a página de LOGIN caso não esteja "logado"
            redirect('login', 'refresh');
        }

        // Esta rotina só é acessada por usuários com o perfil de administrador
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
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'nomeTabela' => $this->tabela,

            'url' => $this->rota,

            // Estilo da página
            'styles' => array(
                'public/vendor/datatables/dataTables.bootstrap4.min.css',
                'public/css/index.css'
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
                'delete'    => 'warning',
                'save'      => 'primary'
            ),

            // Recuperando dados do banco de dados
            'listarDados'   => $this->Core_Sistema_model->getAll($this->tabela)
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
                    'titulo' => $this->titulo,
                    'descricao' => $this->descricao,
                    'nomeTabela' => $this->tabela,

                    'url' => $this->rota,

                    'dados' => $this->Core_Sistema_model->getByID($this->tabela, array($this->idTabela => $id))

                );

                // Carregando a página principal
                $this->template->load($this->template1, $this->v_edita, $data);
            }
        }
    }

    //
    public function delete_recupera($id = null)
    {

        // Valida se o ID existe na tabela
        if (!$id || !$this->Core_Sistema_model->getByID($this->tabela, array($this->idTabela => $id))) {

            $this->_retornaSessao('error');
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
                $this->_retornaSessao('delete') :
                $this->_retornaSessao('save');

            //
            redirect($this->rota);
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
            //'id_agrupador_rotina'   => $this->input->post('id_agrupador_rotina'),
            'agrupador' => $this->input->post('agrupador')
        ];

        return $data;
    }

    //
    private function _validaCampo()
    {
        // Definindo regras de validação
        $this->form_validation->set_rules('id_agrupador_rotina', '', 'trim');
        $this->form_validation->set_rules('agrupador', 'agrupador de rotinas', 'trim|required');
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

        return $data;
    }
}
