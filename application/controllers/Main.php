<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Main extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('tooling_model');
		$this->load->library('template');
        $this->load->library('session');
        $this->load->library('datatables');
        $this->is_login();
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

	public function is_login()
	{
		if(empty($this->session->userdata('u_id'))){
			redirect(base_url('login'));
		}
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
		$data['list_lemari'] = $this->tooling_model->get_toolbox()->result();
		$data['lemari'] = $this->tooling_model->toolbox($id)->row();
		$data['title'] = 'Tooling - ' . $data['lemari']->b_nama;
		$data['nav'] = $this->nav(1);

		$bid = $data['lemari']->b_id;
		$data['alat'] = $this->tooling_model->tools($bid)->result();
		$data['kembali_alat'] = $this->tooling_model->tools_missing($bid)->result();
		$data['rusak_alat'] = $this->tooling_model->tools_broken($bid)->result();
		$data['kembali_rusak_alat'] = $this->tooling_model->tools_miss_broken($bid)->result();
		$data['jml_alat'] = $this->tooling_model->tools($bid)->num_rows();

		$this->template->display('content/toolbox', $data);
	}

	// public function history()
	// {
	// 	$data['list_lemari'] = $this->tooling_model->get_toolbox()->result();
	// 	$data['lemari'] = $this->tooling_model->toolbox(1)->row();
	// 	$data['title'] = 'Tooling - History ' . $data['lemari']->b_nama;
	// 	$this->template->display('content/history', $data);
	// }

	public function get_json_history($bid)
	{
	    header('Content-Type: application/json');
	    echo $this->tooling_model->get_json_history($bid);
	}

	public function action()
	{
		$data['h_action'] = $this->input->post('act');
		$data['h_tanggal'] = date("Y-m-d H:i:s");
		$data['u_id'] = $this->session->userdata('u_id');
		$data['b_id'] = $this->input->post('bid');
		$data['t_id'] = $this->input->post('aid');
		$data['t_kondisi'] = $this->input->post('kondisi');
		$this->tooling_model->action($data);
		$this->tooling_model->tool_act($data['t_id'],$data['h_action'],$data['t_kondisi']);
		echo json_encode("success");
	}

	public function ambil()
	{
		$data['h_action'] = 2;
		$data['h_tanggal'] = date("Y-m-d H:i:s");
		$data['b_id'] = $this->input->post('b_id');
		$data['t_id'] = $this->input->post('t_id');
		$data['t_kondisi'] = $this->input->post('t_kondisi');
		$this->tooling_model->action($data);
		$this->tooling_model->tool_act($data['t_id'],2,$data['t_kondisi']);
		echo json_encode($data);
	}

	public function taruh()
	{
		$data['h_action'] = 4;
		$data['h_tanggal'] = date("Y-m-d H:i:s");
		$data['b_id'] = $this->input->post('b_id');
		$data['t_id'] = $this->input->post('t_id');
		$data['t_kondisi'] = $this->input->post('t_kondisi');
		$this->tooling_model->action($data);
		$this->tooling_model->tool_act($data['t_id'],4,$data['t_kondisi']);
		echo json_encode($data);
	}

	public function export_history()
	{
		$input = $this->input->post();
		$header = $input['header'];
		$body = $input['body'];	
		// echo json_encode($h[5]);
		$spreadsheet = new Spreadsheet();		
		$sheet = $spreadsheet->getActiveSheet();
		// $sheet->setCellValue('A1:F5', 'Tanggal');
		$int = 0;
		$range = range("A", "Z");
		foreach($header as $h){
			$sheet->setCellValue($range[$int].'1', $h);
			$int++;
		}
		
		$row = 2;
		foreach($body as $b){
			$intg = 0;
			$range2 = range("A", "Z");		
			foreach($b as $child){
				$sheet->setCellValue($range2[$intg].$row, $child);
				$intg++;
			}
			$row++;
		}

		$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, "Xlsx");
		$writer->save("History.xlsx");

	}


}