            <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Daftar Koordinator</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
        <?php echo anchor(site_url('user/relawan/create'), 'Tambah Koordinator', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('user/relawan/excel'), 'Excel', 'class="btn btn-success"'); ?>
		<?php echo anchor(site_url('user/relawan/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
            <th>No</th>
		    <th>Username</th>
		    <th>Nama Lengkap</th>
            <th>Terdaftar</th>
            <th>Tanggal Expired</th>
            <th>Nomor KTP</th>
            <th>Nomor Telp</th>
            <th>Email</th>
		    <th>Aksi</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($relawan_data as $relawan)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $relawan->username ?></td>
		    <td><?php echo $relawan->nama_lengkap ?></td>
            <td><?php $status = $relawan->isAlready;
                if ($status == 0) { ?>
                    <span class="label label-warning">Belum Terdaftar</span>
                <?php }
                elseif ($status == 1) { ?>
                    <span class="label label-success">Sudah Terdaftar</span>
                <?php }
                    
             ?></td>
             <td><?php $newDateString = date_format(date_create_from_format('Y-m-d', $relawan->tanggal_expired), 'd-m-Y');
             if ($relawan->tanggal_expired > Date('Y-m-d')) { ?>
                 <span class="label label-success"><?php echo $newDateString ?></span>
             <?php } elseif ($relawan->tanggal_expired == Date('Y-m-d')) { ?>
                 <span class="label label-warning"><?php echo $newDateString ?></span>
             <?php } elseif ($relawan->tanggal_expired < Date('Y-m-d')) { ?>
                 <span class="label label-danger"><?php echo $newDateString ?></span>
             <?php }
              ?></td>
             <td><?php echo $relawan->nomor_ktp ?></td>
             <td><?php echo $relawan->nomor_telp ?></td>
             <td><?php echo $relawan->email ?></td>
		    <td  style="text-align:center" width="300px">
			<?php 
			echo anchor(site_url('user/relawan/read/'.$relawan->id_user),'Read','class="btn btn-sm btn-success"'); 
            echo " ";
            echo anchor(site_url('user/relawan/UbahPassword/'.$relawan->id_user),'Password','class="btn btn-sm btn-info"'); 
            echo " ";
			echo anchor(site_url('user/relawan/update/'.$relawan->id_user),'Update','class="btn btn-sm btn-warning"'); 
            echo " ";
			echo anchor(site_url('user/relawan/delete/'.$relawan->id_user),'Delete','class="btn btn-sm btn-danger" onclick="return confirm(\'Apakah anda yakin?\')"'); 
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
