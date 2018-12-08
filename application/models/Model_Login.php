<?php 
/**
 * 
 */
class Model_Login extends CI_Model
{
	protected $tableName = 'user';

	public function cek($username, $password) {
		$this->db->where('username', $username);
		$this->db->where('status', '1');

		$query = $this->db->get($this->tableName)->row();

		if (!$query) return false;

		$hash = $query->password;

		if (!password_verify($password, $hash)) return false;

		return $query;
	}
}

 ?>