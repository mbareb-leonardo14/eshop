<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_admin');
      $this->load->model('m_auth');
   }

   public function login_user()
   {
      $this->form_validation->set_rules('username', 'Username', 'required', array(
         'required'   => '%s cannot be blank!'
      ));
      $this->form_validation->set_rules('password', 'Password', 'required', array(
         'required'   => '%s cannot be blank!'
      ));

      if ($this->form_validation->run() == true) {
         $username = $this->input->post('username');
         $password = $this->input->post('password');
         $this->user_login->login($username, $password);
      }
      $data = array(
         'title'   => 'Login User'
      );
      $this->load->view('v_login_user', $data, FALSE);
   }

   public function register()
   {
      $this->form_validation->set_rules('customer_name', 'Name', 'required', array(
         'required' => '%s cannot be blank'
      ));
      $this->form_validation->set_rules('email', 'Email', 'required|is_unique[tbl_customer.email]|valid_emails', array(
         'required' => '%s cannot be blank',
         'is_unique' => '%s email already exists'
      ));
      $this->form_validation->set_rules('password', 'Password', 'required|matches[retype_password]', array(
         'required' => '%s cannot be blank',
         'matches' => '%s password are not the same'
      ));
      $this->form_validation->set_rules('retype_password', 'Retype Password', 'required|matches[password]', array(
         'required' => '%s cannot be blank',
         'matches' => '%s passwords are not the same'
      ));


      if ($this->form_validation->run() == FALSE) {
         $data = array(
            'title'   => 'Register',
            'isi'      => 'auth/v_register',
         );
         $this->load->view('auth/v_auth', $data, FALSE);
      } else {
         $data = array(
            'customer_name' => $this->input->post('customer_name'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'ava' => 'default.jpg',
         );
         $this->m_auth->register($data);
         $this->session->set_flashdata('message', 'successful registration!');
         redirect('auth/register');
      }
   }
   public function index()
   {

      $this->form_validation->set_rules('email', 'Email', 'required', array(
         'required'   => '%s cannot be blank!'
      ));
      $this->form_validation->set_rules('password', 'Password', 'required', array(
         'required'   => '%s cannot be blank!'
      ));


      if ($this->form_validation->run() == TRUE) {
         $email = $this->input->post('email');
         $password = $this->input->post('password');
         $this->customer->login($email, $password);
      }
      $data = array(
         'title'   => 'Login',
         'isi'      => 'auth/v_login',
      );
      $this->load->view('auth/v_auth', $data, FALSE);
   }

   public function logout()
   {
      $this->customer->logout();
   }

   public function logout_user()
   {
      $this->user_login->logout();
   }
}

/* End of file Auth.php */