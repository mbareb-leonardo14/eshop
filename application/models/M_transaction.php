<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_transaction extends CI_Model
{
   public function save_transaction($data)
   {
      $this->db->insert('tbl_transaction', $data);
   }

   public function save_detail_transaction($detail_data)
   {
      $this->db->insert('tbl_detail_transaction', $detail_data);
   }

   public function unpaid()
   {
      $this->db->select('*');
      $this->db->from('tbl_transaction');
      $this->db->where('customer_id', $this->session->userdata('customer_id'));
      $this->db->where('status=0');

      $this->db->order_by('id_transaction', 'desc');
      return $this->db->get()->result();
   }

   public function paid()
   {
      $this->db->select('*');
      $this->db->from('tbl_transaction');
      $this->db->where('customer_id', $this->session->userdata('customer_id'));
      $this->db->where('status=1');

      $this->db->order_by('id_transaction', 'desc');
      return $this->db->get()->result();
   }

   public function otw()
   {
      $this->db->select('*');
      $this->db->from('tbl_transaction');
      $this->db->where('customer_id', $this->session->userdata('customer_id'));
      $this->db->where('status=2');

      $this->db->order_by('id_transaction', 'desc');
      return $this->db->get()->result();
   }

   public function complete()
   {

      $this->db->select('*');
      $this->db->from('tbl_transaction');
      // $this->db->join('tbl_customer', 'tbl_customer.customer_name = tbl_transaction.customer_name', 'left');
      $this->db->where('customer_name', $this->session->userdata('customer_name'));
      $this->db->where('status=3');

      $this->db->order_by('id_transaction', 'desc');
      return $this->db->get()->result();
   }

   public function detail_order($id_transaction)
   {
      $this->db->select('*');
      $this->db->from('tbl_transaction');
      $this->db->where('id_transaction', $id_transaction);
      return $this->db->get()->row();
   }

   public function account_number()
   {
      $this->db->select('*');
      $this->db->from('tbl_account_number');
      return $this->db->get()->result();
   }

   public function upload_slip_payment($data)
   {
      $this->db->where('id_transaction', $data['id_transaction']);
      $this->db->update('tbl_transaction', $data);
   }
}