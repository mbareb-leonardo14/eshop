<div class="col-12">
   <div class="card card-dark">
      <div class="card-header">
         <h3 class="card-title my-2">Data <?= $title; ?></h3>
         <div class="card-tools">
            <a href="<?= base_url('stuff/add'); ?>" type="button" class="btn btn-primary btn-m">
               Add Product <i class="fas fa-plus"></i>
            </a>
         </div>
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
                  <th>Name</th>
                  <th>Category</th>
                  <th>Brand</th>
                  <th>Stock</th>
                  <th>Price</th>
                  <th>Description</th>
                  <th>Picture</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php $i = 1;
               foreach ($stuff as $key => $value) { ?>
               <tr>
                  <td><?= $i++; ?></td>
                  <td>
                     <?= $value->stuff_name; ?>
                     <br>
                     Weight : <?= $value->weight; ?> gr
                  </td>
                  <td class="text-center"><?= $value->category_name; ?></td>
                  <!-- <td class="text-center"><?= $value->brand_name; ?></td> -->
                  <td class="text-center"><img src="<?= base_url('assets/img/logo/brand/' . $value->brand_logo) ?>"
                        alt="logo brand<?= $value->brand_logo; ?>" height="20px"></td>

                  <!-- <td class="text-center"><?= $value->stock; ?></td> -->
                  <td class="text-center"><?php
                                             if ($value->stock == 0) {
                                                echo
                                                '<span class="badge text-bg-danger px-2">out of stock</span>';
                                             } else if ($value->stock <= 10) {
                                                echo '<span class="badge text-bg-warning px-2">' . $value->stock . '</span>';
                                             } else {
                                                echo '<span class="badge text-bg-success px-2">' . $value->stock . '</span>';
                                             }
                                             ?></td>
                  <td class="text-center">IDR. <?= number_format($value->price, 0) ?></td>
                  <td class="text-center"><?= $value->description; ?></td>
                  <td class="text-center"><img src="<?= base_url('assets/img/stuff/' . $value->picture) ?>"
                        alt="picture<?= $value->picture; ?>" width="60px" height="60px"></td>
                  <td class="text-center">
                     <a href="<?= base_url('stuff/edit/' . $value->id_stuff) ?>" class="btn btn-sm btn-warning"><i
                           class="fa-solid fa-pen-to-square"></i></a>
                     <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                        data-bs-target="#delete<?= $value->id_stuff; ?>"><i class=" fa-solid fa-trash"></i></button>
                  </td>
               </tr>
               <?php } ?>
            </tbody>
         </table>
      </div>


      <!-- Modal Delete -->
      <?php foreach ($stuff as $key => $value) { ?>
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
      <?php } ?>



   </div>


   <!-- /.card-body -->
</div>
<!-- /.card -->