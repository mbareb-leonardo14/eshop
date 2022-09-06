<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_auth');
   }


   public function account()
   {
      $data = array(
         'title'   => 'Customer',
         'isi'      => 'auth/v_register',
      );
      $this->load->view('auth/v_auth', $data, FALSE);
      // $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
   }
}