<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('get_hash')) {
	function get_hash($PlainPassword) {
		$option=[
			'cost'=>5,
		];
	return password_hash($PlainPassword, PASSWORD_DEFAULT, $option);
	}
}

if (!function_exists('hash_verified')) {
	function hash_verified($PlainPassword, $HashPassword) {
		return password_verify($PlainPassword, $HashPassword) ? true : false;
	}
}

if (!function_exists('picture_login')) {
	function picture_login($id_user) {
		$ci=& get_instance();
    	$ci->load->database();

		$query = $ci->db->get_where('pengembang',array('id_user' => $id_user));
		return $query->row();
	}
}

 ?>