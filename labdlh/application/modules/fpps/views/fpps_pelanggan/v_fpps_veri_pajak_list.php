<div class="table table-responsive"><!--table-responsive-->
<table class="table">
  <tr>
    <td colspan="5" align="center"><b><font color="red">Mapping Parameter Simpling dan E-pad</font></b></td>
    <td></td>
  </tr>
  <tr>
    <th width="35%">Parameter Simpling</th>
    <th width="10%">Tarif</th>
    <th width="1%" bgcolor="#e1e0e0"></th>
    <th width="45%">Parameter Epad</th>
    <th width="10%">Tarif</th>
  </tr>

 <?php foreach($rows as $row) :?>
  <?php if($row->harga != $row->nilai_tarif_pajak){ $color = 'bgcolor="#ffa9a9"'; } else { $color = ''; } ?>
    <tr <?php echo $color; ?>>
      <td><?php echo $row->parameter; ?></td>
      <td><?php echo $row->harga; ?></td>
      <th bgcolor="#e1e0e0"></th>
      <td><?php echo $row->uraian_tarif_pajak; ?></td>
      <td><?php echo $row->nilai_tarif_pajak; ?></td>
    </tr>
 <?php endforeach; ?>
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
