<?php defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Model
{
	private $_table = 'jadwal_kereta';

	public function getAll()
	{
		return $this->db->get($this->_table);
	}
	public function save($data)
	{
		$this->db->insert($this->_table, $data);
		return $this->db->insert_id();
	}
	//edit data
	public function getById($id)
	{
		return $this->db->get_where($this->_table, ['id_kereta' => $id]);
	}
	//update data
	public function update($data, $id)
	{
		$this->db->where('id_kereta', $id);
		$this->db->update($this->_table, $data);
	}
	//delete
	public function delete($id)
	{
		//Soft delete
		$this->db->where('id_kereta', $id);
		$this->db->delete($this->_table);
	}
}
