<div class="container">
   <div class="col-9">
      <div class="card card-dark">
         <div class="card-header">
            <h3 class="card-title">Store</h3>
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

            echo form_open('admin/setting'); ?>

            <div class="row">
               <div class="col-sm-6">
                  <div class="form-group">
                     <label>Province</label>
                     <select class="form-select" name="province">
                        <option value="<?= $setting->location ?>"><?= $setting->location; ?></option>
                     </select>
                  </div>
               </div>

               <div class="col-sm-6">
                  <div class="form-group">
                     <label>City</label>
                     <select class="form-select" name="city">
                        <option value="<?= $setting->location ?>"><?= $setting->location; ?></option>
                     </select>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-6">
                  <div class="form-group">
                     <label>Store Name</label>
                     <input type="text" class="form-control" name="store_name" value="<?= $setting->store_name ?>" required>
                     </inp>
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label>Phone Number</label>
                     <input type="text" class="form-control" name="phone_number" value="<?= $setting->phone_number ?>" required>
                     </input>
                  </div>
               </div>
               <div class="col-sm-12">
                  <div class="form-group">
                     <label>Store Address</label>
                     <textarea type="text" class="form-control" name="store_address" value="<?= $setting->store_address ?>" required><?= $setting->store_address ?>
                  </textarea>
                  </div>
               </div>
               <div class="form-group">
                  <button type="submit" class="btn btn-primary">Save</button>
                  <a href="<?= base_url('admin'); ?>" class="btn btn-default">Back</a>
               </div>
            </div>

            <?= form_close(); ?>

         </div>
      </div>
   </div>
</div>

<div class="container">
   <div class="col-9">
      <div class="card card-dark">
         <div class="card-header">
            <h3 class="card-title">Bank Account</h3>
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

            echo form_open('admin/setting'); ?>

            <table class="table table-borderless table-hover">
               <thead class="table-light">
                  <tr class=" text-center">
                     <th>No</th>
                     <th>Bank</th>
                     <th>Account Number</th>
                     <th>In the Name of</th>
                     <th>Store Location</th>
                     <th></th>
                  </tr>
               </thead>
               <tbody>
                  <?php $i = 1;
                  foreach ($bank as $key => $value) { ?>
                  <tr>
                     <td><?= $i++; ?></td>
                     <td><img src="<?= base_url('assets/img/logo/payment/' . $value->logo) ?>" width="50px"></td>
                     <td class="text-center"><?= $value->account_number; ?></td>
                     <td class="text-center"><?= $value->name_of; ?></td>
                     <td class="text-center"><?= $value->location; ?></td>
                  </tr>
                  <?php } ?>
               </tbody>
            </table>

            <?= form_close(); ?>

         </div>
      </div>
   </div>
</div>

<script>
$(document).ready(function() {
   // input province
   $.ajax({
      type: "POST",
      url: "<?= base_url('rajaongkir/province') ?>",
      success: function(result_province) {
         // console.log(result_province);
         $("select[name=province]").html(result_province);
      }
   });
   // input city
   $("select[name=province]").on("change", function() {
      var id_selected_province = $("option:selected", this).attr("id_province");

      $.ajax({
         type: "POST",
         url: "<?= base_url('rajaongkir/city') ?>",
         data: 'id_province=' + id_selected_province,
         success: function(result_city) {
            $("select[name=city]").html(result_city);
         }
      })
   });
});
</script>