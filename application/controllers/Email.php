<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Email extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Visa_Model');
        $this->load->model('Itk_Model');
        $this->check_login();
        $this->load->library('session');
        $this->load->library('form_validation');
    }
    public function index() {
        $this->load->view('email');
    }

    public function send($id, $type){
      if ($type == 'visa'){
        $user = $this->Visa_Model->get_by_id($id);
      } else {
        $user = $this->Itk_Model->get_by_id($id);
      }
      $sendmail = $this->send_mail($user, $type);
    }
     
    public function send_mail($user, $type){    
    $config = [
        'mailtype'  => 'html',
        'charset'   => 'utf-8',
        'protocol'  => 'smtp',
        'smtp_host' => 'smtp.gmail.com',
        'smtp_user' => 'dawahyuh@student.ce.undip.ac.id',  // Email gmail
        'smtp_pass'   => 'anjing123',  // Password gmail
        'smtp_crypto' => 'ssl',
        'smtp_port'   => 465,
        'crlf'    => "\r\n",
        'newline' => "\r\n"
    ];

    $this->load->library('email', $config);

    // Email dan nama pengirim
    $this->email->from('no-reply@undip.com', 'Tes Kirim');

    // Email penerima
    $this->email->to($user->email); // Ganti dengan email tujuan

    // Lampiran email, isi dengan url/path file
    $this->email->attach('https://images.pexels.com/photos/169573/pexels-photo-169573.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');

    // Subject email
    $this->email->subject('Kirim Email dengan SMTP Gmail CodeIgniter | Tes');

    // Isi email
    $this->email->message("Ini adalah contoh email yang dikirim menggunakan SMTP Gmail pada CodeIgniter.<br><br> Klik <strong><a href='https://masrud.com/kirim-email-smtp-gmail-codeigniter/' target='_blank' rel='noopener'>disini</a></strong> untuk melihat.");

    // Tampilkan pesan sukses atau error
    if ($this->email->send()) {
       // echo $sendwa;
       $data = [
        'status_notification'    => 1,
        'send_notification'    => date('Y-m-d'),
      ];
      $this->session->set_flashdata('Tambah', 'Success Send Email !');
        if($type == "visa") {
          $this->Visa_Model->update(['id' => $id], $data);
          redirect('visa'); 
        } else {
          $this->Itk_Model->update(['id' => $id], $data);
          redirect('itk'); 
        }
    } else {
        $this->session->set_flashdata('Error', 'Email tidak dapat dikirim !');
        if($type == "visa") {
          redirect('visa'); 
        } else {
          redirect('itk'); 
        }
    }
  }
}
?>
