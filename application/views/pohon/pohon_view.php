<div class="container">
    <h1>Manajemen Pohon</h1>
        <div align="right">
            <a href="<?php echo base_url() ?>pohon/tambah" class="btn btn-default">Tambah Pohon</a>
        </div>
    <p>Daftar Pohon</p>
    
    <table class="table table-bordered table-striped">
    <tr>
      <th>Nama Pohon</th>
      <th>Jenis Pohon</th>
      <th>Gambar File</th>
      <th>Aksi</th>
    </tr>
    <?php foreach ($pohon as $list) { ?>
    <tr>
        <td>
    <?php echo $list['nama_pohon']; ?></td>
    <td><?php echo $list['jenis_pohon']; ?></td>
    <td><img src="<?php echo base_url(); ?>assets/uploads/<?php echo $list['nama_gambar']; ?>"></td>
    <td>
    <a href="<?php echo base_url() ?>user/admin/edit/<?php echo $list['id_pohon'] ?>">EDIT</a> | <a href="<?php echo base_url() ?>user/admin/delete/<?php echo $list['id_pohon'] ?>">DELETE</a></td>
    </tr>
    <?php } ?>
  </table>
    </div>


