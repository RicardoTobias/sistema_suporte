<?php

defined('BASEPATH') or exit('Ação Não permitida');

class Home extends CI_Controller 
{

    //
    public $titulo = 'TAF Testes';
    public $descricao = 'Página inícial';

    //
    public $v_index = 'home/index';

    public $author      = 'Ricardo Santos Tobias';
    
    //
    public function __construct()
    {
        parent::__construct();

        // Carregando MODEL's
        $this->load->model('Core_sistema_model');
        
        if (!$this->ion_auth->logged_in()) {
            //redirect them to the login page
            redirect('login', 'refresh');
        }
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

            //Recuperando dados do banco de dados
            'artigos'     => $this->Core_sistema_model->getAll('artigo')
            
        );

        // Carregando a página principal
        $this->template->load('template/layout_1', $this->v_index, $data);

    }

}