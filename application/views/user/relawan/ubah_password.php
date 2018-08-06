
    <body>
        <h2 style="margin-top:0px">Ubah Password</h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Password Lama <?php echo form_error('password_lama') ?></label>
            <input type="password" class="form-control" name="password_lama" id="password_lama" placeholder="Password Lama" value="" />
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
        <input type="hidden" name="level" value='1' /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('user/dasbor_relawan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
