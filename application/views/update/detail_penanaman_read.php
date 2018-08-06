<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Detail_penanaman Read</h2>
        <table class="table">
	    <tr><td>id_penanaman</td><td><?php echo $id_penanaman; ?></td></tr>
	    <tr><td>lat</td><td><?php echo $lat; ?></td></tr>
	    <tr><td>lon</td><td><?php echo $lon; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('detail_penanaman') ?>" class="btn btn-default">Cancel</button></td></tr>
	</table>
    </body>
</html>