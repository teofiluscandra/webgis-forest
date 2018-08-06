
  
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Penanaman Relawan</h2>

            </div>
            
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                 <?php 
                 if ($penanaman->status == 0 && $penanaman->jumlahinput != 0) {
                   echo anchor(site_url('relawan_komunitas/confirm/'.$penanaman->id_penanaman),'Konfirmasi','class="confirmbtn btn btn-sm btn-success" onclick="return confirm(\'Konfirmasi Penanaman?\')"');  
                 }
            
      ?>
	    </div>
        </div>
        <h4 style="margin-top:0px">Jangkauan Latitude : -8.016 s/d -7.980 </h4>
            <h4 style="margin-top:0px">Jangkauan Longitude: 113.305 s/d 113.350</h4>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Username</th>
        <th>Latitude</th>
        <th>Longitude</th>
		    
		    <th>Aksi</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($relawan_komunitas_data as $relawan_komunitas)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $relawan_komunitas->username ?></td>
        <td><?php echo $relawan_komunitas->lat ?></td>
        <td><?php echo $relawan_komunitas->lon ?></td>
		    <td style="text-align:center" width="200px">
			<?php 
       if ($penanaman->status == 0) {
        echo anchor(site_url('detail_penanaman/delete/'.$relawan_komunitas->id_detail),'Delete','class="deletebtn btn btn-sm btn-danger" onclick="return confirm(\'Yakin akan dihapus?\')"');  
       } else {
        echo anchor(site_url('detail_penanaman/delete/'.$relawan_komunitas->id_user),'Delete','class="deletebtn btn btn-sm btn-danger" disabled onclick="return confirm(\'Menghapus Relawan, otomatis akan menghapus semua data penanaman\')"');    
       }
            
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
        <script type="text/javascript">
            $('.confirmbtn').on('click',function() {
            $(this).prop("disabled",true);
            });
        </script>
