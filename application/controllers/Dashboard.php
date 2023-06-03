<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function sessionCheck()
	{
		if ($this->session->userdata('logado') == false) {
			redirect('auth');
		}
	}

	public function index()
	{
		//verifica se o usuário está logado
		$this->sessionCheck();

		$dados['titulo'] = "Página principal";

		$this->load->view('layout/header', $dados);
		$this->load->view('layout/navbar');
		$this->load->view('dashboard');
		$this->load->view('layout/footer');
	}
}