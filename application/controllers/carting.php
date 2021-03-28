<?php

class carting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        

        if ($this->session->userdata('role_id') != '2') {
            $this->session->set_flashdata('pesan', '<div
					class="alert alert-danger
					alert-dismissible fade show"
					role="alert">
					Anda Belum Login!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>');
            redirect('auth');
        }
    }

    public function tambah_ke_keranjang($id)
    {
        $barang = $this->model_barang->find($id);

        $data = array(
            'id'      => $barang->id_brg,
            'qty'     => 1,
            'price'   => $barang->harga,
            'name'    => $barang->nama_brg
        );

        $this->cart->insert($data);
        redirect('carting/detail_keranjang');
    }

    public function detail_keranjang()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Shopping Cart';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/keranjang', $data);
        $this->load->view('templates/footer');
    }

    public function hapus_keranjang()
    {
        $this->cart->destroy();
        redirect('landing');
    }

    public function pembayaran()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Shopping Cart';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/payment');
        $this->load->view('templates/footer');
    }

    public function proses_pesanan()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Shopping Cart';

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required'    => 'Nama wajib diisi!'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required'    => 'Alamat wajib diisi!'
        ]);
        $this->form_validation->set_rules('no_telp', 'No_Telp', 'required|trim', [
            'required'    => 'No Telepon wajib diisi!'
        ]);
        $this->form_validation->set_rules('kurir', 'Kurir', 'required', [
            'required'    => 'Pilih kurir terlebih dahulu!'
        ]);
        $this->form_validation->set_rules('bank', 'Bank', 'required', [
            'required'    => 'Wajib pilih metode pembayaran!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/payment');
            $this->load->view('templates/footer');
        } else {
            $is_processed = $this->model_invoice->index();
            if ($is_processed) {
                $this->cart->destroy();
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('user/success_payment');
                $this->load->view('templates/footer');
            } else {
                echo "Maaf, Pesanan Anda Gagal diproses!";
            }
        }
    }

    public function detail($id_brg)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Detail Barang';
        $data['barang'] = $this->model_barang->detail_brg($id_brg);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        $this->load->view('user/detail-barang',$data);
        $this->load->view('templates/footer');
    }
}
