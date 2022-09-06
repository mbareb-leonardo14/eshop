<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_pic extends CI_Model
{
   public function get_all_data()
   {
      $this->db->select('tbl_stuff.*,COUNT(tbl_picture.id_stuff) as total_images');
      $this->db->from('tbl_stuff');
      $this->db->join('tbl_picture', 'tbl_picture.id_stuff = tbl_stuff.id_stuff', 'left');
      $this->db->group_by('tbl_stuff.id_stuff');
      $this->db->order_by('tbl_stuff.id_stuff', 'desc');

      return $this->db->get()->result();
   }

   public function get_pic($id_stuff)
   {
      $this->db->select('*');
      $this->db->from('tbl_picture');
      $this->db->where('id_stuff', $id_stuff);
      return $this->db->get()->result();
   }

   public function add($data)
   {
      $this->db->insert('tbl_picture', $data);
   }

   public function get_data($id_picture)
   {
      $this->db->select('*');
      $this->db->from('tbl_picture');
      $this->db->where('id_picture', $id_picture);

      return $this->db->get()->row();
   }

   public function delete($data)
   {
      $this->db->where('id_picture', $data['id_picture']);
      $this->db->delete('tbl_picture', $data);
   }
}

/* End of file M_pic.php */