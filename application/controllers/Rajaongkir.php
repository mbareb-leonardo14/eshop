<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Rajaongkir extends CI_Controller
{
   private $api_key = '77d160d783e2603a35b4cbadab49f633';


   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_admin');
      $this->load->model('m_address');
   }


   public function province()
   {

      $curl = curl_init();

      curl_setopt_array($curl, array(
         CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_ENCODING => "",
         CURLOPT_MAXREDIRS => 10,
         CURLOPT_TIMEOUT => 30,
         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
         CURLOPT_CUSTOMREQUEST => "GET",
         CURLOPT_HTTPHEADER => array(
            "key: $this->api_key"
         ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
         echo "cURL Error #:" . $err;
      } else {
         // echo $response;
         $array_response = json_decode($response, true);
         // echo '<pre>';
         // print_r($array_response['rajaongkir']['results']);
         // echo '</pre>';
         $data_province = $array_response['rajaongkir']['results'];
         echo "<option value=''>~Choose province</option>";
         foreach ($data_province as $key => $value) {
            echo "<option value='" . $value['province'] . "' id_province='" . $value['province_id'] . "'>" . $value['province'] . "</option>";
         }
      }
   }
   public function city()
   {
      $id_province_selected = $this->input->post('id_province');
      $curl = curl_init();

      curl_setopt_array($curl, array(
         CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=" . $id_province_selected,
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_ENCODING => "",
         CURLOPT_MAXREDIRS => 10,
         CURLOPT_TIMEOUT => 30,
         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
         CURLOPT_CUSTOMREQUEST => "GET",
         CURLOPT_HTTPHEADER => array(
            "key: $this->api_key"
         ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
         echo "cURL Error #:" . $err;
      } else {
         $array_response = json_decode($response, true);
         $data_city = $array_response['rajaongkir']['results'];
         echo "<option value=''>~Choose city</option>";
         foreach ($data_city as $key => $value) {
            echo "<option value='" . $value['city_name'] . "'id_city='" . $value['city_id'] . "'>" . $value['city_name'] . "</option>";
         }
      }
   }

   public function courier()
   {
      echo '<option value="">~Choose courier</option>';
      echo '<option value="jne">JNE</option>';
      echo '<option value="tiki">TKI</option>';
      echo '<option value="pos">POS Indonesia</option>';
   }

   public function packet()
   {
      $hometown = $this->m_admin->data_setting()->location;
      $courier = $this->input->post('courier');
      $id_city = $this->input->post('id_city');
      $weight = $this->input->post('weight');
      $curl = curl_init();

      curl_setopt_array($curl, array(
         CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_ENCODING => "",
         CURLOPT_MAXREDIRS => 10,
         CURLOPT_TIMEOUT => 30,
         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
         CURLOPT_CUSTOMREQUEST => "POST",
         CURLOPT_POSTFIELDS => "origin=" . $hometown . "&destination=" . $id_city . "&weight=" . $weight . "&courier=" . $courier,
         CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: $this->api_key"
         ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
         echo "cURL Error #:" . $err;
      } else {
         // echo $response;
         $array_response = json_decode($response, true);
         // echo '<pre>';
         // print_r($array_response['rajaongkir']['results']);
         // echo '</pre>';
         $data_packet = $array_response['rajaongkir']['results'][0]['costs'];
         echo "<option value=''>~Choose</option>";
         foreach ($data_packet as $key => $value) {
            echo "<option value='" . $value['service'] . "' cost='" . $value['cost'][0]['value'] . "' estimation='" . $value['cost'][0]['etd'] . " Day'>";
            echo $value['service'] . " | Rp." . $value['cost'][0]['value'] . " | " . $value['cost'][0]['etd'] . " Day";
            echo "</option>";
         }
      }
   }
}

/* End of file Rajaongkir.php */