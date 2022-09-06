<!-- Breadcrumbs -->
<div class="breadcrumbs">
   <div class="container">
      <div class="row">
         <div class="col-12">
            <div class="bread-inner">
               <ul class="bread-list">
                  <li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
                  <li class="active"><a href="blog-single.html"><?= $title; ?></a></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- End Breadcrumbs -->

<!-- Shopping Cart -->
<div class="shopping-cart section">
   <div class="container">
      <div class="row">
         <div class="col-12">
            <!-- Shopping Summery -->
            <table class="table shopping-summery">
               <thead>
                  <tr class="main-hading">
                     <th>PRODUCT</th>
                     <th>NAME</th>
                     <th class="text-center">PRICE</th>
                     <th class="text-center">QUANTITY</th>
                     <th class="text-center">TOTAL</th>
                     <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                  </tr>
               </thead>
               <?php echo form_open('cart/update'); ?>

               <?php $i = 1; ?>

               <?php
               $tot_weight = 0;
               foreach ($this->cart->contents() as $items) {
                  $stuff = $this->m_home->detail_product($items['id']);
                  $weight = $items['qty'] * $stuff->weight;
                  $tot_weight = $weight + $tot_weight
               ?>

               <?= form_hidden($i . '[rowid]', $items['rowid']); ?>
               <tbody>
                  <tr>
                     <td class="image" data-title="No"><img src="<?= base_url('assets/img/stuff/' . $stuff->picture); ?>" alt="#"></td>
                     <td class="product-des" data-title="Description">
                        <p class="product-name"><a href="#"><?= $items['name']; ?></a></p>
                        <p class="product-des"><?= $weight ?> gr</p>
                     </td>
                     <td class="price" data-title="Price"><span>Rp. <?= $this->cart->format_number($items['price']); ?> </span></td>
                     <td class="qty" data-title="Qty">
                        <!-- Input Order -->
                        <div class="input-group">
                           <!-- <div class="button minus">
                              <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus"
                                 data-field="<?= $i . '[qty]' ?>">
                                 <i class="ti-minus"></i>
                              </button>
                           </div>
                           <input type="text" name="<?= $i . '[qty]' ?>" class="input-number" min="1" maxlength="3" value="<?= $items['qty']; ?>">
                           <div class="button plus">
                              <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="<?= $i . '[qty]' ?>">
                                 <i class="ti-plus"></i>
                              </button>
                           </div> -->
                           <?= form_input(
                                 array(
                                    'name'      => $i . '[qty]',
                                    'value'     => $items['qty'],
                                    'maxlength' => '3',
                                    'min'       => '0',
                                    'size'      => '5',
                                    'type'      => 'number',
                                    'cart'      => 'form-select'
                                 )
                              );
                              ?>
                        </div>
                        <!--/ End Input Order -->
                     </td>
                     <td class="total-amount" data-title="Total"><span>$220.88</span></td>
                     <td class="action" data-title="Remove"><a href="<?= base_url('cart/delete/' . $items['rowid']); ?>"><i
                              class="ti-trash remove-icon"></i></a></td>
                  </tr>
               </tbody>

               <?php } ?>

            </table>
            <!--/ End Shopping Summery -->
         </div>
      </div>
      <div class="row">
         <div class="col-12">
            <!-- Total Amount -->
            <div class="total-amount">
               <div class="row">
                  <div class="col-lg-8 col-md-5 col-12">
                     <div class="left">
                        <div class="coupon">
                           <form action="#" target="_blank">
                              <input name="Coupon" placeholder="Enter Your Coupon">
                              <button class="btn">Apply</button>
                           </form>
                        </div>
                        <div class="checkbox">
                           <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Shipping (+10$)</label>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 col-md-7 col-12">
                     <div class="right">
                        <ul>
                           <li>Cart Subtotal<span>Rp. <?= $this->cart->format_number($this->cart->total()); ?></span></li>
                           <!-- <li>Shipping<span>Free</span></li> -->
                           <!-- <li>You Save<span>$20.00</span></li> -->
                           <li class="last">You Pay<span>Rp. <?= $this->cart->format_number($this->cart->total()); ?></span></li>
                        </ul>
                        <div class="button5">
                           <a href="<?= base_url('accounts/address'); ?>" class="btn">Checkout</a>
                           <a href="<?= base_url(''); ?>" class="btn">Continue shopping</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!--/ End Total Amount -->
         </div>
      </div>
   </div>
</div>
<!--/ End Shopping Cart -->