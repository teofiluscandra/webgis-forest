<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    </head>
    <body>
        <h2 style="margin-top:0px">Pohon Read</h2>
        <table class="table">
	    <tr><td>nama_pohon</td><td><?php echo $nama_pohon; ?></td></tr>
	    <tr><td>jenis_pohon</td><td><?php echo $jenis_pohon; ?></td></tr>
	    <tr><td>nama_gambar</td><td><?=img($nama_gambar)?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pohon') ?>" class="btn btn-default">Cancel</button></td></tr>
	</table>
    </body>
</html>