<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomeController extends CI_Controller
{
	//global function
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->model(['Jadwal', 'Running']);
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data = [
			'title'     => 'Beranda',
			'running'	=> $this->Running->getAll()->row(),
		];

		$this->load->view('home', $data);
	}
	//
	public function getData()
	{
		$data = $this->Jadwal->getAll()->result();
		echo json_encode($data);
	}
}
