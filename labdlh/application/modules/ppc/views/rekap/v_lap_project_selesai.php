<div class="table table-responsive"><!--table-responsive-->
  <table class="table table-bordered table-striped">
    <tr>
      <th width="70%">Jenis Tugas</th>
      <th width="15%">Terlambat</th>
      <th width="15%">Tepat Waktu</th>
    </tr>

    <?php
    $terlambat=$tepat_waktu=0;
    ?>
    <?php foreach($items as $row) :
      if($row->tepat_waktu == 0){ $c_tepat_waktu = 'bgcolor="#f27e7e"'; } else { $c_tepat_waktu = ''; }
      if($row->terlambat == 0){ $c_terlambat = 'bgcolor="#f27e7e"'; } else { $c_terlambat = ''; }?>
      <tr>
        <td><?php echo $row->jenis_tugas; ?></td>
        <td align="center" <?php echo $c_terlambat; ?>><?php echo ($row->terlambat);?></td>
        <td align="center" <?php echo $c_tepat_waktu; ?>><?php echo ($row->tepat_waktu);?></td>
      </tr>
      <?php
      $terlambat += $row->terlambat;
      $tepat_waktu += $row->tepat_waktu;
      ?>
    <?php endforeach; ?>
    <tr>
      <td><b>Total</b></td>
      <td align="center"> <b><?php echo ($terlambat); ?></b></td>
      <td align="center"> <b><?php echo ($tepat_waktu); ?></b></td>
    </tr>
    <?php $jumlah = $terlambat+$tepat_waktu; ?>
    <tr>
      <td><b>Total Keseluruhan</b></td>
      <td colspan="12" align="center"><font color="green"><b><?php echo ($jumlah); ?></b></font></td>
    </tr>
  </table>
</div>

<?php
$total_page = $total_items / 10000;
if ($total_page < 1){
  $total_page = '1';
}
?>
<br/>
<span class="label label-info pull-left">Total <?php echo $total_items?></span>
<span class="label label-info pull-right">Page <?php echo $page?></span>
<div id="page-selection" align="center"></div>

<script>
  $('#page-selection').bootpag({
    page : <?php echo $page?>,
    total: <?php echo $total_page+1 ?>,
    maxVisible: 5
  }).on("page", function(event, /* page number here */ num){
    var n = num;

//$("#content").html("Insert content"); // some ajax content loading...
$(".page").html("Page " + num);
get_items(n);
});
</script>
