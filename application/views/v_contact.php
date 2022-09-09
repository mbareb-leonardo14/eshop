<!-- Start Contact -->
<section id="contact-us" class="contact-us section">
   <div class="container">
      <div class="contact-head">
         <div class="row">
            <div class="col-lg-8 col-12">
               <div class="form-main">
                  <div class="title">
                     <h4>Get in touch</h4>
                     <h3>Write us a message</h3>
                  </div>
                  <form class="form" method="post" action="mail/mail.php">
                     <div class="row">
                        <div class="col-lg-6 col-12">
                           <div class="form-group">
                              <label>Your Name<span>*</span></label>
                              <input name="name" type="text" placeholder="">
                           </div>
                        </div>
                        <div class="col-lg-6 col-12">
                           <div class="form-group">
                              <label>Your Subjects<span>*</span></label>
                              <input name="subject" type="text" placeholder="">
                           </div>
                        </div>
                        <div class="col-lg-6 col-12">
                           <div class="form-group">
                              <label>Your Email<span>*</span></label>
                              <input name="email" type="email" placeholder="">
                           </div>
                        </div>
                        <div class="col-lg-6 col-12">
                           <div class="form-group">
                              <label>Your Phone<span>*</span></label>
                              <input name="company_name" type="text" placeholder="">
                           </div>
                        </div>
                        <div class="col-12">
                           <div class="form-group message">
                              <label>your message<span>*</span></label>
                              <textarea name="message" placeholder=""></textarea>
                           </div>
                        </div>
                        <div class="col-12">
                           <div class="form-group button">
                              <button type="submit" class="btn ">Send Message</button>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
            <div class="col-lg-4 col-12">
               <div class="single-head">
                  <div class="single-info">
                     <i class="fa fa-phone"></i>
                     <h4 class="title">Call us Now:</h4>
                     <ul>
                        <li>+123 456-789-1120</li>
                        <li>+522 672-452-1120</li>
                     </ul>
                  </div>
                  <div class="single-info">
                     <i class="fa fa-envelope-open"></i>
                     <h4 class="title">Email:</h4>
                     <ul>
                        <li><a href="mailto:info@yourwebsite.com">info@yourwebsite.com</a></li>
                        <li><a href="mailto:info@yourwebsite.com">support@yourwebsite.com</a></li>
                     </ul>
                  </div>
                  <div class="single-info">
                     <i class="fa fa-location-arrow"></i>
                     <h4 class="title">Our Address:</h4>
                     <ul>
                        <li>KA-62/1, Travel Agency, 45 Grand Central Terminal, New York.</li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!--/ End Contact -->

<!-- Map Section -->
<div class="map-section">
   <!--<div id="myMap">-->
   <div>
      <iframe
         src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.2104192739243!2d110.24942745052437!3d-7.552019894526825!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a89f90d65696f%3A0xf4fe10b40ae72e2!2sFuturisticstore!5e0!3m2!1sen!2sid!4v1662697284250!5m2!1sen!2sid"
         width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
   </div>
</div>
<!--/ End Map Section -->

<!-- Start Shop Newsletter  -->
<section class="shop-newsletter section">
   <div class="container">
      <div class="inner-top">
         <div class="row">
            <div class="col-lg-8 offset-lg-2 col-12">
               <!-- Start Newsletter Inner -->
               <div class="inner">
                  <h4>Newsletter</h4>
                  <p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>
                  <form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
                     <input name="EMAIL" placeholder="Your email address" required="" type="email">
                     <button class="btn">Subscribe</button>
                  </form>
               </div>
               <!-- End Newsletter Inner -->
            </div>
         </div>
      </div>
   </div>
</section>

<!-- End Shop Newsletter -->

<!-- gmaps -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnhgNBg6jrSuqhTeKKEFDWI0_5fZLx0vM" width="600" height="450" style="border:0;"
   allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></script>
<script src="<?= base_url('assets/eshop/js/gmap.min.js'); ?>"></script>
<script src="<?= base_url('assets/eshop/js/map-script.js'); ?>"></script>