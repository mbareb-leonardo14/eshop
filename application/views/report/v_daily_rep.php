<!-- Main content -->
<div class="invoice p-3 mb-3">
   <!-- title row -->
   <div class="row">
      <div class="col-12">
         <h4>
            <i class="fas fa-globe"></i> Daily Report
            <small class="float-right">Date: <?= $date; ?>/<?= $month; ?>/<?= $year; ?></small>
         </h4>
      </div>
      <!-- /.col -->
   </div>

   <!-- Table row -->
   <div class="row">
      <div class="col-12 table-responsive">
         <table class="table table-striped">
            <thead>
               <tr>
                  <th>No</th>
                  <th>Product</th>
                  <th>Order ID</th>
                  <th>Price</th>
                  <th>Qty</th>
                  <th>Subtotal</th>
               </tr>
            </thead>
            <tbody>
               <?php
               $no = 1;
               $total = 0;
               foreach ($report as $key => $value) {
                  $subtotal = $value->price *  $value->qty;
                  $total = $subtotal + $total;
               ?>
               <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $value->stuff_name; ?></td>
                  <td><?= $value->no_order; ?></td>
                  <td><?= number_format($value->price); ?></td>
                  <td><?= $value->qty; ?></td>
                  <td>Rp.<?= number_format($subtotal); ?></td>
               </tr>
               <?php } ?>
            </tbody>
         </table>
         Total : IDR. <?= number_format($total, 0); ?>
      </div>
      <!-- /.col -->
   </div>
   <!-- /.row -->


   <!-- this row will not appear when printing -->
   <div class="row no-print">
      <div class="col-12">
         <button onclick="window.print()" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
      </div>
   </div>
</div>