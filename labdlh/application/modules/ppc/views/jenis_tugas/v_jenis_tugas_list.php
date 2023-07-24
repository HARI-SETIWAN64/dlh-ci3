<!-- tampilan admin -->
<?php if($this->ion_auth->in_group(array('admin','manager_teknis'))){?>
<div class="table table-responsive"><!--table-responsive-->
<table class="table table-bordered table-striped">
  <tr>
    <th width="300px">Tugas</th>
    <th>Jenis Tugas</th>
    <th width="200px">AKSI</th>
  </tr>

 <?php foreach($items as $row) :?>
    <tr>
      <td><?php echo $row->tugas; ?></td>
      <td><?php echo $row->jenis_tugas; ?></td>
      <td>
        <a href="javascript:void(0)" onclick="ubah('<?php echo $row->id?>')" class="btn btn-xs btn-warning"> <i class="fa fa-pencil"></i> Ubah</a>
        <a href="javascript:void(0)" onclick="hapus('<?php echo $row->id?>')" class="btn btn-xs btn-danger"> <i class="fa fa-trash-o"></i> Hapus</a>
      </td>
    </tr>
 <?php endforeach; ?>
</table>
</div>
<?php }?>

<!-- tampilan user -->
<?php if($this->ion_auth->in_group(array('analis','admin_pelayanan'))){?>
<div class="table table-responsive"><!--table-responsive-->
<table class="table table-bordered table-striped">
  <tr>
    <th width="200px">Tugas</th>
    <th width="300px">Jenis Tugas</th>
  </tr>

 <?php foreach($items as $row) :?>
    <tr>
      <td><?php echo $row->tugas; ?></td>
      <td><?php echo $row->jenis_tugas; ?></td>
    </tr>
 <?php endforeach; ?>
</table>
</div>
<?php }?>

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
