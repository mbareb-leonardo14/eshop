<div class="col-12">
   <div class="card card-dark">
      <div class="card-header">
         <h3 class="card-title my-2">Data <?= $title; ?></h3>

         <div class="card-tools">
            <button type="button" class="btn btn-primary btn-m" data-toggle="modal" data-target="#add">
               Add <i class="fas fa-plus"></i>
            </button>
         </div>

         <!-- /.card-tools -->


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
                  <th>Category</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php $i = 1;
               foreach ($category as $key => $value) { ?>
               <tr>
                  <td><?= $i++; ?></td>
                  <td><?= $value->category_name; ?></td>
                  <td class="text-center">
                     <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                        data-bs-target="#edit<?= $value->id_category; ?>"><i
                           class="fa-solid fa-pen-to-square"></i></button>
                     <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                        data-bs-target="#delete<?= $value->id_category; ?>"><i class=" fa-solid fa-trash"></i></button>

                  </td>
               </tr>
               <?php } ?>
            </tbody>
         </table>
      </div>

      <!-- Modal add user -->
      <div class="modal fade text-dark" id="add">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h4 class="modal-title">Add Category</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">


                  <?= form_open('category/add'); ?>

                  <div class="card-body">
                     <div class="form-group">
                        <label>Category type</label>
                        <input type="text" name="category_name" class="form-control" placeholder="Category Name"
                           required>
                     </div>
                  </div>



               </div>
               <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save</button>
               </div>
               <?= form_close(); ?>
            </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>

      <!-- Modal Edit -->
      <?php foreach ($category as $key => $value) { ?>
      <div class="modal fade" id="edit<?= $value->id_category; ?>">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <?= form_open('category/edit/' . $value->id_category); ?>

                  <div class="card-body">
                     <div class="form-group">
                        <label>Nama User</label>
                        <input type="text" name="category_name" value="<?= $value->category_name; ?>"
                           class="form-control" placeholder="Category Name" required>
                     </div>
                  </div>

               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
               </div>
               <?= form_close(); ?>
            </div>
         </div>
      </div>
      <?php } ?>

      <!-- Modal Delete -->
      <?php foreach ($category as $key => $value) { ?>
      <div class="modal fade" id="delete<?= $value->id_category; ?>">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Delete <?= $value->category_name; ?> ?</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-header">
                  <h3>are you sure to delete this category?</h3>
               </div>

               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                  <a href="<?= base_url('category/delete/' . $value->id_category); ?>" class="btn btn-danger">Delete</a>
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