<div class="table table-responsive"><!--table-responsive-->
<table class="table table-bordered table-striped">
  <tr>
    <th width="80%">Kata Mutiara</th>
    <th width="10%">Aktif</th>
    <th width="10%">AKSI</th>
  </tr>
  <?php $status=array('1'=>'Aktif', '0'=>'Non') ?>
 <?php foreach($items as $row) :?>
    <tr>
      <td><?php echo $row->kata_mutiara; ?></td>
      <td><?php echo $status[$row->nama]; ?></td>
      <td>
        <a href="javascript:void(0)" onclick="ubah('<?php echo $row->id_kata_mutiara?>')" class="btn btn-xs btn-warning"> <i class="fa fa-pencil"></i></a>
        <a href="javascript:void(0)" onclick="hapus('<?php echo $row->id_kata_mutiara?>')" class="btn btn-xs btn-danger"> <i class="fa fa-trash-o"></i></a>
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
