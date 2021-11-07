<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Captcha extends MY_Controller
{
    public function __construct()  {
        parent:: __construct();
        $this->output->enable_profiler(TRUE);
  $this->load->helper("url");
  $this->load->helper('form');
  $this->load->helper('captcha');
  $this->load->library('form_validation');
    }
//   public function index() {
//  //validating form fields
//     $this->form_validation->set_rules('username', 'Email Address', 'required');
//     $this->form_validation->set_rules('user_password', 'Password', 'required');
//     $this->form_validation->set_rules('userCaptcha', 'Captcha', 'required|callback_check_captcha');
//     $userCaptcha = $this->input->post('userCaptcha');
  
//   if ($this->form_validation->run() == false){
//       // numeric random number for captcha
//       $random_number = substr(number_format(time() * rand(),0,'',''),0,6);
//       // setting up captcha config
//       $vals = array(
//              'word' => $random_number,
//              'img_path' => './captcha/',
//              'img_url' => base_url().'captcha/',
//              'img_width' => 140,
//              'img_height' => 32,
//              'expiration' => 7200
//             );
//       $data['captcha'] = create_captcha($vals);
//       $this->session->set_userdata('captchaWord',$data['captcha']['word']);
//       $this->load->view('captcha', $data);
//     }else {
//       // do your stuff here.
//       echo 'I m here clered all validations';
//     }
//  }
   
//   public function check_captcha($str){
//     $word = $this->session->userdata('captchaWord');
//     if(strcmp(strtoupper($str),strtoupper($word)) == 0){
//       return true;
//     }
//     else{
//       $this->form_validation->set_message('check_captcha', 'Please enter correct words!');
//       return false;
//     }
//  }
public function index()
	{
		$this->load->helper('captcha');
		$vals = array(
        //'word'          => 'Randdfdom word',
        'img_path'      => './captcha-images/',
        'img_url'       => base_url().'captcha-images/',
        // 'font_path'     => './path/to/fonts/texb.ttf',
        'img_width'     => '150',
        'img_height'    => 30,
        'expiration'    => 7200,
        'word_length'   => 8,
        'font_size'     => 16,
        'img_id'        => 'Imageid',
        'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

        // White background and border, black text and red grid
        'colors'        => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40)
		        )
		);

		$cap = create_captcha($vals);
    // print_r($cap);exit;
		$image= $cap['image'];
		$captchaword= $cap['word'];
		$this->session->set_userdata('captchaword',$captchaword);
		$this->load->view('captcha',['captcha_image'=>$image]);
	}
	public function registerSubmit()
	{
		$captcha=$this->input->post('captcha');
		$captcha_answer=$this->session->userdata('captchaword');

		///check both captcha
		if($captcha==$captcha_answer)
		{
			$this->session->set_flashdata('error','<div class="alert alert-success">Captcha is matched.</div>');
			redirect('home');
		}
		else{
			$this->session->set_flashdata('error','<div class="alert alert-danger">Captcha does not match.</div>');
			redirect('home');
		}
	}
}
