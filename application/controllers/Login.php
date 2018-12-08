<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Login extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->model('Model_Login');


	}

	public function index() {
		$this->load->view('login/auth');
		
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level')=='1') {
			redirect('admin');
		} elseif ($this->session->userdata('logged_in') == TRUE && $this->session->userData('level')=='2') {
			redirect('pengembang');
		} elseif ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level')=='3') {
			redirect('operator');
		}
	}

	public function authenticate() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$query = $this->Model_Login->cek($username, $password);

		if (!$query) {
			$this->session->set_flashdata('alert', '<h4>Username atau Password Salah</h4>');
			redirect('Login');
		} else {
			$userData = array(
							'id_user' => $query->id_user,
							'username' => $query->username,
							'status' => $query->status,
							'level' => $query->level,
							'logged_in' => TRUE
						);
			$this->session->set_userdata($userData);
			if ($this->session->userdata('status') != "0") {
				if ($this->session->userdata('level') == '1') {
					redirect('admin');
				} elseif ($this->session->userdata('level') == '2') {
					redirect('pengembang/index');
				} elseif ($this->session->userdata('level') == '3') {
					redirect('operator/index');
				} else {
					$this->session->sess_destroy();
					redirect('login/index');
				}
			} else {
				$this->session->set_flashdata('alert', '<h4>Akun tidak aktif</h4>"');
				redirect('Login/index');
			}
		}

	}


	public function logout() {
		session_destroy();
		$this->session->sess_destroy();
		redirect('Login/index');
	}
}


 ?>