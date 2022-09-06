<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
   public function total_stuff()
   {
      return $this->db->get('tbl_stuff')->num_rows();
   }
   public function total_user()
   {
      return $this->db->get('tbl_user')->num_rows();
   }
   public function total_category()
   {
      return $this->db->get('tbl_category')->num_rows();
   }

   public function data_setting()
   {
      $this->db->select('*');
      $this->db->from('tbl_setting');
      $this->db->where('id', 1);
      return $this->db->get()->row();
   }

   public function edit($data)
   {
      $this->db->where('id', $data['id']);
      $this->db->update('tbl_setting', $data);
   }

   public function bank_account()
   {
      $this->db->select('*');
      $this->db->from('tbl_account_number');
      $this->db->order_by('id_account', 'asc');
      return $this->db->get()->result();
   }
}

/* End of file M_admin.php */