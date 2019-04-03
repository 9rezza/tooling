<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tooling_model extends CI_Model {

	public function toolbox($id)
	{
		$this->db->select('*');
		$this->db->from('toolboxes');
		$this->db->where('b_id', $id);
		return $this->db->get();
	}

	public function tools($bid)
	{
		$this->db->select('*');
		$this->db->from('tools');
		$this->db->where('b_id', $bid);
		return $this->db->get();
	}

	public function create_admin ($data)
	{
		$this->db->insert('users', $data);
	}

}

/* End of file Tooling.php */
/* Location: ./application/models/Tooling.php */