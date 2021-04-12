<?php

class Kategori extends CI_Controller
{
	public function elektronik()
	{
		$data['title'] = 'Electronik | Toko Online';
		$data['category'] = 'Elektronik';
		$data['elektronik'] = $this->model_kategori->data_elektronik()->result();
		$this->load->view('landing/header', $data);
        $this->load->view('landing/content_elektronik', $data);
        $this->load->view('landing/footer');
	}

	public function accessories()
	{
		$data['title'] = 'Accessories | Toko Online';
		$data['category'] = 'Accessories';
		$data['accessories'] = $this->model_kategori->data_accessories()->result();
		$this->load->view('landing/header', $data);
        $this->load->view('landing/content_accessories', $data);
        $this->load->view('landing/footer');
	}


	public function pakaian_anak()
	{
		$data['title'] = 'Pakaian Anak | Toko Online';
		$data['category'] = 'Pakaian Anak';
		$data['pakaian_anak'] = $this->model_kategori->data_pakaian_anak()->result();
		$this->load->view('landing/header', $data);
        $this->load->view('landing/content_anak', $data);
        $this->load->view('landing/footer');
	}

	public function olahraga()
	{
		$data['title'] = 'Olahraga | Toko Online';
		$data['category'] = 'Olahraga';
		$data['olahraga'] = $this->model_kategori->data_olahraga()->result();
		$this->load->view('landing/header', $data);
        $this->load->view('landing/content_olahraga', $data);
        $this->load->view('landing/footer');
	}
}
