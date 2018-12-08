<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Operator extends CI_Controller
{

	public function __construct() {
		parent::__construct();

		$this->load->model('Index_Model');

		if (!$this->session->userdata('logged_in') == TRUE) {
			redirect('login');
		} 

		if ($this->session->userdata('level') != '3') {
			redirect('login');
		}
	}

	public function index() {
		$this->load->view('Operator/index');
	}

	public function data_background() {
		$query = $this->db->get('main_bg');

		$data['data'] = $query->result_array();

		$this->load->view('Operator/data_background', $data);
	}

	public function background_edit($id) {
		$query = $this->db->get_where('main_bg', array('id_main_bg' => $id));

		$data['row'] = $query->row();

		$this->load->view('operator/background_edit', $data);
	}

	public function background_update($id) {
		$select_cli = $this->db->get_where('main_bg', array('id_main_bg' => $id));
		$row_cli	= $select_cli->row();

		$foto = $this->input->post('foto');

		$databg = array(
								'foto' 		=> $foto
							);
		$where = array(
					'id_main_bg' => $id
				); 

		$config['upload_path'] = './file/main/images/';
		$config['allowed_types'] = 'jpg|png|jpeg|';
		$this->load->library('upload', $config);

			
			if ($this->upload->do_upload('foto')) {
				if ($row_cli->foto == '') {
					$image 	  = $this->upload->data();
					$databg['foto'] = $image['file_name'];
				} else {
					unlink('./file/main/images/'.$row_cli->foto);
					$image 	  = $this->upload->data();
					$databg['foto'] = $image['file_name'];
				}
			}


		$execute = $this->Index_Model->Update('main_bg', $databg, $where);

		if ($execute == TRUE) {
			$this->session->set_flashdata('simpan', 'Berhasil mengubah data');
			redirect('Operator/data_background', 'refresh');
		} else {
			$this->session->set_flashdata('gagal', 'Gagal mengubah data');
			redirect('Operator/data_background', 'refresh');
		}
	}

	public function data_info() {
		$query = $this->db->get('main_info');

		$data['data'] = $query->result_array();

		$this->load->view('operator/data_info', $data);
	}

	public function mainfo_edit($id) {
		$query = $this->db->get_where('main_info', array('id_main_info' => $id));

		$data['row'] = $query->row();

		$this->load->view('operator/mainfo_edit', $data);
	}

	public function mainfo_update($id) {
		$select_cli = $this->db->get_where('main_info', array('id_main_info' => $id));
		$row_cli	= $select_cli->row();

		$judul = $this->input->post('judul');
		$deskripsi = $this->input->post('deskripsi');
		$foto = $this->input->post('foto');

		$datainfo = array(
						'judul' 	=> $judul,
						'deskripsi' => $deskripsi,
					);
		$where = array(
					'id_main_info' => $id
				); 

		$config['upload_path'] = './file/main/images/';
		$config['allowed_types'] = 'jpg|png|jpeg|';
		$this->load->library('upload', $config);

			
			if ($this->upload->do_upload('foto')) {
				if ($row_cli->foto == '') {
					$image 	  = $this->upload->data();
					$datainfo['foto'] = $image['file_name'];
				} else {
					unlink('./file/main/images/'.$row_cli->foto);
					$image 	  = $this->upload->data();
					$datainfo['foto'] = $image['file_name'];
				}
			}


		$execute = $this->Index_Model->Update('main_info', $datainfo, $where);

		if ($execute == TRUE) {
			$this->session->set_flashdata('simpan', 'Berhasil mengubah data');
			redirect('Operator/data_info', 'refresh');
		} else {
			$this->session->set_flashdata('gagal', 'Gagal mengubah data');
			redirect('Operator/data_info', 'refresh');
		}
	}

	public function mainfo_detail($id) {
		$query = $this->db->get_where('main_info', array('id_main_info' => $id));

		$data['row'] = $query->row();

		$this->load->view('operator/mainfo_detail', $data);
	}

	public function data_setting() {
		$query = $this->db->get_where('setting', array('id_setting' => 1));

		$data['row'] = $query->row();

		$this->load->view('Operator/data_setting', $data);
	}

	public function setting_edit($id) {
		$query = $this->db->get_where('setting', array('id_setting' => $id));

		$data['row'] = $query->row();

		$this->load->view('Operator/setting_edit', $data);
	}

	public function setting_update($id) {
		$select_cli = $this->db->get_where('setting', array('id_setting' => $id));
		$row_cli	= $select_cli->row();

		$nama_website 		= $this->input->post('nama_website');
		$deskripsi_website 	= $this->input->post('deskripsi_website');
		$slogan_setting 	= $this->input->post('slogan_setting');
		$alamat_setting 	= $this->input->post('alamat_setting');
		$telepon_setting 	= $this->input->post('telepon_setting');
		$email_setting 		= $this->input->post('email_setting');
		$jam_setting 		= $this->input->post('jam_setting');
		$copyright 			= $this->input->post('copyright');
		$embed_gmap 		= $this->input->post('embed_gmap');

		$logo_setting = $this->input->post('logo_setting');

		$datasetting = array(
						'nama_website' 		=> $nama_website,
						'deskripsi_website' => $deskripsi_website,
						'slogan_setting' 	=> $slogan_setting,
						'alamat_setting' 	=> $alamat_setting,
						'telepon_setting' 	=> $telepon_setting,
						'email_setting' 	=> $email_setting,
						'jam_setting' 		=> $jam_setting,
						'copyright' 		=> $copyright,
						'embed_gmap' 		=> $embed_gmap
					);
		$where = array(
					'id_setting' => $id
				); 

		$config['upload_path'] = './file/main/images/';
		$config['allowed_types'] = 'jpg|png|jpeg|';
		$this->load->library('upload', $config);

			
			if ($this->upload->do_upload('logo_setting')) {
				if ($row_cli->logo_setting == '') {
					$image 	  = $this->upload->data();
					$datasetting['logo_setting'] = $image['file_name'];
				} else {
					unlink('./file/main/images/'.$row_cli->logo_setting);
					$image 	  = $this->upload->data();
					$datasetting['logo_setting'] = $image['file_name'];
				}
			}


		$execute = $this->Index_Model->Update('setting', $datasetting, $where);

		if ($execute == TRUE) {
			$this->session->set_flashdata('simpan', 'Berhasil mengubah data');
			redirect('Operator/data_setting', 'refresh');
		} else {
			$this->session->set_flashdata('gagal', 'Gagal mengubah data');
			redirect('Operator/data_setting', 'refresh');
		}
	}

}


 ?>