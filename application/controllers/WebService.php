<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WebService extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Usuario_model', 'Usuario');
	}

    public function isAdmin($user)
	{
		if ($user['role'] != USER_ADMIN) {
            $message['message'] = "acesso proibido para seu tipo de usuario";
			echo json_encode($message);
            exit;
		}
	}

    public function auth($email, $senha)
	{
		$tabela = 'usuarios';

		$dadosLogin = $this->Usuario->login($tabela, $email, $senha);

		if (!empty($dadosLogin))
		{				
            return $dadosLogin;
		} else
		{
            return false;
		}
	}

	public function consumirDados()
    {
        $bodyData = $this->input->raw_input_stream;
        
        // Obtém o método da requisição
        $method = $_SERVER['REQUEST_METHOD'];

        // Verifica o tipo de requisição
        if ($method === 'GET') {
            $decodedData = json_decode($bodyData);
    
            $dadosLogin = $this->auth($decodedData->email, md5($decodedData->senha));
    
            if($dadosLogin){
    
                $this->isAdmin($dadosLogin);
    
                $dados['usuarios'] = $this->Usuario->getAll(USUARIOS);
                echo json_encode($dados);
            }
            else{
                $message['message'] = "falha na autenticacao";
                echo json_encode($message);
            }            
        }
        else{
            $message['message'] = "bad method";
            echo json_encode($message);
        } 
    }
}
