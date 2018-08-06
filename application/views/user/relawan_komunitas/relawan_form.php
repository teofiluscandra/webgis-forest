
    <body>
        <h2 style="margin-top:0px">Relawan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Koordinator <?php echo form_error('id_koordinator') ?></label>
            <input type="text" class="form-control" name="id_koordinator" id="id_koordinator" placeholder="Id Koordinator" value="<?php echo $id_koordinator; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Username <?php echo form_error('username') ?></label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Password <?php echo form_error('password') ?></label>
            <input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
        </div>
	    <input type="hidden" name="id_relawan" value="<?php echo $id_relawan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('relawan_komunitas') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>