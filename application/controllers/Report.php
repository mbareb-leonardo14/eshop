<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_report');
      //Do your magic here
   }


   public function index()
   {
      $data = array(
         'title'   => 'Sales Report',
         'isi'      => 'v_sales_report',
      );
      $this->load->view('layout/v_wrapper_backend', $data, FALSE);
   }

   public function daily_rep()
   {
      $date = $this->input->post('date');
      $month = $this->input->post('month');
      $year = $this->input->post('year');

      $data = array(
         'title'   => 'Sales Report',
         'date' => $date,
         'month' => $month,
         'year' => $year,
         'report' => $this->m_report->daily_rep($date, $month, $year),
         'isi'      => 'report/v_daily_rep',
      );
      $this->load->view('layout/v_wrapper_backend', $data, FALSE);
   }

   public function month_rep()
   {
      $month = $this->input->post('month');
      $year = $this->input->post('year');

      $data = array(
         'title'   => 'Sales Report',
         'month' => $month,
         'year' => $year,
         'report' => $this->m_report->month_rep($month, $year),

         'isi'      => 'report/v_month_rep',
      );
      $this->load->view('layout/v_wrapper_backend', $data, FALSE);
   }

   public function year_rep()
   {
      $year = $this->input->post('year');

      $data = array(
         'title'   => 'Sales Report',
         'year' => $year,
         'report' => $this->m_report->year_rep($year),

         'isi'      => 'report/v_year_rep',
      );
      $this->load->view('layout/v_wrapper_backend', $data, FALSE);
   }
}

/* End of file repor.php */