<div class="table table-responsive"><!--table-responsive-->
<table class="table table-bordered table-striped">
  <tr>
    <th width="200px">NOMOR </th>
    <th>NAMA PELANGGAN</th>
    <th width="200px">BUKTI PEMBAYARAN</th>
    <th width="100px">CETAK</th>
    <?php 
    if($this->ion_auth->in_group(array('admin','members','manager'))){
      echo '<th width="200px">AKSI</th>';
    }
    ?>
  </tr>

 <?php foreach($a as $row) :?>
    <tr>
      <td>
        <?php echo $row->nomor; ?>
      </td>
      <td>
        <?php echo $row->nama_pelanggan; ?>
      </td>
      <?php if($row->bukti_pembayaran==""){ $row->bukti_pembayaran="Upload"; $warna="class='btn btn-xs btn-danger'"; }else{ $row->bukti_pembayaran="Lunas"; $warna="class='btn btn-xs btn-success'";} ?>
      <td>
        <a href="<?php echo base_url()."fpps/fpps_paket_pelanggan/form_bukti/".$row->id;?>" <?php echo $warna;?> ><?php echo  $row->bukti_pembayaran; ?></a>
      </td>
      <td>
        <a href="<?php echo base_url()."fpps/fpps_paket_pelanggan/fpps_pdf/".str_replace("/","_",$row->nomor);?>" class="btn btn-xs btn-success" target="_blank"> <i class="fa fa-print"></i> Cetak</a>
      </td>
      <?php if($this->ion_auth->in_group(array('admin','members','manager'))){ ?>
        <td>
          <a href="<?php echo base_url()."fpps/fpps_paket_pelanggan/form/".$row->id;?>" class="btn btn-xs btn-warning"> <i class="fa fa-pencil"></i> Ubah</a>
          <a href="javascript:void(0)" onclick="hapus('<?php echo $row->id?>')" class="btn btn-xs btn-danger"> <i class="fa fa-trash-o"></i> Hapus</a>
        </td> 
      <?php } ?>
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
