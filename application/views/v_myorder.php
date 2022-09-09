<!-- Breadcrumbs -->
<div class="breadcrumbs">
   <div class="container">
      <div class="row">
         <div class="col-12">
            <div class="bread-inner">
               <ul class="bread-list">
                  <li><a href="<?= base_url(''); ?>">Home<i class="ti-arrow-right"></i></a></li>
                  <li class="active"><a href="blog-single.html"><?= $title; ?></a></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Product Area -->
<div class="section">
   <div class="container">
      <div class="row">
         <div class="col-12">

            <?php

            // if ($this->session->flashdata('message')) {
            //    echo '<div class="alert alert-success alert-dismissible">
            //    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            //    <h5><i class="icon fas fa-check"></i> Success!</h5>';
            //    echo $this->session->flashdata('message');
            //    echo '</div>';
            // };

            ?>
            <div class="card">
               <div class="card-header p-2">
                  <ul class="nav nav-pills">
                     <li class="nav-item"><a class="nav-link active" href="#topay" data-toggle="tab">To pay</a></li>
                     <li class="nav-item"><a class="nav-link" href="#packed" data-toggle="tab">Packed</a></li>
                     <li class="nav-item"><a class="nav-link" href="#otw" data-toggle="tab">On the way</a></li>
                     <li class="nav-item"><a class="nav-link" href="#complete" data-toggle="tab">Complete</a></li>
                  </ul>
               </div><!-- /.card-header -->
               <div class="card-body">
                  <div class="tab-content">
                     <div class="active tab-pane" id="topay">
                        <table class="table table-striped">
                           <tr>
                              <th>No</th>
                              <th>Name</th>
                              <th>Order ID</th>
                              <th>Date</th>
                              <th>Delivery Address</th>
                              <th>Courier</th>
                              <th>Total(IDR)</th>
                              <th>Action</th>
                           </tr>
                           <?php $i = 1;
                           foreach ($unpaid as $key => $value) { ?>
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
                                    } else {
                                       echo '<span class="badge badge-success">Paid</span><br>';
                                       echo '<p><small><em>waiting for verification...</em></small></p>';
                                    } ?>

                                 <!-- end paid & unpaid mark -->

                              </td>
                              <td>
                                 <?php if ($value->status == 0) { ?>
                                 <a href="<?= base_url('myorder/payment/' . $value->id_transaction); ?>" class="btn btn-flat btn-dark">Pay</a>
                                 <?php } ?>

                              </td>
                           </tr>
                           <?php } ?>
                        </table>
                     </div>
                     <!-- /.tab-pane -->
                     <div class="tab-pane" id="packed">
                        <table class="table table-striped">
                           <tr>
                              <th>No</th>
                              <th>Name</th>
                              <th>Order ID</th>
                              <th>Date</th>
                              <th>Address</th>
                              <th>Total(IDR)</th>
                           </tr>
                           <?php $i = 1;
                           foreach ($paid as $key => $value) { ?>
                           <tr>
                              <td><?= $i++; ?></td>
                              <td>
                                 <?= $value->customer_name; ?><br>
                                 <p class="text-muted"><?= $value->email; ?></p>
                              </td>
                              <td><code class="text-muted"><?= $value->no_order; ?></code></td>
                              <td><?= $value->date_order; ?></td>
                              <td>
                                 <img src="<?= base_url('assets/img/logo/courier/' . $value->courier) . ".png" ?>" width="45" class=""><br>
                                 Packet: <?= $value->packet; ?><br>
                                 Shipping: <?= number_format($value->shipping_cost); ?>
                                 <p>
                                    <strong><?= $value->name_receiver; ?></strong><br>
                                    <?= $value->phone_number; ?><br>
                                    <?= $value->address; ?>, <?= $value->city; ?>, <?= $value->province; ?><br>
                                    <?= $value->zip; ?>
                                 </p>

                              </td>
                              <td>

                                 <!-- paid & unpaid mark -->
                                 <?php if ($value->status == 1) {
                                       echo "<s class='text-muted'>IDR: " . number_format($value->total_amount, 0) . "</s></span><br>";
                                       echo '<span class="badge badge-success">Paid</span><br>';
                                       echo '<p><small class="text-muted"><em>waiting for shipping...</em></small></p>';
                                    } ?>
                                 <!-- end paid & unpaid mark -->

                              </td>
                           </tr>
                           <?php } ?>
                        </table>
                     </div>
                     <!-- /.tab-pane -->

                     <div class="tab-pane" id="otw">
                        <table class="table table-striped">
                           <tr>
                              <th>No</th>
                              <th>Name</th>
                              <th>Order ID</th>
                              <th>Date</th>
                              <th>Delivery Method</th>
                              <th>Courier</th>
                              <th>Status</th>
                              <th>Airwaybill</th>
                              <th>Confirmation</th>
                           </tr>
                           <?php $i = 1;
                           foreach ($otw as $key => $value) { ?>
                           <tr>
                              <td><?= $i++; ?></td>
                              <td><?= $value->customer_name; ?><br>
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
                                 <?php if ($value->status == 2) {
                                       echo '<p><small class="text-muted"><em>on the way...</em></small></p>';
                                    } ?>
                                 <!-- end paid & unpaid mark -->

                              </td>
                              <td><?= $value->airwaybill; ?></td>
                              <td>
                                 <button type="button" class=" btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#received<?= $value->id_transaction; ?>">Received</button>
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
                              <th>Order ID</th>
                              <th>Date</th>
                              <th>Courier</th>
                              <th>Status</th>
                           </tr>
                           <?php $i = 1;
                           foreach ($complete as $key => $value) { ?>
                           <tr>
                              <td><?= $i++; ?></td>
                              <td><?= $value->customer_name; ?></td>
                              <td><code class="text-muted"><?= $value->no_order; ?></code></td>
                              <td><?= $value->date_order; ?></td>
                              <td>
                                 <img src="<?= base_url('assets/img/logo/courier/' . $value->courier) . ".png" ?>" width="45" class=""> -
                                 <?= $value->packet; ?><br>
                                 <?= $value->airwaybill; ?>
                              </td>
                              <td>

                                 <!-- paid & unpaid mark -->
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
      </div>
   </div>
</div>
</div>
<!-- End Product Area -->

<?php foreach ($otw as $key => $value) { ?>
<div class="modal fade" id="received<?= $value->id_transaction; ?>">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><strong>Confirmation</strong>
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>


         <div class="modal-body">
            <h6>Are you sure you have received the order?</h6>
         </div>


         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
            <a href="<?= base_url('myorder/complete/' . $value->id_transaction); ?>" class="btn btn-success">Sure</a>
         </div>
      </div>
   </div>
</div>
<?php } ?>