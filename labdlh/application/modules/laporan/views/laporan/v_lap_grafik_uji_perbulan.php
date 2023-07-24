<div class="col-xs-12">
  <!-- /.box-header -->
  <div class="box-body">
    <div class="init-loading grafik" style="height:600px;width:100%;"></div>
  </div>
</div>

<script src="<?php echo base_url() ?>assets/amcharts4/core.js"></script>
<script src="<?php echo base_url() ?>assets/amcharts4/chart.js"></script>
<script src="<?php echo base_url() ?>assets/amcharts4/animated.js"></script>
<script src="<?php echo base_url() ?>assets/amcharts4/kelly.js"></script>
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
      url: url+"laporan/data_grafik_uji_perbulan",
      data: filtering,
      dataType: "json",
      success: function(data) {
        barChart(data, "grafik");
      }
    })
  }

  function barChart(data, chartdiv) {
    am4core.useTheme(am4themes_animated);
    am4core.useTheme(am4themes_kelly);
    var chart = am4core.create(chartdiv, am4charts.XYChart3D);
    chart.exporting.menu = new am4core.ExportMenu();
    chart.exporting.menu.align = "right";
    chart.exporting.menu.verticalAlign = "top";

    chart.data = data;
    // Create axes
    var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
    categoryAxis.dataFields.category = "bulan2";
    categoryAxis.renderer.grid.template.location = 0;
    categoryAxis.renderer.minGridDistance = 20;
    categoryAxis.renderer.inside = false;
    categoryAxis.start = 0;
    // categoryAxis.end = splitChart;

    categoryAxis.renderer.grid.template.disabled = true;

    var label = categoryAxis.renderer.labels.template;
    label.wrap = true;
    label.maxWidth = 160;
    // label.truncate = true;
    label.tooltipText = "{bulan2}";

    categoryAxis.events.on("sizechanged", function(ev) {
      var axis = ev.target;
      var cellWidth = axis.pixelWidth / (axis.endIndex - axis.startIndex);
      if (cellWidth < axis.renderer.labels.template.maxWidth) {
        axis.renderer.labels.template.rotation = -75;
        axis.renderer.labels.template.horizontalCenter = "right";
        axis.renderer.labels.template.verticalCenter = "middle";
      } else {
        axis.renderer.labels.template.rotation = 0;
        axis.renderer.labels.template.horizontalCenter = "middle";
        axis.renderer.labels.template.verticalCenter = "top";
      }
    });

    var valueAxis1 = chart.yAxes.push(new am4charts.ValueAxis());
    valueAxis1.extraMax = 0.3;
    valueAxis1.min = 0;

    var series1 = chart.series.push(new am4charts.ColumnSeries3D());
    series1.dataFields.valueY = "jumlah";
    series1.dataFields.categoryX = "bulan2";
    series1.name = "Bulan";
    series1.yAxis = valueAxis1;
    series1.columns.template.tooltipText = "{valueY.value}";
    chart.cursor = new am4charts.XYCursor();

    chart.legend = new am4charts.Legend();
    chart.legend.position = "top";
  }
</script>
