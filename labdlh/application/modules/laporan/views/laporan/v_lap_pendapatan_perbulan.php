<div class="table table-responsive"><!--table-responsive-->
  <table class="table table-bordered table-striped">
    <tr>
      <th width="30%">Nama</th>
      <th width="7%">Januari</th>
      <th width="7%">Februari</th>
      <th width="7%">Maret</th>
      <th width="7%">April</th>
      <th width="7%">Mei</th>
      <th width="7%">Juni</th>
      <th width="7%">Juli</th>
      <th width="7%">Agustus</th>
      <th width="7%">September</th>
      <th width="7%">Oktober</th>
      <th width="7%">November</th>
      <th width="7%">Desember</th>
    </tr>

    <?php
    $januari=$februari=$maret=$april=$mei=$juni=$juli=$agustus=$sepetember=$oktober=$november=$desember=0;
    ?>
    <?php foreach($items as $row) :?>
      <tr>
        <td><?php echo $row->nama; ?></td>
        <td align="right"><?php echo number_format($row->januari,2,',','.');?></td>
        <td align="right"><?php echo number_format($row->februari,2,',','.');?></td>
        <td align="right"><?php echo number_format($row->maret,2,',','.');?></td>
        <td align="right"><?php echo number_format($row->april,2,',','.');?></td>
        <td align="right"><?php echo number_format($row->mei,2,',','.');?></td>
        <td align="right"><?php echo number_format($row->juni,2,',','.')?></td>
        <td align="right"><?php echo number_format($row->juli,2,',','.');?></td>
        <td align="right"><?php echo number_format($row->agustus,2,',','.');?></td>
        <td align="right"><?php echo number_format($row->sepetember,2,',','.');?></td>
        <td align="right"><?php echo number_format($row->oktober,2,',','.');?></td>
        <td align="right"><?php echo number_format($row->november,2,',','.');?></td>
        <td align="right"><?php echo number_format($row->desember,2,',','.');?></td>
      </tr>
      <?php
      $januari += $row->januari;
      $februari += $row->februari;
      $maret += $row->maret;
      $april += $row->april;
      $mei += $row->mei;
      $juni += $row->juni;
      $juli += $row->juli;
      $agustus += $row->agustus;
      $sepetember += $row->sepetember;
      $oktober += $row->oktober;
      $november += $row->november;
      $desember += $row->desember;
      ?>
    <?php endforeach; ?>
    <tr>
      <td><b>Total /bln</b></td>
      <td align="right"> <b><?php echo number_format($januari,2,',','.'); ?></b></td>
      <td align="right"> <b><?php echo number_format($februari,2,',','.'); ?></b></td>
      <td align="right"> <b><?php echo number_format($maret,2,',','.');?></b></td>
      <td align="right"> <b><?php echo number_format($april,2,',','.');?></b></td>
      <td align="right"> <b><?php echo number_format($mei,2,',','.');?></b></td>
      <td align="right"> <b><?php echo number_format($juni,2,',','.');?></b></td>
      <td align="right"> <b><?php echo number_format($juli,2,',','.');?></b></td>
      <td align="right"> <b><?php echo number_format($agustus,2,',','.'); ?></b></td>
      <td align="right"> <b><?php echo number_format($sepetember,2,',','.'); ?></b></td>
      <td align="right"> <b><?php echo number_format($oktober,2,',','.'); ?></b></td>
      <td align="right"> <b><?php echo number_format($november,2,',','.'); ?></b></td>
      <td align="right"> <b><?php echo number_format($desember,2,',','.'); ?></b></td>
    </tr>
    <?php $jumlah = $januari+$februari+$maret+$april+$mei+$juni+$juli+$agustus+$sepetember+$oktober+$november+$desember; ?>
    <tr>
      <td><b>Total 1 Tahun</b></td>
      <td colspan="12"><font color="red"><b><?php echo number_format($jumlah,2,',','.'); ?></b></font></td>
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
