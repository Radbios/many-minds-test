<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WebService extends CI_Controller {

	public function sessionCheck()
	{
		if ($this->session->userdata('logado') == false) {
			redirect('auth');
		}
	}
	
	public function registros(){
		$registros = array(
            'teste' => 'testando'
        );
        
        // Retornar os registros como resposta em JSON
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($registros));
	}
}
