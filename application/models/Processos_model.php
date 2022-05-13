<?php

defined('BASEPATH') or exit('Ação não permitida');

class Processos_model extends CI_Model
{

    //
    private $_table = 'processos';

    //
    private $_Jointable1 = 'procedimentos';
    private $_Jointable2 = 'issues';
    private $_Jointable3 = 'rotina';
    private $_Jointable4 = 'artigo';

    //
    private $joinCond1 = 'processos.processos_id = procedimentos.id_procedimento';
    private $joinCond2 = 'processos.issue_id = issues.id_issues';
    private $joinCond3 = 'processos.rotina_id = rotina.id_rotina';
    private $joinCond4 = 'processos.artigo_id = artigo.id_artigo';


    // Este método recupera todos os dados da tabela do banco de dados
    public function getAll()
    {

        $this->db->select([

            $this->_table . '.*',

            $this->_Jointable1.'.*',

            $this->_Jointable2.'.*',

            $this->_Jointable3.'.id_rotina',
            $this->_Jointable3.'.rotina',

            $this->_Jointable4.'.id_artigo',
            $this->_Jointable4.'.artigo',
            $this->_Jointable4.'.link'

        ]);

        //
        $this->db->join($this->_Jointable1, $this->joinCond1, 'LEFT');
        $this->db->join($this->_Jointable2, $this->joinCond2, 'LEFT');
        $this->db->join($this->_Jointable3, $this->joinCond3, 'LEFT');
        $this->db->join($this->_Jointable4, $this->joinCond4, 'LEFT');

        //
        return $this->db->get($this->_table)->result();

    }

    public function getByID($table = 'processos', $conditions = null)
    {
        if ($table && is_array($conditions)) {

            $this->db->select([

                $this->_table . '.*',
    
                $this->_Jointable1.'.*',
    
                $this->_Jointable2.'.*',
    
                $this->_Jointable3.'.id_rotina',
                $this->_Jointable3.'.rotina',
    
                $this->_Jointable4.'.id_artigo',
                $this->_Jointable4.'.artigo',
                $this->_Jointable4.'.link'
    
            ]);
    
            //
            $this->db->join($this->_Jointable1, $this->joinCond1, 'LEFT');
            $this->db->join($this->_Jointable2, $this->joinCond2, 'LEFT');
            $this->db->join($this->_Jointable3, $this->joinCond3, 'LEFT');
            $this->db->join($this->_Jointable4, $this->joinCond4, 'LEFT');

            $this->db->where($conditions);
            $this->db->limit(1);

            return $this->db->get($table)->row();
        } else {

            return FALSE;
        }
    }
}
