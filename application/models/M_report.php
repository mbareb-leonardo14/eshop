<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_report extends CI_Model
{

   public function daily_rep($date, $month, $year)
   {
      $this->db->select('*');
      $this->db->from('tbl_detail_transaction');
      $this->db->join('tbl_transaction', 'tbl_transaction.no_order = tbl_detail_transaction.no_order', 'left');
      $this->db->join('tbl_stuff', 'tbl_stuff.id_stuff = tbl_detail_transaction.id_stuff', 'left');
      $this->db->where('DAY(tbl_transaction.date_order)', $date);
      $this->db->where('MONTH(tbl_transaction.date_order)', $month);
      $this->db->where('YEAR(tbl_transaction.date_order)', $year);
      return $this->db->get()->result();
   }

   public function month_rep($month, $year)
   {
      $this->db->select('*');
      $this->db->from('tbl_transaction');
      $this->db->where('MONTH(date_order)', $month);
      $this->db->where('YEAR(date_order)', $year);
      $this->db->where('status=3');
      return $this->db->get()->result();
   }

   public function year_rep($year)
   {
      $this->db->select('*');
      $this->db->from('tbl_transaction');
      $this->db->where('YEAR(date_order)', $year);
      $this->db->where('status=3');
      return $this->db->get()->result();
   }
}

/* End of file M_report.php */