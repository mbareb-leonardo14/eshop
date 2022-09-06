<section class="vh-100">
   <div class="container py-5 h-100">
      <div class="row justify-content-center align-items-center h-100">
         <div class="col-12 col-lg-9 col-xl-7">
            <div class="card">
               <div class="card-body p-4 p-md-5">
                  <img src="http://localhost/fs/public/img/logo.png" class="mb-4 mx-auto d-block" width="70" alt="logo">

                  <?php

                  echo validation_errors('<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Failed!</h5>
                  Wrong step! ', '</div>');

                  if ($this->session->flashdata('message')) {
                     echo '<div class="alert alert-success alert-dismissible">
               <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">&times;</button>
               <h5><i class="icon fas fa-check"></i> you made it out</h5>';
                     echo $this->session->flashdata('message');
                     echo '
            </div>';
                  }

                  echo form_open('auth/register'); ?>

                  <div class="row">
                     <div class="col-md-12 mb-4">

                        <div class="form-outline">
                           <input type="text" class="form-control form-control-lg" name="customer_name" value="<?= set_value('customer_name'); ?>"
                              autofocus />
                           <label class="form-label">Name</label>
                        </div>

                     </div>
                  </div>

                  <div class="row">
                     <div class="col-md-6 mb-4 d-flex align-items-center">

                        <div class="form-outline datepicker w-100">
                           <input type="email" class="form-control form-control-lg" value="<?= set_value('email'); ?>" name="email" />
                           <label class="form-label">Email</label>
                        </div>

                     </div>
                     <div class="col-md-6 mb-4">

                        <div class="form-outline">
                           <input type="text" class="form-control form-control-lg" value="<?= set_value('phone'); ?>" name="phone" />
                           <label class="form-label">Phone Number</label>
                        </div>

                     </div>
                  </div>

                  <div class="row">
                     <div class="col-md-6 mb-4 pb-2">

                        <div class="form-outline">
                           <input type="password" class="form-control form-control-lg" pwstrength" data-indicator="pwindicator" name="password" />
                           <label class="form-label" for="emailAddress">Password</label>
                        </div>

                     </div>
                     <div class="col-md-6 mb-4 pb-2">

                        <div class="form-outline">
                           <input type="password" class="form-control form-control-lg" name="retype_password" />
                           <label class="form-label" for="phoneNumber">Retype Password</label>
                        </div>

                     </div>
                  </div>

                  <div class="mb-3">
                     <input class="form-check-input" type="checkbox">
                     <label class="">
                        I have read the <strong>Terms and Condition</strong>
                     </label>
                  </div>

                  <button type="submit" class="btn btn-dark">Register</button>

                  <?php echo form_close(); ?>

                  <div class="mt-5 text-muted text-center">
                     Have an account? <a href="<?= base_url('auth'); ?>" class="text-dark" style="text-decoration: none;">Log in</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<script>
window.setTimeout(function() {
   $(".alert").fadeTo(300, 0).slideUp(300, function() {
      $($this).remove();
   });
}, 2000)
</script>