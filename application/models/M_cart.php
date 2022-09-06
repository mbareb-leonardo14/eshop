<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_cart extends CI_Model
{

   public function add($data)
   {
      $this->db->insert('tbl_cart', $data);
   }

   public function cart($id_stuff)
   {
      $this->db->select('*');
      $this->db->from('tbl_cart');
      $this->db->join('tbl_category', 'tbl_category.id_category = tbl_stuff.id_category', 'left');
      $this->db->where('id_stuff', $id_stuff);

      return $this->db->get()->row();
   }
}

/* End of file M_cart.php */