<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Usuario_model', 'Usuarios');
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

	public function index(){

		$this->sessionCheck();
		$this->isAdmin();

		$dados['usuarios'] = $this->Usuarios->getALl(USUARIOS);

		$this->load->view('layout/header');
		$this->load->view('layout/navbar');
		$this->load->view('users/index', $dados);
		$this->load->view('layout/footer');
	}
}