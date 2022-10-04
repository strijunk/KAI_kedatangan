
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	//
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	//
	public function index()
	{
		//cek jabatan
		$session = $this->session->userdata('id_user');
		if ($session == true) {
			redirect('user/dashboard');
		}
		$this->form_validation->set_rules('username', 'Username', 'trim|required', array('trim' => '', 'required' => 'Username wajib diisi.'));
		$this->form_validation->set_rules('password', 'Password', 'trim|required', array('trim' => '', 'required' => 'Password wajib diisi.'));

		if ($this->form_validation->run() == false) {
			$data = [
				'folder'    => 'auth',
				'page'      => 'login',
				'title'     => 'Login',
			];

			$this->load->view('auth/login', $data);
		} else {
			//validasi sukses
			$this->_login();
		}
	}
	private function _login()
	{
		$username       = $this->input->post('username');
		$password       = $this->input->post('password');
		//SELECT * FROM user WHERE username = username
		$user = $this->db->get_where('user', ['username' => $username])->row_array();

		if ($user) {
			//jika user ada
			if (password_verify($password, $user['password'])) {
				$data = [
					'id_user'  		=> $user['id_user'],
					'username'  	=> $user['username'],
				];
				$this->session->set_userdata($data);
				redirect('user/dashboard');
			} else {
				$this->session->set_flashdata('pass', 'Password salah');
				redirect('user');
			}
		} else {
			$this->session->set_flashdata('belum', 'Username belum terdaftar');
			redirect('user');
		}
	}


	public function logout()
	{
		$this->session->sess_destroy();
		redirect('user');
	}
}
