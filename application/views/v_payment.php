<div class="container">
   <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="<?= base_url('assets/img/logo/fs-logo.png'); ?>" alt="" height="45">
      <h2>Payment</h2>
   </div>
   <div class="row">
      <div>
         <a class="nav-item nav-link" href="<?php echo base_url('accounts/address'); ?>"><i class="fa-solid fa-arrow-left"></i> Back</a>
      </div>

      <div class="col-lg-6">
         <div class="card rounded-0">
            <div class="card-header">
               <h3 class="card-title">Account Number Store</h3>
            </div>
            <div class="card-body">
               <p>please send money to the account number below for: </p>
               <h4 class="text-bold mb-3">IDR: <?= number_format($order->total_amount, 0); ?>,-</h4>
               <table class="table">
                  <tr>
                     <th>Bank Account</th>
                     <th>Account Number</th>
                     <th>In The Name of</th>
                  </tr>
                  <?php foreach ($account as $key => $value) { ?>
                  <tr>
                     <td><?= $value->bank_name ?></td>
                     <td><?= $value->account_number ?></td>
                     <td><?= $value->name_of ?></td>
                  </tr>
                  <?php } ?>
               </table>
            </div>
         </div>
      </div>

      <div class="col-lg-6">
         <div class="card rounded-0">
            <div class="card-header">
               <h3 class="card-title">Payment Method</h3>
            </div>
            <div class="card-body">
               <?php

               echo validation_errors('', '');

               // notif gagal upload
               if (isset($error_upload)) {
                  echo '<div class="alert alert-info alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-info"></i> Failed to upload!</h5>' . $error_upload . '</div>';
               }

               echo form_open_multipart('myorder/payment/' . $order->id_transaction);
               ?>
               <div class="mb-3">
                  <label class="form-label">Name</label>
                  <input name="name_of" class="form-control rounded-0" placeholder="Name" required>
               </div>
               <div class="mb-3">
                  <label class="form-label">Bank Name</label>
                  <input name="bank_name" class="form-control rounded-0" placeholder="Bank" required>
               </div>
               <div class="mb-3">
                  <label class="form-label">Account Number</label>
                  <input name="account_number" class="form-control rounded-0" placeholder="Account Number" required>
               </div>
               <div class="mb-3">
                  <label class="form-label">Upload proof of payment</label>
                  <!-- <label class="input-group-text" for="inputGroupFile02">Upload</label> -->
                  <input type="file" name="slip_payment" class="form-control  rounded-0" required>
               </div>
            </div>
            <div class="card-footer">
               <button type="submit" class="btn btn-dark btn-block rounded-0">Send</button>
            </div>
            <?php echo form_close() ?>
         </div>
      </div>

   </div>
</div>

<script>
window.setTimeout(function() {
   $(".alert").fadeTo(300, 0).slideUp(300, function() {
      $($this).remove();
   });
}, 2000)
</script>