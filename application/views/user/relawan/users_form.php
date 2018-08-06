<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    </head>
    <body >
        <h2 style="margin-top:0px">Tambah Koordinator</h2>
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
            <div class="form-group">
                <label for="varchar">Nomor KTP<?php echo form_error('nomor_ktp') ?></label>
                <input type="number" class="form-control" name="nomor_ktp" id="nomor_ktp" placeholder="Nomor KTP" value="<?php echo $nomor_ktp; ?>" required/>
            </div>
            <div class="form-group">
                <label for="varchar">Nomer Telepon<?php echo form_error('nomor_telp') ?></label>
                <input type="number" class="form-control" name="nomor_telp" id="nomor_telp" placeholder="Nomor Telepon" value="<?php echo $nomor_telp; ?>" required/>
            </div>
            <div class="form-group">
                <label for="varchar">Email<?php echo form_error('email') ?></label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" required/>
            </div>
	    <div class="form-group">
                <input type="hidden" class="form-control" name="level" id="level" placeholder="level" value='2' />
            </div>
	    <div class="form-group">
                <input type="hidden" class="form-control" name="tanggal_expired" id="tanggal_expired" placeholder="tanggal_expired" value="<?php echo $NewDate = Date('y:m:d', strtotime("+7 days")); ?>" />
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" name="isAlready" id="isAlready" placeholder="isAlready" value='0' />
            </div>
	    <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" /> 
	    <button type="submit" class="btn btn-primary">Save</button> 
	    <a href="<?php echo site_url('user/relawan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>