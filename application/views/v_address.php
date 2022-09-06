<!-- Breadcrumbs -->
<div class="breadcrumbs">
   <div class="container">
      <div class="row">
         <div class="col-12">
            <div class="bread-inner">
               <ul class="bread-list">
                  <li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
                  <li class="active"><a href="blog-single.html"><?= $title; ?></a></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Checkout -->

<section class="shop checkout section">
   <div class="container">
      <?php
      $cart = $this->cart->contents();
      $item_count = 0;
      foreach ($cart as $key => $value) {
         $item_count = $item_count + $value['qty'];
      }
      echo form_open('accounts/address');
      $no_order = date('mdY') . strtoupper(random_string('alnum', 8));
      ?>
      <div class="row">
         <div class="col-lg-8 col-12">
            <div class="checkout-form">
               <h2>Make Your Checkout Here</h2>
               <p>Please register in order to checkout more quickly</p>
               <!-- Form -->

               <div class="row">
                  <div class="col-lg-6 col-md-6 col-12">
                     <div class="form-group">
                        <label>Name<span>*</span></label>
                        <input type="text" name="name_receiver" id="name" placeholder="" required>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-12">
                     <div class="form-group">
                        <label>Phone Number<span>*</span></label>
                        <input type="tel" name="phone_number" placeholder="" required>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-12">
                     <div class="form-group">
                        <label for="province">Province<span>*</span></label>
                        <select class="custom-select d-block w-100" name="province" id="province" required>
                           <option value="">Choose...</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-12">
                     <div class="form-group">
                        <label for="city">City / Districts</label>
                        <select class="custom-select d-block w-100" name="city" id="city" required>
                           <option value="">Choose...</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-6 col-12">
                     <div class="form-group">
                        <label for="zip">Postal Code<span>*</span></label>
                        <input name="zip" id="zip" required>
                     </div>
                  </div>
                  <div class="col-lg-12 col-md-6 col-12">
                     <div class="form-group">
                        <label>Address<span>*</span></label>
                        <textarea name="address" class="form-control" placeholder="input your address" required></textarea>
                     </div>
                  </div>
               </div>
               <!--/ End Form -->
            </div>
         </div>


         <div class="col-lg-4 col-12">
            <div class="order-details">
               <!-- Order Widget -->
               <div class="single-widget">
                  <h2>CART TOTALS</h2>
                  <?php
                  $tot_weight = 0;
                  foreach ($this->cart->contents() as $items) {
                     $stuff = $this->m_home->detail_product($items['id']);
                     $weight = $items['qty'] * $stuff->weight;
                     $tot_weight = $weight + $tot_weight
                  ?>
                  <?php } ?>
                  <div class="content">
                     <ul>

                        <?php foreach ($this->cart->contents() as $items) { ?>
                        <li><?= $items['name']; ?> x <?= $items['qty']; ?> <span>Rp. <?= $this->cart->format_number($items['price']); ?></span></li>
                        <?php } ?>

                        <?php foreach ($this->cart->contents() as $items) { ?>
                        <li class="last">Sub Total<span>Rp. <?= $this->cart->format_number($this->cart->total()); ?></span></li>
                        <?php } ?>

                        <li>(+) Shipping<span id="cost"></span></li>
                        <li class="last">Total<span id="total_amount"><?= $this->cart->format_number($this->cart->total()); ?></span></li>
                     </ul>
                  </div>
               </div>
               <!--/ End Order Widget -->
               <!-- delivery method -->
               <div class="single-widget">
                  <h2>Delivery Method</h2>
                  <div class="content">
                     <ul>
                        <li>
                           <label for="courier">Courier</label>
                           <select class="custom-select d-block w-100" name="courier" id="city" required>
                              <option value="">Choose...</option>
                           </select>
                        </li>
                        <li>
                           <label for="packet">Packet</label>
                           <select class="custom-select d-block w-100" name="packet" id="city" required>
                              <option value="">Choose...</option>
                           </select>
                        </li>
                     </ul>
                  </div>
               </div>

               <!--/ end delivery method -->
               <!-- Order Widget -->
               <div class="single-widget">
                  <h2>Payments</h2>
                  <div class="content">
                     <div class="checkbox">
                        <label class="checkbox-inline" for="1"><input name="updates" id="1" type="checkbox"> BRI</label>
                        <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Cash On Delivery</label>
                        <label class="checkbox-inline" for="3"><input name="news" id="3" type="checkbox"> PayPal</label>
                     </div>
                  </div>
               </div>
               <!--/ End Order Widget -->
               <!-- Payment Method Widget -->
               <div class="single-widget payement">
                  <div class="content">
                     <img src="<?= base_url('assets/eshop/images/payment-method.png'); ?>" alt="#">
                  </div>
               </div>
               <!--/ End Payment Method Widget -->
               <!-- Button Widget -->
               <div class="single-widget get-button">
                  <div class="content">
                     <div class="button">
                        <button type="submit" class="btn">proceed to checkout</button>
                     </div>
                  </div>
               </div>
               <!--/ End Button Widget -->

               <!-- save transaction -->
               <input name="no_order" value="<?php echo $no_order; ?>" hidden>
               <input name="estimation" value="" hidden>
               <input name="shipping_cost" value="" hidden>
               <input name="weight" value="<?= $tot_weight; ?>" hidden><br>
               <input name="subtotal" value="<?= $this->cart->total(); ?>" hidden>
               <input name="total_amount" value="" hidden>

               <!-- save detail transaction -->
               <?php $i = 1;
               foreach ($this->cart->contents() as $items) {
                  echo form_hidden('qty' . $i++, $items['qty']);
               }
               ?>
               <?php form_close(); ?>
            </div>
         </div>

      </div>
   </div>

</section>
<!--/ End Checkout -->


<!-- Raja Ongkir -->
<script>
$(document).ready(function() {
   // input province
   $.ajax({
      type: "POST",
      url: "<?= base_url('rajaongkir/province') ?>",
      success: function(result_province) {
         // console.log(result_province);
         $("select[name=province]").html(result_province);
      }
   });
   // input city
   $("select[name=province]").on("change", function() {
      var id_selected_province = $("option:selected", this).attr("id_province");

      $.ajax({
         type: "POST",
         url: "<?= base_url('rajaongkir/city') ?>",
         data: 'id_province=' + id_selected_province,
         success: function(result_city) {
            $("select[name=city]").html(result_city);
         }
      })
   });

   // courier
   $("select[name=city]").on("change", function() {
      $.ajax({
         type: "POST",
         url: "<?= base_url('rajaongkir/courier') ?>",
         success: function(result_courier) {
            $("select[name=courier]").html(result_courier);
         }
      })
   })

   // packet
   $("select[name=courier]").on("change", function() {
      // get id courier
      var courier_selected = $("select[name=courier]").val()
      // get id city destination
      var id_destination_city = $("option:selected", "select[name=city]").attr('id_city');
      // get data ongkos kirim
      var total_weight = <?= $tot_weight ?>;

      $.ajax({
         type: "POST",
         url: "<?= base_url('rajaongkir/packet') ?>",
         data: 'courier=' + courier_selected + '&id_city=' + id_destination_city + '&weight=' +
            total_weight,
         success: function(result_packet) {
            $("select[name=packet]").html(result_packet);
         }
      })
   });

   // weight when packet selected
   $("select[name=packet]").on("change", function() {
      // display shipping
      var data_cost = $("option:selected", this).attr('cost');
      var reverse = data_cost.toString().split('').reverse().join(''),
         thousands_format = reverse.match(/\d{1,3}/g);
      thousands_format = thousands_format.join(',').split('').reverse().join('');

      $("#cost").html("Rp. " + thousands_format)


      // display total amount
      var cost = $("option:selected", this).attr('cost');
      var total_amount = parseInt(cost) + parseInt(<?= $this->cart->total() ?>);
      var reverse2 = total_amount.toString().split('').reverse().join(''),
         total_thousands_format = reverse2.match(/\d{1,3}/g);
      total_thousands_format = total_thousands_format.join(',').split('').reverse().join('');
      $("#total_amount").html("Rp. " + total_thousands_format);

      // estimation 
      var estimation = $("option:selected", this).attr('estimation');
      $("input[name=estimation]").val(estimation);
      $("input[name=shipping_cost]").val(data_cost);
      $("input[name=total_amount]").val(total_amount);
   })

});
</script>