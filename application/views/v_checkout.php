<!-- <div class="container col-12"> -->
<!-- <div class="card card-solid"> -->
<!-- </div> -->
<!-- </div> -->
<!-- </div> -->



<section class="h-100 gradient-custom">
   <div class="container">
      <div class="pt-5 pb-2 text-center">
         <!-- <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt=""
         width="72" height="72"> -->
         <h2>Checkout</h2>
         <!-- <p class="lead">Below is an example form built entirely with Bootstrap's form controls. Each required form group
         has a validation state that can be triggered by attempting to submit the form without completing it.</p> -->
      </div>
   </div>
   <div class="container pb-5">
      <div class="row d-flex justify-content-center my-4">
         <div class="col-md-8">
            <div class="card mb-4">
               <div class="card-header py-3">
                  <h5 class="mb-0"><strong>Set Shipping Address</strong></h5>
                  <br>
                  <?php
                  foreach ($address as $key => $value) { ?>
                  <p class="mb-1"><strong>Home</strong></p>
                  <p class="mb-0"><?= $value->name; ?>, <?= $value->phone_number; ?></p>
                  <p class="mb-0"><?= $value->province; ?> <?= $value->city; ?></p>
                  <p class="mb-0"><?= $value->address; ?>, <?= $value->zip; ?></p>
                  <?php } ?>
               </div>
               <div class="card-body">

                  <?php echo form_open('cart/update'); ?>
                  <!-- Single item -->


                  <?php
                  $tot_weight = 0;
                  foreach ($this->cart->contents() as $items) {
                     $stuff = $this->m_home->detail_product($items['id']);
                     $weight = $items['qty'] * $stuff->weight;
                     $tot_weight = $weight + $tot_weight
                  ?>

                  <!-- <?= form_hidden($i . '[rowid]', $items['rowid']); ?> -->
                  <div class="row">
                     <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                        <!-- Image -->
                        <div class="bg-image hover-overlay hover-zoom ripple rounded my-3 ms-3"
                           data-mdb-ripple-color="light">
                           <img src="<?= base_url('assets/img/stuff/' . $stuff->picture); ?>" height="200" />
                        </div>
                        <!-- Image -->
                     </div>

                     <div class="col-lg-6 col-md-6 mt-5 me-3">
                        <!-- Data -->
                        <p class="mb-1"><strong><?= $items['name']; ?></strong></p>
                        <p class="mb-1">Color: blue</p>
                        <p class="mb-1">Size: M</p>
                        <p class="mb-1">Quantity: <?= $items['qty']; ?></p>
                        <p class="mb-1">
                        <h6>
                           <strong>
                              Rp. <?= $this->cart->format_number($items['price']); ?>
                           </strong>
                           x <?= $items['qty']; ?>
                        </h6>
                        </p>
                        <!-- Data -->
                     </div>

                  </div>

                  <!-- Single item -->

                  <?php } ?>

               </div>
               <div class="card-footer pt-2 bg-white">
                  <div class="col-md-6">
                     <label for="">Delivery Method</label>
                     <select class="custom-select d-block w-100" name="cost" id="" required>
                        <option value="">Choose...</option>
                     </select>
                  </div>
                  <div class="col-md-6">
                     <label for="province">Packet</label>
                     <select class="custom-select d-block w-100" name="" id="province" required>
                        <option value="">Choose...</option>
                     </select>
                  </div>

               </div>
            </div>

         </div>


         <div class="col-md-4">
            <div class="card mb-4">
               <div class="card-header py-3">
                  <h5 class="mb-0"><strong>Summary</strong></h5>
               </div>
               <div class="card-body">
                  <ul class="list-group list-group-flush">

                     <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                        Products
                        <span>Rp.
                           <?= $this->cart->format_number($this->cart->total()); ?></span>
                     </li>
                     <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                        Weight
                        <span><?= $tot_weight; ?> gr</span>
                     </li>
                     <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                        Shipping
                        <span>Gratis</span>
                     </li>
                     <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                        <div>
                           <strong>Total amount</strong>
                           <strong>
                              <p class="mb-0">(including VAT)</p>
                           </strong>
                        </div>
                        <span><strong>Rp.
                              <?= $this->cart->format_number($this->cart->total()); ?></strong></span>
                     </li>

                  </ul>
                  <a href="<?= base_url(''); ?>" class="btn btn-outline-dark btn-block btn-flat">
                     PAYMENT <i class="fas fa-right"></i>
                  </a>
               </div>


            </div>
         </div>
      </div>
   </div>
</section>