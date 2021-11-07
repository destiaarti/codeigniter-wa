<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Whatsapp extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Visa_Model');
        $this->load->model('Itk_Model');
        $this->check_login();
        $this->load->library('form_validation');
    }

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
      $sendwa = $this->sendWa($user);
    //   echo(date('Y-m-d'));
    // echo $sendwa;
      $data = [
        'status_notification'    => 1,
        'send_notification'    => date('Y-m-d'),
      ];
      if ($sendwa == "berhasil") {
        $this->session->set_flashdata('Tambah', 'Success Send Whatsapp !');
        if($type == "visa") {
          $this->Visa_Model->update(['id' => $id], $data);
          redirect('visa');
        }
        else {
          $this->Visa_Model->update(['id' => $id], $data);
          redirect('itk');
        }
      } else {
        $this->session->set_flashdata('Error', $sendwa);
        if($type == "visa") {
          redirect('visa');
        }
      else {
        redirect('itk');
       }
    }


   }
   private function sendWa($user) {
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'http://localhost:8000/send-message',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array('number' => $user->no_hp,'message' => 'lorem ipsum visa number: '.$user->visa_number.' awaoa'),
  ));
  
  $response = curl_exec($curl);
  $a = json_decode($response);
//   echo $a->status;
  if (isset($a->status)) {
      if($a->status == 1){
        $status = "berhasil";
      } else {
        $status = $a->message;
      }
  }else{
      $status = "network error !";
  }


//   print_r($response->getStatus());
//  $a = json_decode($response);
// echo $response->statusCode;
  
  curl_close($curl);
  return $status;
   }
}
?>