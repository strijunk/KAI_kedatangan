<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProfilController extends CI_Controller
{
	//global function
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->model(['User']);
		$this->load->library('form_validation');
	}

	public function index()
	{
		$id 	= $this->session->userdata('id_user');
		$profil = $this->User->getById($id)->row();

		$data = [
			'folder'    	=> 'profil',
			'page'      	=> 'index',
			'title'     	=> 'Profil',
			'profil'		=> $profil,
		];

		$this->load->view('user/templates/index', $data);
	}
	//
	public function updateDetail()
	{
		$post = $this->input->post();
		$id = $this->session->userdata('id_user');
		$user = $this->User->getById($id)->row();

		$data = array(
			'username'      => $post['username'],
		);
		if ($post['password'] == '') {
			$data['password'] = $user->password;
		} else {
			$data['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
		}

		$this->User->update($data, $id);
		$this->session->set_flashdata('success', 'Data berhasil diubah');
		redirect(site_url('user/profil'));
	}
	//
}
