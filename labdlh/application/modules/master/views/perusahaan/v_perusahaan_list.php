<div class="table table-responsive"><!--table-responsive-->
  <table class="table table-bordered table-striped">
    <tr>
      <th width="150px">Customer id</th>
      <th width="200px">NPWRD</th>
      <th>Nama</th>
      <th width="200px">Telpon</th>
      <th width="200px">AKSI</th>
    </tr>

    <?php foreach($items as $row) :?>
      <tr>
        <td><?php echo $row->customer_id; ?></td>
        <td><?php echo $row->npwp; ?></td>
        <td><?php echo $row->nama; ?></td>
        <td><?php echo $row->telp; ?></td>
        <td>
          <a href="javascript:void(0)" onclick="ubah('<?php echo $row->id?>')" class="btn btn-xs btn-warning"> <i class="fa fa-pencil"></i> Ubah</a>
          <?php if($row->lng == ""){ ?>
            <a href="<?php echo base_url() ?>master/perusahaan/map/<?php echo $row->id ?>" class="btn btn-xs btn-success"> <i class="fa fa-map"></i> Map</a>
          <?php } else{ ?>
            <a href="<?php echo base_url() ?>master/perusahaan/map/<?php echo $row->id ?>" class="btn btn-xs btn-success"> <i class="fa fa-map-marker"></i> Map</a>
          <?php } ?>
          <!-- <a href="javascript:void(0)" onclick="hapus('<?php echo $row->id?>')" class="btn btn-xs btn-danger"> <i class="fa fa-trash-o"></i> Hapus</a> -->
        </td> 
      </tr>
    <?php endforeach; ?>
  </table>
</div>

<?php
$total_page = $total_items / 25;
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
