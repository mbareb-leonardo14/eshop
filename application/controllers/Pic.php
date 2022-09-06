<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pic extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      //Load Dependencies
      $this->load->model('m_pic');
      $this->load->model('m_stuff');
   }

   // List all your items
   public function index($offset = 0)
   {
      $data = array(
         'title'   => 'Stuff Pictures',
         'pic' => $this->m_pic->get_all_data(),
         'isi'     => 'pic/v_pic',
      );
      $this->load->view('layout/v_wrapper_backend', $data, FALSE);
   }

   // Add a new item
   public function add($id_stuff)
   {
      $this->form_validation->set_rules('desc', 'Name of image', 'required', array('required' => '%s cannot be blank!'));

      if ($this->form_validation->run() == TRUE) {
         $config['upload_path'] = './assets/img/stuff/pic/';
         $config['allowed_types'] = 'jpg|png|jpeg|ico';
         $config['max_size']     = '2000';
         $this->upload->initialize($config);
         $field_name = "picture";
         if (!$this->upload->do_upload($field_name)) {
            $data = array(
               'title'   => 'Add Pictures',
               'error_upload' => $this->upload->display_errors(),
               'stuff' => $this->m_stuff->get_data($id_stuff),
               'pic'     => $this->m_pic->get_pic($id_stuff),
               'isi'     => 'pic/v_add',
            );
            $this->load->view('layout/v_wrapper_backend', $data, FALSE);
         } else {
            $upload_data   = array('uploads' => $this->upload->data(''));
            $config['image_library']   = 'gd2';
            $config['source_image']    = './assets/img/stuff/pic/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);

            $data = array(
               'id_stuff'   => $id_stuff,
               'desc'  => $this->input->post('desc'),
               'picture'      => $upload_data['uploads']['file_name']
            );
            $this->m_pic->add($data);
            $this->session->set_flashdata('message', 'Picture Upload Success!');
            redirect('pic/add/' . $id_stuff);
         }
      }


      $data = array(
         'title'   => 'Add Product',
         'stuff' => $this->m_stuff->get_data($id_stuff),
         'pic'     => $this->m_pic->get_pic($id_stuff),
         'isi'     => 'pic/v_add',
      );
      $this->load->view('layout/v_wrapper_backend', $data, FALSE);
   }

   //Update one item
   public function edit($id_stuff = NULL)
   {
      $this->form_validation->set_rules('stuff_name', 'Name of product', 'required', array('required' => '%s Name of product cannot be blank!'));



      if ($this->form_validation->run() == TRUE) {
         $config['upload_path'] = './assets/img/stuff/';
         $config['allowed_types'] = 'jpg|png|jpeg';
         $config['max_size']     = '2000';
         $this->upload->initialize($config);
         $field_name = "picture";
         if (!$this->upload->do_upload($field_name)) {
            $data = array(
               'title'        => 'Add Product',
               'stuff'        => $this->m_stuff->get_data($id_stuff),
               'error_upload' => $this->upload->display_errors(),
               'stuff'   => $this->m_stuff->get_data($id_stuff),
               'pic'     => $this->m_pic->get_pic($id_stuff),
               'isi'     => 'pic/v_add',
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
               'desc'  => $this->input->post('desc'),
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
            'desc'  => $this->input->post('desc'),
            // 'picture'      => $upload_data['uploads']['file_name']
         );
         $this->m_stuff->edit($data);
         $this->session->set_flashdata('message', 'Product data has been updated!');
         redirect('stuff');
      }

      $data = array(
         'title'   => 'Add Pictures',
         'stuff'   => $this->m_stuff->get_data($id_stuff),
         'pic'     => $this->m_pic->get_pic($id_stuff),
         'isi'     => 'pic/v_add',
      );
      $this->load->view('layout/v_wrapper_backend', $data, FALSE);
   }

   //Update one item
   public function update($id = NULL)
   {
   }

   //Delete one item
   public function delete($id_stuff, $id_picture = NULL)
   {
      // delete picture from repository
      $picture = $this->m_pic->get_data($id_picture);
      if ($picture->picture != "") {
         unlink('./assets/img/stuff/pic/' . $picture->picture);
      }

      $data = array('id_picture' => $id_picture);
      $this->m_pic->delete($data);
      $this->session->set_flashdata('message', 'Pictures has been deleted!');
      redirect('pic/add/' . $id_stuff);
   }
}

/* End of file Stuffpicture.php */