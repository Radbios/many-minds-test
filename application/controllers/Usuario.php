<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Usuario_model');
	}


	public function verificar_sessao()
	{
		if ($this->session->userdata('logado') == false) {
			redirect('login');
		}
	}
}