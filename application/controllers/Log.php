<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->model('Log_model', 'Log');
		$this->load->model('Usuario_model', 'Usuario');
	}


	public function sessionCheck()
	{
		if ($this->session->userdata('logado') == false) {
			redirect('auth');
		}
	}

	public function isAdmin()
	{
		if ($this->session->userdata('role') != USER_ADMIN) {
			redirect('erro/forbidden');
		}
	}
	
	public function index()
	{

		$this->sessionCheck();
		$this->isAdmin();

		$dados['logs'] = $this->Log->getAll('logs');
		
		for ($i=0; $i < count($dados['logs']); $i++) { 
			$dados['logs'][$i]['user'] = $this->Log->user($dados['logs'][$i]['user_id']);
			$dados['logs'][$i]['user'] = get_object_vars($dados['logs'][$i]['user'][0]);
		}
		
		$dados['titulo'] = "Logs";
		
		$this->load->view('layout/header', $dados);
		$this->load->view('layout/navbar');
		$this->load->view('log', $dados);
		$this->load->view('layout/footer');
	}
}
