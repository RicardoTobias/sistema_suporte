<?php

defined('BASEPATH') or exit('Ação não permitida');

class Rotina_model extends CI_Model
{

    //
    private $_table = 'rotina';

    //
    private $_Jointable = 'agrupador_rotina';
    
    //
    private $joinCond = 'rotina.agrupador_rotina_id = agrupador_rotina.id_agrupador_rotina';


    // Este método recupera todos os dados da tabela do banco de dados
    public function getAll()
    {

        $this->db->select([

            $this->_table .'.*',

            $this->_Jointable .'.id_agrupador_rotina',
            $this->_Jointable .'.agrupador as agrupador'

        ]);

        $this->db->join($this->_Jointable, $this->joinCond, 'LEFT');

        return $this->db->get($this->_table)->result();
    }

    public function getByID($table = 'rotina', $conditions = null)
    {
        //
        $table = $this->_table;

        //
        if ($table && is_array($conditions)) {

            //
            $this->db->select([

                $this->_table .'.*',
    
                $this->_Jointable .'.id_agrupador_rotina',
                $this->_Jointable .'.agrupador as agrupador'
    
            ]);

            //
            $this->db->join($this->_Jointable, $this->joinCond, 'LEFT');

            //
            $this->db->where($conditions);
            
            //
            $this->db->limit(1);

            //
            return $this->db->get($table)->row();
            
        } else {

            return FALSE;

        }
    }

}
