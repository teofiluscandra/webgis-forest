<!doctype html>
<html>
    <head>
        <title>Managemen relawan</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    </head>
    <body>
        <h2 style="margin-top:0px"><?php echo $nama_lengkap; ?></h2>
        <table class="table">

	    <tr><td>Username</td><td><?php echo $username; ?></td></tr>
        <tr><td>Nomor KTP</td><td><?php echo $nomor_ktp; ?></td></tr>
	    <tr><td>Nama Lengkap</td><td><?php echo $nama_lengkap; ?></td></tr>
        <tr><td>Tanggal Expired</td><td><?php echo $tanggal_expired; ?></td></tr>
        <tr><td>Nomor Telepon</td><td><?php echo $nomor_telp; ?></td></tr>
        <tr><td>Email</td><td><?php echo $email; ?></td></tr>
        <tr><td>Terdaftar Sebagai Koordinator</td><td><?php 
                if ($isAlready == 0) {
                    echo "Belum Terdaftar";
                }
                elseif ($isAlready == 1) {
                    echo "Sudah Terdaftar";
                }
                    
             ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('user/relawan') ?>" class="btn btn-sm btn-info">Back</button></td></tr>
	</table>
    </body>
</html>