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
    <link href=<?php echo base_url(); ?>assets/css/custom-min.css rel="stylesheet">
    <link href=<?php echo base_url(); ?>assets/css/materialize.css type="text/css" rel="stylesheet" >
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
   
</head>
<style>
    html {
    font-family: GillSans, Roboto, Trebuchet, sans-serif;
  }
</style>
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

  <div class="container">

        <div class="row">
      <div class="col s12 m5">
        <div class="card-panel teal">
          <span class="white-text">
          <p>Nama Komunitas : <?php echo $nama_penanam; ?></p>
        <p>Tanggal Tanam : <?php echo $tgl_tanam; ?></p>
        <p>Nama Koordinator : <?php echo $nama_lengkap; ?></p>
        <p>Nama Pohon : <?php echo $nama_pohon; ?></p>
        <p>Nama Petak : <?php echo $nama_petak; ?></p>
        <p>Jumlah : <?php echo $jumlah; ?></p> 
        <span> Jumlah Saat Ini : </span><span id="jml"><?php echo $jumlahinput; ?></span>
          </span>
        </div>
      </div>
    </div>
        <form action="<?php echo $action; ?>" method="post">
        <input type="hidden" name="id_penanaman" value="<?php echo $id_penanaman ?>" /> 
        <input type="hidden" id="jmlinput" name="jumlahinput" value="<?php echo $jumlahinput; ?>" /> 
        <input type="hidden" id="i" name="i" value="" /> 
        <div class="col-md-6">
        <h5 style="margin-top:0px">Input Koordinat Lokasi</h5>
         <div class="form-group">
         <button class="btn waves-effect waves-light" id="addScnt"><i class="material-icons right">add</i>Add Location</button>
         <div class="row">
       <div id="p_scents">  
        <script type="text/javascript">
        var scntDiv = $('#p_scents');
        $(function() {
        var scntDiv = $('#p_scents');
        var i = $('#p_scents p').size();
        var batas = <?php echo $jumlah - $jumlahinput ?>;
        if (i == 0) {
             document.getElementById("save").disabled = true;
        };
        if (batas == 0) {document.getElementById("addScnt").disabled = true;};
        console.log(batas);
        $('body').on('click','#addScnt', function() {
                $('<p><label for="latitude"><label>Latitude : </label><input type="number" step="any" class="latitude" size="30" name="latitude[]" id="disabled" value="" placeholder="Input Latitude" required readonly/></label><label>Longitude : </label> <label for="longitude"><input type="number" step="any" class="longitude" size="30" name="longitude[]" value="" placeholder="Input Longitude" id="disabled" required readonly /></label><label>Akurasi (Meter) : </label><label for="accuracy"><input type="number" step="any" class="accuracy" size="10" value="" placeholder="Akurasi Dalam Meter" id="disabled" required readonly /></label><button class="btn waves-effect waves-light" id="remScnt"><i class="material-icons right">delete</i>Remove</button> <button class="btn waves-effect waves-light showlocation"><i class="material-icons right">my_location</i>Show</button></p>').appendTo(scntDiv);
                i++;
                document.getElementById("jml").innerHTML = i + <?php echo $jumlahinput ?>;
                document.getElementById("jmlinput").value = i + <?php echo $jumlahinput ?>;
                document.getElementById("i").value = i;
                console.log(document.getElementById("i").value);
                 document.getElementById("save").disabled = false;
                console.log(i);
                 if (batas==i) {
                    document.getElementById("addScnt").disabled = true;
                };
                return false;
        });
        
        $('body').on('click','#remScnt', function() { 
                if( i > 0 ) {
                        $(this).parents('p').remove();
                        document.getElementById("addScnt").disabled = false;
                        i--;
                        document.getElementById("jml").innerHTML = i + <?php echo $jumlahinput ?>;
                        document.getElementById("jmlinput").value = i + <?php echo $jumlahinput ?>;
                        document.getElementById("i").value = i;
                        if (i == 0) {document.getElementById("save").disabled = true;};
                }
                return false;
        });

        $('body').on('click','.showlocation', function() { 
                if( i > 0 ) {
                        if (navigator.geolocation) {
                var showLocation = this;
                navigator.geolocation.getCurrentPosition(function(position){

                $(showLocation).closest('p').find('.latitude').val(position.coords.latitude);
                $(showLocation).closest('p').find('.longitude').val(position.coords.longitude);
                $(showLocation).closest('p').find('.accuracy').val(position.coords.accuracy);
                // document.getElementById('latitude[]').value = position.coords.latitude;
                // document.getElementById('longitude[]').value = position.coords.longitude;
                //document.getElementById('akurasi').innerHTML = position.coords.accuracy;
        },function error(msg){alert('Please enable your GPS position future.');  
        }, {maximumAge:600000, timeout:5000, enableHighAccuracy: true});
        }else {
            alert("Geolocation API is not supported in your browser.");
        }
                }
                return false;
        });
});
        </script>

        </div>
        </div>

         </div>
        <?php if ($jumlahinput == $jumlah) { ?>
         <input type="hidden" name="status" value='1' />  
       <?php } else { ?>
        <input type="hidden" name="status" value='0' />  
       <?php } ?>
         
        <input type="hidden" name="status_pohon" value='1' />
        <div class="row">
        <button  id="save" class="btn waves-effect waves-light col s6" type="submit">Submit
    <i class="material-icons right">send</i>
  </button>  
        <a href="<?php echo site_url('android/home') ?>" class="btn waves-effect waves-light col s6"><i class="material-icons right">error_outline</i>Cancel</a>    
        </div>
        
        </div>
        </form>
        </div>   

       </div>
        
        <script src="<?php echo base_url(); ?>assets/js/plugin-min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/custom-min.js"></script>
     <script src=<?php echo base_url(); ?>assets/js/jquery-2.1.1.min.js></script>
    <script src=<?php echo base_url(); ?>assets/js/init.js></script>

    </body>
</html>
