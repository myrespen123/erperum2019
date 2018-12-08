<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Index_Model extends CI_Model
{
	public function Select($tableName) {
		$result = $this->db->get($tableName);
		return $result->result_array();
	}

	public function GetWhere($tableName, $data) {
		$result = $this->db->get_where($tableName, $data);
		return $result->result_array();
	}

	public function Insert($tableName, $data) {
		$result = $this->db->insert($tableName, $data);
		return $result;
	}

	public function Update($tableName, $data, $where) {
		$result = $this->db->update($tableName, $data, $where);
		return $result;
	}

	public function Delete($tableName, $where) {
		$result = $this->db->delete($tableName, $where);
		return $result;
	}
}

 ?>