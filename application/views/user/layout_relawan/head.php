<?php

// Proteksi halaman

$this->simple_login->cek_login_relawan();

?>

<!doctype html>



<!DOCTYPE html>

<html>

  <head>

    <meta charset="UTF-8">

    <title><?php echo $title; ?></title>

    <link rel="icon" href=<?php echo base_url(); ?>assets/logo/logo.png type="image/x-icon">

    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- Bootstrap 3.3.2 -->

    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- Font Awesome Icons -->

    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <!-- DATA TABLES -->

    <link href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>" rel="stylesheet" type="text/css" />

    <!-- Theme style -->

    <link href="<?php echo base_url(); ?>assets/adminlte/AdminLTE.min.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url(); ?>assets/adminlte/sweetalert.css" rel="stylesheet" type="text/css" />

    <!-- AdminLTE Skins. Choose a skin from the css/skins 

         folder instead of downloading all of them to reduce the load. -->

    <link href="<?php echo base_url(); ?>assets/adminlte/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>

    <![endif]-->

    

    <!-- jQuery 2.1.3 -->

    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>

    <!-- Bootstrap 3.3.2 JS -->

    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!-- SlimScroll 1.3.0 -->

    <script src="<?php echo base_url(); ?>assets/js/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>    

    <!-- FastClick -->

    <script src='<?php echo base_url(); ?>assets/js/fastclick/fastclick.min.js'></script>

    <!-- AdminLTE App -->

    <script src="<?php echo base_url(); ?>assets/js/app.min.js" type="text/javascript"></script>

    

  </head>