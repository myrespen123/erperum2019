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
		$this->db->select('bangunan.id_bangunan, bangunan_slug, foto_bangunan, nama_bangunan, lokasi_bangunan, jumlah_lantai, jumlah_kamar, jumlah_kamar_mandi, jumlah_garasi, status_publish');
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

	public function InnerPerum() {
		$this->db->distinct();
		$this->db->select('*');
		$this->db->from('perumahan');
		$this->db->join('bangunan', 'bangunan.id_perumahan=perumahan.id_perumahan');
		$this->db->join('pengembang', 'bangunan.id_pengembang=pengembang.id_pengembang');
		// $this->db->join('sarana_prasarana', 'sarana_prasarana.id_bangunan=bangunan.id_bangunan');
		// $this->db->join('fasilitas', 'fasilitas.id_bangunan=bangunan.id_bangunan');
		// $this->db->join('foto_bangunan', 'foto_bangunan.id_bangunan=bangunan.id_bangunan');
		$query = $this->db->get('');

		return $query;
	}

	public function PerumahanDev($id) {
		$this->db->distinct();
		$this->db->from('perumahan');
		$this->db->join('pengembang', 'perumahan.id_pengembang=pengembang.id_pengembang');
		$this->db->join('sarana_prasarana_perumahan', 'sarana_prasarana_perumahan.id_perumahan=perumahan.id_perumahan');
		$this->db->join('fasilitas_perumahan', 'fasilitas_perumahan.id_perumahan=perumahan.id_perumahan');
		// $this->db->join('foto_bangunan', 'foto_bangunan.id_perumahan=perumahan.id_perumahan');
		$this->db->where('status_perumahan', 1);
		$this->db->where('perumahan.id_pengembang', $id);
		$this->db->group_by('perumahan.id_perumahan');
		$query = $this->db->get('');

		return $query;
	}

	public function PropertiDev($id) {
		$this->db->distinct();
		$this->db->from('bangunan');
		$this->db->join('pengembang', 'bangunan.id_pengembang=pengembang.id_pengembang');
		$this->db->join('perumahan', 'bangunan.id_perumahan=perumahan.id_perumahan');
		$this->db->join('spesifikasi_rumah', 'spesifikasi_rumah.id_bangunan=bangunan.id_bangunan');
		$this->db->join('foto_bangunan', 'foto_bangunan.id_bangunan=bangunan.id_bangunan');
		$this->db->where('status_perumahan', 1);
		$this->db->where('status_publish', 1);
		$this->db->where('bangunan.id_pengembang', $id);
		$this->db->group_by('bangunan.id_bangunan');
		$query = $this->db->get('');

		return $query;
	}

	public function PropertiEstate($id) {
		$this->db->distinct();
		$this->db->from('bangunan');
		$this->db->join('pengembang', 'bangunan.id_pengembang=pengembang.id_pengembang');
		$this->db->join('perumahan', 'bangunan.id_perumahan=perumahan.id_perumahan');
		$this->db->join('spesifikasi_rumah', 'spesifikasi_rumah.id_bangunan=bangunan.id_bangunan');
		$this->db->join('foto_bangunan', 'foto_bangunan.id_bangunan=bangunan.id_bangunan');
		$this->db->where('status_perumahan', 1);
		$this->db->where('status_publish', 1);
		$this->db->where('bangunan.id_perumahan', $id);
		$this->db->group_by('bangunan.id_bangunan');
		$query = $this->db->get('');

		return $query;
	}

	public function EstateDev($id) {
		$this->db->select('*');
		$this->db->from('perumahan');
		$this->db->join('pengembang', 'perumahan.id_pengembang=pengembang.id_pengembang');
		$this->db->join('foto_perumahan', 'foto_perumahan.id_perumahan=perumahan.id_perumahan');
		$this->db->join('fasilitas_perumahan', 'fasilitas_perumahan.id_perumahan=perumahan.id_perumahan');
		$this->db->join('sarana_prasarana_perumahan', 'sarana_prasarana_perumahan.id_perumahan=perumahan.id_perumahan');
	}

	public function PerumahanArray($id) {
		$this->db->distinct();
		$this->db->select('*');
		$this->db->from('perumahan');
		$this->db->join('pengembang', 'perumahan.id_pengembang=pengembang.id_pengembang');
		$this->db->join('kecamatan', 'perumahan.id_kecamatan=kecamatan.id_kecamatan');
		$this->db->join('kelurahan', 'perumahan.id_kelurahan=kelurahan.id_kelurahan');
		$this->db->join('foto_perumahan', 'foto_perumahan.id_perumahan=perumahan.id_perumahan');
		$this->db->join('fasilitas_perumahan', 'fasilitas_perumahan.id_perumahan=perumahan.id_perumahan');
		$this->db->join('sarana_prasarana_perumahan', 'sarana_prasarana_perumahan.id_perumahan=perumahan.id_perumahan');
		$this->db->where('pengembang.id_pengembang', $id);
		$this->db->where('perumahan.status_perumahan', 1);
		$this->db->group_by('perumahan.id_perumahan');

		$query = $this->db->get();

		return $query;
	}
}

 ?> 