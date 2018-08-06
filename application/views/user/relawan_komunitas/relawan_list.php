  
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Daftar Relawan</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                 <a href="#" onclick="add_relawan()" class="btn btn-md btn-primary">Tambah Relawan</a>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Username</th>
		    
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
		    <td style="text-align:center" width="200px">
			<?php 
            echo anchor(site_url('relawan_komunitas/ubahPassword/'.$relawan_komunitas->id_user),'Update','class="btn btn-sm btn-warning"'); 
            echo " ";
            echo anchor(site_url('relawan_komunitas/delete/'.$relawan_komunitas->id_user),'Delete','class="btn btn-sm btn-danger" onclick="return confirm(\'Menghapus Relawan, otomatis akan menghapus semua data penanaman\')"');  
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
         function add_relawan()
      {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Tambah Relawan'); // Set Title to Bootstrap modal title
      }

    function save()
    {

        var f = document.getElementsByTagName('form')[0];
        if(f.checkValidity()) {
         var url;
        url = "http://webgis.laskarhijau.org/relawan_komunitas/ajax_add";

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_form').modal('hide');
                location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Username sudah ada');
            }
        });
          } else {
          alert('Semua Data Harus Diisi');
        }
    }

        </script>


         <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title"></h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="id"/> 
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Nama Relawan</label>
              <div class="col-md-9">
                <input name="username" id="username" placeholder="Username" class="form-control" type="text" required="required">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Password</label>
              <div class="col-md-9">
                <input name="password" placeholder="Password" class="form-control" type="password" required>
              </div>
            </div>
          </div>
        </form>
          </div>
          <div class="modal-footer">
            <input type="submit" id="btnSave" onclick="save()" class="btn btn-primary" value="Save"/>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->
