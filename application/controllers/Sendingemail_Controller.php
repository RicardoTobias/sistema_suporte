<?php

defined('BASEPATH') or exit('Ação não permitida');

class Sendingemail_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $config = array();

        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        $config['smtp_port'] = 465;
        $config['smtp_user'] = 'ricardo.tobias@totvs.com.br';
        $config['smtp_pass'] = 'Rick@1989RTW4Heads';
        $config['protocol']  = 'smtp';
        $config['validate']  = TRUE;
        $config['mailtype']  = 'html';
        $config['charset']   = 'utf-8';
        $config['newline']   = "\r\n";

        $this->email->initialize($config);

        $this->load->library('session');
        $this->load->helper('form');
    }
    public function index()
    {
        $this->load->helper('form');
        $this->load->view('contact_email_form');
    }

    public function send_mail()
    {
        $from_email = "ricardo.tobias@totvs.com.br";
        $to_email = $this->input->post('email');

        $this->email->From($from_email, 'Meu E-mail');
        $this->email->To($to_email);
        $this->email->Subject("Assunto do e-mail");
        $this->email->Message("Aqui vai a mensagem ao seu destinatário");

        echo '<pre>';
        print_r($this->email->print_debugger());
        exit();

        

        //Send mail
        if ($this->email->send()){
            $this->session->set_flashdata("email_sent", "Congragulation Email Send Successfully.");
            echo $this->email->print_debugger();
        }else{
            $this->session->set_flashdata("email_sent", "You have encountered an error");
            echo $this->email->print_debugger();
        }
        $this->load->view('contact_email_form');
    }
}
