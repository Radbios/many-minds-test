<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Endereco extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Usuario_model', 'Usuario');
		$this->load->model('Endereco_model', 'Endereco');

	}

	public function sessionCheck()
	{
		if ($this->session->userdata('logado') == false) {
			redirect('auth');
		}
	}

	public function index(){

		$this->sessionCheck();

		$dados['enderecos'] = $this->Endereco->user($this->session->userdata('id'));

		$dados['titulo'] = "Endereços do usuário";

		$this->load->view('layout/header', $dados);
		$this->load->view('layout/navbar');
		$this->load->view('addresses', $dados);
		$this->load->view('newAddress');
		$this->load->view('layout/footer');
	}

	public function store(){
		$dados = $_POST;
		$tabela = "enderecos";
		for ($i=0; $i < count($dados["AddressesCEP"]); $i++) { 
			$endereco = array(
				'user_id' => $this->session->userdata('id'),
				'cep' => $dados["AddressesCEP"][$i],
				'logradouro' => $dados["AddressesLogradouro"][$i],
				'estado' => $dados["AddressesEstado"][$i],
				'cidade' => $dados["AddressesCidade"][$i],
				'bairro' => $dados["AddressesBairro"][$i]
			);
			$this->Usuario->create($tabela, $endereco);
		}
		redirect('endereco');
	}
	
	
}
