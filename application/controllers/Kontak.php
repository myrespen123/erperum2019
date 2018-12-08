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
		$this->load->view('main/kontak');
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