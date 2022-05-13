<?php

defined('BASEPATH') or exit('Ação não permitida');

class Artigo_model extends CI_Model
{

    //
    private $_table = 'artigo';

    //
    private $_Jointable1 = 'agrupador_rotina';
    private $_Jointable2 = 'rotina';

    //
    private $joinCond1 = 'artigo.agrupador_rotina_id = agrupador_rotina.id_agrupador_rotina';
    private $joinCond2 = 'artigo.rotina_id = rotina.id_rotina';

    // Este método recupera todos os dados da tabela do banco de dados
    public function getAll()
    {

        $this->db->select([

            //
            $this->_table . '.*',

            //
            $this->_Jointable1 . '.id_agrupador_rotina',
            $this->_Jointable1 . '.agrupador as agrupador',

            //
            $this->_Jointable2 . '.*'

        ]);

        $this->db->join($this->_Jointable1, $this->joinCond1, 'LEFT');
        $this->db->join($this->_Jointable2, $this->joinCond2, 'LEFT');

        return $this->db->get($this->_table)->result();
    }

    public function getByID($_table = 'artigo', $conditions = null)
    {
        if ($_table && is_array($conditions)) {

            $this->db->select([

                //
                $this->_table . '.*',
    
                //
                $this->_Jointable1 . '.id_agrupador_rotina',
                $this->_Jointable1 . '.agrupador as agrupador',
    
                //
                $this->_Jointable2 . '.*'
    
            ]);
    
            $this->db->join($this->_Jointable1, $this->joinCond1, 'LEFT');
            $this->db->join($this->_Jointable2, $this->joinCond2, 'LEFT');

            //
            $this->db->where($conditions);

            //
            $this->db->limit(1);

            //
            return $this->db->get($_table)->row();

        } else {

            return FALSE;
        }
    }
}
