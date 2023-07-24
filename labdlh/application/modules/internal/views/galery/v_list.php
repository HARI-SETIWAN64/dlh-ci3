<div class="table table-responsive"><!--table-responsive-->
  <table class="table table-bordered table-striped">
    <tr>
      <th width="30%">Kegiatan</th>
      <th width="50%">Uraian</th>
      <th width="10%">File</th>
      <th width="10">AKSI</th>
    </tr>

    <?php foreach($items as $row) :?>
      <tr>
        <td><?php echo $row->kegiatan; ?></td>
        <td><?php echo $row->uraian; ?></td>
        <td>
          <?php if($row->file <> ""){ ?>
          <a href="<?php echo base_url().'file/galery/'.$row->file ?>" class="btn btn-xs btn-success" title="Download" target="_blank">Download</a>
          <?php } ?>
        </td>
        <td>
          <a href="javascript:void(0)" onclick="hapus('<?php echo $row->id?>')" class="btn btn-xs btn-danger" title="Hapus"> <i class="fa fa-trash-o"></i></a>
          <a href="internal/galery/form/<?php echo $row->id; ?>" class="btn btn-success btn-xs" title="Hasil Kegiatan"><i class="fa fa-pencil"></i></a>
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
