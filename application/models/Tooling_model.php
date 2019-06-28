<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tooling_model extends CI_Model {

	public function get_toolbox()
	{
		$this->db->select('*');
		$this->db->from('toolboxes');
		return $this->db->get();
	}

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
		$this->db->where('t_status', 4);
		$this->db->where('t_kondisi', '0');
		return $this->db->get();
	}

	public function tools_missing($bid)
	{
		$this->db->select('*');
		$this->db->from('tools');
		$this->db->where('b_id', $bid);
		$this->db->where('t_status', 2);
		$this->db->where('t_kondisi', '0');
		return $this->db->get();
	}

	public function tools_broken($bid)
	{
		$this->db->select('*');
		$this->db->from('tools');
		$this->db->where('b_id', $bid);
		$this->db->where('t_status', 4);
		$this->db->where('t_kondisi', '1');
		return $this->db->get();
	}

	public function tools_miss_broken($bid)
	{
		$this->db->select('*');
		$this->db->from('tools');
		$this->db->where('b_id', $bid);
		$this->db->where('t_status', 2);
		$this->db->where('t_kondisi', '1');
		return $this->db->get();
	}

	public function get_json_history($bid)
	{
		$this->datatables->select('h_tanggal, u_nama, b_nama, t_nama, h_action, h.t_kondisi');
        $this->datatables->from('history as h');
        $this->datatables->where('h.b_id', $bid);
        $this->datatables->join('users as u', 'h.u_id=u.u_id');
        $this->datatables->join('toolboxes as b', 'h.b_id=b.b_id');
        $this->datatables->join('tools as t', 'h.t_id=t.t_id');
        //$this->datatables->add_column('view', '<a href="javascript:void(0);" class="edit_record btn btn-info btn-xs" data-kode="$1" data-nama="$2" data-harga="$3" data-kategori="$4">Edit</a>  <a href="javascript:void(0);" class="hapus_record btn btn-danger btn-xs" data-kode="$1">Hapus</a>','barang_kode,barang_nama,barang_harga,kategori_id,kategori_nama');
        return $this->datatables->generate();
	}

	public function create_admin ($data)
	{
		$this->db->insert('users', $data);
	}

	public function action ($data)
	{
		$this->db->insert('history', $data);
	}

	public function tool_act ($tid, $act, $kondisi)
	{
		$this->db->where('t_id', $tid);
		$this->db->set('t_status', $act);
		$this->db->set('t_kondisi', $kondisi);
		$this->db->update('tools');
	}

}

/* End of file Tooling.php */
/* Location: ./application/models/Tooling.php */