<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Admins extends CI_Controller
{
	
	public function __construct() {
		parent::__construct();

		$this->load->model('Index_Model');
		$this->load->model('Model_Pengembang');
		$this->load->model('Model_Main');

		// if (!$this->session->userdata('logged_in') == TRUE) {
		// 	redirect('login');
		// } 

		// if ($this->session->userdata('level') != '11') {
		// 	redirect('login');
		// }
	}

	public function index() {
		$q_perumahan 			= $this->db->get('perumahan');
		$q_perumahan_nonconfirm = $this->db->get_where('perumahan', array('status_perumahan' => 0));
		$q_properti 			= $this->db->get('bangunan');
		$q_properti_nonconfirm 	= $this->db->get_where('bangunan', array('status_publish' => 0));

		$data['title'] 					= "dashboard";
		$data['jumlah_perumahan'] 		= $q_perumahan->num_rows();
		$data['jumlah_properti'] 		= $q_properti->num_rows();
		$data['perumahan_nonconfirm'] 	= $q_perumahan_nonconfirm->num_rows();
		$data['properti_nonconfirm'] 	= $q_properti_nonconfirm->num_rows();
		$this->load->view('admins/dashboard', $data);
	}

	// USER

	public function user_data() {
		$query = $this->db->get('user');
		$data['data'] = $query->result_array();
		$data['title'] = "user_data";
		$this->load->view('admins/user/user_data', $data);
	}

	public function user_create() {
		$data['title'] = "user_data";
		$this->load->view('admins/user/user_create', $data);
	}

	public function user_insert() {
		$username 		= $this->input->post('username');
		$password 		= $this->input->post('password');
		$re_password 	= $this->input->post('re_password');
		$level			= $this->input->post('level');
		$status			= $this->input->post('status');

		$cek = $this->db->get_where('user', array('username' => $username));
		if ($cek->num_rows() == 0) {
			if ($password == $re_password) {
				$data = array(
							'username' 		=> $username,
							'password' 		=> password_hash($password, PASSWORD_DEFAULT),
							'level'			=> $level,
							'status'		=> $status
						);

				$datainsert = $this->Index_Model->Insert('user', $data);
				if ($datainsert == true) {
					$this->session->set_flashdata('simpan', 'Berhasil menambah data user');
					redirect('admins/user_data', 'refresh');
				} else {
					$this->session->set_flashdata('gagal', 'Gagal menambah data user');
					redirect('admins/user_data', 'refresh');
				}
			} else {
				$this->session->set_flashdata('gagal', 'Password dan Konfirmasi Password Salah');
				redirect('admins/user_data', 'refresh');
			}
		} else {
			$this->session->set_flashdata('gagal', 'Username sudah ada');
			redirect('admins/user_data', 'refresh');
		}
		
	}

	public function user_edit($id) {
		$query = $this->db->get_where('user', array('id_user' => $id));
		$data['row'] = $query->row();
		$data['title'] = "user_data";
		$this->load->view('admins/user/user_edit', $data);
	}

	public function user_update($id) {
		$username 		= $this->input->post('username');
		$password 		= $this->input->post('password');
		$re_password 	= $this->input->post('re_password');
		$level			= $this->input->post('level');
		$status			= $this->input->post('status');

		if ($password == $re_password) {
			$data = array(
						'username' 		=> $username,
						'password' 		=> password_hash($password, PASSWORD_DEFAULT),
						'level'			=> $level,
						'status'		=> $status
					);
			$where = array(
						'id_user' => $id
					);

			$execute = $this->Index_Model->Update('user', $data, $where);
			if ($execute == TRUE) {
				$this->session->set_flashdata('simpan', 'Berhasil mengubah data user');
				redirect('admins/user_data', 'refresh');
			} else {
				$this->session->set_flashdata('gagal', 'Kesalahan dalam program');
				redirect('admins/user_data', 'refresh');
			}
		} else {
			$this->session->set_flashdata('gagal', 'Password dan Konfirmasi Password Salah');
			redirect('admins/user_data', 'refresh');
		}
	}

	public function user_delete($id) {
		$id = array('id_user' => $id);
		$this->Index_Model->Delete('user', $id);
		$this->session->set_flashdata('simpan', 'Berhasil menghapus data');
		redirect('admins/user_data', 'refresh');
	}

	public function aktifkan($id) {
		$data 	= array('status' => '1');
		$where 	= array('id_user' => $id);
		$execute = $this->Index_Model->Update('user', $data, $where);
		if ($execute == TRUE) {
			$this->session->set_flashdata('simpan', 'Akun berhasil diaktifkan');
			redirect('admins/user_data', 'refresh');
		} else {
			$this->session->set_flashdata('gagal', 'Gagal');
			redirect('admins/user_data', 'refresh');
		}
	}

	public function nonaktif($id) {
		$data 	= array('status' => '0');
		$where 	= array('id_user' => $id);
		$execute = $this->Index_Model->Update('user', $data, $where);
		if ($execute == TRUE) {
			$this->session->set_flashdata('simpan', 'Akun berhasil dinonaktifkan');
			redirect('admins/user_data', 'refresh');
		} else {
			$this->session->set_flashdata('gagal', 'Gagal mengubah data');
			redirect('admins/user_data', 'refresh');
		}
	}

	// CLOSE USER
	public function perumahan_data() {
		// $id_akun = $this->session->userdata('id_user');
		// $data_akun = $this->Model_Pengembang->pick_user($id_akun);
		// $row = $data_akun->row();
		// $id_pengembang = $row->id_pengembang;

		// $this->db->where('bangunan.id_pengembang', $id_pengembang);
		// $this->db->group_by('perumahan.id_perumahan');
		// $this->db->where('perumahan.id_pengembang', $id_pengembang);
		$this->db->join('pengembang', 'perumahan.id_pengembang=pengembang.id_pengembang');
		$query = $this->db->get('perumahan');

		$data['data'] = $query->result_array();
		$data['title'] = "perumahan_data";
		$this->load->view('admins/perumahan/perumahan_data', $data);
	}
	// public function perumahan_data() {
	// 	$this->db->group_by('perumahan.id_perumahan');
	// 	$query = $this->Model_Main->InnerPerum();

	// 	$data['data'] = $query->result_array();
	// 	$data['title'] = "perumahan_data";
	// 	$this->load->view('admins/perumahan/perumahan_data', $data);
	// }

	public function properti_data($id) {
		// $id_akun = $this->session->userdata('id_user');
		// $data_akun = $this->Model_Pengembang->pick_user($id_akun);
		// $row = $data_akun->row();
		// $id_pengembang = $row->id_pengembang;

		// $this->db->where('bangunan.id_pengembang', $id_pengembang);
		$this->db->join('perumahan', 'bangunan.id_perumahan=perumahan.id_perumahan');
		$this->db->join('pengembang', 'bangunan.id_pengembang=pengembang.id_pengembang');
		$this->db->where('bangunan.id_perumahan', $id);
		$query = $this->db->get('bangunan');
		$row_perumahan = $this->db->get_where('perumahan', array('id_perumahan' => $id))->row();

		$data['data'] = $query->result_array();
		$data['title'] = "perumahan_data";
		$data['row_perum'] = $row_perumahan;
		$this->load->view('admins/perumahan/properti_data', $data);
	}

	public function perumahan_detail($id) {
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
		$this->load->view('admins/perumahan/perumahan_detail', $data);
	}

	public function perumahan_confirmation($id) {
		$query = $this->db->get_where('perumahan', array('id_perumahan' => $id));
		$query2 = $this->db->get_where('sarana_prasarana_perumahan', array('id_perumahan' => $id));
		$query3 = $this->db->get_where('fasilitas_perumahan', array('id_perumahan' => $id));
		$select_kec = $this->db->get('kecamatan');
		$select_kel = $this->db->get('kelurahan');

		$data['kecamatan'] = $select_kec->result_array();
		$data['kelurahan'] = $select_kel->result_array();
		$data['sarana_prasarana_perumahan'] = $query2->result_array();
		$data['fasilitas_perumahan'] = $query3->result_array();
		$data['title'] 	= "perumahan_data";
		$data['row'] 	= $query->row();
		$this->load->view('admins/perumahan/perumahan_confirmation', $data);
	}

	public function perumahan_confirm_action($id) {
		$select = $this->db->get_where('perumahan', array('id_perumahan' => $id))->row();
		if ($select->status_perumahan == 1 || $select->status_perumahan == 2) {
			$data = array('status_perumahan' => 0);
			$where = array('id_perumahan' => $id);
			$execute = $this->Index_Model->Update('perumahan', $data, $where);
		} elseif ($select->status_perumahan == 0) {
			$data = array('status_perumahan' => 1);
			$where = array('id_perumahan' => $id);
			$execute = $this->Index_Model->Update('perumahan', $data, $where);
		} else {
			$this->load->view('errors/html/error_404');
		}
		if ($execute == TRUE) {
			$this->session->set_flashdata('simpan', 'Berhasil mengubah data');
			redirect('admins/perumahan_data', 'refresh');
		} else {
			$this->session->set_flashdata('gagal', 'Gagal mengubah data');
			redirect('admins/perumahan_data', 'refresh');
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
		$this->load->view('admins/perumahan/properti_detail', $data);
	}

	public function properti_confirm($id) {
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
		$this->load->view('admins/perumahan/properti_confirm', $data);
	}

	public function properti_confirm_action($id) {
		$select = $this->db->get_where('bangunan', array('id_bangunan' => $id))->row();
		if ($select->status_publish == 1 || $select->status_publish == 2) {
			$data = array('status_publish' => 0);
			$where = array('id_bangunan' => $id);
			$execute = $this->Index_Model->Update('bangunan', $data, $where);
		} elseif ($select->status_publish == 0) {
			$data = array('status_publish' => 1);
			$where = array('id_bangunan' => $id);
			$execute = $this->Index_Model->Update('bangunan', $data, $where);
		} else {
			$this->load->view('errors/html/error_404');
		}
		if ($execute == TRUE) {
			$this->session->set_flashdata('simpan', 'Berhasil mengubah data');
			redirect('admins/properti_data/'.$select->id_perumahan, 'refresh');
		} else {
			$this->session->set_flashdata('gagal', 'Gagal mengubah data');
			redirect('admins/properti_data/'.$select->id_perumahan, 'refresh');
		}
	}

	public function pengembang_data() {
		$query = $this->db->get('pengembang');
		$data['data'] = $query->result_array();
		$data['title'] = "pengembang_data";
		$this->load->view('admins/pengembang/pengembang_data', $data);
	}

	public function pengembang_create() {
		$data['title'] = "pengembang_data";
		$this->load->view('admins/pengembang/pengembang_create', $data);
	}

	public function pengembang_insert() {
		$nik_pengembang 	= $this->input->post('nik_pengembang');
		$nama_pengembang 	= $this->input->post('nama_pengembang');
		$telepon_pengembang = $this->input->post('telepon_pengembang');
		$email_pengembang 	= $this->input->post('email_pengembang');
		$alamat_pengembang 	= $this->input->post('alamat_pengembang');

		$username 			= $this->input->post('username');
		$password 			= $this->input->post('password');
		$re_password 		= $this->input->post('re_password');

		$string 	= preg_replace('~[^\\pL\d]+~u', '-', $nama_pengembang);
		$trim 		= trim($string);
		$pre_slug 	= strtolower(str_replace(" ", "-", $trim));
		$date 		= substr(date('Ymd'), 2,8);
		$random 	= rand(0, 1000);
		$pengembang_slug = $pre_slug."-".$date.$random; 

		if ($password == $re_password) {
			$dataUser 		= array(
									'username' 	=> $username,
									'password' 	=> password_hash($password, PASSWORD_DEFAULT),
									'level'		=> '2',
									'status' 	=> '1'
								);

			$cek = $this->db->where('username', $username)
							->get('user');
			if ($cek->num_rows() == 0) {
				$config['upload_path'] = './file/pengembang/images/';
				$config['allowed_types'] = 'jpg|png|jpeg|';
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('foto_pengembang')) {
					$dataPengembang['foto_pengembang'] = '';
				} else {
					$image = $this->upload->data();
					$foto_cli =  $dataPengembang['foto_pengembang'] = $image['file_name'];
				}

				if (!empty($_FILES['ijin_perusahaan']['name'])) {
					$configB['upload_path'] = './file/pengembang/file/';
					$configB['allowed_types'] = 'pdf|jpg|png|jpeg|';
					$this->load->library('upload', $configB);
	                $this->upload->initialize($configB);

					if (!$this->upload->do_upload('ijin_perusahaan')) {
						$dataPengembang['ijin_perusahaan'] = '';
					} else {
						$image2 = $this->upload->data();
						$ijin_perusahaan_cli =  $dataPengembang['ijin_perusahaan'] = $image2['file_name'];
					}
				}

				$queryUser		 = $this->Index_Model->Insert('user', $dataUser);


				if ($queryUser == true) {
					$id_user 		 = $this->db->insert_id();
					$dataPengembang = array(
											'nik_pengembang' 		=> $nik_pengembang,
											'nama_pengembang' 		=> $nama_pengembang,
											'telepon_pengembang' 	=> $telepon_pengembang,
											'email_pengembang'		=> $email_pengembang,
											'alamat_pengembang'		=> $alamat_pengembang,
											'pengembang_slug' 		=> $pengembang_slug,
											'ijin_perusahaan'		=> $ijin_perusahaan_cli,
											'foto_pengembang'		=> $foto_cli,
											'id_user' 				=> $id_user
										);

					$queryPengembang = $this->Index_Model->Insert('pengembang', $dataPengembang);

					$this->session->set_flashdata('simpan', 'Berhasil menambah data');
					redirect('admins/pengembang_data', 'refresh');
				} else {
					$this->session->set_flashdata('gagal', 'Gagal menambah data');
					redirect('admins/pengembang_data', 'refresh');
				}
			} else {
				$this->session->set_flashdata('gagal', 'Username sudah ada');
				redirect('admins/pengembang_data', 'refresh');
			}

		} else {
			$this->session->set_flashdata('gagal', 'Password dan Konfirmasi Password Harus Sama');
			redirect('admins/pengembang_data', 'refresh');
		}
	}

	public function pengembang_edit($id) {
		$query = $this->db->get_where('pengembang', array('id_pengembang' => $id));

		$data['title'] 	= "pengembang_data";
		$data['row'] 	= $query->row();
		$this->load->view('admins/pengembang/pengembang_edit', $data);
	}

	public function pengembang_update($id) {
		$select_cli = $this->db->get_where('pengembang', array('id_pengembang' => $id));
		$row_cli	= $select_cli->row();

		$nik_pengembang 	= $this->input->post('nik_pengembang');
		$nama_pengembang 	= $this->input->post('nama_pengembang');
		$telepon_pengembang = $this->input->post('telepon_pengembang');
		$email_pengembang 	= $this->input->post('email_pengembang');
		$alamat_pengembang 	= $this->input->post('alamat_pengembang');

		$string 	= preg_replace('~[^\\pL\d]+~u', '-', $nama_pengembang);
		$trim 		= trim($string);
		$pre_slug 	= strtolower(str_replace(" ", "-", $trim));
		$date 		= substr(date('Ymd'), 2,8);
		$random 	= rand(0, 1000);
		$pengembang_slug = $pre_slug."-".$date.$random; 

		$poto 				= $this->input->post('foto_pengembang');

		$dataPengembang = array(
								'nik_pengembang' 		=> $nik_pengembang,
								'nama_pengembang' 		=> $nama_pengembang,
								'telepon_pengembang' 	=> $telepon_pengembang,
								'email_pengembang'		=> $email_pengembang,
								'alamat_pengembang'		=> $alamat_pengembang,
								'pengembang_slug' 		=> $pengembang_slug
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

			if ($execute == TRUE) {
				$this->session->set_flashdata('simpan', 'Berhasil mengubah data');
				redirect('admins/pengembang_data', 'refresh');
			} else {
				$this->session->set_flashdata('gagal', 'Gagal mengubah data');
				redirect('admins/pengembang_data', 'refresh');
			}

	}

	public function pengembang_detail($id) {
		$query = $this->db->get_where('pengembang', array('id_pengembang' => $id));

		$data['title'] 	= "pengembang_data";
		$data['row'] 	= $query->row();
		$this->load->view('admins/pengembang/pengembang_detail', $data);
	}

	public function properti_all() {
		$this->db->join('perumahan', 'bangunan.id_perumahan=perumahan.id_perumahan');
		$this->db->join('pengembang', 'bangunan.id_pengembang=pengembang.id_pengembang');
		$this->db->order_by('bangunan.id_bangunan', 'desc');
		$query = $this->db->get('bangunan');

		$data['data'] = $query->result_array();
		$data['title'] = "properti";
		$this->load->view('admins/perumahan/properti_all', $data);
	}



}