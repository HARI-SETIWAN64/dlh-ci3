<div class="table table-responsive"><!--table-responsive-->
<table class="table table-bordered table-striped">
  <tr>
    <th>PARAMETER</th>
    <th width="100px">AKSI</th>
  </tr>
 <?php foreach($rows as $row) :?>
    <tr>
      <td><?php echo $row->parameter; ?></td>
      <td>
        <a href="javascript:void(0)" onClick="ubah_analis('<?php echo $row->id?>')" class="btn btn-xs btn-success" title="Ubah Analis"><i class="fa fa-user"></i></a>
        <a href="javascript:void(0)" onClick="hapus('<?php echo $row->id?>')" class="btn btn-xs btn-danger" title="Hapus"><i class="fa fa-trash-o"></i></a>
      </td> 
    </tr>
 <?php endforeach; ?>
</table>
</div>

<?php
$total_page = $total_items / 10;
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
