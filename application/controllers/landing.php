<?php
defined('BASEPATH') or exit('No direct script access allowed');

class landing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_barang');
    }

    public function index()
    {
        $data['title'] = 'Toko Online | CodeIgniter 3';

        $data['barang'] = $this->model_barang->tampil_data()->result();

        $this->load->view('landing/header', $data);
        $this->load->view('landing/content', $data);
        $this->load->view('landing/footer');
    }
}
