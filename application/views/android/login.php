
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <!-- CORE CSS-->
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">

<style type="text/css">
html,
body {
    height: 100%;
}
html {
    display: table;
    margin: auto;
}
body {
    display: table-cell;
    vertical-align: middle;
}
.margin {
  margin: 0 !important;
}
</style>
  
</head>

<body class="red">


  <div id="login-page" class="row">
    <div class="col s12 z-depth-6 card-panel">
      <form class="login-form" action="<?php echo base_url('android')?>" method="post">
        <div class="row">
          <div class="input-field col s12 center">
            <img src="<?php echo base_url(); ?>assets/logo/logo.png" alt="" class="responsive-img valign profile-image-login">
            <p class="center login-form-text">Login Form Relawan</p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input class="validate" name="username" id="username" type="text">
            <label for="username" data-error="wrong" data-success="right" class="center-align">Username</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password" name="password" type="password">
            <label for="password">Password</label>
          </div>
        </div>
         <br>
  <?php
 //cetak session
  if ($this->session->flashdata('sukses')) {
    echo '<p class="warning">'.$this->session->flashdata('sukses').'</p>';
  }
  echo validation_errors('<p>','</p>')
 ?>
  <br>
        <div class="row">
          <div class="input-field col s12">
           <input type="submit" name="submit" id="submit" class="btn btn-info" value="Login">
          </div>
        </div>
          <!-- <div class="input-field col s6 m6 l6">
              <p class="margin right-align medium-small"><a href="forgot-password.html">Forgot password?</a></p>
          </div> -->          
        </div>

      </form>
    </div>
  </div>

  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
 <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <!--materialize js-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>


   <footer class="page-footer">
          <div class="footer-copyright">
            <div class="container">
            © 2015 laskarhijau.org
            <a class="grey-text text-lighten-4 right" href="http://laskarhijau.org">Teofilus Candra</a>
            </div>
          </div>
  </footer>
</body>

</html>