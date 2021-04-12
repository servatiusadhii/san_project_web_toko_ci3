<?php 

class Model_kategori extends CI_Model{
	public function data_elektronik()
	{
		return $this->db->get_where("tb_barang",array('kategori' => 'elektronik'));
	}

	public function data_accessories()
	{
		return $this->db->get_where("tb_barang",array('kategori' => 'accessories'));
	}

	public function data_pakaian_anak()
	{
		return $this->db->get_where("tb_barang",array('kategori' => 'pakaian anak'));
	}

	public function data_olahraga()
	{
		return $this->db->get_where("tb_barang",array('kategori' => 'olahraga'));
	}
}

 ?>