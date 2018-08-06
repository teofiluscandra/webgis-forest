
    <body>
        <h2 style="margin-top:0px">Detail_penanaman <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
                <label for="int">id_penanaman <?php echo form_error('id_penanaman') ?></label>
                <input type="text" class="form-control" name="id_penanaman" id="id_penanaman" placeholder="id_penanaman" value="<?php echo $id_penanaman; ?>" />
            </div>
	    <div class="form-group">
                <label for="int">lat <?php echo form_error('lat') ?></label>
                <input type="text" class="form-control" name="lat" id="lat" placeholder="lat" value="<?php echo $lat; ?>" />
            </div>
	    <div class="form-group">
                <label for="int">lon <?php echo form_error('lon') ?></label>
                <input type="text" class="form-control" name="lon" id="lon" placeholder="lon" value="<?php echo $lon; ?>" />
            </div>
	    <input type="hidden" name="id_detail" value="<?php echo $id_detail; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('detail_penanaman') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>