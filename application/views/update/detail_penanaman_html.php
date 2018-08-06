<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Daftar Semua Pohon</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Pohon</th>
        <th>Petak</th>
        <th>Umur</th>
		<th>Latitude</th>
		<th>Longitude</th>
        <th>Status Pohon</th>
        <th>Keterangan</th>
		
            </tr><?php
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
            <td><?php  if ($detail_penanaman->status_pohon == 0) { 
                echo "Mati";
            } else{
                echo "Hidup";
              }  ?></td>
            <td><?php echo $detail_penanaman->keterangan; ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>