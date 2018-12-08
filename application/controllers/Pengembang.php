<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Pengembang extends CI_Controller
{
	
	public function __construct() {
		parent::__construct();

		$this->load->model('Index_Model');
		$this->load->model('Model_Pengembang');
		$this->load->model('Model_Select');

		if (!$this->session->userdata('logged_in') == TRUE) {
			redirect('login');
		} 

		if ($this->session->userdata('level') != '2') {
			redirect('login');
		}
	}

	public function index() {
		$id = $this->session->userdata('id_user');
		$query = $this->Model_Pengembang->pick_user($id);

		$row = $query->row();
		$id_pengembang = $row->id_pengembang;

		$query2 = $this->db->query("SELECT * FROM bangunan WHERE id_pengembang='$id_pengembang'");
		$query3 = $this->db->get_where('bangunan', array('id_pengembang' => $id_pengembang, 'status_publish' => 1));
		$query4 = $this->db->get_where('bangunan', array('id_pengembang' => $id_pengembang, 'status_publish' => 0));
		$data  = array(
					'row' 			=> $query->row(),
					'num_list' 		=> $query2->num_rows(),
					'num_active' 	=> $query3->num_rows(),
					'num_inactive' 	=> $query4->num_rows()
				);

		$this->load->view('Pengembang/dashboard', $data);
	}

	public function data_perumahan() {
		$id_akun = $this->session->userdata('id_user');
		$data_akun = $this->Model_Pengembang->pick_user($id_akun);
		$row = $data_akun->row();
		$id_pengembang = $row->id_pengembang;
		$dataPerum = $this->Model_Pengembang->SelectPerum('bangunan', $id_pengembang);
		$dataPerum = array('dataPerum' => $dataPerum);

		$this->load->view('Pengembang/perumahan/data_perumahan', $dataPerum);
	}

	public function perumahan_create() {
		$select_kec = $this->db->get('kecamatan');
		$select_kel = $this->db->get('kelurahan');

		$data['kecamatan'] = $select_kec->result_array();
		$data['kelurahan'] = $select_kel->result_array();

		$this->load->view('pengembang/perumahan/perumahan_create', $data);
	}

	public function perumahan_insert() {
		$id_user = $this->session->userdata('id_user');
		$select_dev = $this->db->get_where('pengembang', array('id_user' => $id_user))->row();
		$id_dev = $select_dev->id_pengembang;

		$id_kecamatan 		= $this->input->post('id_kecamatan');
		$id_kelurahan 		= $this->input->post('id_kelurahan');
		$kategori_bangunan 	= $this->input->post('kategori_bangunan');
		$nama_bangunan		= $this->input->post('nama_bangunan');
		$deskripsi_bangunan	= $this->input->post('deskripsi_bangunan');
		$harga_bangunan 	= $this->input->post('harga_bangunan');
		$lokasi_bangunan 	= $this->input->post('lokasi_bangunan');
		$luas_bangunan 		= $this->input->post('luas_bangunan');
		$luas_tanah 		= $this->input->post('luas_tanah');
		$jumlah_lantai 		= $this->input->post('jumlah_lantai');
		$jumlah_kamar 		= $this->input->post('jumlah_kamar');
		$jumlah_kamar_mandi = $this->input->post('jumlah_kamar_mandi');
		$jumlah_garasi 		= $this->input->post('jumlah_garasi');
		$listrik 			= $this->input->post('listrik');
		$status_publish 	= "0";

		$nama_sarana_prasarana = $this->input->post('nama_sarana_prasarana');

		$nama_fasilitas 		= $this->input->post('nama_fasilitas');

		$data_bangunan = array(
								'id_pengembang' 		=> $id_dev,
								'id_kecamatan' 			=> $id_kecamatan,
								'id_kelurahan' 			=> $id_kelurahan,
								'kategori_bangunan' 	=> $kategori_bangunan,
								'nama_bangunan'			=> $nama_bangunan,
								'deskripsi_bangunan' 	=> $deskripsi_bangunan,
								'harga_bangunan' 		=> $harga_bangunan,
								'lokasi_bangunan' 		=> $lokasi_bangunan,
								'luas_bangunan' 		=> $luas_bangunan,
								'luas_tanah' 			=> $luas_tanah,
								'jumlah_lantai' 		=> $jumlah_lantai,
								'jumlah_kamar' 			=> $jumlah_kamar,
								'jumlah_kamar_mandi' 	=> $jumlah_kamar_mandi,
								'jumlah_garasi' 		=> $jumlah_garasi,
								'listrik' 				=> $listrik,
								'status_publish' 		=> $status_publish
							);

		$config['upload_path'] = './file/perumahan/file/';
		$config['allowed_types'] = 'pdf|jpg|png|jpeg|';
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('sertifikat')) {
			$data_bangunan['sertifikat'] = '';
		} else {
			$file = $this->upload->data();
			$data_bangunan['sertifikat'] = $file['file_name'];
		}
	
		$execute_bangunan = $this->Index_Model->Insert('bangunan', $data_bangunan);

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
		                }
					}

					if (!empty($uploadData)) {
						$insertfoto = $this->Model_Pengembang->InsertMulti($uploadData);
					}
			}

			foreach ($nama_sarana_prasarana as $key => $value) {
				$data_sarana = array(
									'id_bangunan' 			=> $id_bangunan,
									'nama_sarana_prasarana' => $nama_sarana_prasarana[$key]
								);

				$excute = $this->Index_Model->Insert('sarana_prasarana', $data_sarana);
			}

			foreach ($nama_fasilitas as $fasil => $val_fasil) {
				$data_fasiliti = array(
									'id_bangunan' 			=> $id_bangunan,
									'nama_fasilitas' 		=> $nama_fasilitas[$fasil]
								);
				
				$excute2 = $this->Index_Model->Insert('fasilitas', $data_fasiliti);
			}

			$this->session->set_flashdata('simpan', 'Berhasil menambah data');
			redirect('pengembang/data_perumahan', 'refresh');
		} else {
			$this->session->set_flashdata('gagal', 'Gagal menambah data');
			redirect('pengembang/data_perumahan', 'refresh');
		}
	}

	public function perumahan_edit($id) {
		$query = $this->db->get_where('bangunan', array('id_bangunan' => $id));
		$select_kec = $this->db->get('kecamatan');
		$select_kel = $this->db->get('kelurahan');

		$data['kecamatan'] = $select_kec->result_array();
		$data['kelurahan'] = $select_kel->result_array();
		$data['row']  = $query->row(); 
		$this->load->view('pengembang/perumahan/perumahan_edit', $data);
	}

	public function perumahan_update($id) {
		$select_cli = $this->db->get_where('bangunan', array('id_bangunan' => $id));
		$row_cli	= $select_cli->row();

		$id_kecamatan 		= $this->input->post('id_kecamatan');
		$id_kelurahan 		= $this->input->post('id_kelurahan');
		$kategori_bangunan 	= $this->input->post('kategori_bangunan');
		$nama_bangunan		= $this->input->post('nama_bangunan');
		$deskripsi_bangunan	= $this->input->post('deskripsi_bangunan');
		$harga_bangunan 	= $this->input->post('harga_bangunan');
		$lokasi_bangunan 	= $this->input->post('lokasi_bangunan');
		$luas_bangunan 		= $this->input->post('luas_bangunan');
		$luas_tanah 		= $this->input->post('luas_tanah');
		$jumlah_lantai 		= $this->input->post('jumlah_lantai');
		$jumlah_kamar 		= $this->input->post('jumlah_kamar');
		$jumlah_kamar_mandi = $this->input->post('jumlah_kamar_mandi');
		$jumlah_garasi 		= $this->input->post('jumlah_garasi');
		$listrik 			= $this->input->post('listrik');

		$data_bangunan = array(
								'id_kecamatan' 			=> $id_kecamatan,
								'id_kelurahan' 			=> $id_kelurahan,
								'kategori_bangunan' 	=> $kategori_bangunan,
								'nama_bangunan'			=> $nama_bangunan,
								'deskripsi_bangunan' 	=> $deskripsi_bangunan,
								'harga_bangunan' 		=> $harga_bangunan,
								'lokasi_bangunan' 		=> $lokasi_bangunan,
								'luas_bangunan' 		=> $luas_bangunan,
								'luas_tanah' 			=> $luas_tanah,
								'jumlah_lantai' 		=> $jumlah_lantai,
								'jumlah_kamar' 			=> $jumlah_kamar,
								'jumlah_kamar_mandi' 	=> $jumlah_kamar_mandi,
								'jumlah_garasi' 		=> $jumlah_garasi,
								'listrik' 				=> $listrik
							);
		$where = array(
						'id_bangunan' => $id
					);

		$config['upload_path'] = './file/perumahan/file/';
		$config['allowed_types'] = 'pdf|jpg|png|jpeg|';

		$this->load->library('upload', $config);
		if ($this->upload->do_upload('sertifikat')) {
			if ($row_cli->sertifikat == '') {
				$file = $this->upload->data();
				$data_bangunan['sertifikat'] = $file['file_name'];
			} else {
				unlink('./file/perumahan/file/'.$row_cli->sertifikat);
				$file = $this->upload->data();
				$data_bangunan['sertifikat'] = $file['file_name'];
			}
		}
	
		$execute = $this->Index_Model->Update('bangunan', $data_bangunan, $where);

			if ($execute == TRUE) {
				$this->session->set_flashdata('simpan', 'Berhasil mengubah data');
				redirect('pengembang/data_perumahan', 'refresh');
			} else {
				$this->session->set_flashdata('gagal', 'Gagal mengubah data');
				redirect('pengembang/data_perumahan', 'refresh');
			}
	}

	public function perumahan_detail($id) {
		$query  = $this->Model_Pengembang->PerumDetil($id);
		$query1 = $this->db->get_where('sarana_prasarana', array('id_bangunan' => $id));
		$query2 = $this->db->get_where('fasilitas', array('id_bangunan' => $id));
		$query3 = $this->db->get_where('foto_bangunan', array('id_bangunan' => $id));
		$select_kec = $this->db->get('kecamatan');
		$select_kel = $this->db->get('kelurahan');

		
		$data['kecamatan'] = $select_kec->result_array();
		$data['kelurahan'] = $select_kel->result_array();
		$data['row']  	= $query->row();
		$data['data1']	= $query1->result_array();
		$data['data2']	= $query2->result_array();
		$data['data3']	= $query3->result_array();

		$this->load->view('pengembang/perumahan/perumahan_detail', $data);
	}

	public function perumahan_delete($id) {
		$query  = $this->Model_Pengembang->PerumDet($id);
		$id_bangunan = array('id_bangunan' => $id);
		$query3 = $this->db->get_where('foto_bangunan', array('id_bangunan' => $id));
		$row = $query->row();
		$res = $query3->result_array();
		foreach ($res as $key => $value) {
			unlink('./file/perumahan/images/'.$value['foto_bangunan']);
		}
		unlink('./file/perumahan/file/'.$row->sertifikat);
		$this->Index_Model->Delete('bangunan', $id_bangunan);
		$this->session->set_flashdata('simpan', 'Berhasil menghapus data');
		redirect('pengembang/data_perumahan', 'refresh');
	}

	public function sarana_edit($id) {
		$query  = $this->Model_Pengembang->SelectSarana($id);
		$query1 = $this->db->get_where('sarana_prasarana', array('id_bangunan' => $id));
		$query2 = $this->db->get_where('sarana_prasarana', array('id_bangunan' => $id));
		$query3 = $this->db->get_where('foto_bangunan', array('id_bangunan' => $id));


		$data['row'] 	= $query->row();
		$data['data1']	= $query1->result_array();
		$data['data2']	= $query2->result_array();
		$data['data3']	= $query3->result_array();
		$data['num'] 	= $query1->num_rows();

		$this->load->view('pengembang/perumahan/sarana_edit', $data);
	}

	public function sarana_insert($id) {
		$nama_sarana_prasarana 	= $this->input->post('nama_sarana_prasarana');

		foreach ($nama_sarana_prasarana as $key => $value) {
			$data_sarana = array(
								'id_bangunan' 			=> $id,
								'nama_sarana_prasarana' => $nama_sarana_prasarana[$key]
							);

			$excute = $this->Index_Model->Insert('sarana_prasarana', $data_sarana);
		}
		if ($excute == TRUE) {
			redirect('pengembang/sarana_edit/'.$id, 'refresh');
		}

	}

	public function sarana_delete($id) {
		$sel 			= $this->db->get_where('sarana_prasarana', array('id_sarana_prasarana' => $id));
		$row 			= $sel->row();
		$id_bangunan 	= $row->id_bangunan;
		$del 			= $this->db->delete('sarana_prasarana', array('id_sarana_prasarana' => $id));

		if ($del == TRUE) {
			$this->session->set_flashdata('simpan', 'Berhasil menghapus data');
			redirect('pengembang/sarana_edit/'.$id_bangunan, 'refresh');
		}
	}

	public function fasilitas_edit($id) {
		$query  = $this->Model_Pengembang->SelectFasiliti($id);
		$query1 = $this->db->get_where('fasilitas', array('id_bangunan' => $id));

		$data['row'] 	= $query->row();
		$data['data1']	= $query1->result_array();
		$data['num'] 	= $query1->num_rows();

		$this->load->view('pengembang/perumahan/fasilitas_edit', $data);
	}

	public function fasilitas_insert($id) {
		$nama_fasilitas 	= $this->input->post('nama_fasilitas');

		foreach ($nama_fasilitas as $key => $value) {
			$data_fasiliti = array(
								'id_bangunan' 			=> $id,
								'nama_fasilitas' => $nama_fasilitas[$key]
							);

			$excute = $this->Index_Model->Insert('fasilitas', $data_fasiliti);
		}
		if ($excute == TRUE) {
			redirect('pengembang/fasilitas_edit/'.$id, 'refresh');
		}

	}

	public function fasilitas_delete($id) {
		$sel 			= $this->db->get_where('fasilitas', array('id_fasilitas' => $id));
		$row 			= $sel->row();
		$id_bangunan 	= $row->id_bangunan;
		$del 			= $this->db->delete('fasilitas', array('id_fasilitas' => $id));

		if ($del == TRUE) {
			$this->session->set_flashdata('simpan', 'Berhasil menghapus data');
			redirect('pengembang/fasilitas_edit/'.$id_bangunan, 'refresh');
		}
	}

	public function foto_edit($id) {
		$query  = $this->Model_Pengembang->SelectFoto($id);
		$this->db->order_by('id_foto_bangunan', 'DESC');
		$query1 = $this->db->get_where('foto_bangunan', array('id_bangunan' => $id));

		$data['row'] 	= $query->row();
		$data['data1']	= $query1->result_array();
		$data['num'] 	= $query1->num_rows();

		$this->load->view('pengembang/perumahan/foto_edit', $data);
	}

	public function foto_insert($id) {
		$nama_fasilitas 	= $this->input->post('foto_bangunan');

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
		                }
					}

					if (!empty($uploadData)) {
						$insertfoto = $this->Model_Pengembang->InsertMulti($uploadData);
					}
		}

		if ($insertfoto == TRUE) {
			redirect('pengembang/foto_edit/'.$id, 'refresh');
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
			redirect('pengembang/foto_edit/'.$id_bangunan, 'refresh');
		}
	}

	public function data_akun() {
		$id_akun = $this->session->userdata('id_user');
		$data_akun = $this->Model_Pengembang->pick_user($id_akun);

		$data['row'] = $data_akun->row();

		$this->load->view('pengembang/akun/data_akun', $data);
	}

	public function akun_edit($id) {
		$id_akun = $this->session->userdata('id_user');
		$data_akun = $this->Model_Pengembang->pick_user($id_akun);

		$data['row'] = $data_akun->row();

		$this->load->view('pengembang/akun/akun_edit', $data);
	}

	public function akun_update($id) {
		$select_cli = $this->db->get_where('user', array('id_user' => $id));
		$row_cli	= $select_cli->row();

		$username 		= $this->input->post('username');
		$password 		= $this->input->post('password');
		$password_old 	= $this->input->post('password_old');
		$password_db 	= $row_cli->password;
		$id_user 		= $row_cli->id_user;

		if (password_verify($password_old, $password_db) == TRUE) {
			$data = array(
						'username' 		=> $username,
						'password' 		=> password_hash($password, PASSWORD_DEFAULT)
					);
			$where = array(
						'id_user' => $id_user
					);

			$execute = $this->Index_Model->Update('user', $data, $where);
			if ($execute == TRUE) {
				$this->session->set_flashdata('simpan', 'Berhasil mengubah data user');
				redirect('pengembang/data_akun', 'refresh');
			} else {
				$this->session->set_flashdata('gagal', 'Kesalahan dalam program');
				redirect('pengembang/data_akun', 'refresh');
			}
		} else {
			$this->session->set_flashdata('gagal', 'Password Lama salah');
			redirect('pengembang/data_akun', 'refresh');
		}
	}

	public function pengembang_update($id) {
		$select_cli = $this->Model_Pengembang->pick($id);
		$row_cli	= $select_cli->row();

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


			$execute = $this->Index_Model->Update('pengembang', $dataPengembang, $where);

			if ($execute == TRUE) {
				$this->session->set_flashdata('simpan', 'Berhasil mengubah data');
				redirect('pengembang/data_akun', 'refresh');
			} else {
				$this->session->set_flashdata('gagal', 'Gagal mengubah data');
				redirect('pengembang/data_akun', 'refresh');
			}
	}

	public function get_select() {
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

}

 ?>