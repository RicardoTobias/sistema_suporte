<?php

defined('BASEPATH') or exit('Ação não permitida');

class Procedimentos_model extends CI_Model
{

    //
    private $_table = 'procedimentos';

    //
    private $_Jointable = 'users';

    //
    private $joinCond = 'procedimentos.usr_id = users.id';

    // Este método recupera todos os dados da tabela do banco de dados
    public function getAll()
    {

        $this->db->select([

            $this->_table . '.*',

            $this->_Jointable . '.id',
            $this->_Jointable . '.username'

        ]);

        $this->db->join($this->_Jointable, $this->_Jointable, 'LEFT');

        return $this->db->get($this->_table)->result();
    }

    public function getByID($table = 'procedimentos', $conditions = null)
    {
        if ($table && is_array($conditions)) {

            $this->db->select([

                $this->_table . '.*',

                $this->_Jointable . '.id',
                $this->_Jointable . '.username'

            ]);

            $this->db->join($this->_Jointable, $this->_Jointable, 'LEFT');

            $this->db->where($conditions);

            $this->db->limit(1);

            return $this->db->get($table)->row();
        } else {

            return FALSE;
        }
    }
}
