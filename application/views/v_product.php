<!-- Breadcrumbs -->
<div class="breadcrumbs">
   <div class="container">
      <div class="row">
         <div class="col-12">
            <div class="bread-inner">
               <ul class="bread-list">
                  <li><a href="<?= base_url(''); ?>">Home<i class="ti-arrow-right"></i></a></li>
                  <li class="active"><a href="<?= base_url('products'); ?>"><?= $title; ?></a></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Product Area -->
<div class="product-area section">
   <div class="container">
      <div class="row">
         <div class="col-12">
            <div class="section-title">
               <h2>All Product</h2>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-12">
            <div class="product-info">
               <!-- Start Single Tab -->
               <div class="row">
                  <?php foreach ($stuff as $key => $value) { ?>
                  <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                     <div class="single-product">
                        <div class="product-img">
                           <a href="<?= base_url('home/detail_product/' . $value->id_stuff); ?>">
                              <img class="default-img" src="<?= base_url('assets/img/stuff/' . $value->picture) ?>"
                                 alt="picture<?= $value->picture; ?>">
                              <img class="hover-img" src="https://via.placeholder.com/550x750" alt="#">
                           </a>
                           <?php echo form_open('cart/add');
                              echo form_hidden('id', $value->id_stuff);
                              echo form_hidden('qty', 1);
                              echo form_hidden(
                                 'price',
                                 $value->price
                              );
                              echo form_hidden('name', $value->stuff_name);
                              // echo form_hidden('options' => array('Size' => 'L', 'Color' => 'Red');
                              echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                              ?>
                           <div class="button-head">
                              <div class="product-action">
                                 <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick
                                       Shop</span></a>
                              </div>
                              <div class="product-action-2">
                                 <button title="Add to cart" type="submit">Add to cart</button>
                              </div>
                           </div>
                           <?= form_close(); ?>
                        </div>
                        <div class="product-content">
                           <h3><a href="product-details.html"><?= $value->stuff_name; ?></a></h3>
                           <div class="product-price">
                              <span>IDR. <?= number_format($value->price); ?></span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php } ?>
               </div>
               <!--/ End Single Tab -->
            </div>
         </div>
      </div>
   </div>
</div>
</div>
<!-- End Product Area -->