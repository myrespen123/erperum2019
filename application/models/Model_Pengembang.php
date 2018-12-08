<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Model_Pengembang extends CI_Model
{

	public function AllPerum() {
		$this->db->select('*');
		$this->db->from('bangunan');
		$this->db->join('pengembang', 'bangunan.id_pengembang=pengembang.id_pengembang');
		$this->db->join('sarana_prasarana', 'sarana_prasarana.id_bangunan=bangunan.id_bangunan');
		$this->db->join('fasilitas', 'fasilitas.id_bangunan=bangunan.id_bangunan');
		$this->db->join('foto_bangunan', 'foto_bangunan.id_bangunan=bangunan.id_bangunan');
		$query = $this->db->get()->result_array();

		return $query;
	}

	public function AllPerum2() {
		$this->db->select('*');
		$this->db->from('bangunan');
		$this->db->join('pengembang', 'bangunan.id_pengembang=pengembang.id_pengembang');
		$query = $this->db->get()->result_array();

		return $query;
	}

	public function SelectPerum($tableName, $id) {
		$this->db->query("SELECT * FROM bangunan INNER JOIN sarana_prasarana ON sarana_prasarana.id_bangunan=bangunan.id_bangunan INNER JOIN fasilitas ON fasilitas.id_bangunan=bangunan.id_bangunan INNER JOIN foto_bangunan ON foto_bangunan.id_bangunan=bangunan.id_bangunan");
		$this->db->where('id_pengembang', $id);
		$result = $this->db->get($tableName);
		return $result->result_array();
	}

	public function PerumDet($id) {
		$this->db->distinct();
		$this->db->select('*');
		$this->db->from('bangunan');
		$this->db->join('pengembang', 'bangunan.id_pengembang=pengembang.id_pengembang');
		$this->db->join('sarana_prasarana', 'sarana_prasarana.id_bangunan=bangunan.id_bangunan');
		$this->db->join('fasilitas', 'fasilitas.id_bangunan=bangunan.id_bangunan');
		$this->db->join('foto_bangunan', 'foto_bangunan.id_bangunan=bangunan.id_bangunan');
		$this->db->where('status_publish', 1);
		$this->db->group_by('bangunan.id_bangunan');
		$this->db->where('bangunan.id_bangunan', $id);
		$query = $this->db->get();

		return $query;
	}

	public function PerumDetil($id) {
		$this->db->query("SELECT * FROM bangunan INNER JOIN sarana_prasarana ON sarana_prasarana.id_bangunan=bangunan.id_bangunan INNER JOIN fasilitas ON fasilitas.id_bangunan=bangunan.id_bangunan INNER JOIN foto_bangunan ON foto_bangunan.id_bangunan=bangunan.id_bangunan INNER JOIN pengembang ON bangunan.id_pengembang=pengembang.id_pengembang");
		$this->db->where('bangunan.id_bangunan', $id);
		$query = $this->db->get('bangunan');

		return $query;
	}


	public function SelectSarana($id) {
		$this->db->query("SELECT * FROM bangunan INNER JOIN sarana_prasarana ON sarana_prasarana.id_bangunan=bangunan.id_bangunan");
		$this->db->where('bangunan.id_bangunan', $id);
		$query = $this->db->get('bangunan');

		return $query;
	}

	public function SelectFasiliti($id) {
		$this->db->query("SELECT * FROM bangunan INNER JOIN fasilitas ON fasilitas.id_bangunan=bangunan.id_bangunan");
		$this->db->where('bangunan.id_bangunan', $id);
		$query = $this->db->get('bangunan');

		return $query;
	}

	public function SelectFoto($id) {
		$this->db->query("SELECT * FROM bangunan INNER JOIN foto_bangunan ON foto_bangunan.id_bangunan=bangunan.id_bangunan");
		$this->db->where('bangunan.id_bangunan', $id);
		$query = $this->db->get('bangunan');

		return $query;
	}


	public function pick($id) {
		$this->db->select('*');
		$this->db->from('pengembang');
		$this->db->join('user', 'user.id_user=pengembang.id_user');
		$this->db->where('id_pengembang', $id);
		$query = $this->db->get();

		return $query;
	}

	public function pick_user($id) {
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('pengembang', 'pengembang.id_user=user.id_user');
		$this->db->where('user.id_user', $id);
		$query = $this->db->get();

		return $query;
	}

	public function InsertMulti($data = array()) {
		$InsertMulti = $this->db->insert_batch('foto_bangunan', $data);
		return $InsertMulti;
	}

	public function InsertBatch($tableName, $data = array()) {
		$InsertBatch = $this->db->insert_batch($tableName, $data);
		return $InsertBatch;
	}
}

 ?>