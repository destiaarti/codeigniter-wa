<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Visa extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Visa_Model');
        $this->check_login();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data            = konfigurasi('visa', 'Kelola Visa');
        $data['visa'] = $this->Visa_Model->get_all();
        $data['hari'] = 'SEMUA';
        $this->template->load('layouts/template', 'visa/index', $data);
    }

    public function add()
    {
        $data = konfigurasi('Tambah visa', 'Tambah visa');
        $this->template->load('layouts/template', 'visa/create', $data);
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
        $visa_type    = $this->input->post('visa_type');
        // $visa_file    = $this->input->post('visa_file');
   
        $cap_image = $this->_uploadCap();
        $visa_image = $this->_uploadvisa();

        $visa_number = $this->input->post('visa_number');

        $data = [
            'first_name'    => $first_name,
            'last_name'    => $last_name,
            'email'    => $email,
            'date_expired'    => $date_expired,
            'date_start'    => $date_start,
            'visa_file'    => $visa_image,
            'cap_file'    => $cap_image,
            'visa_number' => $visa_number,
            'visa_type' => $visa_type,
        ];
            $this->Visa_Model->insert($data);
            $this->session->set_flashdata('Tambah', 'Success Saved !');
            redirect('visa');
        } else {
            $this->session->set_flashdata('msg', show_err_msg(validation_errors()));
            redirect('auth/profile');
        }
    }

    public function edit($id)
    {
        $data           = konfigurasi('Edit Visa', 'Edit Visa');
        $data['visa'] = $this->Visa_Model->get_by_id($id);
        $this->template->load('layouts/template', 'visa/update', $data);
    }

    public function update()
    {
        $id      = $this->input->post('id');
        $first_name    = $this->input->post('first_name');
        $last_name    = $this->input->post('last_name');
        $email    = $this->input->post('email');
        $date_start    = $this->input->post('date_start');
        $date_expired    = $this->input->post('date_expired');
        $visa_number    = $this->input->post('visa_number');
        $visa_type    = $this->input->post('visa_type');
        $visa = $this->Visa_Model->get_by_id($id);
        $this->delete_img($url,$file);
        if (!empty($_FILES["visa_file"]["name"])) {
            $url = './assets/uploads/visa/';
            $file = $visa->visa_file;
            $this->delete_img($url, $file);
            $visa_file = $this->_uploadvisa();
        } else {
            $visa_file = $this->input->post("old_image_visa");
        }
        if (!empty($_FILES["cap_file"]["name"])) {
            $url = './assets/uploads/cap/';
            $file = $visa->cap_file;
            $this->delete_img($url, $file);
            $cap_file = $this->_uploadCap();
        } else {
            $cap_file = $this->input->post("old_image_cap");
        }
        $data = [
            'first_name'    => $first_name,
            'last_name'    => $last_name,
            'email'    => $email,
            'date_expired'    => $date_expired,
            'date_start'    => $date_start,
            'visa_file'    => $visa_file,
            'cap_file'    => $cap_file,
            'visa_number' => $visa_number,
            'visa_type' => $visa_type,
        ];
        $this->Visa_Model->update(['id' => $id], $data);
        $this->session->set_flashdata('Edit', 'Success Edit !');
        redirect('visa');
    }

    public function detail($id)
    {
        $data           = konfigurasi('Detail Visa', 'Detail Visa');
        $data['visa'] = $this->Visa_Model->get_by_id($id);
        if (!$data['visa']) show_404();
        $this->template->load('layouts/template', 'visa/detail', $data);
    }

    public function delete($id)
    {
        $visa = $this->Visa_Model->get_by_id($id);
        $url = './assets/uploads/cap/';
        $file = $visa->cap_file;
        $this->delete_img($url,$file);
        $url1 = './assets/uploads/visa/';
        $file1 = $itk->visa_file;
        $this->delete_img($url1, $file1);

        $this->Visa_Model->delete($id);
        $this->session->set_flashdata('Hapus', 'Success Deleted !');
    }

    private function delete_img($url, $file){
        unlink($url.$file);
    }

    private function _uploadvisa()
{
    $config_visa['upload_path']          = './assets/uploads/visa';
    $config_visa['allowed_types']        = 'gif|jpg|png|jpeg|pdf';
    $config_visa['overwrite']			= false;
    $config_visa['max_size']             = 5120; // 5MB

    $this->load->library('upload', $config_visa);
    $this->upload->initialize($config_visa); 

    if ($this->upload->do_upload('visa_file')) {
        $gbr = $this->upload->data();
        $visa_file=$gbr['file_name'];
        return $visa_file;
    }
    
    // return "default.jpg";
    print_r($this->upload->display_errors());
}

private function _uploadCap()
{
    $config_cap['upload_path']          = './assets/uploads/cap';
    $config_cap['allowed_types']        = 'gif|jpg|png|jpeg|pdf';
    $config_cap['overwrite']			= false;
    $config_cap['max_size']             = 5120; // 5MB

    $this->load->library('upload', $config_cap);
    $this->upload->initialize($config_cap); 

    if ($this->upload->do_upload('cap_file')) {
        $gbr = $this->upload->data();
        $cap_file=$gbr['file_name'];
        return $cap_file;
    }
    
    print_r($this->upload->display_errors());
}
}

/* End of file Person.php */
