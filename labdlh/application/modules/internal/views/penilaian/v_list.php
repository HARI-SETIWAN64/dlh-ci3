<div class="table table-responsive"><!--table-responsive-->
  <table class="table table-bordered table-striped">
    <tr>
      <th width="50%">Penilaian</th>
      <th width="30%">Nama</th>
      <th width="10%">Nilai</th>
      <th width="10">Aksi</th>
    </tr>

    <?php foreach($items as $row) :?>
      <tr>
        <td><?php echo $row->keterangan; ?></td>
        <td><?php echo $row->first_name; ?></td>
        <td><?php echo $row->rata_rata; ?></td>
        <td>
          <a href="javascript:void(0)" onclick="lihat('<?php echo $row->id?>')" class="btn btn-xs btn-success" title="lihat"> <i class="fa fa-eye"></i></a>
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
