<?php

defined('BASEPATH') or exit('Ação não permitida');

class Estabelecimento extends CI_Controller
{

    // Buscar a tabela do banco de dados
    public $tabela = 'C92990';

    // ID da tabela
    public $idTabela = 'R_E_C_N_O_';

    // Definindo rota da página
    public $rota = 'estabelecimentos';

    // template
    private $template1 = 'template/layout_1';

    // Caminho da página na estrutura VIEW
    public $v_index = 'estabelecimento/index';
    public $v_edita = 'estabelecimento/editar';

    // Título e Descrição da página/rotina
    public $titulo = 'Estab., Obras ou Orgãos Públicos';

    public $evento = 'S-1005';

    public $descricao = 'O evento de Tabela de Estabelecimentos e Obras de Construção Civil (S-1005), 
    identifica os Estabelecimentos e Obras de Construção Civil da Empresa, detalhando as informações de 
    cada estabelecimento (matriz e filiais) do Empregador/Contribuinte, como: 
    informações relativas ao CNAE Preponderante, alíquota GILRAT, 
    Indicativo de Substituição da Contribuição Patronal de Obra de Construção Civil, dentre outras.';

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
    public function filtrarDados()
    {

        // Setando o template
        $this->_set_template();
        
        $data = $this->_camposTabelas();

        foreach ($data as $key => $val) {
            if ($val == NULL) {
                unset($data[$key]);
            }
        }

        $data = html_escape($data);

        // 
        $dataFilter = array(

            // Titulo e descrição da página
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,

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

            // Recuperando dados do banco de dados
            'SX2'           => $this->_validaCompartilhamento(),
            'listarDados'   => $this->Core_model->getAll($this->tabela, $data),

            //Verificando se as opções de filtro estão ativos
            'filtro' => TRUE

        );

        // Carregando a página principal
        $this->template->load($this->template1, $this->v_index, $dataFilter);
    
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
            'C92_ID'        => $this->input->post('C92_ID'),
            'C92_FILIAL'    => $this->input->post('C92_FILIAL'),
            'C92_DTINI'     => $this->input->post('C92_DTINI'),
            'C92_TPINSC'    => $this->input->post('C92_TPINSC'),
            'C92_NRINSC'    => $this->input->post('C92_NRINSC'),
            'C92_EVENTO'    => $this->input->post('C92_EVENTO'),
            'C92_STATUS'    => $this->input->post('C92_STATUS'),
            'C92_PROTUL'    => $this->input->post('C92_PROTUL'),
            'C92_PROTPN'    => $this->input->post('C92_PROTPN'),
            'C92_ATIVO'     => $this->input->post('C92_ATIVO')
        ];

        return $data;
    }

    //
    private function _validaCampo()
    {

        // Definindo regras de validação
        $this->form_validation->set_rules('C92_ID',     '', 'trim');
        $this->form_validation->set_rules('C92_DTINI',  '', 'trim');
        $this->form_validation->set_rules('C92_NRINSC', '', 'trim');
        $this->form_validation->set_rules('C92_PROTUL', '', 'trim');
        $this->form_validation->set_rules('C92_PROTPN', '', 'trim');

    }

    //
    private function _validaCompartilhamento()
    {

        // Armazena dados da tabela da SX2 onde o valor do campo chave seja igual ao nome da tabela da rotina
        $SX2 = $this->Core_model->getAll('SX2990', array('X2_CHAVE' => 'C92'));

        foreach ($SX2 as $X2) {
            if ($X2->X2_MODO == 'C' && $X2->X2_MODOUN == 'C' && $X2->X2_MODOEMP == 'C') {
                $c = 'Compartilhada';
            } elseif ($X2->X2_MODO == 'E' && $X2->X2_MODOUN == 'E' && $X2->X2_MODOEMP == 'E') {
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
