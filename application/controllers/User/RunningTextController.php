<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RunningTextController extends CI_Controller
{
	//global function
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->model(['Running']);
		$this->load->library('form_validation');
	}

	public function index()
	{
		$running = $this->Running->getAll()->row();

		$data = [
			'folder'    	=> 'running',
			'page'      	=> 'index',
			'title'     	=> 'Running Text',
			'running'		=> $running,
		];

		$this->load->view('user/templates/index', $data);
	}
	//
	public function update()
	{
		$post = $this->input->post();
		$id   = $post['id'];

		$data = array(
			'text'      => $post['text'],
		);

		$this->Running->update($data, $id);
		$this->session->set_flashdata('success', 'Data berhasil diubah');
		redirect(site_url('user/running'));
	}
	//
}
