<?php

defined('BASEPATH') or exit('Ação não permitida');

class Procedimentos extends CI_Controller
{

    // Buscar a tabela do banco de dados
    public $tabela = 'artigo';
    public $tabelaFK_1 = 'agrupador_rotina';
    public $tabelaFK_2 = 'rotina';

    // ID da tabela
    public $idTabela = 'id_artigo';

    // Definindo rota da página
    public $rota = 'artigos';

    // template
    private $template1 = 'template/layout_1';

    // Caminho da página na estrutura VIEW
    public $v_index = 'artigos/index';
    public $v_add = 'artigos/adicionar';
    public $v_edita = 'artigos/editar';

    // Título e Descrição da página/rotina
    public $titulo = 'Artigos KCS';
    public $descricao = 'Artigos';
    public $author = 'Ricardo Santos Tobias';

    //
    public function __construct()
    {
        //
        parent::__construct();

        // Carregando as bibliotecas PHP
        $this->load->library('session');

        // Carregando Models
        $this->load->model('Core_Sistema_model');
        $this->load->model('Artigo_model');

        //
        if (!$this->ion_auth->logged_in()) {
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
            'listarDados'   => $this->Artigo_model->getAll(),

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

            // Recuperando Dados Digitados no Formulário
            $data = $this->_camposTabelas();

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
                'titulo'    => 'Alterar dados ' . $this->titulo,
                'descricao' => $this->descricao,

                'tabelaFK_1' => $this->Core_Sistema_model->getAll('agrupador_rotina'),
                'tabelaFK_2' => $this->Core_Sistema_model->getAll('rotina')

            );


            // Carregando a página principal
            $this->template->load($this->template1, $this->v_add, $data);
            
        }
    }

    //
    public function editar($id = null)
    {

        // Valida se o ID existe na tabela
        if (!$id || !$this->Core_model->getByID($this->tabela, array($this->idTabela => $id))) {

            $this->retornaSessao('error');
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
                $this->Core_model->update($this->tabela, $data, array($this->idTabela => $id));

                // redireciona a página principal
                $this->retornaSessao('success');
                redirect($this->rota);
            } else {

                // A rotina abaixo é para visualizar os dados a serem editados
                $data = array(

                    //Retorna título e descrição da página
                    'titulo'    => 'Alterar dados ' . $this->titulo,
                    'descricao' => $this->descricao,

                    //Recuperando dados do banco de dados
                    'dados'     => $this->Core_model->getByID($this->tabela, array($this->idTabela => $id))
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
            'agrupador_rotina_id' => $this->input->post('agrupador_rotina_id'),
            'rotina_id' => $this->input->post('rotina_id'),
            'artigo' => $this->input->post('artigo'),
            'link' => $this->input->post('link')
        ];

        return $data;
    }

    //
    private function _validaCampo()
    {

        // Definindo regras de validação
        $this->form_validation->set_rules('agrupador_rotina_id', '', 'trim|required');
        $this->form_validation->set_rules('rotina_id', '', 'trim|required');
        $this->form_validation->set_rules('artigo', 'artigo', 'trim|required');
        $this->form_validation->set_rules('link', '', 'trim|required');
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
