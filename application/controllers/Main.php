<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Main extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('tooling_model');
		$this->load->library('template');
	}

	public function index()
	{
		$data['title'] = "Tooling - Dashboard";
		//$this->load->view('content/dashboard',$data);
		$this->template->display('content/dashboard', $data);
	}

	private function create_admin()
	{
		$data['u_nama'] = "admin";
		$data['u_password'] = password_hash('admin', PASSWORD_DEFAULT);
		$data['u_created'] = date('Y-m-d H:i:s');
		$this->tooling_model->create_admin($data);
	}

	public function toolbox($id)
	{
		$data['lemari'] = $this->tooling_model->toolbox($id)->row();
		$data['title'] = 'Tooling - ' . $data['lemari']->b_nama;

		$bid = $data['lemari']->b_id;
		$data['alat'] = $this->tooling_model->tools($bid)->result();
		$data['jml_alat'] = $this->tooling_model->tools($bid)->num_rows();


		$this->template->display('content/toolbox', $data);
	}




}