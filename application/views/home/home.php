    <!-- Callout -->
    <aside class="callout">
        <div class="text-vertical-center">
            <img src="<?php echo base_url(); ?>assets/logo/laskarhijau.gif" alt="Logo Laskar Hijau" style="width:128px;height:128px;">
            <h1>Sistem Informasi Geografis</h1>
            <h2>Hutan Lereng Gunung Lemongan</h2>
            <a class="btn btn-lg btn-success" href="#location">
            <i class="fa fa-location-arrow pull-left" aria-hidden="true"></i>Mulai</a>
        </div>
    </aside>

    <!-- About -->
    <section id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Aplikasi Pemetaan Pohon Oleh Relawan Laskar Hijau Untuk Gunung Lemongan</h2>
                    <blockquote>
                      <p>“Indonesia membutuhkan strategi penyelamatan lingkungan hidup yang dapat dijalankan oleh seluruh rakyat secara bersama-sama dan berkesinambungan”</p>
                        <cite title="Source Title">Gus Dur</cite>
                    </blockquote>
                </div>
            </div>

            <!-- /.row -->
        </div>
        <!-- /.container -->

    </section>
<section id="location" class="services bg-primary">
<div class="container">
<div class="row">
<div class="col-sm-2">
    <h3>Cluster Pohon</h3>
    <div id="main" class="checkbox checkbox-info"><input type="checkbox" name="onOff" id="onOff" checked><label for="onOff">Clustering</label></div>
     
</div>

<div class="col-sm-10" id="colors">
<h3>Pilih Pohon</h3>
<div class="checkbox checkbox-info "><input type="checkbox" id="checkAll" checked><label>Check all</label></div>
<div ></div>
</div>
</div>
</div>
</section>

<div id="map" class="gmap3" style="position: relative; overflow: hidden;">
</div>
<div style="bottom:500px; right:200px; z-index: 1; background: white none repeat scroll 0% 0%; border-radius: 10px; width:100px; float: right; position: relative;">
  <img src="<?php echo base_url();?>assets/images/legend.png">

</div>
<script>
  $(function () {
    var cluster;
    var jumlah = <?php echo count($pohon) ?>;
    var colors = "<?php $i = 0; 
        foreach ($legend as $tree) {
            $i++;
            if ($i == count($pohon)) {
            echo $tree->nama_pohon;    
            } else {
            echo $tree->nama_pohon.",";    
            };
            
        } ?>".split(",");

    // create colors checkbox and associate onChange function
    $.each(colors, function(i, color){
      $("#colors").append("<div class='checkbox checkbox-success col-md-2'><input type='checkbox' name='"+color+"' checked><label class='checkbox-inline' for='"+color+"'>"+color+"</label></div>");
    });

    $('#map')
      .gmap3({
        center: [-7.9976,113.3457],
        zoom: 12  
      })
      
      .then(function () {
          randomMarkers();
      })

        .kmllayer({
        url: 'http://webgis.laskarhijau.org/data_petak'
      });

    function randomMarkers() {
      var i, lat, lng, color,
          list = [],
          info;
         
        <?php foreach ($koordinat as $koor) { ?>
        lat = <?php echo $koor->lat ?>;
        lng = <?php echo $koor->lon ?>;
        icon = "<?php echo $base.$koor->nama_gambar?>";
        color = "<?php echo $koor->nama_pohon ?>";
        info = "<?php echo $koor->nama_penanam ?>";

        list.push({
          position: [lat, lng],
          _tag: color,
          icon:  icon,
        });

        <?php } ?>

      $('#map')
        .gmap3()
        .cluster({
          size: 150,
          markers: list,
          cb: function (markers) {
            if (markers.length > 1) { // 1 marker stay unchanged (because cb returns nothing)
              if (markers.length < 20) {
                return {
                  content: "<div class='cluster cluster-3'>" + markers.length + "</div>",
                  x: -26,
                  y: -26
                };
              }
              if (markers.length < 100) {
                return {
                  content: "<div class='cluster cluster-2'>" + markers.length + "</div>",
                  x: -26,
                  y: -26
                };
              }
              return {
                content: "<div class='cluster cluster-1'>" + markers.length + "</div>",
                x: -33,
                y: -33
              };
            }
          }
        })
        .then(function (_cluster) {
            cluster = _cluster;
        })
      ;
    }

    $("#onOff").change(function () {
      if ($(this).is(":checked")){
        cluster.enable();
      } else {
        cluster.disable();
      }
    });

    $("#colors input[type=checkbox]").change(function () {
      // first : create an object where keys are colors and values is true (only for checked objects)
      var checkedColors = {};
      $("#colors input[type=checkbox]:checked").each(function(i, chk){
        checkedColors[$(chk).attr("name")] = true;
      });

      // set a filter function using the closure data "checkedColors"
      cluster.filter(function(marker){
        return marker._tag in checkedColors;
      });
    });


  });
</script>
<script type="text/javascript">
  $("#checkAll").change(function () {
    $("input:checkbox").prop('checked', $(this).prop("checked"));
});
</script>

<section id="legend" class="services">
    
      <div class="row">
      <div class="col-sm-6" style="margin-left:10px">
      <h3>Lahan Konservasi</h3>
        <table class="table table-bordered table-striped" id="">
            <thead>
                <tr>
            <th>Nama Petak</th>
            <th>Pohon Yang Telah Ditanami</th>
            <th>Luas Petak (ha)</th>
            <th>Deskripsi</th>
                </tr>
            </thead>
        <tbody>
                <tr>
            <td>Petak A</td>
            <td><?php foreach ($petaka as $a) {
              echo $a->nama_pohon . ", ";
            } ?></td>
            <td><?php 
              echo $petakaa->luas_petak;
             ?></td>
            <td><?php
              echo $petakaa->deskripsi;
            ?></td>
            </tr>
            <tr>
            <td>Petak B</td>
            <td><?php foreach ($petakb as $b) {
              echo $b->nama_pohon . ", ";
            } ?></td>
            <td><?php 
              echo $petakbb->luas_petak;
             ?></td>
            <td><?php
              echo $petakbb->deskripsi;
            ?></td>
            </tr>
            <tr>
            <td>Petak C</td>
           <td><?php foreach ($petakc as $c) {
              echo $c->nama_pohon . ", ";
            } ?></td>
             <td><?php 
              echo $petakcc->luas_petak;
             ?></td>
            <td><?php
              echo $petakcc->deskripsi;
            ?></td>
            </tr>
            <tr>
            <td>Petak D</td>
           <td><?php foreach ($petakd as $d) {
              echo $d->nama_pohon . ", ";
            } ?></td>
            <td><?php 
              echo $petakdd->luas_petak;
             ?></td>
            <td><?php
              echo $petakdd->deskripsi;
            ?></td>
            </tr>
            <tr>
            <td>Petak E</td>
            <td><?php foreach ($petake as $e) {
              echo $e->nama_pohon . ", ";
            } ?></td>
            <td><?php 
              echo $petakee->luas_petak;
             ?></td>
            <td><?php
              echo $petakee->deskripsi;
            ?></td>
            </tr>
            <tr>
            <td>Petak F</td>
          <td><?php foreach ($petakf as $f) {
              echo $f->nama_pohon . ", ";
            } ?></td>
            <td><?php 
              echo $petakff->luas_petak;
             ?></td>
            <td><?php
              echo $petakff->deskripsi;
            ?></td>
            </tr>
            </tbody>
        </table>
        </div>
        <div class="col-sm-4">
         <h3>Legenda Pohon</h3>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
            <th>Nama</th>
            <th>Jenis</th>
            <th>Gambar</th>
                </tr>
            </thead>
        <tbody>
            <?php
            foreach ($legend as $pohon)
            {
                ?>
                <tr>
            <td><?php echo $pohon->nama_pohon ?></td>
            <td><?php echo $pohon->jenis_pohon ?></td>
            <td><?=img($pohon->nama_gambar)?></td>
            </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        </div>
        </div>
    
</section>
 <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>

    <!-- Services -->
    <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
    <section id="pencapaian" class="services bg-primary">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-10 col-lg-offset-1">
                    <h2>Pencapaian</h2>
                    <p>Jumlah Semua Pohon dan Komunitas Yang Telah Terdata Laskar Hijau</p>
                    <hr class="small">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                               <h1><?php echo count($komunitas); ?></h1>
                                <h4>
                                    <strong>Komunitas</strong>
                                </h4>
                                <p>Terdiri dari komunitas pecinta lingkungan hidup seluruh Indonesia</p>
                                <a href="<?php echo base_url('pendaftaran/semua_komunitas'); ?>" class="btn btn-sm btn-light">Lihat Daftar Komunitas</a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                               <h1><?php echo count($buah); ?></h1>
                                <h4>
                                    <strong>Pohon Buah</strong>
                                </h4>
                                <p>Pohon yang menghasilkan buah untuk masyarakat di sekitar lereng Gunung Lemongan</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <h1><?php echo count($kayu); ?></h1>
                                <h4>
                                    <strong>Pohon Kayu</strong>
                                </h4>
                                <p>Pohon Kayu untuk jangka panjang dan dapat menghasilkan mata air untuk 13 ranu di lereng Gunung Lemongan</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                               <h1><?php echo count($bambu); ?></h1>
                                <h4>
                                    <strong>Bambu</strong>
                                </h4>
                                <p>Hutan bambu dapat membantu mengurangi pemanasan global dengan penyerapan karbon di area yang telah gundul.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Call to Action -->
    <aside class="call-to-action bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3>Tertarik Menanam atau berdonasi ?</h3>
                    <h4>Kunjungi Official Website Kami</h4>
                    <a href="http://www.laskarhijau.org" class="btn btn-lg btn-light">Home Website</a>
                    <a href="http://laskarhijau.org/page/2-donasi" class="btn btn-lg btn-dark">Donasi</a>
                    <h3>Atau Langsung Mendaftar ?</h3>
                    <h4>Kami akan menghubungi anda untuk kegiatan yang akan datang</h4>
                    <a href="#pencapaian" onclick="add_pendaftaran()" class="btn btn-lg btn-dark">Daftar</a>
                </div>
            </div>
        </div>
    </aside>

    <!-- Custom Theme JavaScript -->
    <script>
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    </script>

     <script type="text/javascript">
         function add_pendaftaran()
      {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Pendaftaran'); // Set Title to Bootstrap modal title
      }

    function save()
    {

        var f = document.getElementsByTagName('form')[0];
        if(f.checkValidity()) {
         var url;
        url = "<?php echo site_url('pendaftaran/ajax_add')?>";

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
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Semua data harus terisi');
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
        <h3 class="modal-title">Form Pendaftaran</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="id"/> 
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Nama</label>
              <div class="col-md-9">
                <input name="nama" id="nama" placeholder="Nama Lengkap" class="form-control" type="text" required="required">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Nama Komunitas</label>
              <div class="col-md-9">
                <input name="nama_komunitas" placeholder="Nama Komunitas" class="form-control" type="text" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Alamat Komunitas</label>
              <div class="col-md-9">
                <input name="alamat" placeholder="Alamat" class="form-control" type="text" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Gambaran Komunitas</label>
              <div class="col-md-9">
                <textarea name="gambaran_komunitas" placeholder="Jelaskan Secara Singkat Gambaran Tentang Komunitas"class="form-control" required></textarea>
              </div>
            </div>
             <div class="form-group">
              <label class="control-label col-md-3">Website (Optional)</label>
              <div class="col-md-9">
                <input name="website" value="-" placeholder="Jika tidak ada, isi dengan '-' " class="form-control" type="text" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Nomor Telp</label>
              <div class="col-md-9">
                <input name="no_telp" placeholder="Nomor telp" class="form-control" type="number" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Email</label>
              <div class="col-md-9">
                <input name="email" placeholder="Email" class="form-control" type="email" required>
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

 
</body>