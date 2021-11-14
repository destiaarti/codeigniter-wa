<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->check_login();
        if ($this->session->userdata('role') != 'admin') {
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $data            = konfigurasi('User', 'Kelola User');
        $data['users'] = $this->User_model->get_all();
        $this->template->load('layouts/template', 'admin/users/index', $data);
    } 

    public function edit($id)
    {
        $data           = konfigurasi('Edit Password', 'Edit Password');
        $data['users'] = $this->User_model->get_by_id($id);
        $this->template->load('layouts/template', 'admin/users/edit', $data);
    }

    public function update()
    {
        $id      = $this->input->post('id');
        $name    = $this->input->post('name');
        $address = $this->input->post('address');

        $data = [
            'name'    => $name,
            'address' => $address,
        ];
        $this->Person_model->update(['id' => $id], $data);
        redirect('admin/users');
    }
}

/* End of file Person.php */
