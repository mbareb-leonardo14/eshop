<!-- general form elements disabled -->
<div class="container">
   <div class="col-12">
      <div class="card card-dark">
         <div class="card-header">
            <h3 class="card-title">Edit Product</h3>
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
            echo form_open_multipart('stuff/edit/' . $stuff->id_stuff); ?>

            <div class="row">
               <div class="col-sm-8">
                  <div class="form-group">
                     <label>Name of Product</label>
                     <input name="stuff_name" class="form-control" placeholder="Name of Product"
                        value="<?= $stuff->stuff_name ?>">
                  </div>
               </div>
               <div class="col-sm-2">
                  <div class="form-group">
                     <label>Category</label>
                     <select name="id_category" class="form-select">
                        <option value=""><?= $stuff->category_name ?></option>
                        <?php foreach ($category as $key => $value) { ?>
                        <option value="<?= $value->id_category; ?>"><?= $value->category_name; ?>
                        </option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
               <div class="col-sm-2">
                  <div class="form-group">
                     <label>Brand</label>
                     <select name="id_brand" class="form-select">
                        <option value=""><?= $stuff->brand_name ?></option>
                        <?php foreach ($brand as $key => $value) { ?>
                        <option value="<?= $value->id_brand; ?>"><?= $value->brand_name; ?>
                        </option>
                        <?php } ?>
                     </select>
                  </div>
               </div>


               <div class="col-sm-8">
                  <div class="form-group">
                     <label>Price</label>
                     <input type="text" name="price" class="form-control" placeholder="Enter Price"
                        value=" <?= $stuff->price; ?>">
                  </div>
               </div>
               <div class="col-sm-2">
                  <div class="form-group">
                     <label>Weight (Kg)</label>
                     <input type="text" name="weight" class="form-control" placeholder="Weight in Kg"
                        value="<?= $stuff->weight; ?>" required>
                  </div>
               </div>
               <div class="col-sm-2">
                  <div class="form-group">
                     <label>Stock</label>
                     <input type="number" name="stock" class="form-control" placeholder="Stock"
                        value="<?= $stuff->stock; ?>" required>
                  </div>
               </div>

               <div class="col-sm-8">
                  <div class="form-group">
                     <label>Picture</label>
                     <div class="input-group">
                        <div class="custom-file">
                           <input type="file" class="custom-file-input" name="picture" id="photo_preview">
                           <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label>Description</label>
                     <textarea class="form-control" name="description" placeholder="Enter Description"
                        rows="5"><?= $stuff->description; ?></textarea>
                  </div>
               </div>
               <div class="col-sm-4">
                  <div class="form-group">
                     <img src="<?= base_url('assets/img/stuff/' . $stuff->picture) ?>" width="250"
                        class="mt-4 img-thumbnail" id="load_photo">
                  </div>
               </div>

               <div class="col-sm-12">
                  <div class="form-group float-right gap-2">
                     <button type="submit" class="btn btn-primary">Save</button>
                     <input class="btn btn-default" type="reset" value="Reset">
                  </div>

                  <a href="<?= base_url('stuff'); ?>" class="ms-1">
                     <i class="fa-solid fa-arrow-left"></i> Back
                  </a>
               </div>
            </div>
         </div>
         <?php form_close(); ?>

      </div>
      <!-- /.card-body -->
   </div>
</div>
</div>

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