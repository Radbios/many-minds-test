<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function sessionCheck()
	{
		if ($this->session->userdata('logado') == false) {
			redirect('login');
		}
	}


	public function index()
	{
		//verifica se o usuário está logado
		$this->sessionCheck();

		$this->load->view('layout/header');
		$this->load->view('layout/navbar');
		$this->load->view('layout/footer');
	}
}