<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Itk extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Itk_Model');
        $this->check_login();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data            = konfigurasi('Itk', 'Kelola Itk');
        $data['itk'] = $this->Itk_Model->get_all();
        $data['hari'] = 'SEMUA';
        $this->template->load('layouts/template', 'itk/index', $data);
    }

    public function itk_30()
    {
        $data            = konfigurasi('Itk', 'Kelola Itk');
        $data['itk'] = $this->Itk_Model->get_30();
        $data['hari'] = 30;
        $this->template->load('layouts/template', 'itk/index', $data);
    }

    public function itk_60()
    {
        $data            = konfigurasi('Itk', 'Kelola Itk');
        $data['itk'] = $this->Itk_Model->get_60();
        $data['hari'] = 60;
        $this->template->load('layouts/template', 'itk/index', $data);
    }

    public function add()
    {
        $data = konfigurasi('Tambah itk', 'Tambah itk');
        $this->template->load('layouts/template', 'itk/create', $data);
    }

    public function create()
    {
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('date_start', 'Start Date', 'required');
        $this->form_validation->set_rules('date_expired', 'Expired Date', 'required');

        if ($this->form_validation->run() == true) {
        $first_name    = $this->input->post('first_name');
        $last_name    = $this->input->post('last_name');
        $email    = $this->input->post('email');
        $date_start    = $this->input->post('date_start');
        $date_expired    = $this->input->post('date_expired');
        // $itk_file    = $this->input->post('itk_file');
   
        $passport_image = $this->_uploadPassport();
        $itk_image = $this->_uploadITK();

        $no_passport = $this->input->post('no_passport');

        $data = [
            'first_name'    => $first_name,
            'last_name'    => $last_name,
            'email'    => $email,
            'date_expired'    => $date_expired,
            'date_start'    => $date_start,
            'itk_file'    => $itk_image,
            'passport_file'    => $passport_image,
            'no_passport' => $no_passport,
        ];
            $this->Itk_Model->insert($data);
            $this->session->set_flashdata('Tambah', 'Success Saved !');
            redirect('itk');
        } else {
            $this->session->set_flashdata('msg', show_err_msg(validation_errors()));
            redirect('auth/profile');
        }
    }

    public function edit($id)
    {
        $data           = konfigurasi('Edit ITK', 'Edit ITK');
        $data['itk'] = $this->Itk_Model->get_by_id($id);
        $this->template->load('layouts/template', 'itk/update', $data);
    }

    public function update()
    {
        $id      = $this->input->post('id');
        $first_name    = $this->input->post('first_name');
        $last_name    = $this->input->post('last_name');
        $email    = $this->input->post('email');
        $date_start    = $this->input->post('date_start');
        $date_expired    = $this->input->post('date_expired');
        $no_passport    = $this->input->post('no_passport');
        $itk = $this->Itk_Model->get_by_id($id);
        if (!empty($_FILES["itk_file"]["name"])) {
            $url = './assets/uploads/itk/';
            $itk_file = $itk->itk_file;
            $this->delete_img($url,$itk_file);
            $itk_file = $this->_uploadITK();
        } else {
            $itk_file = $this->input->post("old_image_itk");
        }
        if (!empty($_FILES["passport_file"]["name"])) {
            $url = './assets/uploads/passport/';
            $passport_file = $itk->passport_file;
            $this->delete_img($url,$passport_file);
            $passport_file = $this->_uploadPassport();
        } else {
            $passport_file = $this->input->post("old_image_passport");
        }
        $data = [
            'first_name'    => $first_name,
            'last_name'    => $last_name,
            'email'    => $email,
            'date_expired'    => $date_expired,
            'date_start'    => $date_start,
            'itk_file'    => $itk_file,
            'passport_file'    => $passport_file,
            'no_passport' => $no_passport,
        ];
        $this->Itk_Model->update(['id' => $id], $data);
        $this->session->set_flashdata('Edit', 'Success Edit !');
        redirect('itk');
    }

    public function detail($id)
    {
        $data           = konfigurasi('Detail ITK', 'Detail ITK');
        $data['itk'] = $this->Itk_Model->get_by_id($id);
        if (!$data['itk']) show_404();
        $this->template->load('layouts/template', 'itk/detail', $data);
    }

    public function delete($id)
    {
        $itk = $this->Itk_Model->get_by_id($id);
        $url = './assets/uploads/itk/';
        $itk_file = $itk->itk_file;
        $this->delete_img($url,$itk_file);
        $url1 = './assets/uploads/passport/';
        $itk_file1 = $itk->passport_file;
        $this->delete_img($url1, $itk_file1);

        $this->Itk_Model->delete($id);
        $this->session->set_flashdata('Hapus', 'Success Deleted !');
    }

    private function delete_img($url, $file){
        unlink($url.$file);
    }

    private function _uploadITK()
{
    $config_itk['upload_path']          = './assets/uploads/itk';
    $config_itk['allowed_types']        = 'gif|jpg|png|jpeg|pdf';
    $config_itk['overwrite']			= false;
    $config_itk['max_size']             = 5120; // 5MB

    $this->load->library('upload', $config_itk);
    $this->upload->initialize($config_itk); 

    if ($this->upload->do_upload('itk_file')) {
        $gbr = $this->upload->data();
        $itk_file=$gbr['file_name'];
        return $itk_file;
    }
    
    // return "default.jpg";
    print_r($this->upload->display_errors());
}

private function _uploadPassport()
{
    $config_passport['upload_path']          = './assets/uploads/passport';
    $config_passport['allowed_types']        = 'gif|jpg|png|jpeg|pdf';
    $config_passport['overwrite']			= false;
    $config_passport['max_size']             = 5120; // 5MB

    $this->load->library('upload', $config_passport);
    $this->upload->initialize($config_passport); 

    if ($this->upload->do_upload('passport_file')) {
        $gbr = $this->upload->data();
        $passport_file=$gbr['file_name'];
        return $passport_file;
    }
    
    print_r($this->upload->display_errors());
}
}

/* End of file Person.php */
