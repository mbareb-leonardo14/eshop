<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>FS | <?= $title; ?></title>

   <!-- Font Awesome -->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
   <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
   <!-- MDB -->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.4.0/mdb.min.css" rel="stylesheet" />

   <!-- Favico -->
   <link href="<?= base_url(''); ?>/assets/img/favicon.ico" rel="icon">

   <!-- CSS only -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="<?= base_url('template/plugins/fontawesome-free/css/all.min.css'); ?>">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
      integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous"
      referrerpolicy="no-referrer" />

   <!-- SweetAlert2 -->
   <link rel="stylesheet" href="<?= base_url('template'); ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
   <!-- Ionicons -->
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- Tempusdominus Bootstrap 4 -->
   <link rel="stylesheet" href="<?= base_url('template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); ?>">
   <!-- iCheck -->
   <link rel="stylesheet" href="<?= base_url('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
   <!-- JQVMap -->
   <link rel="stylesheet" href="<?= base_url('template/plugins/jqvmap/jqvmap.min.css'); ?>">
   <!-- Theme style -->
   <!-- DataTables -->
   <link rel="stylesheet" href="<?= base_url('template'); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" href="<?= base_url('template'); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
   <link rel="stylesheet" href="<?= base_url('template'); ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
   <link rel="stylesheet" href="<?= base_url('template/dist/css/adminlte.min.css'); ?>">
   <!-- overlayScrollbars -->
   <link rel="stylesheet" href="<?= base_url('template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>">
   <!-- Daterange picker -->
   <link rel="stylesheet" href="<?= base_url('template/plugins/daterangepicker/daterangepicker.css'); ?>">
   <!-- summernote -->
   <link rel="stylesheet" href="<?= base_url('template/plugins/summernote/summernote-bs4.min.css'); ?>">


   <!-- jQuery -->
   <script src="<?= base_url('template/plugins/jquery/jquery.min.js'); ?>"></script>
   <!-- jQuery UI 1.11.4 -->
   <script src="<?= base_url('template/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
   <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
   <script>
   $.widget.bridge('uibutton', $.ui.button)
   </script>
   <!-- Bootstrap 4 -->
   <script src="<?= base_url('template/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
   <!-- ChartJS -->
   <script src="<?= base_url('template/plugins/chart.js/Chart.min.js'); ?>"></script>
   <!-- Sparkline -->
   <script src="<?= base_url('template/plugins/sparklines/sparkline.js'); ?>"></script>
   <!-- JQVMap -->
   <script src="<?= base_url('template/plugins/jqvmap/jquery.vmap.min.js'); ?>"></script>
   <script src="<?= base_url('template/plugins/jqvmap/maps/jquery.vmap.usa.js'); ?>"></script>
   <!-- jQuery Knob Chart -->
   <script src="<?= base_url('template/plugins/jquery-knob/jquery.knob.min.js'); ?>"></script>
   <!-- daterangepicker -->
   <script src="<?= base_url('template/plugins/moment/moment.min.js'); ?>"></script>
   <script src="<?= base_url('template/plugins/daterangepicker/daterangepicker.js'); ?>"></script>
   <!-- Tempusdominus Bootstrap 4 -->
   <script src="<?= base_url('template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'); ?>">
   </script>
   <!-- Summernote -->
   <script src="<?= base_url('template/plugins/summernote/summernote-bs4.min.js'); ?>"></script>
   <!-- overlayScrollbars -->
   <script src="<?= base_url('template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'); ?>"></script>

   <!-- DataTables  & Plugins -->
   <script src="<?= base_url('template'); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
   <script src="<?= base_url('template'); ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
   <script src="<?= base_url('template'); ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
   <script src="<?= base_url('template'); ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
   <script src="<?= base_url('template'); ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
   <script src="<?= base_url('template'); ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
   <script src="<?= base_url('template'); ?>/plugins/jszip/jszip.min.js"></script>
   <script src="<?= base_url('template'); ?>/plugins/pdfmake/pdfmake.min.js"></script>
   <script src="<?= base_url('template'); ?>/plugins/pdfmake/vfs_fonts.js"></script>
   <script src="<?= base_url('template'); ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
   <script src="<?= base_url('template'); ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
   <script src="<?= base_url('template'); ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

   <!-- bs-custom-file-input -->
   <script src="<?= base_url('template'); ?>/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

   <!-- AdminLTE App -->
   <script src="<?= base_url('template/dist/js/adminlte.js'); ?>"></script>
   <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
   <script src="<?= base_url('template/dist/js/pages/dashboard.js"'); ?>"></script>

   <!-- SweetAlert2 -->
   <script src="<?= base_url('template/plugins/sweetalert2/sweetalert2.min.js'); ?>"></script>
   <!-- Toastr -->
   <script src="<?= base_url('template/plugins/toastr/toastr.min.js'); ?>"></script>

   <!-- Bootstrap 5 -->
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
      integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
   </script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
      integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
   </script>

   <!-- MDB -->
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.4.0/mdb.min.js"></script>

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