<?php

defined('BASEPATH') or exit('Ação não permitida');

class Core_Sistema_model extends CI_Model{

    // Este método recupera todos os dados da tabela do banco de dados
    public function getAll($table = null, $conditions = null, $order = null)
    {
        $sis = $this->load->database('default', TRUE);

        // Se a tabela do banco existe
        if($table)
        {
            //Verifica se existe condições para retornar os dados de forma seletiva
            if(is_array($conditions))
            {
                $sis->where($conditions);
            }

            if(isset($order))
            {
                $sis->order_by($order);
            }

            return $sis->get($table)->result();
        
        } else {
        
            return FALSE;
        
        }

    }

    public function getByID($table = null, $conditions = null)
    {
        //$sis = $this->load->database('sistema', TRUE);

        if($table && is_array($conditions))
        {
            $this->db->where($conditions);
            $this->db->limit(1);

            return $this->db->get($table)->row();

        }else {

            return FALSE;
            
        }
        
    }

    public function insert($table = null, $data = null, $get_last_id = null)
    {
        //
        if($table && is_array($data))
        {
            $this->db->insert($table, $data);

            if($get_last_id){
                $this->session->set_userdata('last_id', $this->db->insert_id());
            }

            if($this->db->affected_rows() > 0)
            {
                
                $this->session->set_flashdata('success', 'Dados salvos com sucesso!');
            
            } else {
                $this->session->set_flashdata('error', 'Registro não gravado!');
            }
            
        } else {
            return FALSE;
        }
    }

    public function update($table = null, $data = null, $conditions = null)
    {
        //$sis = $this->load->database('sistema', TRUE);

        if($table && is_array($data) && is_array($conditions))
        {

            if($this->db->update($table, $data, $conditions))
            {
                $this->session->set_flashdata('Sucesso','Dados salvo');
            }else {
                $this->session->set_flashdata('Erro', 'Dados não gravado');
            }

        } else {
            return FALSE;
        }
    }

}