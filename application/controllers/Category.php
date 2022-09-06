<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_category');
      //Load Dependencies

   }

   // List all your items
   public function index($offset = 0)
   {
      $data = array(
         'title'   => 'Categories',
         'category' => $this->m_category->get_all_data(),
         'isi'     => 'v_categories',
      );
      $this->load->view('layout/v_wrapper_backend', $data, FALSE);
   }

   public function add()
   {
      $data = array(
         'category_name' => $this->input->post('category_name'),
      );
      $this->m_category->add($data);
      $this->session->set_flashdata('message', 'Category added successfully');
      redirect('category');
   }

   //Update one item
   public function edit($id_category = NULL)
   {
      $data = array(
         'id_category' => $id_category,
         'category_name' => $this->input->post('category_name')
      );
      $this->m_category->edit($data);
      $this->session->set_flashdata('message', 'Category data has been updated!');
      redirect('category');
   }

   //Delete one item
   public function delete($id_category = NULL)
   {
      $data = array('id_category' => $id_category);
      $this->m_category->delete($data);
      $this->session->set_flashdata('message', 'User has been deleted!');
      redirect('category');
   }
}

/* End of file Kategori.php */
