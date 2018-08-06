<body>
	<style>
 #chart{
   z-index:-10;} 
</style>
 <div class="container"><div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    Pilih Tahun
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li><a href="<?php echo base_url();?>grafik/kayu_2016">2016</a></li>
    <li><a href="<?php echo base_url();?>grafik/kayu_2017">2017</a></li>
    <li><a href="<?php echo base_url();?>grafik/kayu_2018">2018</a></li>
  </ul>
</div></div>
 
 <div id="chart">
</div>
<script src="<?php echo base_url();?>assets/js/highcharts.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/js/exporting.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/js/offline-exporting.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/js/dark-green.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(function(){
 new Highcharts.Chart({
  chart: {
   renderTo: 'chart',
   type: 'line',
  },
  title: {
   text: 'Grafik Statistik Pohon Kayu',
   x: -20
  },
  subtitle: {
   text: 'Data Tahun 2016',
   x: -20
  },
  xAxis: {
   categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun',
                    'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des']
  },
  yAxis: {
   title: {
    text: 'Total Pohon Kayu'
   }
  },
  series: [{
   name: 'Data dalam Bulan',
   data: <?php echo json_encode($grafik); ?>
  }]
 });
}); 
</script>
</body>