<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Kontak extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Index_Model');
	}

	public function index()
	{
		$header = $this->db->get_where('main_bg', array('id_main_bg' => 1));
		$middle = $this->db->get_where('main_bg', array('id_main_bg' => 2));
		$footer = $this->db->get_where('main_bg', array('id_main_bg' => 3));
		$mainfo = $this->db->get_where('main_info', array('level_info' => 1));
		$maintentang = $this->db->get_where('main_info', array('level_info' => 2));
		$query99 = $this->db->get_where('setting', array('id_setting' => 1));

		$data['header'] 	= $header->row();
		$data['middle'] 	= $middle->row();
		$data['footer'] 	= $footer->row();
		$data['mainfo'] 	= $mainfo->result_array();
		$data['maintentang'] 	= $maintentang->row();
		$data['row_set'] = $query99->row();

		$this->load->view('main/kontak', $data);
	}

	public function kontak_insert() {
		$kontak_nama 	=  $this->input->post('kontak_nama');
		$kontak_telepon = $this->input->post('kontak_telepon');
		$kontak_pesan 	= $this->input->post('kontak_pesan');

		$data = array(
					'kontak_nama' 		=> $kontak_nama,
					'kontak_telepon'	=> $kontak_telepon,
					'kontak_pesan' 		=> $kontak_pesan
				);

		$execute = $this->Index_Model->Insert('kontak', $data);
		if ($execute == TRUE) {
			$this->session->set_flashdata('simpan', 'Berhasil Mengirim Pesan');
			redirect('kontak', 'refresh');
		} else {
			$this->session->set_flashdata('gagal', 'Gagal Mengirim Pesan');
			redirect('kontak', 'refresh');
		}
	}
}

 ?>