
    <body>
        <h2 style="margin-top:0px">Form Pendaftaran</h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Nama Komunitas <?php echo form_error('nama_komunitas') ?></label>
            <input type="text" class="form-control" name="nama_komunitas" id="nama_komunitas" placeholder="Nama Komunitas" value="<?php echo $nama_komunitas; ?>" />
        </div>
	    <div class="form-group">
            <label for="gambaran_komunitas">Gambaran Komunitas <?php echo form_error('gambaran_komunitas') ?></label>
            <textarea class="form-control" rows="3" name="gambaran_komunitas" id="gambaran_komunitas" placeholder="Gambaran Komunitas"><?php echo $gambaran_komunitas; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="int">No Telp <?php echo form_error('no_telp') ?></label>
            <input type="number" class="form-control" name="no_telp" id="no_telp" placeholder="No Telp" value="<?php echo $no_telp; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
	    <div class="form-group">
            <label for="alamat">Alamat <?php echo form_error('alamat') ?></label>
            <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
        </div>
        <div class="form-group">
            <label for="int">Website <?php echo form_error('website') ?></label>
            <input type="text" class="form-control" name="website" id="website" placeholder="Website/Blog" value="<?php echo $website; ?>" />
        </div>
	    <input type="hidden" name="id_pendaftaran" value="<?php echo $id_pendaftaran; ?>" /> 
         <input type="hidden" name="tanggal" value="<?php echo date('Y-m-d') ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pendaftaran') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>