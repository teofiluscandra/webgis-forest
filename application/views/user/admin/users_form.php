<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    </head>
    <body>
        <h2 style="margin-top:0px"><?php echo $button ?></h2>
        
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
                <label for="varchar">Username <?php echo form_error('username') ?></label>
                <input type="text" class="form-control" name="username" size="70" id="username" placeholder="Masukkan Username" value="<?php echo $username; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Nama Lengkap<?php echo form_error('nama_lengkap') ?></label>
                <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $nama_lengkap; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">Password <?php echo form_error('password') ?></label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
            </div>
	    <div class="form-group">
                <input type="hidden" class="form-control" name="level" id="level" placeholder="level" value='1' />
            </div>
	    <div class="form-group">
                <input type="hidden" class="form-control" name="tanggal_expired" id="tanggal_expired" placeholder="tanggal_expired" value='0000-00-00' />
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" name="isAlready" id="isAlready" placeholder="isAlready" value='0' />
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
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('user/admin') ?>" class="btn btn-default">Cancel</a>
	</form>

    </body>
</html>