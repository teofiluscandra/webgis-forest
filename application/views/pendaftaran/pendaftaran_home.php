            <aside class="callout">
                <div class="text-vertical-center">
                <h2 class="text-center">Terimakasih Sudah Menjadi Relawan</h2>
                <h3 class="text-center">Negeri ini butuh banyak pohon, bukan banyak omong</h3>
                <img src="<?php echo base_url(); ?>assets/logo/laskarhijau.gif" alt="Logo Laskar Hijau" style="width:128px;height:128px;">
                <h3 class="text-center">Lima Langkah, Satu Benih</h3>

                </div>
            </aside>
        <br>
       <center><a class="btn btn-success" href="<?php echo base_url(); ?>"><i class="fa fa-home" aria-hidden="true"></i>Back To Home</a></center>
        <section id="about" class="services">
            
            <div class="row">
                <div class="col-lg-12 text-center">
                    <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
            <th width="10px">No</th>
            <th>Nama Komunitas</th>
            <th>Nama Koordinator</th>
            <th>Gambaran Komunitas</th>
            <th>No Telp</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Website</th>
                </tr>
            </thead>
        <tbody>
            <?php
            $start = 0;
            foreach ($pendaftaran_data as $pendaftaran)
            {
                ?>
                <tr>
            <td><?php echo ++$start ?></td>
            <td><?php echo $pendaftaran->nama_komunitas ?></td>
            <td><?php echo $pendaftaran->nama_lengkap ?></td>
            <td><?php echo $pendaftaran->gambaran_komunitas ?></td>
            <td><?php echo $pendaftaran->no_telp ?></td>
            <td><?php echo $pendaftaran->email ?></td>
            <td><?php echo $pendaftaran->alamat ?></td>
            <td><?php echo $pendaftaran->website ?></td>
            </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
                </div>
            

            <!-- /.row -->
        </div>
        <!-- /.container -->

    </section>

      
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
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