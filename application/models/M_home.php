<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_home extends CI_Model
{
   public function get_all_data()
   {
      $this->db->select('*');
      $this->db->from('tbl_stuff');
      $this->db->join('tbl_category', 'tbl_category.id_category = tbl_stuff.id_category', 'left');

      $this->db->order_by('id_stuff', 'desc');
      return $this->db->get()->result();
   }

   public function get_all_data_cat()
   {
      $this->db->select('*');
      $this->db->from('tbl_category');
      $this->db->order_by('id_category', 'desc');
      return $this->db->get()->result();
   }

   public function get_all_data_brand()
   {
      $this->db->select('*');
      $this->db->from('tbl_brand');
      $this->db->order_by('id_brand', 'desc');
      return $this->db->get()->result();
   }

   public function category($id_category)
   {
      $this->db->select('*');
      $this->db->from('tbl_category');
      $this->db->where('id_category', $id_category);

      return $this->db->get()->row();
   }

   public function brand($id_brand)
   {
      $this->db->select('*');
      $this->db->from('tbl_brand');
      $this->db->where('id_brand', $id_brand);

      return $this->db->get()->row();
   }

   public function detail_product($id_stuff)
   {
      $this->db->select('*');
      $this->db->from('tbl_stuff');
      $this->db->join('tbl_category', 'tbl_category.id_category = tbl_stuff.id_category', 'left');
      $this->db->where('id_stuff', $id_stuff);

      return $this->db->get()->row();
   }

   public function get_all_data_stuff($id_category)
   {
      $this->db->select('*');
      $this->db->from('tbl_stuff');
      $this->db->join('tbl_category', 'tbl_category.id_category = tbl_stuff.id_category', 'left');
      // $this->db->join('tbl_brand', 'tbl_brand.id_brand = tbl_stuff.id_brand', 'left');

      $this->db->where('tbl_stuff.id_category', $id_category);
      return $this->db->get()->result();
   }

   public function get_all_data_stuff_brand($id_brand)
   {
      $this->db->select('*');
      $this->db->from('tbl_stuff');
      $this->db->join('tbl_brand', 'tbl_brand.id_brand = tbl_stuff.id_brand', 'left');
      $this->db->where('tbl_stuff.id_brand', $id_brand);
      return $this->db->get()->result();
   }
}

/* End of file M_home.php */