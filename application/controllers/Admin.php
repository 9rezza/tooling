<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Admin extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('tooling_model');
		$this->load->model('admin_model');
		$this->load->library('template');
        $this->load->library('session');
        $this->load->library('datatables');
        $this->load->helper('form');
        $this->is_login();
	}

	public function is_login()
	{
		// print_r($this->session->userdata());
		if(empty($this->session->userdata('u_username'))){
				redirect(base_url('login'));
		} else {
			if($this->session->userdata('u_username') != "admin"){
				redirect(base_url('login'));
			}			
		}
	}	

	public function nav($value)
	{
		for ($i=0; $i < 3; $i++) { 
			if($i == $value){
				$nav[$i] = "active";
			} else {
				$nav[$i] = "";				
			}
		}
		return $nav;
	}

	public function index()
	{
		$data['list_lemari'] = $this->tooling_model->get_toolbox()->result();
		$data['title'] = "Tooling - Dashboard";
		$data['nav'] = $this->nav(0);
		$this->template->display('content/dashboard', $data);
	}

	public function account_manager()
	{
		$data['list_lemari'] = $this->tooling_model->get_toolbox()->result();
		$data['title'] = "Tooling - Kelola user";
		$data['nav'] = $this->nav(2);
		$this->template->display('content/admin/account_manager', $data);
	}

	public function get_json_users()
	{
	    header('Content-Type: application/json');
	    echo $this->admin_model->get_json_users();
	}

	public function username_check()
	{
	    $username = $this->input->post('username');
	    $count = $this->admin_model->username_check($username)->num_rows();
	    if ($count > 0 ){
	    	echo 'false';
	    } else {
	    	echo 'true';
	    }
	}

	public function reusername_check()
	{
	    $id = $this->input->post('id');
	    $username = $this->input->post('username');
	    $count = $this->admin_model->reusername_check($id, $username)->num_rows();
	    if ($count > 0 ){
	    	echo 'false';
	    } else {
	    	echo 'true';
	    }
	}

	public function get_user()
	{
	    $id = $this->input->post('id');
	    $data = $this->admin_model->get_user($id)->row();	    
        header('Content-Type: application/json');
	    echo json_encode($data);
	}

	public function insert_user()
	{
		$data['u_nama'] = $this->input->post('name');
		$data['u_username'] = $this->input->post('username');
		$data['u_password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		$data['u_created'] = date('Y-m-d H:i:s');
		$data['u_last_login'] = date('Y-m-d H:i:s');
		$this->admin_model->insert_user($data);
		redirect(base_url('users'));
	}

	public function update_user($id)
	{
		$data['u_nama'] = $this->input->post('rename');
		$data['u_username'] = $this->input->post('reusername');
		$data['u_password'] = password_hash($this->input->post('repassword1'), PASSWORD_DEFAULT);
		$this->admin_model->update_user($id, $data);
		redirect(base_url('users'));
	}

	public function delete_user($id)
	{
		$data['u_id'] = $id;
		$this->admin_model->delete_user($data);
		redirect(base_url('users'));
	}

	public function reset($bid)
	{
		$data['b_id'] = $bid;
		$this->admin_model->reset($data);
		redirect(base_url('lemari/'.$bid));
	}

	public function export_user()
	{
		$input = $this->input->post();
		$header = $input['header'];
		$body = $input['body'];	
		// echo json_encode($h[5]);
		$spreadsheet = new Spreadsheet();		
		$sheet = $spreadsheet->getActiveSheet();
		// $sheet->setCellValue('A1:F5', 'Tanggal');
		$rule = 0;
		$int = 0;
		$range = range("A", "Z");
		foreach($header as $h){
			if (!($rule == 0 || $rule == 5)){
				$sheet->setCellValue($range[$int].'1', $h);
				$int++;
			}
			$rule++;
		}
		
		$row = 2;
		foreach($body as $b){
			$rule2 = 0;
			$intg = 0;
			$range2 = range("A", "Z");		
			foreach($b as $child){				
				if (!($rule2 == 0 || $rule2 == 5)){
					$sheet->setCellValue($range2[$intg].$row, $child);
					$intg++;
				}
				$rule2++;
			}
			$row++;
		}

		$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
		$writer->save("User.xlsx");

	}
}