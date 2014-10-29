<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function contacto()
	{
        $this->load->library('email');

        $this->email->from($this->input->post('correo'));
        $this->email->to('contacto@melymartinez.com'); 

        $this->email->subject($this->input->post('nombre'));
        $this->email->message($this->input->post('edad'));	
        $this->email->message($this->input->post('codigo_postal'));
        

        $this->email->send();
        
        redirect('/#contacto');

	}
    
    
    
}

