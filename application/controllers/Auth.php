<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Usuario_model', 'Usuario');
	}

	public function checkAttempt($tentativasLogin){
		
        if ($tentativasLogin >= 3) {
			$tempoBloqueio = $this->session->userdata('tempo_bloqueio') ?? 0;
			
            if (time() < $tempoBloqueio) {
				redirect('erro/bloquedIP');

            } else {
				$this->session->unset_userdata('tentativas_login');
                $this->session->unset_userdata('tempo_bloqueio');
            }
        }
	}

	public function unsetAttemptData(){
		$this->session->unset_userdata('tentativas_login');
		$this->session->unset_userdata('tempo_bloqueio');
	}


	public function index()
	{
		$dados['titulo'] = "Login";

		$this->load->view('login', $dados);
	}


	public function logar()
	{
		$tentativasLogin = $this->session->userdata('tentativas_login') ?? 0;

		$this->checkAttempt($tentativasLogin);

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
			
			$this->unsetAttemptData();

			$this->session->set_userdata($dados);
			redirect('dashboard');
		} else
		{
			$this->session->set_userdata('tentativas_login', $tentativasLogin + 1);

			if ($tentativasLogin + 1 >= 3) {
	
				$TempoBloqueio = time() + 60;
				$this->session->set_userdata('tempo_bloqueio', $TempoBloqueio);
			}

			$this->session->set_flashdata('error', 'Usuário ou senha inválidos!');
			redirect('auth');
		}
	}


	public function logout()
	{
		$this->session->unset_userdata('logado');
		/*$this->session->sess_destroy();*/
		redirect('auth');
	}
}