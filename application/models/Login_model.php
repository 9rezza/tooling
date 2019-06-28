<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function login($username)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('u_username', $username);
		return $this->db->get();
	}

	public function last_login($id, $data)
	{
		$this->db->where('u_id', $id);
		$this->db->set($data);
		$this->db->update('users');
	}

}

/* End of file Tooling.php */
/* Location: ./application/models/Tooling.php */