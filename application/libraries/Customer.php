<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Customer
{
   protected $ci;

   public function __construct()
   {
      $this->ci = &get_instance();
      $this->ci->load->model('m_auth');
   }

   public function login($email, $password)
   {
      $cek = $this->ci->m_auth->login($email, $password);
      if ($cek) {
         $customer_id = $cek->customer_id;
         $customer_name = $cek->customer_name;
         $email = $cek->email;
         $ava = $cek->ava;
         // session
         $this->ci->session->set_userdata('customer_id', $customer_id);
         $this->ci->session->set_userdata('customer_name', $customer_name);
         $this->ci->session->set_userdata('email', $email);
         $this->ci->session->set_userdata('ava', $ava);

         redirect('home');
      } else {
         // kalo salah
         $this->ci->session->set_flashdata('error', 'Wrong Email or Password!');

         redirect('auth');
      }
   }

   public function proteksi_halaman()
   {
      if ($this->ci->session->userdata('customer_name') == '') {
         $this->ci->session->set_flashdata('error', 'You are not logged in');
         redirect('auth');
      }
   }

   public function logout()
   {
      $this->ci->session->unset_userdata('customer_id');
      $this->ci->session->unset_userdata('customer_name');
      $this->ci->session->unset_userdata('email');
      $this->ci->session->unset_userdata('ava');
      $this->ci->session->set_flashdata('message', 'see you soon!');
      redirect('auth');
   }
}

/* End of file User_login.php */