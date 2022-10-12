<?php

defined('BASEPATH') or exit('No direct script access allowed');

class JadwalController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Jadwal');
		$this->load->helper('form');
		user();
	}
	//
	public function index()
	{
		$data = [
			'folder'    => 'jadwal',
			'page'      => 'index',
			'title'     => 'Jadwal Kereta',
		];

		$this->load->view('user/templates/index', $data);
	}
	//
	public function getData()
	{
		$data = $this->Jadwal->getAll()->result();
		echo json_encode($data);
	}
	//
	public function store()
	{
		//ambil data dari form
		$post = $this->input->post();

		$data = array(
			'jalur_kereta'	=> $post['jalur_kereta'],
			'no_kereta'		=> $post['no_kereta'],
			'nama_kereta'  	=> ucwords($post['nama_kereta']),
			'tujuan_kereta'	=> ucwords($post['tujuan_kereta']),
			'waktu_kedatangan'	=> $post['waktu_kedatangan'],

		);

		$this->Jadwal->save($data);
		echo json_encode($data);
		require_once(APPPATH . 'views/vendor/autoload.php');
		$options = array(
			'cluster' => 'ap1',
			'useTLS' => true
		);
		$pusher = new Pusher\Pusher(
			'fae17dc39599b4dfcd36', //ganti dengan App_key pusher Anda
			'0b5fbd056eac7b18c466', //ganti dengan App_secret pusher Anda
			'1385286', //ganti dengan App_key pusher Anda
			$options
		);

		$push['message'] = 'success';
		$pusher->trigger('my-channel', 'my-event', $push);
	}
	//
	public function getById()
	{
		$id = $this->input->get('id');
		$data = $this->Jadwal->getById($id)->row();
		echo json_encode($data);
	}
	//
	public function update()
	{
		$post = $this->input->post();
		$id = $post['id'];
		$data = array(
			'jalur_kereta'	=> $post['jalur_kereta'],
			'no_kereta'		=> $post['no_kereta'],
			'nama_kereta'  	=> ucwords($post['nama_kereta']),
			'tujuan_kereta'	=> ucwords($post['tujuan_kereta']),
			'waktu_kedatangan'	=> $post['waktu_kedatangan'],
		);
		$this->Jadwal->update($data, $id);
		echo json_encode($data);
		require_once(APPPATH . 'views/vendor/autoload.php');
		$options = array(
			'cluster' => 'ap1',
			'useTLS' => true
		);
		$pusher = new Pusher\Pusher(
			'fae17dc39599b4dfcd36', //ganti dengan App_key pusher Anda
			'0b5fbd056eac7b18c466', //ganti dengan App_secret pusher Anda
			'1385286', //ganti dengan App_key pusher Anda
			$options
		);

		$push['message'] = 'success';
		$pusher->trigger('my-channel', 'my-event', $push);
	}
	public function delete()
	{
		$id = $this->input->post('id');

		$data = $this->Jadwal->delete($id);
		echo json_encode($data);
		require_once(APPPATH . 'views/vendor/autoload.php');
		$options = array(
			'cluster' => 'ap1',
			'useTLS' => true
		);
		$pusher = new Pusher\Pusher(
			'fae17dc39599b4dfcd36', //ganti dengan App_key pusher Anda
			'0b5fbd056eac7b18c466', //ganti dengan App_secret pusher Anda
			'1385286', //ganti dengan App_key pusher Anda
			$options
		);

		$push['message'] = 'success';
		$pusher->trigger('my-channel', 'my-event', $push);
	}
}
