<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Usuario_model', 'Usuario');
		$this->load->model('Log_model', 'Log');
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

		$dados['usuarios'] = $this->Usuario->getALl(USUARIOS);
		$dados['titulo'] = "Lista - Usuários";

		$this->load->view('layout/header', $dados);
		$this->load->view('layout/navbar');
		$this->load->view('users/index', $dados);
		$this->load->view('users/modal/show');
		$this->load->view('users/modal/edit');
		$this->load->view('users/modal/create');
		$this->load->view('layout/footer');
	}

	public function store(){
		$dados = $_POST;
		$dados['status'] = true;
		$dados['senha'] = md5($dados['senha']);
		$tabela = "usuarios";
		$this->Usuario->create($tabela, $dados);

		redirect('usuario');
	}

	public function mudarStatus($id, $status){
		$dados['status'] = $status;
		$tabela = "usuarios";
		$this->Usuario->update($id, $tabela, $dados);
	}

	public function pegarInfo($id){
		$tabela = "usuarios";

		$dados = $this->Usuario->getById($id, $tabela);

		echo json_encode($dados);
	}

	public function atualizarInfo($id){
		$tabela = "usuarios";
		$dados = $_POST;
		$this->Usuario->update($id, $tabela, $dados);
	}

	public function perfil(){

		$this->sessionCheck();

		$dados['titulo'] = "Lista - Usuários";

		$this->load->view('layout/header', $dados);
		$this->load->view('layout/navbar');
		$this->load->view('profile');
		$this->load->view('layout/footer');
	}
}