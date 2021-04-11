<?php

class data_barang extends CI_Controller
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
		$data['barang'] = $this->model_barang->tampil_data()->result();
		$data['title'] = 'Product Management';
		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
		$this->load->view('admin/data_barang', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_aksi()
	{
		$nama_brg		= $this->input->post('nama_brg');
		$keterangan		= $this->input->post('keterangan');
		$kategori		= $this->input->post('kategori');
		$harga			= $this->input->post('harga');
		$stok			= $this->input->post('stok');
		$gambar			= $FILES['gambar']['name'];
		if ($gambar = '') {
		} else {
			$config['upload_path'] = '../assets/uploads';
			$config['allowed_types'] = 'jpg|jpeg|jfif|png|gif';

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('gambar')) {
				echo "Gambar Gagal diUpload!";
			} else {
				$gambar = $this->upload->data('file_name');
			}
		}

		$data = array(
			'nama_brg'		=> $nama_brg,
			'keterangan'	=> $keterangan,
			'kategori'		=> $kategori,
			'harga'			=> $harga,
			'stok'			=> $stok,
			'gambar'		=> $gambar,
		);

		$this->model_barang->tambah_barang($data, 'tb_barang');
		redirect('data_barang/index');
	}

	public function edit($id)
	{
		
		$where = array('id_brg' => $id);
		$data['barang'] = $this->model_barang->edit_barang($where, 'tb_barang')->result();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get('user_role')->result_array();
		$data['title'] = 'Product Management';
		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
		$this->load->view('admin/edit_barang', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$id 		= $this->input->post('id_brg');
		$nama_brg 	= $this->input->post('nama_brg');
		$keterangan = $this->input->post('keterangan');
		$kategori 	= $this->input->post('kategori');
		$harga 		= $this->input->post('harga');
		$stok 		= $this->input->post('stok');

		$data = array(

			'nama_brg'		=> $nama_brg,
			'keterangan'	=> $keterangan,
			'kategori'		=> $kategori,
			'harga'			=> $harga,
			'stok' 			=> $stok
		);

		$where = array(
			'id_brg'	=> $id
		);

		$this->model_barang->update_data($where, $data, 'tb_barang');
		redirect('data_barang/index');
	}

	public function hapus($id)
	{
		$where = array('id_brg' => $id);
		$this->model_barang->hapus_data($where, 'tb_barang');
		redirect('data_barang/index');
	}

	public function detail($id)
	{
		$data['title'] = 'Product Management';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get('user_role')->result_array();
		$data['barang'] = $this->model_barang->detail_brg($id);
		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
		$this->load->view('admin/detail_barang', $data);
		$this->load->view('templates/footer');
	}
}
