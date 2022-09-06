<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_address extends CI_Model
{

   public function get_all_data()
   {
      $this->db->select('*');
      $this->db->from('tbl_address');
      // $this->db->order_by('id_address', 'desc');
      return $this->db->get()->result();
   }

   public function data_address()
   {
      $this->db->select('*');
      $this->db->from('tbl_address');
      // $this->db->where('id', 1);
      return $this->db->get()->row();
   }

   public function add($data)
   {
      $this->db->insert('tbl_address', $data);
   }
}