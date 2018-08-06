    <body>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Daftar Petak</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
		<?php echo anchor(site_url('petak/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
            <th>No</th>
		    <th>Nama Petak</th>
		    <th>Luas Petak</th>
		    <th>Deskripsi</th>
		    <th>Aksi</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($petak_data as $petak)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $petak->nama_petak ?></td>
		    <td><?php echo $petak->luas_petak ?></td>
		
		    <td><?php echo $petak->deskripsi ?></td>
		    <td style="text-align:center">
			<?php 
			echo anchor(site_url('petak/update/'.$petak->id_petak),'Update','class="btn btn-sm btn-warning"');  
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </body>
</html>