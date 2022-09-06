<div class="col-12">
   <div class="card card-dark">
      <div class="card-header">
         <h3 class="card-title my-2">Data User</h3>

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
                  <th>Nama User</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Level</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php $i = 1;
               foreach ($user as $key => $value) { ?>
                  <tr>
                     <td><?= $i++; ?></td>
                     <td><?= $value->nama_user; ?></td>
                     <td class="text-center"><?= $value->username; ?></td>
                     <td class="text-center"><?= $value->password; ?></td>
                     <td class="text-blue text-center">
                        <?php
                        if ($value->level_user == 1) {
                           echo '<span class="badge text-bg-primary px-2">Admin</span>';
                        } else {
                           echo '<span class="badge text-bg-success px-2">User</span>';
                        }
                        ?>
                     </td>
                     <td class="text-center">
                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $value->id_user; ?>"><i class="fa-solid fa-pen-to-square"></i></button>
                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?= $value->id_user; ?>"><i class=" fa-solid fa-trash"></i></button>

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
                  <h4 class="modal-title">Add User</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">


                  <?= form_open('user/add'); ?>

                  <div class="card-body">
                     <div class="form-group">
                        <label>Nama user</label>
                        <input type="text" name="nama_user" class="form-control" placeholder="Nama user" required>
                     </div>
                     <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                     </div>
                     <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                     </div>
                     <div class="form-group">
                        <label>Level User</label>
                        <select name="level_user" class="form-select">
                           <option value="1">Admin</option>
                           <option value="2">User</option>
                        </select>
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
      <?php foreach ($user as $key => $value) { ?>
         <div class="modal fade" id="edit<?= $value->id_user; ?>">
            <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <?= form_open('user/edit/' . $value->id_user); ?>

                     <div class="card-body">
                        <div class="form-group">
                           <label>Nama User</label>
                           <input type="text" name="nama_user" value="<?= $value->nama_user; ?>" class="form-control" placeholder="Nama User" required>
                        </div>
                        <div class="form-group">
                           <label>Username</label>
                           <input type="text" name="username" value="<?= $value->username; ?>" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                           <label>Password</label>
                           <input type="password" name="password" value="<?= $value->password; ?>" class="form-control" placeholder="password" required>
                        </div>
                        <div class="form-group">
                           <label>Level User</label>
                           <select name="level_user" class="form-select">
                              <option value="1" <?php if ($value->level_user == 1) {
                                                   echo 'selected';
                                                } ?>>Admin</option>
                              <option value="2" <?php if ($value->level_user == 2) {
                                                   echo 'selected';
                                                } ?>>User</option>
                           </select>
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
      <?php foreach ($user as $key => $value) { ?>
         <div class="modal fade" id="delete<?= $value->id_user; ?>">
            <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Delete <?= $value->nama_user; ?> ?</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-header">
                     <h3>are you sure to delete this user?</h3>
                  </div>

                  <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                     <a href="<?= base_url('user/delete/' . $value->id_user); ?>" class="btn btn-danger">Delete</a>
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