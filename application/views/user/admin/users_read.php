<!doctype html>
<html>
    <head>
        <title>Managemen Admin</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px"><?php echo $username; ?></h2>
        <table class="table">
	    <tr><td>username</td><td><?php echo $username; ?></td></tr>
	    <tr><td>nama_lengkap</td><td><?php echo $nama_lengkap; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('user/admin') ?>" class="btn btn-default">Cancel</button></td></tr>
	</table>
    </body>
</html>