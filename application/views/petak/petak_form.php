 <body>
        <title>Update Petak</title>
        <h2 style="margin-top:0px">Update Petak</h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
                <label for="varchar">Nama Petak <?php echo form_error('nama_petak') ?></label>
                <input type="text" class="form-control" name="nama_petak" id="nama_petak" placeholder="Nama Petak" value="<?php echo $nama_petak; ?>" />
            </div>
	    <div class="form-group">
                <label for="double">Luas Petak (ha) <?php echo form_error('luas_petak') ?></label>
                <input type="text" class="form-control" name="luas_petak" id="luas_petak" placeholder="Luas Petak" value="<?php echo $luas_petak; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">Deskripsi <?php echo form_error('deskripsi') ?></label>
                <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi" value="<?php echo $deskripsi; ?>" />
            </div>
	    <input type="hidden" name="id_petak" value="<?php echo $id_petak; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('petak') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>