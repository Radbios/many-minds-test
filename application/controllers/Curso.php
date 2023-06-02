<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curso extends CI_Controller {

	public function sessionCheck()
	{
		if ($this->session->userdata('logado') == false) {
			redirect('auth');
		}
	}
	
	public function index()
	{
		$this->load->view('layout/header');
		$this->load->view('layout/navbar');
		$this->load->view('layout/footer');
	}
}
