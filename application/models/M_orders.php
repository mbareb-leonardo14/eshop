<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_orders extends CI_Model
{
   public function orders()
   {
      $this->db->select('*');
      $this->db->from('tbl_transaction');
      $this->db->where('status_order=0');
      $this->db->order_by('id_transaction', 'desc');

      return $this->db->get()->result();
   }

   public function packed()
   {
      $this->db->select('*');
      $this->db->from('tbl_transaction');
      $this->db->where('status_order=1');
      $this->db->order_by('id_transaction', 'desc');

      return $this->db->get()->result();
   }

   public function otw()
   {
      $this->db->select('*');
      $this->db->from('tbl_transaction');
      $this->db->where('status_order=2');
      $this->db->order_by('id_transaction', 'desc');

      return $this->db->get()->result();
   }

   public function complete()
   {
      $this->db->select('*');
      $this->db->from('tbl_transaction');
      $this->db->where('status_order=3');
      $this->db->order_by('id_transaction', 'desc');

      return $this->db->get()->result();
   }

   public function update_order($data)
   {
      $this->db->where('id_transaction', $data['id_transaction']);
      $this->db->update('tbl_transaction', $data);
   }
}

/* End of file M_orders.php */