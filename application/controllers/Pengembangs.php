<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Pengembangs extends CI_Controller
{

	public function __construct() {
		parent::__construct();

		$this->load->model('Index_Model');
		$this->load->model('Model_Pengembang');
		$this->load->model('Model_Select');
		$this->load->model('Model_Main');
		$this->load->helper('Login_Helper');
		$this->load->library('form_validation');
		
	}

	public function index() {
		$id = $this->session->userdata('id_user');
		$query = $this->Model_Pengembang->pick_user($id);

		$row = $query->row();
		$id_pengembang = $row->id_pengembang;

		$q_perumahan = $this->db->get_where('perumahan', array('id_pengembang' => $id_pengembang));
		$q_perumahan_active = $this->db->get_where('perumahan', array('id_pengembang' => $id_pengembang, 'status_perumahan' => 1));
		$q_perumahan_inactive = $this->db->get_where('perumahan', array('id_pengembang' => $id_pengembang, 'status_perumahan' => 2));
		$q_perumahan_inconfirm = $this->db->get_where('perumahan', array('id_pengembang' => $id_pengembang, 'status_perumahan' => 0));
		$q_properti = $this->db->get_where('bangunan', array('id_pengembang' => $id_pengembang));
		$q_properti_active = $this->db->get_where('bangunan', array('id_pengembang' => $id_pengembang, 'status_publish' => 1));
		$q_properti_inactive = $this->db->get_where('bangunan', array('id_pengembang' => $id_pengembang, 'status_publish' => 2));
		$q_properti_inconfirm = $this->db->get_where('bangunan', array('id_pengembang' => $id_pengembang, 'status_publish' => 0));
		$query2 = $this->db->query("SELECT * FROM bangunan WHERE id_pengembang='$id_pengembang'");
		$query3 = $this->db->get_where('bangunan', array('id_pengembang' => $id_pengembang, 'status_publish' => 1));
		$query4 = $this->db->get_where('bangunan', array('id_pengembang' => $id_pengembang, 'status_publish' => 0));
		$data  = array(
					'row' 			=> $query->row(),
					'num_list' 		=> $query2->num_rows(),
					'num_active' 	=> $query3->num_rows(),
					'num_inactive' 	=> $query4->num_rows(),
					'jumlah_perumahan' => $q_perumahan->num_rows(),
					'perumahan_active' => $q_perumahan_active->num_rows(),
					'perumahan_nonactive' => $q_perumahan_inactive->num_rows(),
					'perumahan_nonconfirm' => $q_perumahan_inconfirm->num_rows(),
					'jumlah_properti' => $q_properti->num_rows(),
					'properti_active' => $q_properti_active->num_rows(),
					'properti_nonactive' => $q_properti_inactive->num_rows(),
					'properti_nonconfirm' => $q_properti_inconfirm->num_rows(),
					'title' 		=> "dashboard"
				);

		$this->load->view('pengembangs/dashboard', $data);
	}

	public function perumahan_data() {
		$id_akun = $this->session->userdata('id_user');
		$data_akun = $this->Model_Pengembang->pick_user($id_akun);
		$row = $data_akun->row();
		$id_pengembang = $row->id_pengembang;

		// $this->db->where('bangunan.id_pengembang', $id_pengembang);
		// $this->db->group_by('perumahan.id_perumahan');
		$this->db->join('pengembang', 'perumahan.id_pengembang=pengembang.id_pengembang');
		$this->db->where('perumahan.id_pengembang', $id_pengembang);
		$query = $this->db->get('perumahan');

		$data['data'] = $query->result_array();
		$data['title'] = "perumahan_data";
		$this->load->view('pengembangs/perumahan/perumahan_data', $data);
	}

	public function estate_create() {
		$data['kecamatan'] = $this->db->get('kecamatan')->result_array();
		$data['kelurahan'] = $this->db->get('kelurahan')->result_array();
		$data['title'] = "perumahan_data";
		$this->load->view('pengembangs/perumahan/estate_create', $data);
	}

	public function get_kelurahan() {
		$id_kec = $this->input->post('id_kecamatan');
		$query9 = $this->db->get_where('kelurahan', array('id_kecamatan' => $id_kec));
		$result9 = $query9->result_array();
		$output = '';
		$output .= '<option value="">pilih kelurahan</option>';
		foreach ($result9 as $data9) {
			$output .= '<option value="'.$data9["id_kelurahan"].'">'.$data9["nama_kelurahan"].'</option>';
		}
		echo $output;
	}

	public function estate_insert() {
		$this->form_validation->set_rules('longitude', 'longitude', 'required');
		$this->form_validation->set_rules('latitude', 'latitude', 'required');

		if ($this->form_validation->run() != FALSE) {
			$id_user = $this->session->userdata('id_user');
			$select_dev = $this->db->get_where('pengembang', array('id_user' => $id_user))->row();
			$id_pengembang = $select_dev->id_pengembang;

			$id_kecamatan 	= $this->input->post('id_kecamatan');
			$id_kelurahan 	= $this->input->post('id_kelurahan');
			$nama_perumahan = $this->input->post('nama_perumahan');
			$deskripsi_perumahan = $this->input->post('deskripsi_perumahan');
			$lokasi 		= $this->input->post('lokasi');
			$longitude 		= $this->input->post('longitude');
			$latitude 		= $this->input->post('latitude');

			$string 	= preg_replace('~[^\\pL\d]+~u', '-', $nama_perumahan);
			$trim 		= trim($string);
			$pre_slug 	= strtolower(str_replace(" ", "-", $trim));
			$date 		= substr(date('Ymd'), 2,8);
			$random 	= rand(0, 1000);
			$perumahan_slug = $pre_slug."-".$date.$random; 

			$nama_sarana_prasarana_perumahan 	= $this->input->post('nama_sarana_prasarana_perumahan');
			$nama_fasilitas_perumahan 			= $this->input->post('nama_fasilitas_perumahan');

			$data = array(
						'id_pengembang' 	=> $id_pengembang,
						'id_kecamatan' 		=> $id_kecamatan,
						'id_kelurahan' 		=> $id_kelurahan,
						'nama_perumahan' 	=> $nama_perumahan,
						'deskripsi_perumahan' => $deskripsi_perumahan,
						'lokasi' 			=> $lokasi,
						'longitude' 		=> $longitude,
						'latitude' 			=> $latitude,
						'slug' 				=> $perumahan_slug,
						'status_perumahan'	=> 0
					);

			$config['upload_path'] = './file/perumahan/file/';
			$config['allowed_types'] = 'pdf|jpg|png|jpeg|';
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('legalitas')) {
				$data['legalitas'] = '';
			} else {
				$file = $this->upload->data();
				$data['legalitas'] = $file['file_name'];
			}

			$execute = $this->Index_Model->Insert('perumahan', $data);

			if ($execute == TRUE) {
				$id_perumahan = $this->db->insert_id();

				if (!empty($_FILES['foto_perumahan']['name'])) {
				$filescount = count($_FILES['foto_perumahan']['name']);

					for ($i=0; $i < $filescount; $i++) { 
						$_FILES['file']['name']     = $_FILES['foto_perumahan']['name'][$i];
		                $_FILES['file']['type']     = $_FILES['foto_perumahan']['type'][$i];
		                $_FILES['file']['tmp_name'] = $_FILES['foto_perumahan']['tmp_name'][$i];
		                $_FILES['file']['error']     = $_FILES['foto_perumahan']['error'][$i];
		                $_FILES['file']['size']     = $_FILES['foto_perumahan']['size'][$i];

		                $configB['upload_path'] = './file/perumahan/estate/';
		                $configB['allowed_types'] = 'pdf|jpg|png|jpeg|';

		                $this->load->library('upload', $configB);
		                $this->upload->initialize($configB);

		                if ($this->upload->do_upload('file')) {
		                	$fileData = $this->upload->data();
		             		$uploadData[$i]['id_perumahan'] = $id_perumahan;
		                	$uploadData[$i]['foto_perumahan'] = $fileData['file_name'];
		                	if ($i == 0) {
			             		$uploadData[$i]['status_foto'] = 1;
		                	} else {
			             		$uploadData[$i]['status_foto'] = 0;
		                	}
		                }
					}

					if (!empty($uploadData)) {
						$insertfoto = $this->Model_Pengembang->InsertMultiP($uploadData);
					}
				}
				
				foreach ($nama_sarana_prasarana_perumahan as $key => $value) {
					$data_sarana = array(
										'id_perumahan' 			=> $id_perumahan,
										'nama_sarana_prasarana_perumahan' => $nama_sarana_prasarana_perumahan[$key]
									);

					$excute = $this->Index_Model->Insert('sarana_prasarana_perumahan', $data_sarana);
				}

				foreach ($nama_fasilitas_perumahan as $fasil => $val_fasil) {
					$data_fasiliti = array(
										'id_perumahan' 			=> $id_perumahan,
										'nama_fasilitas_perumahan' 		=> $nama_fasilitas_perumahan[$fasil]
									);
					
					$excute2 = $this->Index_Model->Insert('fasilitas_perumahan', $data_fasiliti);
				}
				$this->session->set_flashdata('simpan', 'Berhasil menambah data');
				redirect('pengembangs/perumahan_data', 'refresh');
			} else {
				$this->session->set_flashdata('gagal', 'Kesalahan dalam sistem');
				redirect('pengembangs/perumahan_data', 'refresh');
			}
		} else {
			$this->session->set_flashdata('gagal', 'Map harus diisi');
			redirect('pengembangs/perumahan_data', 'refresh');
		}
	}

	public function estate_edit($id) {
		$query = $this->db->get_where('perumahan', array('id_perumahan' => $id));
		$select_kec = $this->db->get('kecamatan');
		$select_kel = $this->db->get('kelurahan');

		$data['kecamatan'] = $select_kec->result_array();
		$data['kelurahan'] = $select_kel->result_array();
		$data['title'] 	= "perumahan_data";
		$data['row'] 	= $query->row();
		$this->load->view('pengembangs/perumahan/estate_edit', $data);
	}

	public function estate_update($id) {
		$select_cli = $this->db->get_where('perumahan', array('id_perumahan' => $id));
		$row_cli	= $select_cli->row();

		$this->form_validation->set_rules('longitude', 'longitude', 'required');
		$this->form_validation->set_rules('latitude', 'latitude', 'required');

		if ($this->form_validation->run() != FALSE) {
			$id_user = $this->session->userdata('id_user');
			$select_dev = $this->db->get_where('pengembang', array('id_user' => $id_user))->row();
			$id_pengembang = $select_dev->id_pengembang;

			$id_kecamatan 	= $this->input->post('id_kecamatan');
			$id_kelurahan 	= $this->input->post('id_kelurahan');
			$nama_perumahan = $this->input->post('nama_perumahan');
			$deskripsi_perumahan = $this->input->post('deskripsi_perumahan');
			$lokasi 		= $this->input->post('lokasi');
			$longitude 		= $this->input->post('longitude');
			$latitude 		= $this->input->post('latitude');

		$string 	= preg_replace('~[^\\pL\d]+~u', '-', $nama_perumahan);
		$trim 		= trim($string);
		$pre_slug 	= strtolower(str_replace(" ", "-", $trim));
		$date 		= substr(date('Ymd'), 2,8);
		$random 	= rand(0, 1000);
		$perumahan_slug = $pre_slug."-".$date.$random; 
			$perumahan_slug = $pre_slug."-".$date.$random; 

			$data = array(
						'id_pengembang' 	=> $id_pengembang,
						'id_kecamatan' 		=> $id_kecamatan,
						'id_kelurahan' 		=> $id_kelurahan,
						'nama_perumahan' 	=> $nama_perumahan,
						'deskripsi_perumahan' => $deskripsi_perumahan,
						'lokasi' 			=> $lokasi,
						'longitude' 		=> $longitude,
						'latitude' 			=> $latitude,
						'slug' 				=> $perumahan_slug
					);
			$where = array('id_perumahan' => $id);

			$config['upload_path'] = './file/perumahan/file/';
			$config['allowed_types'] = 'jpg|png|jpeg|';
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('legalitas')) {
				if ($row_cli->legalitas == '') {
					$image 	  = $this->upload->data();
					$data['legalitas'] = $image['file_name'];
				} else {
					unlink('./file/perumahan/file/'.$row_cli->legalitas);
					$image 	  = $this->upload->data();
					$data['legalitas'] = $image['file_name'];
				}
			}
			$execute = $this->Index_Model->Update('perumahan', $data, $where);
			if ($execute == TRUE) {
				$this->session->set_flashdata('simpan', 'Berhasil mengubah data');
				redirect('pengembangs/perumahan_data', 'refresh');
			} else {
				$this->session->set_flashdata('gagal', 'Gagal mengubah data');
				redirect('pengembangs/perumahan_data', 'refresh');
			}
		} else {
			$this->session->set_flashdata('gagal', 'Map harus diisi');
			redirect('pengembangs/perumahan_data', 'refresh');
		}
	}

	public function estate_detail($id) {
		$query = $this->db->get_where('perumahan', array('id_perumahan' => $id));
		$query2 = $this->db->get_where('sarana_prasarana_perumahan', array('id_perumahan' => $id));
		$query3 = $this->db->get_where('fasilitas_perumahan', array('id_perumahan' => $id));
		$select_kec = $this->db->get('kecamatan');
		$select_kel = $this->db->get('kelurahan');
		$query_foto = $this->db->get_where('foto_perumahan', array('id_perumahan' => $id));


		$data['foto_perumahan'] = $query_foto->result_array();
		$data['kecamatan'] = $select_kec->result_array();
		$data['kelurahan'] = $select_kel->result_array();
		$data['sarana_prasarana_perumahan'] = $query2->result_array();
		$data['fasilitas_perumahan'] = $query3->result_array();
		$data['title'] 	= "perumahan_data";
		$data['row'] 	= $query->row();
		$this->load->view('pengembangs/perumahan/estate_detail', $data);
	}

	public function properti_data($id) {
		$id_akun = $this->session->userdata('id_user');
		$data_akun = $this->Model_Pengembang->pick_user($id_akun);
		$row = $data_akun->row();
		$id_pengembang = $row->id_pengembang;

		$this->db->join('perumahan', 'bangunan.id_perumahan=perumahan.id_perumahan');
		$this->db->where('bangunan.id_pengembang', $id_pengembang);
		$this->db->where('bangunan.id_perumahan', $id);
		$query = $this->db->get('bangunan');

		$data['data'] = $query->result_array();
		$data['id_perumahan'] = $id;
		$data['row'] = $this->db->get_where('perumahan', array('id_perumahan' => $id))->row();
		$data['title'] = "perumahan_data";
		$this->load->view('pengembangs/perumahan/properti_data', $data);
	}

	public function properti_create($id) {
		$query=  $this->db->get_where('perumahan', array('id_perumahan' => $id));
		$select_kec = $this->db->get('kecamatan');
		$select_kel = $this->db->get('kelurahan');

		$data['kecamatan'] = $select_kec->result_array();
		$data['kelurahan'] = $select_kel->result_array();
		$data['row'] = $query->row();
		$data['id_perumahan'] = $id;
		$data['title'] = "perumahan_data";
		$this->load->view('pengembangs/perumahan/properti_create', $data);
	}

	public function properti_insert($id) {
		$id_user = $this->session->userdata('id_user');
		$select_dev = $this->db->get_where('pengembang', array('id_user' => $id_user))->row();
		$id_dev = $select_dev->id_pengembang;

		$nama_bangunan		= $this->input->post('nama_bangunan');
		$deskripsi_bangunan	= $this->input->post('deskripsi_bangunan');
		$kategori_bangunan 	= $this->input->post('kategori_bangunan');
		$tipe_bangunan	 	= $this->input->post('tipe_bangunan');
		$jumlah_tersedia 	= $this->input->post('jumlah_tersedia');
		$harga_bangunan 	= $this->input->post('harga_bangunan');
		$id_kecamatan 		= $this->input->post('id_kecamatan');
		$id_kelurahan 		= $this->input->post('id_kelurahan');
		$lokasi_bangunan 	= $this->input->post('lokasi_bangunan');
		$luas_bangunan 		= $this->input->post('luas_bangunan');
		$luas_tanah 		= $this->input->post('luas_tanah');

		$dimensib_kiri 		= $this->input->post('dimensib_kiri');
		$dimensib_kanan 	= $this->input->post('dimensib_kanan');
		$dimensit_kiri 		= $this->input->post('dimensit_kiri');
		$dimensit_kanan 	= $this->input->post('dimensit_kanan');
		$dimensi_bangunan 	= $dimensib_kiri." x ".$dimensib_kanan;
		$dimensi_tanah 		= $dimensit_kiri." x ".$dimensit_kanan;

		$jumlah_lantai 		= $this->input->post('jumlah_lantai');
		$jumlah_kamar 		= $this->input->post('jumlah_kamar');
		$jumlah_kamar_mandi = $this->input->post('jumlah_kamar_mandi');
		$jumlah_garasi 		= $this->input->post('jumlah_garasi');
		$listrik 			= $this->input->post('listrik');

		$string 	= preg_replace('~[^\\pL\d]+~u', '-', $nama_bangunan);
		$trim 		= trim($string);
		$pre_slug 	= strtolower(str_replace(" ", "-", $trim));
		$date 		= substr(date('Ymd'), 2,8);
		$random 	= rand(0, 1000);
		$bangunan_slug = $pre_slug."-".$date.$random;

		$nama_spesifikasi_rumah = $this->input->post('nama_spesifikasi_rumah');

		$data = array(
					'id_perumahan' 			=> $id,
					'id_pengembang' 		=> $id_dev,
					'id_kecamatan' 			=> $id_kecamatan,
					'id_kelurahan' 			=> $id_kelurahan,
					'kategori_bangunan' 	=> $kategori_bangunan,
					'tipe_bangunan'		 	=> $tipe_bangunan,
					'nama_bangunan'			=> $nama_bangunan,
					'deskripsi_bangunan' 	=> $deskripsi_bangunan,
					'harga_bangunan' 		=> $harga_bangunan,
					'lokasi_bangunan' 		=> $lokasi_bangunan,
					'jumlah_tersedia' 		=> $jumlah_tersedia,
					'luas_bangunan' 		=> $luas_bangunan,
					'luas_tanah' 			=> $luas_tanah,
					'dimensi_bangunan' 		=> $dimensi_bangunan,
					'dimensi_tanah' 		=> $dimensi_tanah,
					'jumlah_lantai' 		=> $jumlah_lantai,
					'jumlah_kamar' 			=> $jumlah_kamar,
					'jumlah_kamar_mandi' 	=> $jumlah_kamar_mandi,
					'jumlah_garasi' 		=> $jumlah_garasi,
					'listrik' 				=> $listrik,
					'status_publish' 		=> 0,
					'bangunan_slug' 		=> $bangunan_slug
				);
		$execute_bangunan = $this->Index_Model->Insert('bangunan', $data);
		if ($execute_bangunan == TRUE) {
			$id_bangunan = $this->db->insert_id();

			if (!empty($_FILES['foto_bangunan']['name'])) {
				$filescount = count($_FILES['foto_bangunan']['name']);

					for ($i=0; $i < $filescount; $i++) { 
						$_FILES['file']['name']     = $_FILES['foto_bangunan']['name'][$i];
		                $_FILES['file']['type']     = $_FILES['foto_bangunan']['type'][$i];
		                $_FILES['file']['tmp_name'] = $_FILES['foto_bangunan']['tmp_name'][$i];
		                $_FILES['file']['error']     = $_FILES['foto_bangunan']['error'][$i];
		                $_FILES['file']['size']     = $_FILES['foto_bangunan']['size'][$i];

		                $configB['upload_path'] = './file/perumahan/images/';
		                $configB['allowed_types'] = 'pdf|jpg|png|jpeg|';

		                $this->load->library('upload', $configB);
		                $this->upload->initialize($configB);

		                if ($this->upload->do_upload('file')) {
		                	$fileData = $this->upload->data();
		             		$uploadData[$i]['id_bangunan'] = $id_bangunan;
		                	$uploadData[$i]['foto_bangunan'] = $fileData['file_name'];
		                	if ($i == 0) {
			             		$uploadData[$i]['level_foto'] = 1;
		                	} else {
			             		$uploadData[$i]['level_foto'] = 0;
		                	}
		                }
					}

					if (!empty($uploadData)) {
						$insertfoto = $this->Model_Pengembang->InsertMulti($uploadData);
					}
			}

			foreach ($nama_spesifikasi_rumah as $spek => $val_spek) {
				$data_spek = array(
									'id_bangunan' 				=> $id_bangunan,
									'nama_spesifikasi_rumah' 	=> $nama_spesifikasi_rumah[$spek]
								);
				
				$excute2 = $this->Index_Model->Insert('spesifikasi_rumah', $data_spek);
			}

			$this->session->set_flashdata('simpan', 'Berhasil menambah data');
			redirect('pengembangs/properti_data/'.$id, 'refresh');
		} else {
			$this->session->set_flashdata('gagal', 'Kesalahan dalam sistem');
			redirect('pengembangs/properti_data/'.$id, 'refresh');
		}

	}

	public function properti_detail($id) {
		// $this->db->join('kecamatan', 'bangunan.id_kecamatan=kecamatan.id_kecamatan');
		// $this->db->join('kelurahan', 'bangunan.id_kelurahan=kelurahan.id_kecamatan');
		$this->db->join('foto_bangunan', 'foto_bangunan.id_bangunan=bangunan.id_bangunan');
		$this->db->join('spesifikasi_rumah', 'spesifikasi_rumah.id_bangunan=bangunan.id_bangunan');
		$this->db->group_by('bangunan.id_bangunan');
		$query = $this->db->get_where('bangunan', array('bangunan.id_bangunan' => $id));
		$query2 = $this->db->get_where('foto_bangunan', array('foto_bangunan.id_bangunan' => $id))->result_array();
		$query3 = $this->db->get_where('spesifikasi_rumah', array('id_bangunan' => $id))->result_array();
		$select_kec = $this->db->get('kecamatan');
		$select_kel = $this->db->get('kelurahan');

		$data['foto_bangunan'] = $query2;
		$data['spesifikasi_rumah'] = $query3;
		$data['kecamatan'] = $select_kec->result_array();
		$data['kelurahan'] = $select_kel->result_array();
		$data['row'] = $query->row();
		$data['id_perumahan'] = $id;
		$data['title'] = "perumahan_data";
		$this->load->view('pengembangs/perumahan/properti_detail', $data);
	}

	public function detail_spesifikasi($id) {
		$query2 = $this->db->get_where('bangunan', array('id_bangunan' => $id));
		$query = $this->db->get_where('spesifikasi_rumah', array('id_bangunan' => $id));

		$data['title'] = "perumahan_data";
		$data['spesifikasi_rumah'] = $query->result_array();
		$data['row'] = $query->row();
		$data['rowp'] = $query2->row();
		$this->load->view('pengembangs/perumahan/detail_spesifikasi', $data);
	}

	public function spesifikasi_insert($id) {
		$nama_spesifikasi_rumah = $this->input->post('nama_spesifikasi_rumah');
		foreach ($nama_spesifikasi_rumah as $spek => $val_spek) {
			$data_spek = array(
								'id_bangunan' 				=> $id,
								'nama_spesifikasi_rumah' 	=> $nama_spesifikasi_rumah[$spek]
							);
			
			$execute = $this->Index_Model->Insert('spesifikasi_rumah', $data_spek);
		}
		if ($execute == TRUE) {
			$this->session->set_flashdata('simpan', 'Berhasil menambah data');
			redirect('pengembangs/detail_spesifikasi/'.$id, 'refresh');
		} else {
			$this->session->set_flashdata('gagal', 'Gagal menambah data');
			redirect('pengembangs/detail_spesifikasi/'.$id, 'refresh');
		}
	}

	public function spesifikasi_delete($id) {
		$sel 			= $this->db->get_where('spesifikasi_rumah', array('id_spesifikasi_rumah' => $id));
		$row 			= $sel->row();
		$id_bangunan 	= $row->id_bangunan;
		$del 			= $this->db->delete('spesifikasi_rumah', array('id_spesifikasi_rumah' => $id));

		if ($del == TRUE) {
			$this->session->set_flashdata('simpan', 'Berhasil menghapus data');
			// redirect('pengembangs/detail_spesifikasi/'.$id, 'refresh');
			redirect('pengembangs/detail_spesifikasi/'.$id_bangunan, 'refresh');
		}
	}

	public function detail_foto($id) {
		$query2 = $this->db->get_where('bangunan', array('id_bangunan' => $id));
		$query = $this->db->get_where('foto_bangunan', array('id_bangunan' => $id));

		$data['title'] = "perumahan_data";
		$data['foto_bangunan'] = $query->result_array();
		$data['row'] = $query->row();
		$data['rowp'] = $query2->row();
		$this->load->view('pengembangs/perumahan/detail_foto', $data);
	}

	public function foto_insert($id) {
		if (!empty($_FILES['foto_bangunan']['name'])) {
			$filescount = count($_FILES['foto_bangunan']['name']);
				for ($i=0; $i < $filescount; $i++) { 
					$_FILES['file']['name']     = $_FILES['foto_bangunan']['name'][$i];
	                $_FILES['file']['type']     = $_FILES['foto_bangunan']['type'][$i];
	                $_FILES['file']['tmp_name'] = $_FILES['foto_bangunan']['tmp_name'][$i];
	                $_FILES['file']['error']     = $_FILES['foto_bangunan']['error'][$i];
	                $_FILES['file']['size']     = $_FILES['foto_bangunan']['size'][$i];

	                $configB['upload_path'] = './file/perumahan/images/';
	                $configB['allowed_types'] = 'pdf|jpg|png|jpeg|';

	                $this->load->library('upload', $configB);
	                $this->upload->initialize($configB);

	                if ($this->upload->do_upload('file')) {
	                	$fileData = $this->upload->data();
	             		$uploadData[$i]['id_bangunan'] = $id;
	                	$uploadData[$i]['foto_bangunan'] = $fileData['file_name'];
	             		$uploadData[$i]['level_foto'] = 0;
	                }
				}
				if (!empty($uploadData)) {
					$insertfoto = $this->Model_Pengembang->InsertMulti($uploadData);
					if ($insertfoto == TRUE) {
						$this->session->set_flashdata('simpan', 'Berhasil menambah data');
						redirect('pengembangs/detail_foto/'.$id, 'refresh');
					} else {
						$this->session->set_flashdata('gagal', 'Gagal menambah data');
						redirect('pengembangs/detail_foto/'.$id, 'refresh');
					}
				}
		}
	}

	public function detail_foto_primer($id) {
		$foto_row = $this->db->get_where('foto_bangunan', array('id_foto_bangunan' => $id))->row();
		$id_bangunan = $foto_row->id_bangunan;

		$data = array('level_foto' => 1);
		$where = array('id_foto_bangunan' => $id);
		$execute = $this->Index_Model->Update('foto_bangunan', $data, $where);
		if ($execute == TRUE) {
			$data_change = array('level_foto' => 0);
			$where_change = array('id_foto_bangunan !=' => $id, 'id_bangunan' => $id_bangunan);
			$execute_change = $this->Index_Model->Update('foto_bangunan', $data_change, $where_change);
		}

		if ($execute == TRUE) {
			$this->session->set_flashdata('simpan', 'Berhasil mengubah Foto Utama');
			redirect('pengembangs/detail_foto/'.$id_bangunan, 'refresh');
		} else {
			$this->session->set_flashdata('gagal', 'Gagal mengubah data');
			redirect('pengembangs/detail_foto/'.$id_bangunan, 'refresh');
		}
	}

	public function foto_delete($id) {
		$sel 			= $this->db->get_where('foto_bangunan', array('id_foto_bangunan' => $id));
		$row 			= $sel->row();
		$id_bangunan 	= $row->id_bangunan;
		unlink('./file/perumahan/images/'.$row->foto_bangunan);
		$del 			= $this->db->delete('foto_bangunan', array('id_foto_bangunan' => $id));

		if ($del == TRUE) {
			$this->session->set_flashdata('simpan', 'Berhasil menghapus data');
			redirect('pengembangs/detail_foto/'.$id_bangunan, 'refresh');
		}
	}

	public function properti_edit($id) {
		$query = $this->db->get_where('bangunan', array('bangunan.id_bangunan' => $id));
		$select_kec = $this->db->get('kecamatan');
		$select_kel = $this->db->get('kelurahan');

		$data['kecamatan'] = $select_kec->result_array();
		$data['kelurahan'] = $select_kel->result_array();
		$data['row'] = $query->row();
		$data['id_perumahan'] = $id;
		$data['title'] = "perumahan_data";
		$this->load->view('pengembangs/perumahan/properti_edit', $data);
	}

	public function properti_update($id) {
		$query_select = $this->db->get_where('bangunan', array('id_bangunan' => $id));
		$row_bangunan = $query_select->row();
		$id_perumahan = $row_bangunan->id_perumahan;

		$nama_bangunan		= $this->input->post('nama_bangunan');
		$deskripsi_bangunan	= $this->input->post('deskripsi_bangunan');
		$kategori_bangunan 	= $this->input->post('kategori_bangunan');
		$tipe_bangunan	 	= $this->input->post('tipe_bangunan');
		$jumlah_tersedia 	= $this->input->post('jumlah_tersedia');
		$harga_bangunan 	= $this->input->post('harga_bangunan');
		$id_kecamatan 		= $this->input->post('id_kecamatan');
		$id_kelurahan 		= $this->input->post('id_kelurahan');
		$lokasi_bangunan 	= $this->input->post('lokasi_bangunan');
		$luas_bangunan 		= $this->input->post('luas_bangunan');
		$luas_tanah 		= $this->input->post('luas_tanah');

		$dimensi_bangunan 	= $this->input->post('dimensi_bangunan');
		$dimensi_tanah 		= $this->input->post('dimensi_tanah');

		$jumlah_lantai 		= $this->input->post('jumlah_lantai');
		$jumlah_kamar 		= $this->input->post('jumlah_kamar');
		$jumlah_kamar_mandi = $this->input->post('jumlah_kamar_mandi');
		$jumlah_garasi 		= $this->input->post('jumlah_garasi');
		$listrik 			= $this->input->post('listrik');

		$string 	= preg_replace('~[^\\pL\d]+~u', '-', $nama_bangunan);
		$trim 		= trim($string);
		$pre_slug 	= strtolower(str_replace(" ", "-", $trim));
		$date 		= substr(date('Ymd'), 2,8);
		$random 	= rand(0, 1000);
		$bangunan_slug = $pre_slug."-".$date.$random;

		$data = array(
					'id_kecamatan' 			=> $id_kecamatan,
					'id_kelurahan' 			=> $id_kelurahan,
					'kategori_bangunan' 	=> $kategori_bangunan,
					'tipe_bangunan'		 	=> $tipe_bangunan,
					'nama_bangunan'			=> $nama_bangunan,
					'deskripsi_bangunan' 	=> $deskripsi_bangunan,
					'harga_bangunan' 		=> $harga_bangunan,
					'lokasi_bangunan' 		=> $lokasi_bangunan,
					'jumlah_tersedia' 		=> $jumlah_tersedia,
					'luas_bangunan' 		=> $luas_bangunan,
					'luas_tanah' 			=> $luas_tanah,
					'dimensi_bangunan' 		=> $dimensi_bangunan,
					'dimensi_tanah' 		=> $dimensi_tanah,
					'jumlah_lantai' 		=> $jumlah_lantai,
					'jumlah_kamar' 			=> $jumlah_kamar,
					'jumlah_kamar_mandi' 	=> $jumlah_kamar_mandi,
					'jumlah_garasi' 		=> $jumlah_garasi,
					'listrik' 				=> $listrik,
					'bangunan_slug' 		=> $bangunan_slug
				);
		$where = array(
					'id_bangunan' => $id
				);
		$execute_bangunan = $this->Index_Model->Update('bangunan', $data, $where);
		if ($execute_bangunan == TRUE) {
			$this->session->set_flashdata('simpan', 'Berhasil mengubah data');
			redirect('pengembangs/properti_data/'.$id_perumahan, 'refresh');
		} else {
			$this->session->set_flashdata('gagal', 'Gagal mengubah data');
			redirect('pengembangs/properti_data/'.$id_perumahan, 'refresh');
		}
	}

	public function estate_sarana($id) {
		$query2 = $this->db->get_where('perumahan', array('id_perumahan' => $id));
		$query = $this->db->get_where('sarana_prasarana_perumahan', array('id_perumahan' => $id));

		$data['title'] = "perumahan_data";
		$data['sarana_prasarana_perumahan'] = $query->result_array();
		$data['row'] = $query->row();
		$data['rowp'] = $query2->row();
		$this->load->view('pengembangs/perumahan/detail_sarana_perumahan', $data);
	}

	public function estate_sarana_insert($id) {
		$nama_sarana_prasarana_perumahan = $this->input->post('nama_sarana_prasarana_perumahan');
		foreach ($nama_sarana_prasarana_perumahan as $spek => $val_spek) {
			$data_spek = array(
								'id_perumahan' 				=> $id,
								'nama_sarana_prasarana_perumahan' 	=> $nama_sarana_prasarana_perumahan[$spek]
							);
			
			$execute = $this->Index_Model->Insert('sarana_prasarana_perumahan', $data_spek);
		}
		if ($execute == TRUE) {
			$this->session->set_flashdata('simpan', 'Berhasil menambah data');
			redirect('pengembangs/estate_sarana/'.$id, 'refresh');
		} else {
			$this->session->set_flashdata('gagal', 'Gagal menambah data');
			redirect('pengembangs/estate_sarana/'.$id, 'refresh');
		}
	}

	public function estate_sarana_delete($id) {
		$sel 			= $this->db->get_where('sarana_prasarana_perumahan', array('id_sarana_prasarana_perumahan' => $id));
		$row 			= $sel->row();
		$id_perumahan 	= $row->id_perumahan;
		$del 			= $this->db->delete('sarana_prasarana_perumahan', array('id_sarana_prasarana_perumahan' => $id));

		if ($del == TRUE) {
			$this->session->set_flashdata('simpan', 'Berhasil menghapus data');
			redirect('pengembangs/estate_sarana/'.$id_perumahan, 'refresh');
		}
	}

	public function estate_fasilitas($id) {
		$query2 = $this->db->get_where('perumahan', array('id_perumahan' => $id));
		$query = $this->db->get_where('fasilitas_perumahan', array('id_perumahan' => $id));

		$data['title'] = "perumahan_data";
		$data['fasilitas_perumahan'] = $query->result_array();
		$data['row'] = $query->row();
		$data['rowp'] = $query2->row();
		$this->load->view('pengembangs/perumahan/detail_fasilitas_perumahan', $data);
	}

	public function estate_fasilitas_insert($id) {
		$nama_fasilitas_perumahan = $this->input->post('nama_fasilitas_perumahan');
		foreach ($nama_fasilitas_perumahan as $spek => $val_spek) {
			$data_spek = array(
								'id_perumahan' 				=> $id,
								'nama_fasilitas_perumahan' 	=> $nama_fasilitas_perumahan[$spek]
							);
			
			$execute = $this->Index_Model->Insert('fasilitas_perumahan', $data_spek);
		}
		if ($execute == TRUE) {
			$this->session->set_flashdata('simpan', 'Berhasil menambah data');
			redirect('pengembangs/estate_fasilitas/'.$id, 'refresh');
		} else {
			$this->session->set_flashdata('gagal', 'Gagal menambah data');
			redirect('pengembangs/estate_fasilitas/'.$id, 'refresh');
		}
	}

	public function estate_fasilitas_delete($id) {
		$sel 			= $this->db->get_where('fasilitas_perumahan', array('id_fasilitas_perumahan' => $id));
		$row 			= $sel->row();
		$id_perumahan 	= $row->id_perumahan;
		$del 			= $this->db->delete('fasilitas_perumahan', array('id_fasilitas_perumahan' => $id));

		if ($del == TRUE) {
			$this->session->set_flashdata('simpan', 'Berhasil menghapus data');
			redirect('pengembangs/estate_fasilitas/'.$id_perumahan, 'refresh');
		}
	}

	public function estate_foto_primer($id) {
		$foto_row = $this->db->get_where('foto_perumahan', array('id_foto_perumahan' => $id))->row();
		$id_perumahan = $foto_row->id_perumahan;

		$data = array('status_foto' => 1);
		$where = array('id_foto_perumahan' => $id);
		$execute = $this->Index_Model->Update('foto_perumahan', $data, $where);
		if ($execute == TRUE) {
			$data_change = array('status_foto' => 0);
			$where_change = array('id_foto_perumahan !=' => $id, 'id_perumahan' => $id_perumahan);
			$execute_change = $this->Index_Model->Update('foto_perumahan', $data_change, $where_change);
		}

		if ($execute == TRUE) {
			$this->session->set_flashdata('simpan', 'Berhasil mengubah Foto Utama');
			redirect('pengembangs/estate_foto/'.$id_perumahan, 'refresh');
		} else {
			$this->session->set_flashdata('gagal', 'Gagal mengubah data');
			redirect('pengembangs/estate_foto/'.$id_perumahan, 'refresh');
		}
	}

	public function akun_data() {
		$id_akun = $this->session->userdata('id_user');
		$data_akun = $this->Model_Pengembang->pick_user($id_akun);

		$data['row'] = $data_akun->row();
		$data['title'] = "akun_data";
		$this->load->view('pengembangs/akun/akun_data', $data);
	}

	public function akun_edit() {
		$id_akun = $this->session->userdata('id_user');
		$data_akun = $this->Model_Pengembang->pick_user($id_akun);

		$data['row'] = $data_akun->row();
		$data['title'] 	= "akun_data";
		$this->load->view('pengembangs/akun/akun_edit', $data);
	}

	public function akun_update() {
		$id_akun = $this->session->userdata('id_user');

		$this->db->join('pengembang', 'pengembang.id_user=user.id_user');
		$select_cli = $this->db->get_where('user', array('user.id_user' => $id_akun));
		$row_cli	= $select_cli->row();
		$id = $row_cli->id_pengembang;

		$nik_pengembang 	= $this->input->post('nik_pengembang');
		$nama_pengembang 	= $this->input->post('nama_pengembang');
		$telepon_pengembang = $this->input->post('telepon_pengembang');
		$email_pengembang 	= $this->input->post('email_pengembang');
		$alamat_pengembang 	= $this->input->post('alamat_pengembang');

		$poto 				= $this->input->post('foto_pengembang');

		$dataPengembang = array(
								'nik_pengembang' 		=> $nik_pengembang,
								'nama_pengembang' 		=> $nama_pengembang,
								'telepon_pengembang' 	=> $telepon_pengembang,
								'email_pengembang'		=> $email_pengembang,
								'alamat_pengembang'		=> $alamat_pengembang,
							);
		$where = array(
					'id_pengembang' => $id
				);
		
		$config['upload_path'] = './file/pengembang/images/';
		$config['allowed_types'] = 'jpg|png|jpeg|';
		$this->load->library('upload', $config);

			
			if ($this->upload->do_upload('foto_pengembang')) {
				if ($row_cli->foto_pengembang == '') {
					$image 	  = $this->upload->data();
					$dataPengembang['foto_pengembang'] = $image['file_name'];
				} else {
					unlink('./file/pengembang/images/'.$row_cli->foto_pengembang);
					$image 	  = $this->upload->data();
					$dataPengembang['foto_pengembang'] = $image['file_name'];
				}
			}


			if (!empty($_FILES['ijin_perusahaan']['name'])) {
				$configB['upload_path'] = './file/pengembang/file/';
				$configB['allowed_types'] = 'pdf|jpg|png|jpeg|';
				$this->load->library('upload', $configB);
                $this->upload->initialize($configB);

				if (!$this->upload->do_upload('ijin_perusahaan')) {
					$image2 	  = $this->upload->data();
					$dataPengembang['ijin_perusahaan'] = $image2['file_name'];
				} else {
					unlink('./file/pengembang/file/'.$row_cli->ijin_perusahaan);
					$image2 	  = $this->upload->data();
					$dataPengembang['ijin_perusahaan'] = $image2['file_name'];
				}
			}


			$execute = $this->Index_Model->Update('pengembang', $dataPengembang, $where);

			$old_password = $this->input->post('old_password');
			$password = $this->input->post('password');
			$re_password = $this->input->post('re_password');

			if (!empty($old_password)) {
				$hash = $row_cli->password;
				if (password_verify($old_password, $hash)) {
					if ($password == $re_password) {
						$data = array(
									'password' 		=> password_hash($password, PASSWORD_DEFAULT)
								);
						$where = array(
									'id_user' => $id_akun
								);

						$execute2 = $this->Index_Model->Update('user', $data, $where);
					} else {
						$this->session->set_flashdata('gagal', 'Konfirmasi password salah');
						redirect('pengembangs/akun_data', 'refresh');
					}
				} else {
					$this->session->set_flashdata('gagal', 'Password lama salah');
					redirect('pengembangs/akun_data', 'refresh');
				}
			}

			if ($execute == TRUE) {
				$this->session->set_flashdata('simpan', 'Berhasil mengubah data');
				redirect('pengembangs/akun_data', 'refresh');
			} else {
				$this->session->set_flashdata('gagal', 'Gagal mengubah data');
				redirect('pengembangs/akun_data', 'refresh');
			}

	}

	public function perumahan_unpublish($id) {
		$data = array('status_perumahan' => 2);
		$where = array('id_perumahan' => $id);
		$execute = $this->Index_Model->Update('perumahan', $data, $where);

		if ($execute == TRUE) {
			$this->session->set_flashdata('simpan', 'Berhasil mengubah data');
			redirect('pengembangs/perumahan_data', 'refresh');
		} else {
			$this->session->set_flashdata('gagal', 'Gagal mengubah data');
			redirect('pengembangs/perumahan_data', 'refresh');
		}
	}

	public function perumahan_publish($id) {
		$data = array('status_perumahan' => 1);
		$where = array('id_perumahan' => $id);
		$execute = $this->Index_Model->Update('perumahan', $data, $where);

		if ($execute == TRUE) {
			$this->session->set_flashdata('simpan', 'Berhasil mengubah data');
			redirect('pengembangs/perumahan_data', 'refresh');
		} else {
			$this->session->set_flashdata('gagal', 'Gagal mengubah data');
			redirect('pengembangs/perumahan_data', 'refresh');
		}
	}

	public function properti_setpublish($id) {
		$select = $this->db->get_where('bangunan', array('id_bangunan' => $id))->row();
		if ($select->status_publish == 1) {
			$data = array('status_publish' => 2);
			$where = array('id_bangunan' => $id);
			$execute = $this->Index_Model->Update('bangunan', $data, $where);
		} elseif ($select->status_publish == 2) {
			$data = array('status_publish' => 1);
			$where = array('id_bangunan' => $id);
			$execute = $this->Index_Model->Update('bangunan', $data, $where);
		} else {
			$this->load->view('errors/html/error_404');
		}
		if ($execute == TRUE) {
			$this->session->set_flashdata('simpan', 'Berhasil mengubah data');
			redirect('pengembangs/properti_data/'.$select->id_perumahan, 'refresh');
		} else {
			$this->session->set_flashdata('gagal', 'Gagal mengubah data');
			redirect('pengembangs/properti_data/'.$select->id_perumahan, 'refresh');
		}
	}

	public function estate_foto($id) {
		$query = $this->db->get_where('foto_perumahan', array('id_perumahan' => $id));
		$query2 = $this->db->get_where('perumahan', array('id_perumahan' => $id));

		$data['title'] = "perumahan_data";
		$data['foto_perumahan'] = $query->result_array();
		$data['row'] = $query->row();
		$data['rowp'] = $query2->row();
		$this->load->view('pengembangs/perumahan/estate_foto', $data);
	}

	public function foto_insertp($id) {
		if (!empty($_FILES['foto_perumahan']['name'])) {
			$filescount = count($_FILES['foto_perumahan']['name']);
				for ($i=0; $i < $filescount; $i++) { 
					$_FILES['file']['name']     = $_FILES['foto_perumahan']['name'][$i];
	                $_FILES['file']['type']     = $_FILES['foto_perumahan']['type'][$i];
	                $_FILES['file']['tmp_name'] = $_FILES['foto_perumahan']['tmp_name'][$i];
	                $_FILES['file']['error']     = $_FILES['foto_perumahan']['error'][$i];
	                $_FILES['file']['size']     = $_FILES['foto_perumahan']['size'][$i];

	                $configB['upload_path'] = './file/perumahan/estate/';
	                $configB['allowed_types'] = 'pdf|jpg|png|jpeg|';

	                $this->load->library('upload', $configB);
	                $this->upload->initialize($configB);

	                if ($this->upload->do_upload('file')) {
	                	$fileData = $this->upload->data();
	             		$uploadData[$i]['id_perumahan'] = $id;
	                	$uploadData[$i]['foto_perumahan'] = $fileData['file_name'];
	                	$uploadData[$i]['status_foto'] = 0;
	                }
				}
				if (!empty($uploadData)) {
					$insertfoto = $this->Model_Pengembang->InsertMultiP($uploadData);
					if ($insertfoto == TRUE) {
						$this->session->set_flashdata('simpan', 'Berhasil menambah data');
						redirect('pengembangs/estate_foto/'.$id, 'refresh');
					} else {
						$this->session->set_flashdata('gagal', 'Gagal menambah data');
						redirect('pengembangs/estate_foto/'.$id, 'refresh');
					}
				}
		}
	}

	public function estate_foto_delete($id) {
		$sel 			= $this->db->get_where('foto_perumahan', array('id_foto_perumahan' => $id));
		$row 			= $sel->row();
		$id_perumahan 	= $row->id_perumahan;
		unlink('./file/perumahan/estate/'.$row->foto_perumahan);
		$del 			= $this->db->delete('foto_perumahan', array('id_foto_perumahan' => $id));

		if ($del == TRUE) {
			$this->session->set_flashdata('simpan', 'Berhasil menghapus data');
			redirect('pengembangs/estate_foto/'.$id_perumahan, 'refresh');
		}
	}


}