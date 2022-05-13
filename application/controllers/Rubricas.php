<?php

defined('BASEPATH') or exit('Ação não permitida');

class Rubricas extends CI_Controller
{

    // Buscar a tabela do banco de dados
    public $tabela = 'C8R990';

    // ID da tabela
    public $idTabela = 'R_E_C_N_O_';

    // Definindo rota da página
    public $rota = 'rubricas';

    // template
    private $template1 = 'template/layout_1';

    // Caminho da página na estrutura VIEW
    public $v_index = 'rubrica/index';
    public $v_edita = 'rubrica/editar';

    // Título e Descrição da página/rotina
    public $titulo = 'Rubricas';

    public $evento = 'S-1010';
    
    public $descricao = 'A rotina de Tabela de Rubricas (S-1010) tem como objetivo disponibilizar aos usuários 
    um cadastro de rubricas previstos pelo Fisco, através do Guia Prático EFD Social. 
    Apresenta o detalhamento das informações das rubricas constantes da folha de pagamento da empresa, 
    permitindo a correlação destas com as constantes da tabela de natureza das rubricas da folha de pagamento do 
    eSocial. As informações consolidadas desta tabela são utilizadas para validação do evento de Remuneração dos 
    trabalhadores.';

    public $author      = 'Ricardo Santos Tobias';

    //
    public function __construct()
    {

        parent::__construct();

        // Carregando MODEL's
        $this->load->model('Core_model');

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
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,

            'nomeTabela' => $this->tabela,

            'evento' => $this->evento,

            'url' => $this->rota,

            // Estilo da página
            'styles' => array(
                'public/vendor/datatables/dataTables.bootstrap4.min.css',
            ),

            // Scripts da página
            'scripts' => array(
                'public/vendor/jquery-easing/jquery.easing.min.js',
                'public/vendor/datatables/jquery.dataTables.min.js',
                'public/vendor/datatables/dataTables.bootstrap4.min.js',
                'public/js/demo/datatables-demo.js'
            ),

            'alert' => array(
                'error' => 'danger',
                'success' => 'success',
                'delete' => 'alert',
                'save' => 'primary'
            ),

            // Recuperando dados do banco de dados
            'SX2' => $this->_validaCompartilhamento(),
            'listarDados' => $this->Core_model->getAll($this->tabela),

            //Verificando se as opções de filtro estão ativos
            'filtro' => FALSE

        );

        // Carregando a página principal
        $this->template->load($this->template1, $this->v_index, $data);
    }

    //
    public function editar($id = null)
    {

        // Setando o template
        $this->_set_template();

        // Valida se o ID existe na tabela
        if (!$id || !$this->Core_model->getByID($this->tabela, array( $this->idTabela => $id))) {

            // retorna a sessão
            $this->_retornaSessao('error');

            //
            redirect($this->rota);

        } else {

            // Chamando a função que valida os campos
            $this->_validaCampo();

            // Caso a validação tiver passado, será executado a rotina abaixo
            if ($this->form_validation->run()) {

                // Recuperando Dados Digitados no Formulário
                $data = $this->_camposTabelas();

                // Caso tiver algum valor Nulo, será removido do array para não validar no banco de dados
                foreach ($data as $key => $val) {
                    if ($val == NULL) {
                        unset($data[$key]);
                    }
                }

                // Sanitizando os dados
                $data = html_escape($data);

                // Chamando a função para alterar os dados da tabela
                $this->Core_model->update($this->tabela, $data, array($this->idTabela => $id));

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

                    // Scripts da página
                    'scripts' => array(
                        'public/vendor/bootstrap/js/bootstrap.bundle.min.js',
                        'public/vendor/jquery-easing/jquery.easing.min.js',
                        'public/js/app.js'
                    ),

                    //Recuperando dados do banco de dados
                    'SX2'       => $this->_validaCompartilhamento(),
                    'dados'     => $this->Core_model->getByID($this->tabela, array($this->idTabela => $id))
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
        if (!$id || !$this->Core_model->getByID($this->tabela, array($this->idTabela => $id))) {

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
            $this->Core_model->update($this->tabela, $data, array($this->idTabela => $id));

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
    public function filtrarDados() {

        $data = $this->_camposTabelas();

        foreach($data as $key=>$val){
            if($val == NULL){
                unset($data[$key]);
            }
        }

        $data = html_escape($data);

        $dataFilter = array(
            
            //Retorna título e descrição da página
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,

            //Recuperando dados do banco de dados
            'SX2' => $this->_validaCompartilhamento(),
            'listarDados' => $this->Core_model->getAll($this->tabela, $data),
            
            //Verificando se as opções de filtro estão ativos
            'filtro' => TRUE

        );

        $this->load->view($this->v_index, $dataFilter);

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
            'C8R_ID'        => $this->input->post('C8R_ID'),
            'C8R_FILIAL'    => $this->input->post('C8R_FILIAL'),
            'C8R_DTINI'     => $this->input->post('C8R_DTINI'),
            'C8R_CODRUB'    => $this->input->post('C8R_CODRUB'),
            'C8R_IDTBRU'    => $this->input->post('C8R_IDTBRU'),
            'C8R_DESRUB'    => $this->input->post('C8R_DESRUB'),
            'C8R_EVENTO'    => $this->input->post('C8R_EVENTO'),
            'C8R_STATUS'    => $this->input->post('C8R_STATUS'),
            'C8R_PROTUL'    => $this->input->post('C8R_PROTUL'),
            'C8R_PROTPN'    => $this->input->post('C8R_PROTPN'),
            'C8R_ATIVO'     => $this->input->post('C8R_ATIVO')
        ];

        return $data;

    }

    private function _validaCampo()
    {

        //
        $this->form_validation->set_rules('C8R_CODRUB', '', 'trim');
        $this->form_validation->set_rules('C8R_IDTBRU', '', 'trim');
        $this->form_validation->set_rules('C8R_DTINI',  '', 'trim');
        $this->form_validation->set_rules('C8R_DESRUB', '', 'trim');
        $this->form_validation->set_rules('C8R_PROTUL', '', 'trim');
        $this->form_validation->set_rules('C8R_PROTPN', '', 'trim');

    }

    //
    private function _validaCompartilhamento()
    {
        
        // Armazena dados da tabela da SX2 onde o valor do campo chave seja igual ao nome da tabela da rotina
        $SX2 = $this->Core_model->getAll('SX2990', array('X2_CHAVE' => 'C8R'));

        foreach($SX2 as $X2){
            if ( $X2->X2_MODO == 'C' && $X2->X2_MODOUN == 'C' && $X2->X2_MODOEMP == 'C' ) {
                $c = 'Compartilhada';
            } elseif( $X2->X2_MODO == 'E' && $X2->X2_MODOUN == 'E' && $X2->X2_MODOEMP == 'E' ) {
                $c = 'Exclusivo';
            } else {
                $c = 'Não identificado';
            }

            return $c;
        }
    }
    
    //
    private function _retornaSessao($data = null)
    {

        switch($data){
            
            case ($data == 'delete') :
                return $this->session->set_flashdata('delete','Registro excluído com sucesso!');
                break;
            
            case ($data == 'save') :
                return $this->session->set_flashdata('save','Registro recuperado com sucesso!');
                break;

            case ($data == 'error') :
                return $this->session->set_flashdata('error','Registro não encontrado');
                break;

            case ($data == 'success') :
                return $this->session->set_flashdata('success','Registro alterado com sucesso');
                break;
        }
    }    

}