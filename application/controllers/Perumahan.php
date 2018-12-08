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
			$query = $this->db->query("SELECT DISTINCT * FROM bangunan INNER JOIN foto_bangunan ON foto_bangunan.id_bangunan=bangunan.id_bangunan WHERE status_publish='1' GROUP BY bangunan.id_bangunan ORDER BY bangunan.id_bangunan DESC LIMIT 0,4");
			$select_kec = $this->db->get('kecamatan');
			$select_kel = $this->db->get('kelurahan');

			$data['kecamatan'] = $select_kec->result_array();
			$data['kelurahan'] = $select_kel->result_array();
			$data['posts'] = $query->result_array();
			$data['cek_posts']	= $query->num_rows();
			$this->load->view('main/perumahan', $data);

	}

	public function properties($id) {
		$query  = $this->Model_Pengembang->PerumDet($id);
		$query1 = $this->db->get_where('sarana_prasarana', array('id_bangunan' => $id));
		$query2 = $this->db->get_where('fasilitas', array('id_bangunan' => $id));
		$query3 = $this->db->get_where('foto_bangunan', array('id_bangunan' => $id));
		
		$data['row']  	= $query->row();
		$data['data1']	= $query1->result_array();
		$data['data2']	= $query2->result_array();
		$data['data3']	= $query3->result_array();

		$this->load->view('main/properties', $data);
	}

	public function pengembang($id) {
		$query = $this->db->get_where('pengembang', array('id_pengembang' => $id));
		$dataPerum = $this->Model_Main->PerumDev($id);

		$data['row'] = $query->row();
		$data['dataPerum'] = $dataPerum->result_array();

		$this->load->view('main/pengembang', $data);
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

			$this->db->group_by('bangunan.id_bangunan');
			$this->db->order_by('bangunan.id_bangunan', 'desc');

			$query = $this->db->get();
			$result = $query->result_array();
			$total_row = $query->num_rows();
			$output = '';
				if($total_row > 0) {
					foreach($result as $row => $value) {
					$output .= '
					<div class="col-lg-6 col-md-6">
						<figure class="proper-item">
							<img src=" '.base_url('file/perumahan/images/'.$value['foto_bangunan']).'">
							<h5 class="price-prop">
								<span>Rp. '.number_format($value['harga_bangunan'], 0, ".",".").'</span>
							</h5>
								<figcaption>
									<div class="proper-deskrip-top">
										<h5 class="text-capitalize">'.$value['nama_bangunan'].'</h5>
											<p class="text-capitalize">
												<i class="fa fa-map-marker color-blue"></i>
													'.substr($value['lokasi_bangunan'], 0,40).'
											</p>
									</div>
									<div class="proper-deskrip-bot">
										<div>
											<p>
												<i class="fa fa-th-large color-blue"></i>
													<span class="color-blue m-s-10">'.$value['jumlah_lantai'].' Lantai</span>
											</p>
											<p>
												<i class="fa fa-car color-blue"></i>
													<span class="color-blue m-s-10">'.$value['jumlah_garasi'].' Garasi</span>
											</p>
										</div>
										<div>
											<p>
												<i class="fa fa-bed color-blue"></i>
													<span class="color-blue m-s-10">'.$value['jumlah_kamar'].' Kamar</span>
											</p>
											<p>
												<i class="fa fa-bath color-blue"></i>
													<span class="color-blue m-s-10">'.$value['jumlah_kamar_mandi'].' Toilet</span>
											</p>
										</div>
									</div>
									<a href="'.site_url('perumahan/properties/'.$value['id_bangunan']).'">LIHAT</a>
								</figcaption>
						</figure>
					</div>
				   ';
				}
		} else {
		  $output = '<h3>Oops, Properti tidak ditemukan :(</h3>';
		}
			echo $output;
		}
		

	}

	public function ajax_load() {
		$perPage 	= 4;

		$dataPerum 	= $this->Model_Main->PerumOn();
		$count 		= $dataPerum->num_rows();


			$start = ceil($this->input->get("page") * $perPage);
			$query = $this->db->query("SELECT DISTINCT * FROM bangunan INNER JOIN foto_bangunan ON foto_bangunan.id_bangunan=bangunan.id_bangunan WHERE status_publish='1' GROUP BY bangunan.id_bangunan ORDER BY bangunan.id_bangunan DESC LIMIT $start, $perPage");

			if ($query->num_rows() > 0) {
				$data['cek_posts']	= $query->num_rows();
				$data['posts'] = $query->result_array();
				$result = $this->load->view('main/perum_scroll',$data);
			}
			else {
				$result = 0;
			}
			return json_encode($result);
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


}
 ?> 