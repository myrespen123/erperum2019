<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Perumahan extends CI_Controller
{
	function __construct() {
		parent::__construct();

		$this->load->model('Index_Model');
		$this->load->model('Model_Pengembang');
		$this->load->model('Model_Main');
	}

	public function index() {
		$header = $this->db->get_where('main_bg', array('id_main_bg' => 1));
		$middle = $this->db->get_where('main_bg', array('id_main_bg' => 2));
		$footer = $this->db->get_where('main_bg', array('id_main_bg' => 3));
		$mainfo = $this->db->get_where('main_info', array('level_info' => 1));
		$maintentang = $this->db->get_where('main_info', array('level_info' => 2));
		$query2 = $this->db->get_where('setting', array('id_setting' => 1));

		$query = $this->db->query("SELECT DISTINCT * FROM bangunan INNER JOIN foto_bangunan ON foto_bangunan.id_bangunan=bangunan.id_bangunan INNER JOIN perumahan ON bangunan.id_perumahan=perumahan.id_perumahan WHERE status_publish='1' AND perumahan.status_perumahan='1' GROUP BY bangunan.id_bangunan ORDER BY bangunan.id_bangunan DESC LIMIT 0,4");
		$select_kec = $this->db->get('kecamatan');
		$select_kel = $this->db->get('kelurahan');

		$data['kecamatan'] = $select_kec->result_array();
		$data['kelurahan'] = $select_kel->result_array();
		$data['posts'] = $query->result_array();
		$data['cek_posts']	= $query->num_rows();
		$data['header'] 	= $header->row();
		$data['middle'] 	= $middle->row();
		$data['footer'] 	= $footer->row();
		$data['mainfo'] 	= $mainfo->result_array();
		$data['maintentang'] 	= $maintentang->row();
		$data['row_set'] = $query2->row();
		$this->load->view('main/perumahan', $data);
	}

	public function properties($bangunan_slug) {
		$query  = $this->Model_Pengembang->PerumDets($bangunan_slug);
		$ror_b 	= $query->row();
		// $query1 = $this->db->get_where('sarana_prasarana', array('id_bangunan' => $ror_b->id_bangunan));
		// $query2 = $this->db->get_where('fasilitas', array('id_bangunan' => $ror_b->id_bangunan));

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
		
		$data['row']  				= $query->row();
		$data['num_rows'] 			= $query->num_rows();
		// $data['data1']	= $query1->result_array();
		// $data['data2']	= $query2->result_array();
		if ($query->num_rows > 0) {
			$fasilitas_perumahan 		= $this->db->get_where('fasilitas_perumahan', array('id_perumahan' => $ror_b->id_perumahan));
			$sarana_prasarana_perumahan = $this->db->get_where('sarana_prasarana_perumahan', array('id_perumahan' => $ror_b->id_perumahan));
			$query_spek 				= $this->db->get_where('spesifikasi_rumah', array('id_bangunan' => $ror_b->id_bangunan));
			$query3 					= $this->db->get_where('foto_bangunan', array('id_bangunan' => $ror_b->id_bangunan));
			$data_perumahan 			= $this->db->get_where('perumahan', array('id_perumahan' => $ror_b->id_perumahan))->row();
			$data['fasilitas_perumahan'] = $fasilitas_perumahan->result_array();
			$data['sarana_prasarana_perumahan'] = $sarana_prasarana_perumahan->result_array();
			$data['data3']				= $query3->result_array();
			$data['spesifikasi_rumah']	= $query_spek->result_array();
			$data['row_perum'] = $data_perumahan;
			$this->load->view('main/properties2', $data);
		} else {
			$data['error_title'] = "Properti";
			$this->load->view('main/error/custom_error', $data);
		}

	}

	public function perumahan_detail($perumahan_slug) {
		$query  = $this->Model_Pengembang->EstateDev($perumahan_slug);
		// $query = $this->db->get_where('perumahan', array('slug' => $perumahan_slug));
		$ror_b 	= $query->row();

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
		
		$data['row']  				= $query->row();
		$data['num_rows'] 			= $query->num_rows();
		if ($query->num_rows > 0) {
			$dataPerum = $this->Model_Main->PropertiEstate($ror_b->id_perumahan);
			$fasilitas_perumahan 		= $this->db->get_where('fasilitas_perumahan', array('id_perumahan' => $ror_b->id_perumahan));
			$sarana_prasarana_perumahan = $this->db->get_where('sarana_prasarana_perumahan', array('id_perumahan' => $ror_b->id_perumahan));
			$data['fasilitas_perumahan'] = $fasilitas_perumahan->result_array();
			$data['sarana_prasarana_perumahan'] = $sarana_prasarana_perumahan->result_array();
			$data['row']  	= $ror_b;
			$data['dataPerum'] = $dataPerum->result_array();
			$data['namros'] = $dataPerum->num_rows();
			$this->load->view('main/estate_detail', $data);
		} else {
			$data['error_title'] = "Perumahan";
			$this->load->view('main/error/custom_error', $data);
		}
	}

	public function pengembang($pengembang_slug) {
		$query = $this->db->get_where('pengembang', array('pengembang_slug' => $pengembang_slug));
		if ($query->num_rows() > 0) {
			$row_dev = $query->row();
			$id_pengembang = $row_dev->id_pengembang;
			// $dataPerum = $this->Model_Main->PerumDev($pengembang_slug);
			$dataPerum = $this->Model_Main->PropertiDev($id_pengembang);
			

			$header = $this->db->get_where('main_bg', array('id_main_bg' => 1));
			$middle = $this->db->get_where('main_bg', array('id_main_bg' => 2));
			$footer = $this->db->get_where('main_bg', array('id_main_bg' => 3));
			$mainfo = $this->db->get_where('main_info', array('level_info' => 1));
			$maintentang = $this->db->get_where('main_info', array('level_info' => 2));
			$query99 = $this->db->get_where('setting', array('id_setting' => 1));

			$data['header'] 		= $header->row();
			$data['middle'] 		= $middle->row();
			$data['footer'] 		= $footer->row();
			$data['mainfo'] 		= $mainfo->result_array();
			$data['maintentang'] 	= $maintentang->row();
			$data['row_set'] 		= $query99->row();
			$data['data_pengembang'] = $row_dev;

			$data['row'] = $query->row();
			$data['dataPerum'] = $dataPerum->result_array();
			$data['cek_properti'] = $dataPerum->num_rows();

			$this->load->view('main/properti_developer', $data);
		} else {
			$data['error_title'] = "Pengembang";
			$this->load->view('main/error/custom_error', $data);
		}
	}

	public function perumahan_developer($pengembang_slug) {
		$query = $this->db->get_where('pengembang', array('pengembang_slug' => $pengembang_slug));
		$row_dev = $query->row();
		$id_pengembang = $row_dev->id_pengembang;

		// $query_perumahan = $this->db->get_where('perumahan', array('id_pengembang' => 7, 'status_perumahan' => 1));
		$query_perumahan = $this->Model_Main->PerumahanArray($id_pengembang);

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
		$data['perumahan'] 	= $query_perumahan->result_array();
		$data['cek_perumahan'] = $query_perumahan->num_rows();
		$data['data_pengembang'] = $row_dev;

		$this->load->view('main/estate_developer', $data);

	}

	public function perum_filt() {
		$harga_min 		= $this->input->post('min_harga');
		$harga_max		= $this->input->post('max_harga');
		$max_bangunan	= $this->input->post('max_bangunan');
		$min_bangunan 	= $this->input->post('min_bangunan');
		$min_tanah 		= $this->input->post('min_tanah');
		$max_tanah 		= $this->input->post('max_tanah');
		$kecamatan 		= $this->input->post('kecamatan');
		$kelurahan 		= $this->input->post('kelurahan');
		$aksi1			= $this->input->post('action');

		if(isset($aksi1)) {
			$this->db->distinct();
			$this->db->select('*');
			$this->db->from('bangunan');
			$this->db->join('foto_bangunan', 'foto_bangunan.id_bangunan=bangunan.id_bangunan');
			$this->db->where('status_publish', 1);
			$this->db->where('harga_bangunan >=', $harga_min);
			$this->db->where('harga_bangunan <=', $harga_max);
				
			if (isset($kecamatan) && !empty($kecamatan)) {
				$this->db->where('id_kecamatan', $kecamatan);
			}
			if (isset($kelurahan) && !empty($kelurahan)) {
				$this->db->where('id_kelurahan', $kelurahan);
			}
			if (isset($max_bangunan) && !empty($max_bangunan) ) {
				$this->db->where('luas_bangunan <=', $max_bangunan);
			}
			if (isset($min_bangunan) && !empty($min_bangunan)) {
				$this->db->where('luas_bangunan >=', $min_bangunan);
			}
			if (isset($min_tanah) && !empty($min_tanah)) {
				$this->db->where('luas_tanah >=', $min_tanah);
			}
			if (isset($max_tanah) && !empty($max_tanah)) {
				$this->db->where('luas_tanah <=', $max_tanah);
			}

			// var_dump($kecamatan);
			// echo "<br>";
			// var_dump($kelurahan);
			// echo "<br>";
			// echo "<br>";
			// echo "lebih besar dari ";
			// var_dump($harga_min);
			// echo "<br>lebih kecil dari ";
			// var_dump($harga_max);
			// echo "<br>";
			// echo "<br>";
			// echo "lebih besar dari ";
			// var_dump($min_bangunan);
			// echo "<br>lebih kecil dari ";
			// var_dump($max_bangunan);
			// echo "<br>";
			// echo "<br>";
			// echo "lebih besar dari ";
			// var_dump($min_tanah);
			// echo "<br>lebih kecil dari ";
			// var_dump($max_tanah);
			// die();

			$limit = 4;
			$this->db->group_by('bangunan.id_bangunan');
			$this->db->order_by('bangunan.id_bangunan', 'desc');
			$query = $this->db->get();
		    $data['total_row'] = $query->num_rows();
		    $data['limit'] = $limit;

		    $this->db->distinct();
			$this->db->select('*');
			$this->db->from('bangunan');
			$this->db->join('foto_bangunan', 'foto_bangunan.id_bangunan=bangunan.id_bangunan');
			$this->db->where('status_publish', 1);
			$this->db->where('harga_bangunan >=', $harga_min);
			$this->db->where('harga_bangunan <=', $harga_max);
				
			if (isset($kecamatan) && !empty($kecamatan)) {
				$this->db->where('id_kecamatan', $kecamatan);
			}
			if (isset($kelurahan) && !empty($kelurahan)) {
				$this->db->where('id_kelurahan', $kelurahan);
			}
			if (isset($max_bangunan) && !empty($max_bangunan) ) {
				$this->db->where('luas_bangunan <=', $max_bangunan);
			}
			if (isset($min_bangunan) && !empty($min_bangunan)) {
				$this->db->where('luas_bangunan >=', $min_bangunan);
			}
			if (isset($min_tanah) && !empty($min_tanah)) {
				$this->db->where('luas_tanah >=', $min_tanah);
			}
			if (isset($max_tanah) && !empty($max_tanah)) {
				$this->db->where('luas_tanah <=', $max_tanah);
			}

			$limit = 4;
			$this->db->group_by('bangunan.id_bangunan');
			$this->db->order_by('bangunan.id_bangunan', 'desc')->limit($limit,0);
			$query2 = $this->db->get(); 
			$data['result'] = $query2->result_array();
			$this->load->view('main/perum_filter', $data);
		}
	}

	public function get_select() {
		$id_kec = $this->input->post('id_kecamatan');
		$query9 = $this->db->get_where('kelurahan', array('id_kecamatan' => $id_kec));
		$result9 = $query9->result_array();
		$output = '';
		$output .= '<option value="">pilih kelurahan</option>';
		foreach ($result9 as $data9) {
			$output .= '<option class="form-control" value="'.$data9["id_kelurahan"].'">'.$data9["nama_kelurahan"].'</option>';
		}
		echo $output;
	}

	public function perum_load_ajax() {
		$id = $this->input->post('id');
		$query = $this->db->query("SELECT DISTINCT * FROM bangunan INNER JOIN foto_bangunan ON foto_bangunan.id_bangunan=bangunan.id_bangunan WHERE status_publish='1' AND bangunan.id_bangunan < $id GROUP BY bangunan.id_bangunan ORDER BY bangunan.id_bangunan DESC")->num_rows();
		$limit = 4;
	    $data['total_row'] = $query;
	    $data['limit'] = $limit;
	    $data['query'] = $this->db->query("SELECT DISTINCT * FROM bangunan INNER JOIN foto_bangunan ON foto_bangunan.id_bangunan=bangunan.id_bangunan WHERE status_publish='1' AND bangunan.id_bangunan < $id GROUP BY bangunan.id_bangunan ORDER BY bangunan.id_bangunan DESC LIMIT $limit");
	    $this->load->view('main/perumahan_load_ajax', $data);
	}

	public function perum_filter_gan() {
		$id 			= $this->input->post('id');
		$harga_min 		= $this->input->post('min_harga');
		$harga_max		= $this->input->post('max_harga');
		$max_bangunan	= $this->input->post('max_bangunan');
		$min_bangunan 	= $this->input->post('min_bangunan');
		$min_tanah 		= $this->input->post('min_tanah');
		$max_tanah 		= $this->input->post('max_tanah');
		$kecamatan 		= $this->input->post('kecamatan');
		$kelurahan 		= $this->input->post('kelurahan');
		$aksi1			= $this->input->post('action');

		if(isset($aksi1)) {
			$this->db->distinct();
			$this->db->select('*');
			$this->db->from('bangunan');
			$this->db->join('foto_bangunan', 'foto_bangunan.id_bangunan=bangunan.id_bangunan');
			$this->db->where('status_publish', 1);
			$this->db->where('harga_bangunan >=', $harga_min);
			$this->db->where('harga_bangunan <=', $harga_max);
			$this->db->where('bangunan.id_bangunan <', $id);
				
			if (isset($kecamatan) && !empty($kecamatan)) {
				$this->db->where('id_kecamatan', $kecamatan);
			}
			if (isset($kelurahan) && !empty($kelurahan)) {
				$this->db->where('id_kelurahan', $kelurahan);
			}
			if (isset($max_bangunan) && !empty($max_bangunan) ) {
				$this->db->where('luas_bangunan <=', $max_bangunan);
			}
			if (isset($min_bangunan) && !empty($min_bangunan)) {
				$this->db->where('luas_bangunan >=', $min_bangunan);
			}
			if (isset($min_tanah) && !empty($min_tanah)) {
				$this->db->where('luas_tanah >=', $min_tanah);
			}
			if (isset($max_tanah) && !empty($max_tanah)) {
				$this->db->where('luas_tanah <=', $max_tanah);
			}

			// var_dump($kecamatan);
			// echo "<br>";
			// var_dump($kelurahan);
			// echo "<br>";
			// echo "<br>";
			// echo "lebih besar dari ";
			// var_dump($harga_min);
			// echo "<br>lebih kecil dari ";
			// var_dump($harga_max);
			// echo "<br>";
			// echo "<br>";
			// echo "lebih besar dari ";
			// var_dump($min_bangunan);
			// echo "<br>lebih kecil dari ";
			// var_dump($max_bangunan);
			// echo "<br>";
			// echo "<br>";
			// echo "lebih besar dari ";
			// var_dump($min_tanah);
			// echo "<br>lebih kecil dari ";
			// var_dump($max_tanah);
			// die();

			$limit = 4;
			$this->db->group_by('bangunan.id_bangunan');
			$this->db->order_by('bangunan.id_bangunan', 'desc');
			$query = $this->db->get();
		    $data['total_row'] = $query->num_rows();
		    $data['limit'] = $limit;

		    $this->db->distinct();
			$this->db->select('*');
			$this->db->from('bangunan');
			$this->db->join('foto_bangunan', 'foto_bangunan.id_bangunan=bangunan.id_bangunan');
			$this->db->where('status_publish', 1);
			$this->db->where('harga_bangunan >=', $harga_min);
			$this->db->where('harga_bangunan <=', $harga_max);
			$this->db->where('bangunan.id_bangunan <', $id);
				
			if (isset($kecamatan) && !empty($kecamatan)) {
				$this->db->where('id_kecamatan', $kecamatan);
			}
			if (isset($kelurahan) && !empty($kelurahan)) {
				$this->db->where('id_kelurahan', $kelurahan);
			}
			if (isset($max_bangunan) && !empty($max_bangunan) ) {
				$this->db->where('luas_bangunan <=', $max_bangunan);
			}
			if (isset($min_bangunan) && !empty($min_bangunan)) {
				$this->db->where('luas_bangunan >=', $min_bangunan);
			}
			if (isset($min_tanah) && !empty($min_tanah)) {
				$this->db->where('luas_tanah >=', $min_tanah);
			}
			if (isset($max_tanah) && !empty($max_tanah)) {
				$this->db->where('luas_tanah <=', $max_tanah);
			}

			$limit = 4;
			$this->db->group_by('bangunan.id_bangunan');
			$this->db->order_by('bangunan.id_bangunan', 'desc')->limit($limit,0);
			$query2 = $this->db->get(); 
			$data['result'] = $query2->result_array();
			$this->load->view('main/perum_filter_loadmore',$data);
		}
	}


}
 ?> 