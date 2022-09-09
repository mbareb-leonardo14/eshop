<!DOCTYPE html>
<html lang="en">

<head>

   <!-- Meta Tag -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name='copyright' content=''>
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <title>FS | <?= $title; ?></title>

   <!-- Font Awesome -->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
   <!-- Google Fonts -->
   <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet">

   <!-- CSS only -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

   <!-- Bootstrap -->
   <link rel="stylesheet" href="<?= base_url('assets/eshop/css/bootstrap.css'); ?>">
   <!-- Magnific Popup -->
   <link rel="stylesheet" href="<?= base_url('assets/eshop/css/magnific-popup.min.css'); ?>">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="<?= base_url('assets/eshop/css/font-awesome.css'); ?>">
   <!-- Fancybox -->
   <link rel="stylesheet" href="<?= base_url('assets/eshop/css/jquery.fancybox.min.css'); ?>">
   <!-- Themify Icons -->
   <link rel="stylesheet" href="<?= base_url('assets/eshop/css/themify-icons.css'); ?>">
   <!-- Nice Select CSS -->
   <link rel="stylesheet" href="<?= base_url('assets/eshop/css/niceselect.css'); ?>">
   <!-- Animate CSS -->
   <link rel="stylesheet" href="<?= base_url('assets/eshop/css/animate.css'); ?>">
   <!-- Flex Slider CSS -->
   <link rel="stylesheet" href="<?= base_url('assets/eshop/css/flex-slider.min.css'); ?>">
   <!-- Owl Carousel -->
   <link rel="stylesheet" href="<?= base_url('assets/eshop/css/owl-carousel.css'); ?>">
   <!-- Slicknav -->
   <link rel="stylesheet" href="<?= base_url('assets/eshop/css/slicknav.min.css'); ?>">

   <!-- Favico -->
   <link href="<?= base_url(''); ?>/assets/img/favicon.ico" rel="icon">

   <!-- Eshop StyleSheet -->
   <link rel="stylesheet" href="<?= base_url('assets/eshop/css/reset.css'); ?>">
   <link rel="stylesheet" href="<?= base_url('assets/eshop/style.css'); ?>">
   <link rel="stylesheet" href="<?= base_url('assets/eshop/css/responsive.css'); ?>">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="<?= base_url('template/plugins/fontawesome-free/css/all.min.css'); ?>">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
      integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous"
      referrerpolicy="no-referrer" />


   <!-- Jquery -->
   <script src="<?= base_url('assets/eshop/js/jquery.min.js'); ?>"></script>
   <script src="<?= base_url('assets/eshop/js/jquery-migrate-3.0.0.js'); ?>"></script>
   <script src="<?= base_url('assets/eshop/js/jquery-ui.min.js'); ?>"></script>
   <!-- Popper JS -->
   <script src="<?= base_url('assets/eshop/js/popper.min.js'); ?>"></script>
   <!-- Bootstrap JS -->
   <script src="<?= base_url('assets/eshop/js/bootstrap.min.js'); ?>"></script>
   <!-- Color JS -->
   <script src="<?= base_url('assets/eshop/js/colors.j'); ?>s"></script>
   <!-- Slicknav JS -->
   <script src="<?= base_url('assets/eshop/js/slicknav.min.js'); ?>"></script>
   <!-- Owl Carousel JS -->
   <script src="<?= base_url('assets/eshop/js/owl-carousel.js'); ?>"></script>
   <!-- Magnific Popup JS -->
   <script src="<?= base_url('assets/eshop/js/magnific-popup.js'); ?>"></script>
   <!-- Waypoints JS -->
   <script src="<?= base_url('assets/eshop/js/waypoints.min.js'); ?>"></script>
   <!-- Countdown JS -->
   <script src="<?= base_url('assets/eshop/js/finalcountdown.min.js'); ?>"></script>
   <!-- Nice Select JS -->
   <script src="<?= base_url('assets/eshop/js/nicesellect.js'); ?>"></script>
   <!-- Flex Slider JS -->
   <script src="<?= base_url('assets/eshop/js/flex-slider.js'); ?>"></script>
   <!-- ScrollUp JS -->
   <script src="<?= base_url('assets/eshop/js/scrollup.js'); ?>"></script>
   <!-- Onepage Nav JS -->
   <script src="<?= base_url('assets/eshop/js/onepage-nav.min.js'); ?>"></script>
   <!-- Easing JS -->
   <script src="<?= base_url('assets/eshop/js/easing.js'); ?>"></script>
   <!-- Active JS -->
   <script src="<?= base_url('assets/eshop/js/active.js'); ?>"></script>

   <!-- Bootstrap 5 -->
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
      integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
   </script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
      integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
   </script>
   <!-- untuk detail gambar kali diklik sesuai sama gambarnya -->
   <script>
   $(document).ready(function() {
      $('.product-image-thumb').on('click', function() {
         var $image_element = $(this).find('img')
         $('.product-image').prop('src', $image_element.attr('src'))
         $('.product-image-thumb.active').removeClass('active')
         $(this).addClass('active')
      })
   })
   </script>

   <script>
   window.setTimeout(function() {
      $(".alert").fadeTo(300, 0).slideUp(300, function() {
         $($this).remove();
      });
   }, 2000)
   </script>

</head>