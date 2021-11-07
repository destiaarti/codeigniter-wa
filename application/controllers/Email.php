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
//     public function send_mail() {
//         $from_email = "dawahyuh@student.ce.undip.ac.id";
//         $to_email = $this->input->post('email');
//         //Load email library
//         $this->load->library('email');

//         // $config = [
//         //     'mailtype'  => 'html',
//         //     'charset'   => 'utf-8',
//         //     'protocol'  => 'smtp',
//         //     'smtp_host' => 'smtp.gmail.com',
//         //     'smtp_user' => 'email@gmail.com',  // Email gmail
//         //     'smtp_pass'   => 'passwordgmail',  // Password gmail
//         //     'smtp_crypto' => 'ssl',
//         //     'smtp_port'   => 465,
//         //     'crlf'    => "\r\n",
//         //     'newline' => "\r\n"
//         // ];

//         // // Load library email dan konfigurasinya
//         // $this->load->library('email', $config);

// $config = array();
// // $config['protocol'] = 'mail';
// // $config['smtp_host'] = 'mail.gmail.com';
// // $config['smtp_port'] = 587; //587
// // $config['smtp_user'] = 'dawahyuh@student.ce.undip.ac.id';
// // $config['smtp_pass'] = 'anjing123';
// // // $config['smtp_port'] = 587;
// // $config['validate']  = TRUE;
// // $config['mailtype']  = 'html';
// // $config['charset']   = 'utf-8';
// // $config['newline']   = "\r\n";
// $config['protocol'] = 'smtp';
// $config['smtp_host'] = 'ssl:/smtp.googlemail.com';
// $config['smtp_port'] = 465; //587
// $config['smtp_user'] = 'dawahyuh@student.ce.undip.ac.id';
// $config['smtp_pass'] = 'anjing123';
// // $config['smtp_port'] = 587;
// $config['validate']  = TRUE;
// $config['mailtype']  = 'html';
// $config['charset']   = 'iso-8859-1';
// $config['newline']   = "\r\n";
// $this->email->initialize($config);
// // $this->email->set_newline("\r\n");
//         $this->email->from($from_email, 'Identification');
//         $this->email->to($to_email);
//         $this->email->subject('Send Email Codeigniter');
//         $this->email->message('The email send using codeigniter library');
//         //Send mail
//         // $this->email->print_debugger();
//         if($this->email->send())
//             $this->session->set_flashdata("email_sent","Congragulation Email Send Successfully.");
//         else
//             $this->session->set_flashdata("email_sent","You have encountered an error");
//         $this->load->view('email');
//     }

public function send($id, $type){
    // $id = $this->uri->segment(1);
    // $type = $this->uri->segment(2);
    // $type = "visa";
//   $type    = $this->input->post('type');
  if ($type == 'visa'){
    $user = $this->Visa_Model->get_by_id($id);
  } else {
    $user = $this->Itk_Model->get_by_id($id);
  }
//   var_dump($user);
  $sendmail = $this->send_mail($user);

//   echo(date('Y-m-d'));
// echo $sendwa;
  $data = [
    'status_notification'    => 1,
    'send_notification'    => date('Y-m-d'),
  ];
//   if ($sendmail == "berhasil") {
//     $this->session->set_flashdata('Tambah', 'Success Send Whatsapp !');
//     if($type == "visa") {
//       $this->Visa_Model->update(['id' => $id], $data);
//       redirect('visa');
//     }
//     else {
//       $this->Visa_Model->update(['id' => $id], $data);
//       redirect('itk');
//     }
//   } else {
//     $this->session->set_flashdata('Error', $sendwa);
//     if($type == "visa") {
//       redirect('visa');
//     }
//   else {
//     redirect('itk');
//    }

}
public function send_mail($user){
    // $from_email = "dawahyuh@student.ce.undip.ac.id";
    // $to_email = $this->input->post('email');

    // //Load email library 
    // $this->load->library('email');

    // $this->email->from($from_email, 'Your Name');
    // $this->email->to($to_email);
    // $this->email->subject('Email Test');
    // $this->email->message('Testing the email class.');

    // //Send mail 
    // if ($this->email->send())
    //     $this->session->set_flashdata("email_sent", "Email sent successfully.");
    // else
    //     $this->session->set_flashdata("email_sent", "Error in sending Email.");
    // $this->load->view('email');
    
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

    // Load library email dan konfigurasinya
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
        $this->session->set_flashdata('Tambah', 'Success Send Email !');
    } else {
        $this->session->set_flashdata('Error', 'Email tidak dapat dikirim !');
    }
    redirect('itk');

}

}


?>