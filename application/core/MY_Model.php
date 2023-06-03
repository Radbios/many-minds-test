<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Log_model', 'Log');

	}

	public function create($tabela, $dados)
	{
		if (isset($tabela) && is_array($dados)) 
		{	
			$data = array(
				'user_id' => $this->session->userdata('id'),
				'tipo' => 'INFO',
				'descricao' => "criação de dados em '{$tabela}'"
			);
			$this->Log->message($data);
			return $this->db->insert($tabela, $dados);
		}
		return FALSE;
	}


	public function getAll($tabela)
	{
		if (isset($tabela)) {
			$this->db->order_by('id', 'DESC');
			$query = $this->db->get($tabela);
			if ($query->num_rows() > 0) {
				return $query->result_array();
			} else {
				return NULL;
			}
		}
		return FALSE;
	}
	
	
	public function getById($id, $tabela)
	{
		if (!is_null($id) && isset($tabela))
		{
			$this->db->where('id', $id);
			$query = $this->db->get($tabela);
			if ($query->num_rows() > 0) 
			{
				return $query->row_array();
			} else
			{
				return NULL;
			}
		}
	}
	
	
	public function update($id, $tabela, $dados)
	{
		if (is_array($dados) && !is_null($id) && isset($tabela))
		{
			$this->db->where('id', $id);
			return $this->db->update($tabela, $dados);
		}
		return FALSE;
	}

	public function delete($id, $tabela)
	{
		if (!is_null($id) && isset($tabela))
		{
			$this->db->where('id', $id);
			return $this->db->delete($tabela);
		}
		return FALSE;
	}
}