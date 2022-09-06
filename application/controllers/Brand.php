<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Brand extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_brand');
      //Load Dependencies

   }

   // List all your items
   public function index($offset = 0)
   {
      $data = array(
         'title'   => 'Brand',
         'brand' => $this->m_brand->get_all_data(),
         'isi'     => 'v_brand',
      );
      $this->load->view('layout/v_wrapper_backend', $data, FALSE);
   }

   public function add()
   {
      $data = array(
         'brand_name' => $this->input->post('brand_name'),
      );
      $this->m_brand->add($data);
      $this->session->set_flashdata('message', 'Brand added successfully');
      redirect('brand');
   }

   //Update one item
   public function edit($id_brand = NULL)
   {
      $data = array(
         'id_brand' => $id_brand,
         'brand_name' => $this->input->post('brand_name')
      );
      $this->m_brand->edit($data);
      $this->session->set_flashdata('message', 'Brand data has been updated!');
      redirect('brand');
   }

   //Delete one item
   public function delete($id_brand = NULL)
   {
      $data = array('id_brand' => $id_brand);
      $this->m_brand->delete($data);
      $this->session->set_flashdata('message', 'User has been deleted!');
      redirect('brand');
   }
}

/* End of file Kategori.php */