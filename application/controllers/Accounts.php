<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Accounts extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      // $this->load->model('m_address');
      $this->load->model('m_transaction');
      // $this->load->model('m_auth');
   }

   public function profile()
   // protection page
   {
      $this->customer->proteksi_halaman();
      $data = array(
         'title'    => 'Profile',
         'isi'      => 'v_profile'
      );
      $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
   }

   public function address()

   {
      $this->customer->proteksi_halaman();

      $this->form_validation->set_rules('name_receiver', 'Name', 'required', array(
         'required' => '%s cannot be blank'
      ));
      $this->form_validation->set_rules('phone_number', 'Phone Number', 'required', array(
         'required' => '%s cannot be blank'
      ));
      $this->form_validation->set_rules('province', 'Province', 'required', array(
         'required' => '%s cannot be blank'
      ));
      $this->form_validation->set_rules('city', 'City', 'required', array(
         'required' => '%s cannot be blank'
      ));
      $this->form_validation->set_rules('zip', 'Zip', 'required', array(
         'required' => '%s cannot be blank'
      ));
      $this->form_validation->set_rules('address', 'Address', 'required', array(
         'required' => '%s cannot be blank'
      ));
      $this->form_validation->set_rules('phone_number', 'Phone Number', 'required', array(
         'required' => '%s cannot be blank'
      ));


      if ($this->form_validation->run() == FALSE) {
         $data = array(
            'title'    => 'Address',
            // 'address' => $this->m_address->data_address(),
            'isi'      => 'v_address'
         );
         $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
      } else {
         $data = array(
            'customer_id' => $this->session->userdata('customer_id'),
            'customer_name' => $this->session->userdata('customer_name'),
            'email' => $this->session->userdata('email'),
            'no_order' => $this->input->post('no_order'),
            'date_order' => date('Y-m-d'),
            'name_receiver' => $this->input->post('name_receiver'),
            'phone_number' => $this->input->post('phone_number'),
            'province' => $this->input->post('province'),
            'city' => $this->input->post('city'),
            'address' => $this->input->post('address'),
            'zip' => $this->input->post('zip'),
            'courier' => $this->input->post('courier'),
            'packet' => $this->input->post('packet'),
            'estimation' => $this->input->post('estimation'),
            'shipping_cost' => $this->input->post('shipping_cost'),
            'weight' => $this->input->post('weight'),
            'subtotal' => $this->input->post('subtotal'),
            'total_amount' => $this->input->post('total_amount'),
            'status' => '0',
            'status_order' => '0'
         );
         $this->m_transaction->save_transaction($data);

         // save detail transaction
         $i = 1;
         foreach ($this->cart->contents() as $item) {
            $detail_data = array(
               'no_order' => $this->input->post('no_order'),
               'id_stuff' => $item['id'],
               'qty'     => $this->input->post('qty' . $i++)
            );
            $this->m_transaction->save_detail_transaction($detail_data);
         }

         $this->session->set_flashdata('message', 'order processed');
         $this->cart->destroy();
         redirect('myorder');
      }
   }
}