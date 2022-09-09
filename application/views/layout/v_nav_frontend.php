<!-- Header -->
<header class="header shop">
   <!-- Topbar -->
   <div class="topbar">
      <div class="container">
         <div class="row">
            <div class="col-lg-4 col-md-12 col-12">
               <!-- Top Left -->
               <div class="top-left">
                  <ul class="list-main">
                     <li><i class="ti-headphone-alt"></i> +62 823 34087504</li>
                     <li><i class="ti-email"></i> futuristicstore@gmail.com</li>
                  </ul>
               </div>
               <!--/ End Top Left -->
            </div>
            <div class="col-lg-8 col-md-12 col-12">
               <!-- Top Right -->
               <div class="right-content">
                  <ul class="list-main">
                     <li><a href="https://goo.gl/maps/EJZ1DWBuh7cW5JXQA" target="_blank"><i class="ti-location-pin"></i> Store location</a></li>
                     <li><i class="ti-user"></i> <a href="#">My account</a></li>
                     <?php if ($this->session->userdata('email') == "") { ?>
                     <li><i class="ti-power-off"></i><a href="<?= base_url('auth'); ?>">Login</a></li>
                     <?php } else { ?>
                     <li><a href="#"><i class="ti-user"></i> <?= $this->session->userdata('customer_name'); ?></a></li>
                     <?php } ?>
                  </ul>
               </div>
               <!-- End Top Right -->
            </div>
         </div>
      </div>
   </div>
   <!-- End Topbar -->
   <div class="middle-inner">
      <div class="container">
         <div class="row">
            <div class="col-lg-2 col-md-2 col-12">
               <!-- Logo -->
               <div class="logo">
                  <a href="<?= base_url(''); ?>"><img src="<?= base_url('assets/img/logo/fs-logo.png'); ?>" alt=" logo" height="10"></a>
               </div>
               <!--/ End Logo -->
               <!-- Search Form -->
               <div class="search-top">
                  <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                  <!-- Search Form -->
                  <div class="search-top">
                     <form class="search-form">
                        <input type="text" placeholder="Search here..." name="search">
                        <button value="search" type="submit"><i class="ti-search"></i></button>
                     </form>
                  </div>
                  <!--/ End Search Form -->
               </div>
               <!--/ End Search Form -->
               <div class="mobile-nav"></div>
            </div>
            <div class="col-lg-8 col-md-7 col-12">
               <div class="search-bar-top">
                  <div class="search-bar">
                     <select>
                        <option selected="selected">All Category</option>
                        <?php $category = $this->m_home->get_all_data_cat(); ?>
                        <?php foreach ($category as $key => $value) { ?>
                        <option>
                           <a href="<?= base_url('home/category/' . $value->id_category); ?>" class="dropdown-item"><?= $value->category_name ?>
                           </a>
                        </option>
                        <?php } ?>
                     </select>
                     <form>
                        <input name="search" placeholder="Search Products Here....." type="search">
                        <button class="btnn"><i class="ti-search"></i></button>
                     </form>
                  </div>
               </div>
            </div>
            <div class="col-lg-2 col-md-3 col-12">
               <div class="right-bar">
                  <!-- Search Form -->
                  <div class="sinlge-bar">
                     <?php if ($this->session->userdata('email') == "") { ?>
                     <a href="#" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
                     <?php } else { ?>
                     <img src="<?= base_url('assets/img/ava/' . $this->session->userdata('ava')); ?>" alt="user photo"
                        class="brand-image img-circle img-size-5" height="2">
                     <?php } ?>
                  </div>

                  <div class="sinlge-bar shopping">
                     <?php
                     $cart = $this->cart->contents();
                     $item_count = 0;
                     foreach ($cart as $key => $value) {
                        $item_count = $item_count + $value['qty'];
                     }
                     ?>
                     <a href="#" class="single-icon"><i class="ti-bag"></i> <span class="total-count"><?= $item_count; ?></span></a>
                     <!-- Shopping Item -->
                     <div class="shopping-item">
                        <div class="dropdown-cart-header">
                           <span><?= $item_count; ?> Items</span>
                           <a href="<?= base_url('cart'); ?>">View Cart</a>
                        </div>

                        <?php if (empty($cart)) { ?>
                        <ul class="shopping-list">
                           <li class="text-muted">
                              No product in the cart
                           </li>
                        </ul>
                        <?php } else {
                           foreach ($cart as $key => $value) {
                              $stuff = $this->m_home->detail_product($value['id']);
                           ?>
                        <?php $i = 1; ?>
                        <?= form_hidden($i . '[rowid]', $value['rowid']); ?>
                        <ul class="shopping-list">
                           <li>
                              <a href="<?= base_url('cart/delete/' . $value['rowid']); ?>" class="remove" title="Remove this item"><i
                                    class="fa fa-remove"></i></a>
                              <a class="cart-img" href="#"><img src="<?= base_url('assets/img/stuff/' . $stuff->picture) ?>" alt="#"></a>
                              <h4><a href="#"><?= $value['name']; ?></a></h4>
                              <p class="quantity"><?= $value['qty']; ?>x - <span class="amount">IDR. <?= number_format($value['price'], 0); ?></span>
                              </p>
                           </li>
                           <?php } ?>
                        </ul>
                        <div class="bottom">
                           <div class="total">
                              <span>Total</span>
                              <span class="total-amount">Rp. <?= $this->cart->format_number($this->cart->total()); ?></span>
                           </div>
                           <a href="<?= base_url('accounts/address'); ?>" class="btn animate">Checkout</a>
                        </div>
                        <?php } ?>
                     </div>
                     <!--/ End Shopping Item -->
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Header Inner -->
   <div class="header-inner">
      <div class="container">
         <div class="cat-nav-head">
            <div class="row">
               <div class="col-lg-9 col-12">
                  <div class="menu-area">
                     <!-- Main Menu -->
                     <nav class="navbar navbar-expand-lg">
                        <div class="navbar-collapse">
                           <div class="nav-inner">
                              <ul class="nav main-menu menu navbar-nav">
                                 <li class=""><a href="<?= base_url(''); ?>">Home</a></li>
                                 <li class="<?php if ($this->uri->segment(1) == 'products') {
                                                echo "active";
                                             } ?>""><a href=" <?= base_url('products') ?>">Product</a></li>
                                 <li><a href="#">Shop<i class="ti-angle-down"></i><span class="new">New</span></a>
                                    <ul class="dropdown">
                                       <li><a href="shop-grid.html">Shop Grid</a></li>
                                       <li><a href="cart.html">Cart</a></li>
                                       <li><a href="checkout.html">Checkout</a></li>
                                    </ul>
                                 </li>
                                 <li><a href="#">Blog<i class="ti-angle-down"></i></a>
                                    <ul class="dropdown">
                                       <li><a href="blog-single-sidebar.html">Blog Single Sidebar</a></li>
                                    </ul>
                                 </li>
                                 <li><a href="#">Marketplaces<i class="ti-angle-down"></i></a>
                                    <ul class="dropdown">
                                       <li><a href="#">Tokopedia</a></li>
                                       <li><a href="https://shopee.co.id/futuristic.collective" target="_blank">Shopee</a></li>
                                    </ul>
                                 </li>
                                 <li><a href="contact.html">Contact Us</a></li>
                              </ul>
                           </div>
                        </div>
                     </nav>
                     <!--/ End Main Menu -->
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!--/ End Header Inner -->
</header>
<!--/ End Header -->