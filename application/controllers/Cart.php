<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_home');
      $this->load->model('m_pic');
      $this->load->model('m_address');
      $this->load->model('m_cart');
      $this->load->model('m_transaction');
   }


   public function index()
   {
      // $redirect_page = $this->input->post('redirect_page');
      if (empty($this->cart->contents())) {
         redirect('home');
      }
      $data = array(
         'title'    => 'Cart',
         'isi'      => 'v_cart'
      );
      $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
   }

   public function add()
   {
      $redirect_page = $this->input->post('redirect_page');
      $data = array(

         'id'      => $this->input->post('id'),
         'qty'     => $this->input->post('qty'),
         'price'   => $this->input->post('price'),
         'name'    => $this->input->post('name'),
         'size'    => $this->input->post('size'),
         'color'    => $this->input->post('color'),


         //'customer_id' => $this->session->userdata('customer_id'),
         //'id_stuff'      => $this->input->post('id'),
         //'name_stuff'    => $this->input->post('name'),
         //'qty'     => $this->input->post('qty'),
         //'price'   => $this->input->post('price'),
         // 'name'    => $this->input->post('name'),
      );

      $this->cart->insert($data);
      //$this->m_cart->add($data);

      redirect($redirect_page, 'refresh');
   }

   public function delete($rowid)
   {
      $this->cart->remove($rowid);
      redirect('cart');
   }

   public function update()
   {
      $i = 1;
      foreach ($this->cart->contents() as $items) {
         $data = array(
            'rowid' => $items['rowid'],
            'qty'   => $this->input->post($i . '[qty]'),
         );
         $this->cart->update($data);
         $i++;
      }
      redirect('cart');
   }

   public function clear()
   {
      $this->cart->destroy();
      redirect('cart');
   }

   public function checkout()
   {
      $this->customer->proteksi_halaman();
      $data = array(
         'title'    => 'Checkout',
         'address' => $this->m_address->get_all_data(),
         'isi'      => 'v_checkout'
      );
      $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
   }

   public function process_checkout()
   {
   }
}