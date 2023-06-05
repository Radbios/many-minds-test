<?php

class Endereco_model extends MY_Model {
    public function user($id){
		$sql = "SELECT * FROM usuarios INNER JOIN enderecos ON usuarios.id = enderecos.user_id WHERE usuarios.id = ?";
		$query = $this->db->query($sql, array($id));
		return $result = $query->result();	
	}
}