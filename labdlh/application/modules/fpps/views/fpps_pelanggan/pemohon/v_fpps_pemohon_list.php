<div class="table table-responsive"><!--table-responsive-->
<table class="table table-bordered table-striped">
  <tr>
    <th width="30%">NOMOR </th>
    <th width="40">NAMA PELANGGAN</th>
    <th width="30%">Aksi</th>
  </tr>

 <?php foreach($a as $row) :?>
    <tr>
      <td>
        <?php echo $row->nomor; ?>
      </td>
      <td>
        <?php echo $row->nama_pelanggan; ?>
      </td>
      <td>
        <!-- print -->
        <?php if(!empty($row->no_sampel)){?>
        <a href="<?php echo base_url()."fpps/fpps_pelanggan/fpps_pdf/".base64_encode($row->id);?>" class="btn btn-xs btn-success" target="_blank" title="cetak"> <i class="fa fa-print"></i></a>
        <?php } ?>
        <!-- timeline -->
        <a href="javascript:void(0)" onclick="timeline_doc('<?php echo $row->id?>')" class="btn btn-success btn-xs" title="Timeline"><i class="fa fa-sitemap"></i></a>
        <!-- ubah -->
        <?php if($row->validasi_fpps=="0"){?>
        <a href="<?php echo base_url()."fpps/fpps_pemohon/form/".base64_encode($row->id);?>" class="btn btn-xs btn-warning" title="ubah"> <i class="fa fa-pencil"></i></a>
        <?php } ?>
        <!-- hapus -->
        <?php if($row->validasi_fpps=="0"){?>
          <a href="javascript:void(0)" onclick="hapus('<?php echo $row->id?>')" class="btn btn-xs btn-danger" title="hapus"> <i class="fa fa-trash-o"></i></a>
        <?php } ?>
      </td>
    </tr>
 <?php endforeach;?>
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
