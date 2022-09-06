<div class="col-12">
   <div class="card card-dark">
      <div class="card-header">
         <h3 class="card-title my-2">Data <?= $title; ?></h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
         <?php

         if ($this->session->flashdata('message')) {
            echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> Success!</h5>';
            echo $this->session->flashdata('message');
            echo '</div>';
         };

         ?>

         <table class="table table-borderless table-hover" id="example1">
            <thead class="table-light">
               <tr class=" text-center">
                  <th>No</th>
                  <th>Name of Product</th>
                  <th>Cover</th>
                  <th>Total Images</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php $i = 1;
               foreach ($pic as $key => $value) { ?>
               <tr>
                  <td><?= $i++; ?></td>
                  <td><?= $value->stuff_name; ?></td>
                  <td class="text-center"><img src="<?= base_url('assets/img/stuff/' . $value->picture) ?>"
                        alt="picture<?= $value->picture; ?>" width="80px"></td>
                  <!-- <td><?= $value->total_images; ?></td> -->
                  <td class="text-center"><?php
                                             if ($value->total_images == 0) {
                                                echo
                                                '<span class="badge text-bg-danger px-2">' . $value->total_images . '</span>';
                                             } else {
                                                echo '<span class="badge text-bg-success px-2">' . $value->total_images . '</span>';
                                             }
                                             ?></td>
                  <td class="text-center">
                     <a href="<?= base_url('pic/add/' . $value->id_stuff); ?>" class="btn btn-sm btn-success">Add <i
                           class="fa-solid fa-plus"></i></a>
                  </td>
               </tr>
               <?php } ?>
            </tbody>
         </table>
      </div>


      <!-- Modal Delete -->
      <!-- <?php foreach ($stuff as $key => $value) { ?>
      <div class="modal fade" id="delete<?= $value->id_stuff; ?>">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Delete <strong><?= $value->stuff_name; ?></strong>
                  </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-header">
                  <h4>Are you sure to delete this product?</h4>
               </div>

               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                  <a href="<?= base_url('stuff/delete/' . $value->id_stuff); ?>" class="btn btn-danger">Delete</a>
               </div>
               <?= form_close(); ?>
            </div>
         </div>
      </div>
      <?php } ?> -->



   </div>


   <!-- /.card-body -->
</div>
<!-- /.card -->