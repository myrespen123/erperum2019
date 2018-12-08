<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Model_Main extends CI_Model
{

	public function PerumOn() {
		$this->db->distinct();
		$this->db->select('bangunan.id_bangunan, foto_bangunan, nama_bangunan, lokasi_bangunan, jumlah_lantai, jumlah_kamar, jumlah_kamar_mandi, jumlah_garasi, status_publish');
		$this->db->from('bangunan');
		$this->db->join('pengembang', 'bangunan.id_pengembang=pengembang.id_pengembang');
		$this->db->join('sarana_prasarana', 'sarana_prasarana.id_bangunan=bangunan.id_bangunan');
		$this->db->join('fasilitas', 'fasilitas.id_bangunan=bangunan.id_bangunan');
		$this->db->join('foto_bangunan', 'foto_bangunan.id_bangunan=bangunan.id_bangunan');
		$this->db->where('status_publish', 1);
		$this->db->group_by('bangunan.id_bangunan');
		$query = $this->db->get('');

		return $query;
	}

	public function PerumScroll() {
		$this->db->distinct();
		$query = $this->db->query("SELECT * FROM bangunan INNER JOIN foto_bangunan ON foto_bangunan.id_bangunan=bangunan.id_bangunan");

		return $query;
	}

	public function PerumDev($id) {
		$this->db->distinct();
		$this->db->select('bangunan.id_bangunan, foto_bangunan, nama_bangunan, lokasi_bangunan, jumlah_lantai, jumlah_kamar, jumlah_kamar_mandi, jumlah_garasi, status_publish');
		$this->db->from('bangunan');
		$this->db->join('pengembang', 'bangunan.id_pengembang=pengembang.id_pengembang');
		$this->db->join('sarana_prasarana', 'sarana_prasarana.id_bangunan=bangunan.id_bangunan');
		$this->db->join('fasilitas', 'fasilitas.id_bangunan=bangunan.id_bangunan');
		$this->db->join('foto_bangunan', 'foto_bangunan.id_bangunan=bangunan.id_bangunan');
		$this->db->where('status_publish', 1);
		$this->db->where('bangunan.id_pengembang', $id);
		$this->db->group_by('bangunan.id_bangunan');
		$query = $this->db->get('');

		return $query;
	}

	public function new_proper() {
		$this->db->distinct();
		$this->db->select('*');
		$this->db->from('bangunan');
		$this->db->join('pengembang', 'bangunan.id_pengembang=pengembang.id_pengembang');
		$this->db->join('sarana_prasarana', 'sarana_prasarana.id_bangunan=bangunan.id_bangunan');
		$this->db->join('fasilitas', 'fasilitas.id_bangunan=bangunan.id_bangunan');
		$this->db->join('foto_bangunan', 'foto_bangunan.id_bangunan=bangunan.id_bangunan');
		$this->db->where('status_publish', 1);
		$this->db->group_by('bangunan.id_bangunan');
		$this->db->order_by('bangunan.id_bangunan', 'desc');
		$this->db->limit('6');
		$query = $this->db->get('');

		return $query;
	}
}

 ?> 