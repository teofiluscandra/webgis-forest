
    <body>
        <h2 style="margin-top:0px">Profil Komunitas <?php echo $nama_komunitas; ?></h2>
        <table class="table">
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Nama Komunitas</td><td><?php echo $nama_komunitas; ?></td></tr>
	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
	    <tr><td>Gambaran Komunitas</td><td><?php echo $gambaran_komunitas; ?></td></tr>
	    <tr><td>No Telp</td><td><?php echo $no_telp; ?></td></tr>
	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
        <tr><td>Website</td><td><?php echo $website; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pendaftaran') ?>" class="btn btn-sm btn-info">Back</a></td></tr>
	</table>
        </body>
</html>