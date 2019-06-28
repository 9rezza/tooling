<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function get_json_users()
	{
		$this->datatables->select('u_id, u_nama, u_username, u_tmmin, u_created, u_last_login');
        $this->datatables->from('users as u');
        return $this->datatables->generate();
	}

	public function insert_user ($data)
	{
		$this->db->insert('users', $data);
	}

	public function update_user ($id, $data)
	{
		$this->db->where('u_id', $id);
		$this->db->set($data);
		$this->db->update('users');
	}

	public function delete_user ($data)
	{
		$this->db->where($data);
		$this->db->delete('users');
	}

	public function username_check ($uname)
	{
		$this->db->select('u_id');
		$this->db->from('users');
		$this->db->where('u_username', $uname);
		return $this->db->get();
	}

	public function reusername_check ($id, $uname)
	{
		$this->db->select('u_id');
		$this->db->from('users');
		$this->db->where('u_username', $uname);
		$this->db->where('u_id !=', $id, false);
		return $this->db->get();
	}

	public function get_user ($id)
	{
		$this->db->select('u_id,u_nama,u_username');
		$this->db->from('users');
		$this->db->where('u_id', $id);
		return $this->db->get();
	}

	public function reset ($data)
	{
		$this->db->where($data);
		$this->db->set('t_status', '4');
		$this->db->set('t_kondisi', '0');
		$this->db->update('tools');
	}

}

/* End of file Tooling.php */
/* Location: ./application/models/Tooling.php */