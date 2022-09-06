<section class="content">
   <div class="container-fluid">
      <div class="col-md-12">
         <?php

         if ($this->session->flashdata('message')) {
            echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> Success!</h5>';
            echo $this->session->flashdata('message');
            echo '</div>';
         };

         ?>
         <div class="card">
            <div class="card-header p-2">
               <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#topay" data-toggle="tab">Orders</a></li>
                  <li class="nav-item"><a class="nav-link" href="#packed" data-toggle="tab">Packed</a></li>
                  <li class="nav-item"><a class="nav-link" href="#otw" data-toggle="tab">On the way</a></li>
                  <li class="nav-item"><a class="nav-link" href="#complete" data-toggle="tab">Complete</a></li>
               </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
               <div class="tab-content">
                  <!-- tab orders -->
                  <div class="active tab-pane" id="topay">
                     <table class="table table-striped">
                        <tr>
                           <th>No</th>
                           <th>Name</th>
                           <th>No Order</th>
                           <th>Date</th>
                           <th>Delivery Address</th>
                           <th>Courier</th>
                           <th>Total(IDR)</th>
                           <th>Action</th>
                        </tr>
                        <?php $i = 1;
                        foreach ($orders as $key => $value) { ?>
                        <tr>
                           <td><?= $i++; ?></td>
                           <td>
                              <?= $value->customer_name; ?><br>
                              <p class="text-muted"><?= $value->email; ?></p>
                           </td>
                           <td><code class="text-muted"><?= $value->no_order; ?></code></td>
                           <td><?= $value->date_order; ?></td>
                           <td>
                              <p>
                                 <strong><?= $value->name_receiver; ?></strong><br>
                                 <?= $value->phone_number; ?><br>
                                 <?= $value->address; ?>, <?= $value->city; ?>, <?= $value->province; ?><br>
                                 <?= $value->zip; ?>
                              </p>
                           </td>
                           <td>
                              <img src="<?= base_url('assets/img/logo/courier/' . $value->courier) . ".png" ?>" width="45" class=""><br>
                              Packet: <?= $value->packet; ?><br>
                              Shipping: <?= number_format($value->shipping_cost); ?>
                           </td>
                           <td>
                              <!-- paid & unpaid mark -->
                              <?php if ($value->status == 1) {
                                    echo "<s class='text-muted'>IDR: " . number_format($value->total_amount, 0) . "</s></span><br>";
                                 } else {
                                    echo "<strong>IDR: " . number_format($value->total_amount, 0) . "</strong><br>";
                                 } ?>

                              <?php if ($value->status == 0) {
                                    echo '<span class="badge badge-warning">Unpaid</span>';
                                    echo '<p><small><em>waiting for payment...</em></small></p>';
                                 } else {
                                    echo '<span class="badge badge-success">Paid</span><br>';
                                 } ?>
                              <!-- end paid & unpaid mark -->
                           </td>
                           <td>
                              <?php if ($value->status == 1) { ?>
                              <button type="button" class=" btn btn-primary" data-bs-toggle="modal"
                                 data-bs-target="#check<?= $value->id_transaction; ?>">CEK</button>
                              <a href="<?= base_url('admin/process/' . $value->id_transaction); ?>"
                                 class="btn btn-primary btn-xs btn-primaryKey">Process</a>
                              <?php } ?>
                           </td>
                        </tr>
                        <?php } ?>
                     </table>
                  </div>
                  <!-- end tab orders -->

                  <!-- /.tab-packe -->
                  <div class="tab-pane" id="packed">
                     <table class="table table-striped">
                        <tr>
                           <th>No</th>
                           <th>Name</th>
                           <th>No Order</th>
                           <th>Date</th>
                           <th>Delivery Address</th>
                           <th>Courier</th>
                           <th>Total(IDR)</th>
                           <th>Action</th>
                        </tr>
                        <?php $i = 1;
                        foreach ($packed as $key => $value) { ?>
                        <tr>
                           <td><?= $i++; ?></td>
                           <td>
                              <?= $value->customer_name; ?><br>
                              <p class="text-muted"><?= $value->email; ?></p>
                           </td>
                           <td><code class="text-muted"><?= $value->no_order; ?></code></td>
                           <td><?= $value->date_order; ?></td>
                           <td>
                              <p>
                                 <strong><?= $value->name_receiver; ?></strong><br>
                                 <?= $value->phone_number; ?><br>
                                 <?= $value->address; ?>, <?= $value->city; ?>, <?= $value->province; ?><br>
                                 <?= $value->zip; ?>
                              </p>
                           </td>
                           <td>
                              <img src="<?= base_url('assets/img/logo/courier/' . $value->courier) . ".png" ?>" width="45" class=""><br>
                              Packet: <?= $value->packet; ?><br>
                              Shipping: <?= number_format($value->shipping_cost); ?>
                           </td>
                           <td>

                              <!-- paid & unpaid mark -->
                              <?php if ($value->status == 1) {
                                    echo "<s class='text-muted'>IDR: " . number_format($value->total_amount, 0) . "</s></span><br>";
                                 } else {
                                    echo "<strong>IDR: " . number_format($value->total_amount, 0) . "</strong><br>";
                                 } ?>

                              <?php if ($value->status == 0) {
                                    echo '<span class="badge badge-warning">Unpaid</span>';
                                    echo '<p><small><em>waiting for payment...</em></small></p>';
                                 } else {
                                    echo '<span class="badge badge-success">Paid</span><br>';
                                 } ?>

                              <!-- end paid & unpaid mark -->

                           </td>
                           <td>
                              <?php if ($value->status == 1) { ?>
                              <button type="button" class=" btn btn-primary" data-bs-toggle="modal"
                                 data-bs-target="#send<?= $value->id_transaction; ?>">Send</button>
                              <?php } ?>
                           </td>
                        </tr>
                        <?php } ?>
                     </table>
                  </div>
                  <!-- /.end-tab-packed -->

                  <div class="tab-pane" id="otw">
                     <table class="table table-striped">
                        <tr>
                           <th>No</th>
                           <th>Name</th>
                           <th>Order ID</th>
                           <th>Date</th>
                           <th>Delivery Address</th>
                           <th>Courier</th>
                           <th>Status</th>
                           <th>Airwaybill</th>
                        </tr>
                        <?php $i = 1;
                        foreach ($otw as $key => $value) { ?>
                        <tr>
                           <td><?= $i++; ?></td>
                           <td>
                              <?= $value->customer_name; ?><br>
                              <p class="text-muted"><?= $value->email; ?></p>
                           </td>
                           <td><code class="text-muted"><?= $value->no_order; ?></code></td>
                           <td><?= $value->date_order; ?></td>
                           <td>
                              <p>
                                 <strong><?= $value->name_receiver; ?></strong><br>
                                 <?= $value->phone_number; ?><br>
                                 <?= $value->address; ?>, <?= $value->city; ?>, <?= $value->province; ?><br>
                                 <?= $value->zip; ?>
                              </p>
                           </td>
                           <td>
                              <img src="<?= base_url('assets/img/logo/courier/' . $value->courier) . ".png" ?>" width="45" class=""><br>
                              Packet: <?= $value->packet; ?><br>
                              Shipping: <?= number_format($value->shipping_cost); ?>
                           </td>
                           <td>

                              <?php if ($value->status == 2) {
                                    echo '<p><small><em>on the way...</em></small></p>';
                                 } ?>

                           </td>
                           <td>
                              <h4><?= $value->airwaybill ?></h4>
                           </td>
                        </tr>
                        <?php } ?>
                     </table>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="complete">
                     <table class="table table-striped">
                        <tr>
                           <th>No</th>
                           <th>Name</th>
                           <th>No Order</th>
                           <th>Date</th>
                           <th>Delivery Address</th>
                           <th>Courier</th>
                           <th>Total(IDR)</th>
                        </tr>
                        <?php $i = 1;
                        foreach ($complete as $key => $value) { ?>
                        <tr>
                           <td><?= $i++; ?></td>
                           <td>
                              <?= $value->customer_name; ?><br>
                              <p class="text-muted"><?= $value->email; ?></p>
                           </td>
                           <td><code class="text-muted"><?= $value->no_order; ?></code></td>
                           <td><?= $value->date_order; ?></td>
                           <td>
                              <p>
                                 <strong><?= $value->name_receiver; ?></strong><br>
                                 <?= $value->phone_number; ?><br>
                                 <?= $value->address; ?>, <?= $value->city; ?>, <?= $value->province; ?><br>
                                 <?= $value->zip; ?>
                              </p>
                           </td>
                           <td>
                              <img src="<?= base_url('assets/img/logo/courier/' . $value->courier) . ".png" ?>" width="45" class=""><br>
                              Packet: <?= $value->packet; ?><br>
                              Shipping: <?= number_format($value->shipping_cost); ?>
                           </td>
                           <td>

                              <!-- paid & unpaid mark -->
                              <?php if ($value->status == 1) {
                                    echo "<s class='text-muted'>IDR: " . number_format($value->total_amount, 0) . "</s></span><br>";
                                 } else {
                                    echo "<strong>IDR: " . number_format($value->total_amount, 0) . "</strong><br>";
                                 } ?>

                              <?php if ($value->status == 3) {
                                    echo '<span class="badge badge-success">Complete</span><br>';
                                 } ?>

                              <!-- end paid & unpaid mark -->

                           </td>
                        </tr>
                        <?php } ?>
                     </table>
                  </div>
                  <!-- /.tab-pane -->
               </div>
               <!-- /.tab-content -->
            </div><!-- /.card-body -->
         </div>
         <!-- /.card -->
      </div>
      <!-- /.col -->
   </div>
</section>

<?php foreach ($orders as $key => $value) { ?>
<div class="modal fade" id="check<?= $value->id_transaction; ?>">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Check <strong><?= $value->no_order; ?></strong>
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>


         <div class="modal-body">
            <table class="table">
               <tr>
                  <th>Bank Name</th>
                  <th>:</th>
                  <td><?= $value->bank_name; ?></td>
               </tr>
               <tr>
                  <th>Account Number</th>
                  <th>:</th>
                  <td><?= $value->account_number; ?></td>
               </tr>
               <tr>
                  <th>In the Name of</th>
                  <th>:</th>
                  <td><?= $value->name_of; ?></td>
               </tr>
               <tr>
                  <th>Paid</th>
                  <th>:</th>
                  <td>IDR: <?= number_format($value->total_amount, 0); ?></td>
               </tr>
            </table>
            <img src="<?= base_url('assets/img/slip_payment/' . $value->slip_payment) ?>" width="300" class="my-1 img-thumbnail" id="load_photo">
         </div>


         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
            <a href="" class="btn btn-dark">Confirmation</a>
         </div>
      </div>
   </div>
</div>
<?php } ?>

<?php foreach ($packed as $key => $value) { ?>
<div class="modal fade" id="send<?= $value->id_transaction; ?>">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Send <strong><?= $value->no_order; ?></strong>
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>


         <?php echo form_open('admin/otw/' . $value->id_transaction) ?>
         <div class="modal-body">


            <table class="table">
               <tr>
                  <th>Courier</th>
                  <th>:</th>
                  <td><?= $value->packet; ?> - <?= $value->courier; ?></td>
               </tr>
               <tr>
                  <th>Shipping</th>
                  <th>:</th>
                  <td><?= number_format($value->shipping_cost, 0); ?></td>
               </tr>
               <tr>
                  <th>Airwaybill</th>
                  <th>:</th>
                  <td><input name="airwaybill" class="form-control" placeholder="Input Airwaybill" required></td>
               </tr>
            </table>

         </div>


         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-dark" data-bs-dismiss="modal">Send</button>
         </div>
         <?php echo form_close() ?>
      </div>
   </div>
</div>
<?php } ?>

<!-- <button type="button" class="btn btn-primary" id="liveToastBtn">Show live toast</button>

<div class="toast-container position-fixed bottom-0 end-0 p-3">
   <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
         <img src="<?= base_url('assets/img/logo/fs-logo.png'); ?>" class="rounded me-2" height="20" alt="...">
         <strong class="me-auto">Bootstrap</strong>
         <small>11 mins ago</small>
         <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
         Hello, world! This is a toast message.
      </div>
   </div>
</div> -->

<!-- <script>
const toastTrigger = document.getElementById('liveToastBtn')
const toastLiveExample = document.getElementById('liveToast')
if (toastTrigger) {
   toastTrigger.addEventListener('click', () => {
      const toast = new bootstrap.Toast(toastLiveExample)

      toast.show()
   })
}
</script> -->


<script>
function readPicture(input) {
   if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
         $('#load_photo').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
   }
}

$("#photo_preview").change(function() {
   readPicture(this);
})
</script>