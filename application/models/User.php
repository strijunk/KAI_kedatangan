<?php defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Model
{
	private $_table = 'user';

	public function getAll()
	{
		return $this->db->get_where($this->_table, ['deleted' => 0]);
	}
	public function save($data)
	{
		$this->db->insert($this->_table, $data);
		return $this->db->insert_id();
	}
	//edit data
	public function getById($id)
	{
		return $this->db->get_where($this->_table, ['id_user' => $id]);
	}
	//update data
	public function update($data, $id)
	{
		$this->db->where('id_user', $id);
		$this->db->update($this->_table, $data);
	}
	//delete
	public function delete($id)
	{
		//Soft delete
		$this->db->where('id_user', $id);
		$this->db->update($this->_table, ['deleted' => 1]);
	}
}
