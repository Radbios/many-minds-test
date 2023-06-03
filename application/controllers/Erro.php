<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Erro extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Log_model', 'Log');

	}
	
	public function forbidden()
	{
		$data = array(
			'user_id' => $this->session->userdata('id'),
			'tipo' => 'ERROR',
			'descricao' => "acesso proibido"
		);
		$this->Log->message($data);
		$this->load->view('errors/forbidden');
	}

	public function bloquedIP()
	{
		$data = array(
			'user_id' => $this->session->userdata('id'),
			'tipo' => 'ERROR',
			'descricao' => "ip travado"
		);
		$this->Log->message($data);

		$this->load->view('errors/bloquedIP');
	}
}
