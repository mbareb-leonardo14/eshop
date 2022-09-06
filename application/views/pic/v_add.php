<!-- general form elements disabled -->
<div class="container">
   <div class="col-9">
      <div class="card card-dark">
         <div class="card-header">
            <h3 class="card-title">Add Picture : <?= $stuff->stuff_name; ?></h3>
         </div>
         <!-- /.card-header -->
         <div class="card-body">
            <?php
            // alert kalo gak ngisi form tambah barang
            echo validation_errors('', '');

            // notif gagal upload
            if (isset($error_upload)) {
               echo '<div class="alert alert-info alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-info"></i> Failed to upload!</h5>' . $error_upload . '</div>';
            }

            if ($this->session->flashdata('message')) {
               echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> Success!</h5>';
               echo $this->session->flashdata('message');
               echo '</div>';
            };

            echo form_open_multipart('pic/add/' . $stuff->id_stuff); ?>

            <div class="row">

               <div class="col-sm-8">
                  <div class="form-group">
                     <label>Description of Image</label>
                     <input name="desc" class="form-control" placeholder="Description of Product"
                        value="<?= set_value('desc'); ?>" required>
                  </div>
                  <div class="form-group">
                     <label>Picture</label>
                     <div class="input-group">
                        <div class="custom-file">
                           <input type="file" class="custom-file-input" name="picture" required id="photo_preview">
                           <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-sm-4">
                  <div class="form-group">
                     <img src="<?= base_url('assets/img/stuff/' . $stuff->picture) ?>" width="250"
                        class="mt-4 img-thumbnail" id="load_photo">
                  </div>
               </div>

               <div class="form-group">
                  <button type="submit" class="btn btn-primary float-right">Save</button>
                  <input class="btn btn-default float-right me-2" type="reset" value="Reset">

                  <a href="<?= base_url('pic'); ?>" class="ms-1">
                     <i class="fa-solid fa-arrow-left"></i> Back
                  </a>
               </div>

            </div>


            <?php form_close(); ?>

            <hr>
            <div class="row">
               <?php foreach ($pic as $key => $value) { ?>
               <div class="col-sm-3">
                  <div class="form-group">
                     <img src="<?= base_url('assets/img/stuff/pic/' . $value->picture) ?>" width="250"
                        class="mt-4 img-thumbnail" id="load_photo">

                     <button class="btn btn-danger btn-block mt-2" data-bs-toggle="modal"
                        data-bs-target="#delete<?= $value->id_picture; ?>"><i class=" fa-solid fa-trash"></i>
                        Delete</button>
                  </div>
               </div>
               <?php } ?>
            </div>
         </div>

      </div>
   </div>
</div>

<!-- Modal Delete -->
<?php foreach ($pic as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value->id_picture; ?>">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete <strong><?= $value->desc; ?></strong>
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>


         <div class="modal-body text-center">
            <img src="<?= base_url('assets/img/stuff/pic/' . $value->picture) ?>" width="300" class="my-4 img-thumbnail"
               id="load_photo">
            <h4>Are you sure to delete this picture?</h4>


         </div>


         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
            <a href="<?= base_url('pic/delete/' . $value->id_stuff . '/' . $value->id_picture); ?>"
               class="btn btn-danger">Delete</a>
         </div>
         <?= form_close(); ?>
      </div>
   </div>
</div>
<?php } ?>

<!-- /.card -->

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