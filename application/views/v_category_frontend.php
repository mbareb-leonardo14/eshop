<div class="content-header">
   <div class="container col-12">
      <div class="row mb-2">
         <div class="col-sm-6">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a class=" text-muted" href="<?= base_url(''); ?>">Home</a></li>
               <li class="breadcrumb-item"><strong><?= $title; ?></strong></li>
            </ol>
         </div>
      </div>
   </div>
</div>

<div class="container col-12">
   <div class="row text-center">

      <?php foreach ($stuff as $key => $value) { ?>
      <div class="col-12 col-sm-6 col-md-3 d-flex align-items-center flex-column">
         <div class="card bg-light d-flex flex-fill my-3">
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
            <a href="<?= base_url('home/detail_product/' . $value->id_stuff); ?>">
               <img src="<?= base_url('assets/img/stuff/' . $value->picture) ?>" alt="picture<?= $value->picture; ?>" class="card-img-top"
                  height="300" />
            </a>
            <div class="card-footer">
               <p class="card-text fw-bold">
                  <?= $value->stuff_name; ?>
               </p>
               <small class="text-secondary">IDR. <?= number_format($value->price, 0); ?></small>
               <div class="text-right">
                  <button type="submit" class="btn swalDefaultSuccess">
                     <i class="fas fa-solid fa-cart-plus"></i>
                  </button>
               </div>
            </div>
            <?= form_close(); ?>
         </div>
      </div>
      <?php } ?>

   </div>
</div>

<script>
$(function() {
   var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
   });

   $('.swalDefaultSuccess').click(function() {
      Toast.fire({
         icon: 'success',
         title: '<h4 class="text-center mt-1"><strong>Item in cart</strong></h4>'
      })
   });
});
</script>