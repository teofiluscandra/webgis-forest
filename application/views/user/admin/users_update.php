
    <body>
        <h2 style="margin-top:0px">Update Admin</h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Username <?php echo form_error('username') ?></label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" readonly=""  value="<?php echo $username; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Lengkap <?php echo form_error('nama_lengkap') ?></label>
            <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $nama_lengkap; ?>" />
        </div>
	   
	    <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" /> 
        <input type="hidden" name="level" value='1' /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('user/admin') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
