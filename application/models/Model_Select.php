<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Model_Select extends CI_Model
{
	public function kelurahan($id_kecamatan) {
		$kelurahan = "<option value='0'>--pilih--</option>";
		$kel = $this->db->get_where('kelurahan', array('id_kecamatan' => $id_kecamatan));

		foreach ($kel->result_array() as $value) {
			$kelurahan .= "<option value='$value[$id_kelurahan]'>$value[nama_kelurahan]</option>";
		}
		return $kelurahan;
	}

}
 ?>