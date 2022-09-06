<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Myorder extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_transaction');
      $this->load->model('m_orders');
   }

   public function index()
   {
      // $this->customer->proteksi_halaman();
      $data = array(
         'title'    => 'My Order',
         'unpaid'    => $this->m_transaction->unpaid(),
         'paid'    => $this->m_transaction->paid(),
         'otw'    => $this->m_transaction->otw(),
         'complete'    => $this->m_transaction->complete(),
         'isi'      => 'v_myorder'
      );
      $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
   }

   public function payment($id_transaction)
   {
      $this->form_validation->set_rules('name_of', 'Name of', 'trim|required', array('required' => '%s cannot be blank!'));


      if ($this->form_validation->run() == TRUE) {
         $config['upload_path']   = './assets/img/slip_payment/';
         $config['allowed_types'] = 'jpg|png|jpeg|ico';
         $config['max_size']      = '2000';
         $this->upload->initialize($config);
         $field_name = "slip_payment";
         if (!$this->upload->do_upload($field_name)) {
            $data = array(
               'title'        => 'Payment',
               'order'        => $this->m_transaction->detail_order($id_transaction),
               'account'      => $this->m_transaction->account_number(),
               'error_upload' => $this->upload->display_errors(),
               'isi'          => 'v_payment'
            );
            $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
         } else {
            $upload_data   = array('uploads' => $this->upload->data(''));
            $config['image_library']   = 'gd2';
            $config['source_image']    = './assets/img/slip_payment/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);

            $data = array(
               'id_transaction'   => $id_transaction,
               'name_of'          => $this->input->post('name_of'),
               'bank_name'        => $this->input->post('bank_name'),
               'account_number'   => $this->input->post('account_number'),
               'status'           => '1',
               'slip_payment'     => $upload_data['uploads']['file_name']
            );
            $this->m_transaction->upload_slip_payment($data);
            $this->session->set_flashdata('message', 'Successfully uploaded proof of payment!');
            redirect('myorder');
         }
      }
      $data = array(
         'title'    => 'Payment',
         'order'    => $this->m_transaction->detail_order($id_transaction),
         'account'  => $this->m_transaction->account_number(),
         'isi'      => 'v_payment'
      );
      $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
      $this->session->set_flashdata('message', 'order processed');
   }

   public function complete($id_transaction)
   {
      $data = array(
         'id_transaction' => $id_transaction,
         'status_order' => '3',
         'status' => '3',
      );
      $this->m_orders->update_order($data);
      $this->session->set_flashdata('message', 'Order has been received');
      redirect('myorder');
   }
}