<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Account Setting';


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Edit Profile';

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            //check upload gambar
            $uploadImg = $_FILES['image']['name'];

            if ($uploadImg) {
                $config['allowed_types'] = 'gif|jpeg|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your Profile Has Been Updated.</div>');
            redirect('user');
        }
    }

    public function changePass()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Change Password';

        $this->form_validation->set_rules('passwordNow', 'password Now', 'required|trim');
        $this->form_validation->set_rules('newPassword', 'New Password', 'required|trim|min_length[6]|matches[repeatPassword]');
        $this->form_validation->set_rules('repeatPassword', 'Repeat Password', 'required|trim|min_length[6]|matches[newPassword]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/change-pass', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('passwordNow');
            $new_password = $this->input->post('newPassword');
            $repeat_password = $this->input->post('repeatPassword');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Wrong Current Password. Try Again</div>');
                redirect('user/changePass');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Please, Renew the Password!</div>');
                    redirect('user/changePass');
                }
                if ($new_password != $repeat_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New Password doesnt Match!!. Try Again</div>');
                    redirect('user/changePass');
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_BCRYPT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Changed..</div>');
                    redirect('user/changePass');
                }
            }
        }
    }
}
