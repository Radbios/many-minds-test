<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Erro extends CI_Controller {
	
	public function forbidden()
	{
		$this->load->view('errors/forbidden');
	}

	public function bloquedIP($tempo)
	{
		$dados['tempo'] = $tempo;
		$this->load->view('errors/bloquedIP', $dados);
	}
}
