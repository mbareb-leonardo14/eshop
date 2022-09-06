<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_stuff extends CI_Model
{
   public function get_all_data()
   {
      $this->db->select('*');
      $this->db->from('tbl_stuff');
      $this->db->join('tbl_category', 'tbl_category.id_category = tbl_stuff.id_category', 'left');
      $this->db->join('tbl_brand', 'tbl_brand.id_brand = tbl_stuff.id_brand', 'left');


      $this->db->order_by('id_stuff', 'desc');

      return $this->db->get()->result();
   }

   public function get_data($id_stuff)
   {
      $this->db->select('*');
      $this->db->from('tbl_stuff');
      $this->db->join('tbl_category', 'tbl_category.id_category = tbl_stuff.id_category', 'left');
      $this->db->join('tbl_brand', 'tbl_brand.id_brand = tbl_stuff.id_brand', 'left');
      $this->db->where('id_stuff', $id_stuff);

      return $this->db->get()->row();
   }

   public function add($data)
   {
      $this->db->insert('tbl_stuff', $data);
   }

   public function edit($data)
   {
      $this->db->where('id_stuff', $data['id_stuff']);
      $this->db->update('tbl_stuff', $data);
   }

   public function delete($data)
   {
      $this->db->where('id_stuff', $data['id_stuff']);
      $this->db->delete('tbl_stuff', $data);
   }
}

/* End of file M_category.php */