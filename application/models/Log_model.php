<?php

class Log_model extends MY_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Usuario_model', 'Usuario');
	}

	public function message($dados){
		if (is_array($dados)) 
		{	
			return $this->db->insert('logs', $dados);
		}
		return FALSE;
	}

	public function user($id){
		$sql = "SELECT * FROM usuarios INNER JOIN logs ON usuarios.id = logs.user_id WHERE usuarios.id = ? LIMIT 1";
		$query = $this->db->query($sql, array($id));
		return $result = $query->result();	
	}

}