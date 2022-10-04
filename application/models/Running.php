<?php defined('BASEPATH') or exit('No direct script access allowed');

class Running extends CI_Model
{
	private $_table = 'running';

	public function getAll()
	{
		return $this->db->get($this->_table);
	}
	public function getById($id)
	{
		return $this->db->get_where($this->_table, ['id_running' => $id]);
	}
	//update data
	public function update($data, $id)
	{
		$this->db->where('id_running', $id);
		$this->db->update($this->_table, $data);
	}
}
