 <body>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-6">
                <h2 style="margin-top:0px">Pohon Yang Telah Di Tanam</h2>
            </div>
            <div class="col-md-6 text-right">
		<?php echo anchor(site_url('update/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th>No</th>
		    <th>Pohon</th>
            <th>Petak</th>
            <th>Umur</th>
		    <th>Latitude</th>
		    <th>Longitude</th>
            <th>Status Pohon</th>
            <th>Keterangan</th>
		    <th>Aksi</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($detail_penanaman_data as $detail_penanaman)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $detail_penanaman->nama_pohon ?></td>
            <td><?php echo $detail_penanaman->nama_petak ?></td>
            <td><?php $today = date('Y-m-d');
                    $tanggal = $detail_penanaman->tgl_tanam;
                    $date = new DateTime($today);
                    $dates = new DateTime($tanggal);
                    $diff = $date->diff($dates);
                printf('%d Tahun, %d Bulan, %d Hari', $diff->y, $diff->m, $diff->d); ?></td>
		    <td><?php echo $detail_penanaman->lat ?></td>
		    <td><?php echo $detail_penanaman->lon ?></td>
            <td><?php  if ($detail_penanaman->status_pohon == 0) { ?>
                <span class="label label-danger">Mati</span>
            <?php } else{ ?>
                <span class="label label-success">Hidup</span>
              <?php  }  ?></td>
            <td><?php echo $detail_penanaman->keterangan; ?></td>
		    <td style="text-align:center">
			<?php 
            if ($detail_penanaman->status_pohon == 0) { ?>
                <a class="btn btn-sm btn-warning disabled" href="javascript:void()" title="Hapus" onclick="nonaktif(<?php echo $detail_penanaman->id_detail ?>)"><i class="glyphicon glyphicon-minus-sign"></i> Non Aktif</a>     
            <?php } else { ?>       
            <a class="btn btn-sm btn-warning" href="javascript:void()" title="Hapus" onclick="nonaktif(<?php echo $detail_penanaman->id_detail ?>)"><i class="glyphicon glyphicon-minus-sign"></i> Non Aktif</a>     
            <?php } ?>
            <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="edit_keterangan(<?php echo $detail_penanaman->id_detail ?>)"><i class="glyphicon glyphicon-plus"></i> Tambah Keterangan</a>
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

     function reload_table()
    {
      table.ajax.reload(null,false); //reload datatable ajax 
      console.log("aman");
    }

         function edit_keterangan(id){
                save_method = 'update';
                $('#form')[0].reset(); // reset form on modals

                //Ajax Load data from ajax
                  $.ajax({
                    url : "<?php echo site_url('update/tambah_keterangan/')?>/" + id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data)
                    {
                       
                        $('[name="id_detail"]').val(data.id_detail);
                        $('[name="keterangan"]').val(data.keterangan);
                        
                        $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                        $('.modal-title').text('Keterangan'); // Set title to Bootstrap modal title
                        
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error get data from ajax');
                    }
                });
            }

             function save()
    {
      var url;
        url = "<?php echo site_url('update/ajax_keterangan')?>";

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
                alert('Error adding / update data');
            }
        });
    }

function nonaktif(id)
    {
      if(confirm('Yakin akan menonaktifkan pohon?'))
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('update/ajax_nonaktif')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               //if success reload ajax table
               $('#modal_form').modal('hide');
               location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
         
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
          <input type="hidden" value="" name="id_detail"/> 
            <div class="form-group">
              <label class="control-label col-md-3">Keterangan</label>
              <div class="col-md-9">
               <textarea name="keterangan" placeholder="Keterangan" class="form-control"></textarea>
              </div>
            </div>
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->
    </body>