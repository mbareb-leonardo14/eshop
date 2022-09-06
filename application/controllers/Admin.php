<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_admin');
      $this->load->model('m_orders');
   }


   public function index()
   {
      $data = array(
         'title'   => 'Dashboard',
         'total_stuff' => $this->m_admin->total_stuff(),
         'total_user' => $this->m_admin->total_user(),
         'total_category' => $this->m_admin->total_category(),
         'isi'      => 'v_admin',
      );
      $this->load->view('layout/v_wrapper_backend', $data, FALSE);
   }


   public function setting()
   {
      $this->form_validation->set_rules('store_name', 'Store Name', 'required', array(
         'required' => '%s cannot be blank'
      ));
      $this->form_validation->set_rules('city', 'City', 'required', array(
         'required' => '%s cannot be blank'
      ));
      $this->form_validation->set_rules('store_address', 'Store Address', 'required', array(
         'required' => '%s cannot be blank'
      ));
      $this->form_validation->set_rules('phone_number', 'Phone Number', 'required', array(
         'required' => '%s cannot be blank'
      ));


      if ($this->form_validation->run() == FALSE) {
         $data = array(
            'title'   => 'Setting',
            'setting' => $this->m_admin->data_setting(),
            'bank' => $this->m_admin->bank_account(),
            'isi'      => 'v_setting'
         );
         $this->load->view('layout/v_wrapper_backend', $data, FALSE);
      } else {
         $data = array(
            'id' => 1,
            'location' => $this->input->post('province'),
            'store_name' => $this->input->post('store_name'),
            'store_address' => $this->input->post('store_address'),
            'phone_number' => $this->input->post('phone_number'),
         );
         $this->m_admin->edit($data);
         $this->session->set_flashdata('message', 'settings have been changed');
         redirect('admin/setting');
      }
   }

   public function orders()
   {
      $data = array(
         'title'   => 'Incoming Order',
         'orders' => $this->m_orders->orders(),
         'packed' => $this->m_orders->packed(),
         'otw' => $this->m_orders->otw(),
         'complete' => $this->m_orders->complete(),
         'isi'      => 'v_incoming_order',
      );
      $this->load->view('layout/v_wrapper_backend', $data, FALSE);
   }

   public function process($id_transaction)
   {
      $data = array(
         'id_transaction' => $id_transaction,
         'status_order' => '1',
      );
      $this->m_orders->update_order($data);
      $this->session->set_flashdata('message', 'Order has been processed');
      redirect('admin/orders');
   }

   public function otw($id_transaction)
   {
      $data = array(
         'id_transaction' => $id_transaction,
         'airwaybill' => $this->input->post('airwaybill'),
         'status_order' => '2',
         'status' => '2',
      );
      $this->m_orders->update_order($data);
      $this->session->set_flashdata('message', 'Order on the way');
      redirect('admin/orders');
   }
}

/* End of file Admin.php */