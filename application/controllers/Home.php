<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        $this->load->model('Visa_model');
        $this->load->model('Itk_model');
    }

    public function index()
    {
        $data = konfigurasi('Dashboard');
        $data['visa'] = $this->Visa_model->get_last();
        $data['visa_count_all'] = $this->Visa_model->get_count_all();
        $data['visa_count_type_kedatangan'] = $this->Visa_model->get_count_type('kedatangan');
        $data['visa_count_type_perpanjang'] = $this->Visa_model->get_count_type('perpanjangan');
        $data['visa_count_status'] = $this->Visa_model->get_count_status();

        $data['itk'] = $this->Itk_model->get_last();
        $data['itk_count_all'] = $this->Itk_model->get_count_all();
        $data['itk_count_status'] = $this->Itk_model->get_count_status();
        $data['itk_count_30'] = $this->Itk_model->get_count_30();
        $data['itk_count_60'] = $this->Itk_model->get_count_60();
        $this->template->load('layouts/template', 'dashboard', $data);
    }
}
