<?php

defined('BASEPATH') or exit('Ação não permitida');

class Menu_model extends CI_Model
{

    // Este método recupera todos os dados da tabela do banco de dados
    public function getAll()
    {
        $sis = $this->load->database('sistema', TRUE);

        $sis->select([

            'Menu.*',

            'Categorias.ID_Categoria',
            'Categorias.MenuCategoria as categoria',

        ]);

        $sis->join('Categorias', 'Categorias.ID_Categoria = Menu.MenuCategoriaID', 'LEFT');

        return $sis->get('Menu')->result();
    }

    public function getByID($table = null, $conditions = null)
    {
        if ($table && is_array($conditions)) {

            $sis = $this->load->database('sistema', TRUE);

            $sis->select([

                'Menu.*',

                'Categorias.ID_Categoria',
                'Categorias.MenuCategoria as categoria',

            ]);

            $sis->join('Categorias', 'Categorias.ID_Categoria = Menu.MenuCategoriaID', 'LEFT');
            
            $sis->where($conditions);
            $sis->limit(1);

            return $sis->get($table)->row();

        } else {

            return FALSE;
        }
    }

    public function update($table = null, $data = null, $conditions = null)
    {
        if ($table && is_array($data) && is_array($conditions)) {

            if ($this->db->update($table, $data, $conditions)) {
                $this->session->set_flashdata('Sucesso', 'Dados salvo');
            } else {
                $this->session->set_flashdata('Erro', 'Dados não gravado');
            }
        } else {
            return FALSE;
        }
    }
}
