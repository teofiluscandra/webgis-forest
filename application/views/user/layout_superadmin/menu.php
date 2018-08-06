

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">

  <div class="modal-dialog">
 <form action="<?php echo site_url('penanaman_relawan/buat/'.$id_penanaman->id_penanaman) ?>" method="post">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Masukkan Jumlah Lokasi Pohon</h4>
      </div>
      <div class="modal-body">
        <p>Jumlah Lokasi Pohon Yang Akan Diinput :</p>
      </div> <input type="number" class="form-control" name="jumlah" size="5" id="jumlah" placeholder="Masukkan Jumlah Pohon" value="" />
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" >Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
</form>

  </div>
</div>