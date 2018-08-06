    <body>
       <div class="container">
        <div class="row">
        <form action="<?php echo $action; ?>" method="post">
        <div class="col-md-6">
         <h2 style="margin-top:0px">Data Penanaman</h2>
         <table class="table">
        <tr><td>Nama Komunitas</td><td><?php echo $nama_penanam; ?></td></tr>
        <tr><td>Tanggal Tanam</td><td><?php echo $tgl_tanam; ?></td></tr>
        <tr><td>Nama Koordinator</td><td><?php echo $nama_lengkap; ?></td></tr>
        <tr><td>Nama Pohon</td><td><?php echo $nama_pohon; ?></td></tr>
        <tr><td>Nama Petak</td><td><?php echo $nama_petak; ?></td></tr>
        <tr><td>Jumlah</td><td><?php echo $jumlah; ?></td></tr>
        <tr><td>Jumlah Saat Ini</td><td id="jml"><?php echo $jumlahinput; ?></td></tr>
        
        </table>   
        </div>
        <input type="hidden" name="id_penanaman" value="<?php echo $id_penanaman ?>" /> 
        <input type="hidden" id="jmlinput" name="jumlahinput" value="<?php echo $jumlahinput; ?>" /> 
        <input type="hidden" id="i" name="i" value="" /> 
        <div class="col-md-6">
        <h2 style="margin-top:0px">Input Koordinat Lokasi</h2>
         <div class="form-group">
         <button class="btn btn-primary" id="addScnt">Add Location</button>
         <br>
          <div id="p_scents">
        <script type="text/javascript">
        var scntDiv = $('#p_scents');
        $(function() {
        var scntDiv = $('#p_scents');
        var i = $('#p_scents p').size();
        var batas = <?php echo $jumlah - $jumlahinput ?>;
        if (batas <= 0) {batas == 0};
        if (i == 0) {
             document.getElementById("save").disabled = true;
        };
        if (batas <= 0) {document.getElementById("addScnt").disabled = true;};
        console.log(batas);
        $('body').on('click','#addScnt', function() {
                $('<p><label for="latitude"><input type="number" step="any" class="form-control" id="latitude[]" size="30" name="latitude[]" value="" placeholder="Input Latitude" max="-7.980" min="-8.016" required/></label> <label for="longitude"><input type="number" step="any" id="longitude[]" class="form-control" size="30" name="longitude[]" max="113.358" min="113.305" value="" placeholder="Input Longitude"  required/></label> <a href="#" id="remScnt">Remove</a></p>').appendTo(scntDiv);
                i++;
                document.getElementById("jml").innerHTML = i + <?php echo $jumlahinput ?>;
                document.getElementById("jmlinput").value = i + <?php echo $jumlahinput ?>;
                document.getElementById("i").value = i;
                console.log(document.getElementById("i").value);
                 document.getElementById("save").disabled = false;
                console.log(i);
                console.log(<?php echo $jumlahinput; ?>);
                 if (batas<=i) {
                    document.getElementById("addScnt").disabled = true;
                };
                return false;
        });
        
        $('body').on('click','#remScnt', function() { 
                if( i > 0 ) {
                        $(this).parents('p').remove();
                        document.getElementById("addScnt").disabled = false;
                        i--;
                        document.getElementById("jml").innerHTML = i + <?php echo $jumlahinput ?>;
                        document.getElementById("jmlinput").value = i + <?php echo $jumlahinput ?>;
                        document.getElementById("i").value = i;
                        if (i == 0) {document.getElementById("save").disabled = true;};
                }
                return false;
        });


});

        </script>
        </div>


         </div>
        
        <input type="hidden" name="jumlah" value='<?php echo $jumlah; ?>' />   
        <input type="hidden" name="status_pohon" value='1' />  
        <button id="save" type="submit" class="btn btn-primary">Save</button> 
        
        <a href="<?php echo $cancel; ?>" class="btn btn-default">Cancel</a>
        </div>
        </form>
        </div>   

       </div>
</html>