<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Usuario_model', 'Usuario');
	}


	public function index()
	{
		$this->load->view('login');
	}


	public function logar()
	{
		/*Pegar os dados do form*/
        $email = $this->input->post('email');
		$senha = md5($this->input->post('password'));
		$tabela = 'usuarios';

		$dadosLogin = $this->Usuario->login($tabela, $email, $senha);

		if (!empty($dadosLogin))
		{
			$dados = array(
				'logado' => TRUE,
				'id' => $dadosLogin['id'],
				'role' => $dadosLogin['role'],
			);

			$this->session->set_userdata($dados);
			redirect('base');
		} else
		{
			$this->session->set_flashdata('error', 'Usuário ou senha inválidos!');
			redirect('login');
		}
	}


	public function logout()
	{
		$this->session->unset_userdata('logado');
		/*$this->session->sess_destroy();*/
		redirect('login');
	}
}