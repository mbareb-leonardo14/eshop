<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_brand extends CI_Model
{
   public function get_all_data()
   {
      $this->db->select('*');
      $this->db->from('tbl_brand');
      $this->db->order_by('id_brand', 'desc');
      return $this->db->get()->result();
   }

   public function add($data)
   {
      $this->db->insert('tbl_brand', $data);
   }

   public function edit($data)
   {
      $this->db->where('id_brand', $data['id_brand']);
      $this->db->update('tbl_brand', $data);
   }

   public function delete($data)
   {
      $this->db->where('id_brand', $data['id_brand']);
      $this->db->delete('tbl_brand', $data);
   }
}

/* End of file M_category.php */