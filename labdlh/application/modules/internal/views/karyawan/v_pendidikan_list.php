<div class="table table-responsive"><!--table-responsive-->
  <table class="table table-bordered table-striped">
    <tr>
      <th width="3%">No</th>
      <th width="23%">Pendidikan</th>
      <th width="40%">Instansi</th>
      <th width="20%">Tahun</th>
      <th width="14%">Aksi</th>
    </tr>

    <?php foreach($items as $row) :?>
      <tr>
        <td><?php echo $row->urut; ?></td>
        <td><?php echo $row->pendidikan; ?></td>
        <td><?php echo $row->nama_institusi; ?></td>
        <td><?php echo $row->mulai." - ".$row->sampai; ?></td>
        <td>
          <a href="internal/karyawan/pendidikan_form/<?php echo $users_id; ?>/<?php echo $row->id; ?>" class="btn btn-success btn-xs" title="Foto"><i class="fa fa-pencil"></i></a>
          <a href="javascript:void(0)" onclick="hapus('<?php echo $row->id?>')" class="btn btn-xs btn-danger" title="Hapus"> <i class="fa fa-trash-o"></i></a>
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
