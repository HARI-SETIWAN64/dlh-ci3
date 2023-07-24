<div class="table table-responsive"><!--table-responsive-->
<table class="table table-bordered table-striped">
  <tr>
    <th>NOMOR</th>
    <th>NAMA PELANGGAN</th>
    <th width="150px">CETAK</th>
    <th width="100px">AKSI</th>
  </tr>

 <?php foreach($items as $row) :?>
    <tr>
      <td><?php echo $row->nomor; ?></td>
      <td><?php echo $row->u_nama_pelanggan; ?></td>
      <td>
        <a href="<?php echo base_url()."lhu/lhu_admin/lhu_pdf/".str_replace("/","_",$row->nomor);?>" class="btn btn-xs btn-success" target="_blank"> <i class="fa fa-print"></i> DLH</a>
        <a href="<?php echo base_url()."lhu/lhu_admin/lhu_kan_pdf/".str_replace("/","_",$row->nomor);?>" class="btn btn-xs btn-success" target="_blank"> <i class="fa fa-print"></i> KAN</a>
      </td> 
      <td><a href="<?php echo base_url()."lhu/lhu_admin/form/".str_replace("/","_",$row->nomor);?>" class="btn btn-xs btn-warning"> <i class="fa fa-pencil"></i> Lihat</a></td> 
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
