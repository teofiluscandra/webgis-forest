
    <body>
        <h2 style="margin-top:0px">Ubah Password <?php echo $username ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Username <?php echo form_error('username') ?></label>
            <input type="text" class="form-control" name="username" id="username" disabled="disabled" placeholder="Username" value="<?php echo $username; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Lengkap <?php echo form_error('nama_lengkap') ?></label>
            <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" disabled="disabled" placeholder="Nama Lengkap" value="<?php echo $nama_lengkap; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Password Baru<?php echo form_error('password') ?></label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="" required/>
        </div>
        <div class="form-group">
        <label for="varchar">Ulangi Password Baru</label>
        <input name="password_confirm" class="form-control" required="required" type="password" id="password_confirm" oninput="check(this)" />
        </div>
        
        <script language='javascript' type='text/javascript'>
            function check(input) {
                if (input.value != document.getElementById('password').value) {
                    input.setCustomValidity('Password Must be Matching.');
                } else {
                    // input is valid -- reset the error message
                    input.setCustomValidity('');
                }
            }
        </script>
	    <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" /> 
        <input type="hidden" name="level" value='1' /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('user/admin') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
