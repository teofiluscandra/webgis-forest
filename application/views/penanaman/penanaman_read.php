    </head>
    <body>
        <h2 style="margin-top:0px">Penanaman Read</h2>
        <table class="table">
	    <tr><td>Nama Penanam</td><td><?php echo $nama_komunitas; ?></td></tr>
	    <tr><td>Tanggal Tanam</td><td><?php echo $tgl_tanam; ?></td></tr>
	    <tr><td>Nama Koordinator</td><td><?php echo $nama_lengkap; ?></td></tr>
	    <tr><td>Nama Pohon</td><td><?php echo $nama_pohon; ?></td></tr>
	    <tr><td>Jenis Pohon</td><td><?php echo $jenis_pohon; ?></td></tr>
	    <tr><td>Nama Petak</td><td><?php echo $nama_petak; ?></td></tr>
	    <tr><td>Status</td><td><?php if ($status == 0){
                echo "Belum Diinput";
            } 
            elseif ($status == 1) {
                echo "Belum Terkonfirmasi";
            } elseif ($status == 2) {
                echo "Terkonfirmasi";
            } elseif ($status == 3) {
                echo "Reject";
            }?></td></tr>
	    <tr><td>Jumlah</td><td><?php echo $jumlah; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('penanaman_baru') ?>" class="btn btn-default">Cancel</button></td></tr>
	</table>
    </body>
</html>