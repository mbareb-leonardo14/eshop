<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_home');
      $this->load->model('m_pic');
   }


   public function index()
   {
      $data = array(
         'title'    => 'Products',
         'stuff'    => $this->m_home->get_all_data(),
         'category' => $this->m_home->get_all_data_cat(),
         'brand' => $this->m_home->get_all_data_brand(),
         'isi'      => 'v_product',
      );
      $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
   }
}

/* End of file Home.php */