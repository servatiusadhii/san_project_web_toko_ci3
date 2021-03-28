<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Menu_model', 'menu');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Menu Controller';

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Menu Added!</div>');
            redirect('menu');
        }
    }

    public function editMenu($id)
    {
        $this->db->update('user_menu', ['menu' => $this->input->post('menuNew')], ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">The menu has ben edited!</div>');
        redirect('menu');
    }

    public function deleteMenu($id)
    {
        $this->db->delete('user_menu', ['id' => $id]);
        $this->db->delete('user_sub_menu', ['menu_id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">The menu has ben deleted!</div>');
        redirect('menu');
    }

    public function submenu()
    {

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['title'] = 'Submenu Controller';
        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Submenu Added!</div>');
            redirect('menu/submenu');
        }
    }

    public function editSubMenu($id)
    {
        $this->menu->saveSubMenu($id);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">This submenu has been updated!</div>');
        redirect('menu/submenu');
    }

    public function deleteSubMenu($id)
    {
        $this->menu->deleteSubMenu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This submenu has been deleted!</div>');
        redirect('menu/submenu');
    }
}
