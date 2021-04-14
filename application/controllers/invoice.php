<?php

class Invoice extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('role_id') != '1') {
			$this->session->set_flashdata('pesan', '<div
					class="alert alert-danger
					alert-dismissible fade show"
					role="alert">
					Anda Belum Login!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get('user_role')->result_array();
		$data['title'] = 'Invoice Track';
		$data['invoice'] = $this->model_invoice->tampil_data();
		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
		$this->load->view('admin/invoice', $data);
		$this->load->view('templates/footer');
	}

	public function detail($id_invoice)
	{
		$data['invoice'] = $this->model_invoice->ambil_id_invoice($id_invoice);
		$data['pesanan'] = $this->model_invoice->ambil_id_pesanan($id_invoice);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get('user_role')->result_array();
		$data['title'] = 'Invoice Track';
		
		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
		$this->load->view('admin/detail_invoice', $data);
		$this->load->view('templates/footer');
	}
}
