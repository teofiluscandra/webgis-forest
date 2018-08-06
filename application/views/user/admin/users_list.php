        <div class="row" style="margin-bottom: 0px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Daftar Admin</h2>
            </div>
            <div class="col-md-4 text-center alert" align="center">
                <div style="margin-top: 4px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('user/admin/create'), ' Tambah Admin', 'class="btn btn-primary fa fa-plus"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
            <th>No</th>
		    <th>Username</th>
		    <th>Nama Lengkap</th>
		    <th>Aksi</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($admin_data as $admin)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $admin->username ?></td>
		    <td><?php echo $admin->nama_lengkap ?></td>
		    <td style="text-align:center">
			<?php 
            echo anchor(site_url('user/admin/UbahPassword/'.$admin->id_user),'Ubah Password','class="btn btn-sm btn-info"'); 
            echo " ";
            echo anchor(site_url('user/admin/update/'.$admin->id_user),'Update','class="btn btn-sm btn-warning"'); 
            echo " ";
            echo anchor(site_url('user/admin/delete/'.$admin->id_user),'Delete','class="btn btn-sm btn-danger" onclick="return confirm(\'Anda Yakin Menghapus Admin?\')"'); 
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

        

