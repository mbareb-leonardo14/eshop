<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
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
         'title'    => 'Home',
         'stuff'    => $this->m_home->get_all_data(),
         'category' => $this->m_home->get_all_data_cat(),
         'brand' => $this->m_home->get_all_data_brand(),
         'isi'      => 'v_home',
      );
      $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
   }

   public function category($id_category)
   {
      $category = $this->m_home->category($id_category);
      $data = array(
         'title'    => $category->category_name,
         'stuff'    => $this->m_home->get_all_data_stuff($id_category),
         // 'category' => $this->m_home->get_all_data_cat(),
         'isi'      => 'v_category_frontend'
      );
      $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
   }

   public function brand($id_brand)
   {
      $brand = $this->m_home->brand($id_brand);
      $data = array(
         'title'    => $brand->brand_name,
         'stuff'    => $this->m_home->get_all_data_stuff_brand($id_brand),
         // 'brand' => $this->m_home->get_all_data_cat(),
         'isi'      => 'v_brand_frontend'
      );
      $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
   }

   public function detail_product($id_stuff)
   {
      $stuff = $this->m_home->detail_product($id_stuff);
      $data = array(
         'title'    => $stuff->stuff_name,
         'stuff'    => $this->m_home->detail_product($id_stuff),
         'pic'     => $this->m_pic->get_pic($id_stuff),
         'isi'      => 'v_detail_product'
      );
      $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
   }
}

/* End of file Home.php */