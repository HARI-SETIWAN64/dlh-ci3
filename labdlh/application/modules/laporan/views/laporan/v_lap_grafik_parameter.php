

<script src="<?php echo base_url() ?>assets/amcharts4/core.js"></script>
<script src="<?php echo base_url() ?>assets/amcharts4/chart.js"></script>
<script src="<?php echo base_url() ?>assets/amcharts4/animated.js"></script>
<script>

  var url = "<?php echo base_url()?>";
  var filtering = {}
  $(function() {
    filter()
  });

  function filter() {
    filtering['filter_tahun'] = "<?php echo $tahun?>";
    filtering['filter_cari'] = "<?php echo $cari?>";
    init()
  }

  function init() {
    $(".init-loading").html("<i class='fa fa-spin fa-refresh'></i> &nbsp;&nbsp;&nbsp;Memuat Data ...");
    grafik()
  }

  function grafik() {
    $.ajax({
      type: "post",
      url: url+"laporan/data_grafik_parameter",
      data: filtering,
      dataType: "json",
      success: function(data) {
        pie(data, "grafik");
      }
    });
  }
  function pie(data, div) {
    am4core.useTheme(am4themes_animated);
    var chart = am4core.create(div, am4charts.PieChart);
    chart.data=data;
    var pieSeries = chart.series.push(new am4charts.PieSeries());
    pieSeries.dataFields.value = "jumlah";
    pieSeries.dataFields.category = "parameter";
    chart.innerRadius = am4core.percent(40);
    pieSeries.slices.template.stroke = am4core.color("#4a2abb");
    pieSeries.slices.template.strokeWidth = 2;
    pieSeries.slices.template.strokeOpacity = 1;
    // chart.legend = new am4charts.Legend();
  }
</script>
<div class="col-xs-12">
  <!-- /.box-header -->
  <div class="box-body">
    <div class="init-loading grafik" id="grafik" style="height:800px;width:100%;"></div>
  </div>
</div>