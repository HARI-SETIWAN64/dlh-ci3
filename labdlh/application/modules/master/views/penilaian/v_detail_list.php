<div class="table table-responsive"><!--table-responsive-->
<table class="table table-bordered table-striped">
  <tr>
    <th width="90%">Keterangan</th>
    <th width="10%">Aksi</th>
  </tr>

 <?php foreach($items as $row) {
  ?>
    <tr>
      <td>
        <?php echo $row->keterangan; ?>
      </td>
      <td>
        <a href="javascript:void(0)" onclick="form_detail('<?php echo $id?>','<?php echo $row->id?>')" class="btn btn-xs btn-warning"> <i class="fa fa-pencil"></i></a>
        <a href="javascript:void(0)" onclick="hapus_detail('<?php echo $row->id?>')" class="btn btn-xs btn-danger"> <i class="fa fa-trash-o"></i></a>
      </td>
    </tr>
 <?php } ?>
</table>
</div>

<?php
$total_page = $total_items / 1000;
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
      maxVisible: 5,
      firstLastUse: true, 
      first: 'First',
      last: 'Last',
      prev: 'Prev',
      next: 'Next',
  }).on("page", function(event, /* page number here */ num){
  
    var n = num;
    //$("#content").html("Insert content"); // some ajax content loading...
    $(".page").html("Page " + num);
    get_items(n);

  });
</script>
