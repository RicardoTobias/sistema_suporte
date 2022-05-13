<?php

defined('BASEPATH') or exit('Ação não permitida');

class Issue_model extends CI_Model
{
    //
    private $_table = 'issues';

    //
    private $_Jointable1 = 'agrupador_rotina';
    private $_Jointable2 = 'rotina';
    private $_Jointable3 = 'users';

    //
    private $joinCond1 = 'issues.agrupador_rotina_id = agrupador_rotina.id_agrupador';
    private $joinCond2 = 'issues.issue_id = issues.id_issues';
    private $joinCond3 = 'issues.rotina_id = rotina.id_rotina';
    

    // Este método recupera todos os dados da tabela do banco de dados
    public function getAll()
    {

        $this->db->select([

            $this->_table . '.*',

            $this->_Jointable1 . '.id_agrupador_rotina',
            $this->_Jointable1 . '.agrupador as agrupador',

            $this->_Jointable2 . '.*',

            $this->_Jointable3 . '.id',
            $this->_Jointable3 . '.username'

        ]);

        $this->db->join($this->_Jointable1, $this->_Jointable1, 'LEFT');
        $this->db->join($this->_Jointable2, $this->_Jointable2, 'LEFT');
        $this->db->join($this->_Jointable3, $this->_Jointable3, 'LEFT');

        return $this->db->get($this->_table)->result();
    }

    public function getByID($table = 'issues', $conditions = null)
    {
        if ($table && is_array($conditions)) {

            $this->db->select([

                'issues.*',

                'agrupador_rotina.id_agrupador_rotina',
                'agrupador_rotina.agrupador as agrupador',

                'rotina.*',

                'users.id',
                'users.username'

            ]);

            $this->db->join('agrupador_rotina', 'agrupador_rotina.id_agrupador_rotina = artigo.agrupador_rotina_id', 'LEFT');
            $this->db->join('rotina', 'rotina.id_rotina = artigo.rotina_id', 'LEFT');
            $this->db->join('users', 'users.id = issues.issue_id', 'LEFT');

            $this->db->where($conditions);
            $this->db->limit(1);

            return $this->db->get($table)->row();
        } else {

            return FALSE;
        }
    }
}
