<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Admin extends CI_Controller
{
	
	public function __construct() {
		parent::__construct();

		$this->load->model('Index_Model');
		$this->load->model('Model_Pengembang');

		if (!$this->session->userdata('logged_in') == TRUE) {
			redirect('login');
		} 

		if ($this->session->userdata('level') != '1') {
			redirect('login');
		}
	}

	public function index() {
		$query1 = $this->db->get_where('bangunan', array('status_publish' => 0));
		$query2 = $this->db->get_where('bangunan', array('status_publish' => 1));
		$query3 = $this->db->get('pengembang');

		$data['inactive_perum'] = $query1->num_rows();
		$data['active_perum'] = $query2->num_rows();
		$data['dev_rows'] = $query3->num_rows();
		$this->load->view('Admin/index', $data);
	}

	public function data_user() {
		$data = $this->Index_Model->Select('user');
		$data = array('data' => $data);
		$this->load->view('Admin/data_user', $data);
	}

	public function user_create() {
		$this->load->view('admin/user/user_create');
	}

	public function user_insert() {
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

			$datainsert = $this->Index_Model->Insert('user', $data);
			if ($datainsert == true) {
				$this->session->set_flashdata('simpan', 'Berhasil menambah data user');
				redirect('admin/data_user', 'refresh');
			} else {
				$this->session->set_flashdata('gagal', 'Gagal menambah data user<');
				redirect('admin/data_user', 'refresh');
			}
		} else {
			$this->session->set_flashdata('gagal', 'Password dan Konfirmasi Password Salah');
			redirect('admin/data_user', 'refresh');
		}
		
	}

	public function user_edit($id) {
		$user = $this->Index_Model->GetWhere('user', array('id_user' => $id));
		$data = array(
					'id_user' 	=> $user[0]['id_user'],
					'username' 	=> $user[0]['username'],
					'level'		=> $user[0]['level'],
					'status'	=> $user[0]['status']
				);
		$this->load->view('admin/user/user_edit', $data);
	}

	public function user_update($id) {
		$username 		= $this->input->post('username');
		$password 		= $this->input->post('password');
		$re_password 	= $this->input->post('re_password');
		$level			= $this->input->post('level');
		$status			= $this->input->post('status');
		$id 			= $this->input->post('id_user');

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
				redirect('admin/data_user', 'refresh');
			} else {
				$this->session->set_flashdata('gagal', 'Kesalahan dalam program');
				redirect('admin/data_user', 'refresh');
			}
		} else {
			$this->session->set_flashdata('gagal', 'Password dan Konfirmasi Password Salah<');
			redirect('admin/data_user', 'refresh');
		}
	}

	public function user_delete($id) {
		$id = array('id_user' => $id);
		$this->Index_Model->Delete('user', $id);
		$this->session->set_flashdata('simpan', 'Berhasil menghapus data');
		redirect('admin/data_user', 'refresh');
	}

	public function aktifkan($id) {
		$data 	= array('status' => '1');
		$where 	= array('id_user' => $id);
		$execute = $this->Index_Model->Update('user', $data, $where);
		if ($execute == TRUE) {
			$this->session->set_flashdata('simpan', 'Akun berhasil diaktifkan');
			redirect('admin/data_user', 'refresh');
		} else {
			$this->session->set_flashdata('gagal', 'Gagal');
			redirect('admin/data_user', 'refresh');
		}
	}

	public function nonaktif($id) {
		$data 	= array('status' => '0');
		$where 	= array('id_user' => $id);
		$execute = $this->Index_Model->Update('user', $data, $where);
		if ($execute == TRUE) {
			$this->session->set_flashdata('simpan', 'Akun berhasil dinonaktifkan');
			redirect('admin/data_user', 'refresh');
		} else {
			$this->session->set_flashdata('gagal', 'Gagal mengubah data');
			redirect('admin/data_user', 'refresh');
		}
	}

	public function data_pengembang() {
		$data = $this->Index_Model->Select('pengembang');
		$data = array('data' => $data);
		$this->load->view('Admin/pengembang/data_pengembang', $data);
	}

	public function pengembang_create() {
		$this->load->view('admin/pengembang/pengembang_create');
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

				$queryUser		 = $this->Index_Model->Insert('user', $dataUser);


				if ($queryUser == true) {
					$id_user 		 = $this->db->insert_id();
					$dataPengembang = array(
											'nik_pengembang' 		=> $nik_pengembang,
											'nama_pengembang' 		=> $nama_pengembang,
											'telepon_pengembang' 	=> $telepon_pengembang,
											'email_pengembang'		=> $email_pengembang,
											'alamat_pengembang'		=> $alamat_pengembang,
											'foto_pengembang'		=> $foto_cli,
											'id_user' 				=> $id_user
										);

					$queryPengembang = $this->Index_Model->Insert('pengembang', $dataPengembang);

					$this->session->set_flashdata('simpan', 'Berhasil menambah data');
					redirect('admin/data_pengembang', 'refresh');
				} else {
					$this->session->set_flashdata('gagal', 'Gagal menambah data');
					redirect('admin/data_pengembang', 'refresh');
				}
			} else {
				$this->session->set_flashdata('gagal', 'Username sudah ada');
				redirect('admin/data_pengembang', 'refresh');
			}

		} else {
			$this->session->set_flashdata('gagal', 'Password dan Konfirmasi Password Harus Sama');
			redirect('admin/data_pengembang', 'refresh');
		}
	}

	public function pengembang_edit($id) {
		$query = $this->Model_Pengembang->pick($id);
		$data  = array(
					'row' => $query->row()
				);
		$this->load->view('admin/pengembang/pengembang_edit', $data);
	}

	public function pengembang_update($id) {
		$select_cli = $this->db->get_where('pengembang', array('id_pengembang' => $id));
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
				redirect('admin/data_pengembang', 'refresh');
			} else {
				$this->session->set_flashdata('gagal', 'Gagal mengubah data');
				redirect('admin/data_pengembang', 'refresh');
			}

	}

	public function pengembang_delete($id) {
		
	}

	public function data_kontak() {
		$this->db->order_by('id_kontak', 'DESC');
		$data = $this->Index_Model->Select('kontak');
		$datak = array('data' => $data);
		$this->load->view('admin/kontak/data_kontak', $datak);
	}

	public function kontak_detail($id) {
		$query = $this->db->get_where('kontak', array('id_kontak' => $id));

		$data['row'] = $query->row();

		$this->load->view('admin/kontak/kontak_detail', $data);
	}

	public function kontak_delete($id) {
		$id = array('id_kontak' => $id);
		$this->Index_Model->Delete('kontak', $id);
		$this->session->set_flashdata('simpan', 'Berhasil menghapus data');
		redirect('admin/data_kontak', 'refresh');
	}

	public function data_perumahan() {
		$this->db->order_by('bangunan.id_bangunan', 'DESC');
		$dataPerum = $this->Model_Pengembang->AllPerum2();
		$dataPerum = array('dataPerum' => $dataPerum);

		$this->load->view('Admin/perumahan/data_perumahan', $dataPerum);
	}

	public function perumahan_confirm($id) {
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

		$this->load->view('admin/perumahan/perumahan_confirm', $data);
	}

	public function perumahan_confirmation($id) {
		$status_publish = $this->input->post('status_publish');

		$data = array(
						'status_publish' => $status_publish
					);
		$where = array(
					'id_bangunan' => $id
				);

		$execute = $this->Index_Model->Update('bangunan', $data, $where);
		if ($execute == TRUE) {
			$this->session->set_flashdata('simpan', 'Data dikonfirmasi');
			redirect('admin/data_perumahan', 'refresh');
		} else {
			$this->session->set_flashdata('gagal', 'Kesalahan dalam program');
		}
	}

	public function perumahan_detail($id) {
		$query  = $this->Model_Pengembang->PerumDet($id);
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

		$this->load->view('admin/perumahan/perumahan_detail', $data);
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
		redirect('admin/data_perumahan', 'refresh');
	}

	public function pengembang_detail($id) {
		$query = $this->db->get_where('pengembang', array('id_pengembang' => $id));
		
		$data['row'] = $query->row();
		
		$this->load->view('admin/pengembang/pengembang_detail', $data);
	}
}

 ?>