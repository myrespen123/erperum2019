<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Main extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Index_Model');
		$this->load->model('Model_Main');
	}

	public function index()
	{
		$propert_new = $this->Model_Main->new_proper();

		$header = $this->db->get_where('main_bg', array('id_main_bg' => 1));
		$middle = $this->db->get_where('main_bg', array('id_main_bg' => 2));
		$footer = $this->db->get_where('main_bg', array('id_main_bg' => 3));
		$mainfo = $this->db->get_where('main_info', array('level_info' => 1));
		$maintentang = $this->db->get_where('main_info', array('level_info' => 2));
		$query = $this->db->get_where('setting', array('id_setting' => 1));
		
		$data['row_set'] = $query->row();
		$data['new_proper'] = $propert_new->result_array();
		$data['header'] 	= $header->row();
		$data['middle'] 	= $middle->row();
		$data['footer'] 	= $footer->row();
		$data['mainfo'] 	= $mainfo->result_array();
		$data['maintentang'] 	= $maintentang->row();

		$this->load->view('main/main', $data);
	}

}

 ?>