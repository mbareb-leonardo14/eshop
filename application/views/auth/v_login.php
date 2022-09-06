<section class="vh-100">

   <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
         <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card">

               <div class="card-body p-5">
                  <img src="http://localhost/fs/public/img/logo.png" class="mb-4 mx-auto d-block" width="70" alt="logo">

                  <?php

                  echo validation_errors('<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Failed!</h5>
                  Wrong step! ', '</div>');

                  if ($this->session->flashdata('error')) {
                     echo '<div class="alert alert-danger alert-dismissible"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">&times;</button><h5><i class="icon fas fa-ban"></i> Failed!</h5>';
                     echo $this->session->flashdata('error');
                     echo '</div>';
                  }

                  if ($this->session->flashdata('message')) {
                     echo '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-check"></i> you made it out</h5>';
                     echo $this->session->flashdata('message');
                     echo '</div>';
                  }

                  echo form_open('auth') ?>

                  <div class="form-outline mb-3">
                     <input type="email" name="email" class="form-control form-control-lg" id="email">
                     <label for="email" class="form-label">Email</label>
                  </div>

                  <div class="form-outline mb-3">
                     <input type="password" name="password" class="form-control form-control-lg" id="password">
                     <label for="password" class="form-label">Password</label>

                  </div>
                  <button type="submit" class="btn btn-dark btn-block ">Login</button>

               </div>

               <div>
                  <p class="text-muted text-center mb-5">
                     No account yet? <a href="<?= base_url('auth/register'); ?>" class="text-dark text-bold" style="text-decoration: none;">Create
                        One</a>
                  </p>
               </div>
               <?php form_close(); ?>
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