<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Halaman Login</title>
<link href="<?php echo base_url(); ?>assets/logo/logo.png" rel="shortcut icon">
<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/fontawesome.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/adminlte/AdminLTE.min.css" rel="stylesheet" type="text/css">
</head>  

  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="<?php echo base_url(); ?>"><b>GIS</b>LASKAR HIJAU</a>
        <img src="<?php echo base_url(); ?>assets/logo/logo.png" alt="" class="responsive-img valign profile-image-login">
      </div><!-- /.login-logo -->
      
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="<?php echo base_url('login')?>" method="post" accept-charset="utf-8">
          <div class="form-group has-feedback">
              <input type="text" name="username" 
                     class="form-control" placeholder="Username" autofocus="" value=""/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
              <input type="password" name="password" 
                     class="form-control" placeholder="Password" value=""/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
          <div class="col-xs-12">
                  <?php
 //cetak session
  if ($this->session->flashdata('sukses')) {
    echo '<p class="warning">'.$this->session->flashdata('sukses').'</p>';
  }
  echo validation_errors('<p>','</p>')
 ?>
              </div><!-- /.col -->
              <div class="col-xs-12">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
              </div><!-- /.col -->
          </div>
        </form>        
        <a href="<?php echo base_url(); ?>">Back to Home</a><br>
      </div><!-- /.login-box-body -->
      
    </div><!-- /.login-box -->
    
    </body>

         <script src="<?php echo base_url(); ?>assets/js/jquery.js" type="text/javascript"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url(); ?>assets/js/login.js" type="text/javascript"></script>
</html>