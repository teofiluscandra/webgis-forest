<?php
// Proteksi halaman
$this->login_android->cek_login_relawan();
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <meta name="theme-color" content="#2196F3">
    <title>Laskar Hijau</title>
    <link href="<?php echo base_url(); ?>assets/logo/logo.png" rel="shortcut icon">

    <!-- CSS  -->
      
        <link href=<?php echo base_url(); ?>assets/css/custom-min.css rel="stylesheet">
    <link href=<?php echo base_url(); ?>assets/css/materialize.css type="text/css" rel="stylesheet" >
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   
</head>
<body id="top" class="scrollspy">

<!-- Pre Loader -->
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
 
</div>

<!--Navigation-->
 <div class="navbar-fixed">
    <nav id="nav_f" class="default_color" role="navigation">
        <div class="container">
            <div class="nav-wrapper">
            <a href="#" class="navbar-brand">Laskar Hijau</a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="<?php echo base_url();?>android/bantuan">Bantuan</a></li>
                    <li><a href="<?php echo base_url();?>android/logout">Logout</a></li>
                </ul>

                <ul id="nav-mobile" class="side-nav">
                    <li><a href="<?php echo base_url();?>android/bantuan">Bantuan</a></li>
                    <li><a href="<?php echo base_url();?>android/logout">Logout</a></li>
                </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
            </div>
        </div>
    </nav>
</div>

<div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <h1 class="header center white-text">Ayo! Mulai Pemetaan</h1>
      <div class="row center">
        <h5 class="header col s12 light white-text">Pastikan Sinyalmu dalam keadaan stabil dan telah mengaktifkan GPS. Jika sinyal tidak memungkinkan, segera hubungi kami untuk mengirim GPS Manual :)</h5>
      </div>
      <div class="row center">
        <a href="<?php echo base_url('android/buat/'.$penanaman->id_penanaman) ?>" id="download-button" class="btn-large waves-effect waves-light green">Mulai</a>
      </div>
      <br><br>
    </div>
  </div>
<!--  Scripts-->
    <script>$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
    });</script>
    <script>$(document).ready(function(){
    $('.tooltipped').tooltip({delay: 50});
    });</script>
    <script>$(document).ready(function() {
    $('select').material_select();
    });</script>

    
   
          <script src="<?php echo base_url(); ?>assets/js/plugin-min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/custom-min.js"></script>
     <script src=<?php echo base_url(); ?>assets/js/jquery-2.1.1.min.js></script>
    <script src=<?php echo base_url(); ?>assets/js/init.js></script>

    </body>
</html>
