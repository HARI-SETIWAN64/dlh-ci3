<div class="table table-responsive"><!--table-responsive-->
  <table class="table table-bordered table-striped">
    <tr>
      <th width="25%">Nama</th>
      <th width="30%">Telp</th>
      <th width="30%">Jabatan</th>
      <th width="15%">Aksi</th>
    </tr>

    <?php foreach($items as $row) :?>
      <tr>
        <td><?php echo $row->first_name; ?></td>
        <td><?php echo $row->phone; ?></td>
        <td><?php echo $row->description; ?></td>
        <td>
          <a href="internal/karyawan/form/<?php echo $row->id; ?>" class="btn btn-success btn-xs" title="Edit"><i class="fa fa-pencil"></i></a>
          <a href="internal/karyawan/pendidikan/<?php echo $row->id; ?>" class="btn btn-success btn-xs" title="Pendidikan"><i class="fa fa-graduation-cap"></i></a>
          <a href="internal/karyawan/pelatihan/<?php echo $row->id; ?>" class="btn btn-success btn-xs" title="Petalihan"><i class="fa fa-file-o"></i></a>
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
