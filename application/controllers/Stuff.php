<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Stuff extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_stuff');
      $this->load->model('m_brand');
      $this->load->model('m_category');
   }

   // List all your items
   public function index($offset = 0)
   {
      $data = array(
         'title'   => 'Stuff',
         'stuff' => $this->m_stuff->get_all_data(),
         'isi'     => 'stuff/v_stuff',
      );
      $this->load->view('layout/v_wrapper_backend', $data, FALSE);
   }

   public function add()
   {
      $this->form_validation->set_rules('stuff_name', 'Name of product', 'required', array('required' => '%s of product cannot be blank!'));

      $this->form_validation->set_rules('id_category', 'Category', 'trim|required', array('required' => '%s cannot be blank!'));

      $this->form_validation->set_rules('id_brand', 'Brand', 'trim|required', array('required' => '%s cannot be blank!'));

      $this->form_validation->set_rules('price', 'Price', 'trim|required', array('required' => '%s cannot be blank!'));

      $this->form_validation->set_rules('description', 'Description', 'trim|required', array('required' => '%s cannot be blank!'));

      $this->form_validation->set_rules('weight', 'Weight', 'trim|required', array('required' => '%s cannot be blank!'));

      $this->form_validation->set_rules('stock', 'Stock', 'trim|required', array('required' => '%s cannot be blank!'));


      if ($this->form_validation->run() == TRUE) {
         $config['upload_path'] = './assets/img/stuff/';
         $config['allowed_types'] = 'jpg|png|jpeg|ico';
         $config['max_size']     = '2000';
         $this->upload->initialize($config);
         $field_name = "picture";
         if (!$this->upload->do_upload($field_name)) {
            $data = array(
               'title'   => 'Add Product',
               'category' => $this->m_category->get_all_data(),
               'brand' => $this->m_brand->get_all_data(),
               'error_upload' => $this->upload->display_errors(),
               'isi'     => 'stuff/v_add',
            );
            $this->load->view('layout/v_wrapper_backend', $data, FALSE);
         } else {
            $upload_data   = array('uploads' => $this->upload->data(''));
            $config['image_library']   = 'gd2';
            $config['source_image']    = './assets/img/stuff/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);

            $data = array(
               'stuff_name'   => $this->input->post('stuff_name'),
               'id_category'  => $this->input->post('id_category'),
               'id_brand'  => $this->input->post('id_brand'),
               'price'        => $this->input->post('price'),
               'weight'       => $this->input->post('weight'),
               'stock'       => $this->input->post('stock'),
               'description'  => $this->input->post('description'),
               'picture'      => $upload_data['uploads']['file_name']
            );
            $this->m_stuff->add($data);
            $this->session->set_flashdata('message', 'Product data has been added!');
            redirect('stuff');
         }
      }


      $data = array(
         'title'   => 'Add Product',
         'category' => $this->m_category->get_all_data(),
         'brand' => $this->m_brand->get_all_data(),
         'isi'     => 'stuff/v_add',
      );
      $this->load->view('layout/v_wrapper_backend', $data, FALSE);
   }

   //Update one item
   public function edit($id_stuff = NULL)
   {
      $this->form_validation->set_rules('stuff_name', 'Name of product', 'required', array('required' => '%s of product cannot be blank!'));

      // $this->form_validation->set_rules('id_category', 'Category', 'trim|required', array('required' => '%s cannot be blank!'));

      $this->form_validation->set_rules('price', 'Price', 'trim|required', array('required' => '%s cannot be blank!'));

      $this->form_validation->set_rules('description', 'Description', 'trim|required', array('required' => '%s cannot be blank!'));

      $this->form_validation->set_rules('weight', 'Weight', 'trim|required', array('required' => '%s cannot be blank!'));

      $this->form_validation->set_rules('stock', 'Stock', 'trim|required', array('required' => '%s cannot be blank!'));


      if ($this->form_validation->run() == TRUE) {
         $config['upload_path'] = './assets/img/stuff/';
         $config['allowed_types'] = 'jpg|png|jpeg';
         $config['max_size']     = '2000';
         $this->upload->initialize($config);
         $field_name = "picture";
         if (!$this->upload->do_upload($field_name)) {
            $data = array(
               'title'        => 'Add Product',
               'category'     => $this->m_category->get_all_data(),
               'brand'     => $this->m_brand->get_all_data(),
               'stuff'        => $this->m_stuff->get_data($id_stuff),
               'error_upload' => $this->upload->display_errors(),
               'isi'          => 'stuff/v_edit',
            );
            $this->load->view('layout/v_wrapper_backend', $data, FALSE);
         } else {
            // delete picture from repository
            $stuff = $this->m_stuff->get_data($id_stuff);
            if ($stuff->picture != "") {
               unlink('./assets/img/stuff/' . $stuff->picture);
            }

            $upload_data   = array('uploads' => $this->upload->data());
            $config['image_library']   = 'gd2';
            $config['source_image']    = './assets/img/stuff/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);

            $data = array(
               'id_stuff'     => $id_stuff,
               'stuff_name'   => $this->input->post('stuff_name'),
               'id_category'  => $this->input->post('id_category'),
               'id_brand'     => $this->input->post('id_brand'),
               'price'        => $this->input->post('price'),
               'weight'       => $this->input->post('weight'),
               'stock'       => $this->input->post('stock'),
               'description'  => $this->input->post('description'),
               'picture'      => $upload_data['uploads']['file_name']
            );
            $this->m_stuff->edit($data);
            $this->session->set_flashdata('message', 'Product data has been updated!');
            redirect('stuff');
         }
         // if empty
         $data = array(
            'id_stuff'     => $id_stuff,
            'stuff_name'   => $this->input->post('stuff_name'),
            'id_category'  => $this->input->post('id_category'),
            'id_brand'  => $this->input->post('id_brand'),
            'price'        => $this->input->post('price'),
            'weight'       => $this->input->post('weight'),
            'stock'       => $this->input->post('stock'),
            'description'  => $this->input->post('description'),
            // 'picture'      => $upload_data['uploads']['file_name']
         );
         $this->m_stuff->edit($data);
         $this->session->set_flashdata('message', 'Product data has been updated!');
         redirect('stuff');
      }


      $data = array(
         'title'    => 'Edit Product',
         'category' => $this->m_category->get_all_data(),
         'brand' => $this->m_brand->get_all_data(),
         'stuff'    => $this->m_stuff->get_data($id_stuff),
         'isi'      => 'stuff/v_edit',
      );
      $this->load->view('layout/v_wrapper_backend', $data, FALSE);
   }

   //Delete one item
   public function delete($id_stuff = NULL)
   {
      // delete picture from repository
      $stuff = $this->m_stuff->get_data($id_stuff);
      if ($stuff->picture != "") {
         unlink('./assets/img/stuff/' . $stuff->picture);
      }

      $data = array('id_stuff' => $id_stuff);
      $this->m_stuff->delete($data);
      $this->session->set_flashdata('message', 'Product has been deleted!');
      redirect('stuff');
   }
}

/* End of file Stuff.php */