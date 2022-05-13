<?php

defined('BASEPATH') or exit('Ação não permitida');

class Core_model extends CI_Model{

    // Este método recupera todos os dados da tabela do banco de dados
    public function getAll($table = null, $conditions = null)
    {
        $taf = $this->load->database('TAF', TRUE);

        // Se a tabela do banco existe
        if($table)
        {
            //Verifica se existe condições para retornar os dados de forma seletiva
            if(is_array($conditions))
            {
                $taf->where($conditions);
            }

            return $taf->get($table)->result();
        
        } else {
        
            return FALSE;
        
        }

    }

    public function getByID($table = null, $conditions = null)
    {

        $taf = $this->load->database('TAF', TRUE);

        if($table && is_array($conditions))
        {
            $taf->where($conditions);
            $taf->limit(1);

            return $taf->get($table)->row();

        }else {

            return FALSE;
            
        }
        
    }

    public function update($table = null, $data = null, $conditions = null)
    {
        $taf = $this->load->database('TAF', TRUE);

        if($table && is_array($data) && is_array($conditions))
        {

            if($taf->update($table, $data, $conditions))
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