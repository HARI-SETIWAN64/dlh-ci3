<div class="table table-responsive"><!--table-responsive-->
<table class="table table-bordered table-striped">
  <tr>
    <th width="200px">NAMA ALAT</th>
    <th>NO SERI</th>
    <th>MERK</th>
    <th>JADWAL KALIBRASI</th>
    <th>STATUS KALIBRASI</th>
    <th>PROVIDER</th>
    <th>FILE PDF</th>

    <!-- <th width="200px">NO URUT DOKUMEN</th> -->
    <th width="200px">AKSI</th>
  </tr>

  
 <?php foreach($items as $row) :
  date_default_timezone_set("Asia/Jakarta");
  $time =  Date('Y-m-d');
  $nextcal= $row->nextcal;
  $startdate = date('Y-m-d', strtotime('-60 days', strtotime($nextcal)));

    if($time < $startdate){ 
      $statuscal='1';
    }elseif($time < $nextcal){
      $statuscal='2';
    }else{
      $statuscal='3';
    }
    $data = array('1'=>'Aktif', '2'=>'Hold', '3'=>'Non-Aktif');
?>
    <tr>
      <td><?php echo $row->nama_alat; ?></td>
      <td><?php echo $row->noseri; ?></td>
      <td><?php echo $row->brand; ?></td>
      <td><?php echo $row->nextcal; ?></td>
      <td><?php echo $data[$statuscal]; ?></td>
      <td><?php echo $row->provider; ?></td>
      <td>
          <?php if($row->file <> ""){ ?>
          <a href="<?php echo base_url().'file/cmdo/'.$row->file ?>" class="btn btn-xs btn-success" title="Download" target="_blank">Download</a>
          <?php } ?>
        </td>

      <td>
        <a href="javascript:void(0)" onclick="lihat('<?php echo $row->id_detail?>')" class="btn btn-xs btn-success"> <i class="fa fa-eye"></i> Lihat</a>
        <!-- <a href="javascript:void(0)" onclick="ubah('<?php echo $row->id_detail?>')" class="btn btn-xs btn-warning"> <i class="fa fa-pencil"></i> Ubah</a> -->
        <a href="cmdo/detail_alat/form/<?php echo $row->id_detail; ?>" class="btn btn-warning btn-xs" title="Hasil Kegiatan"><i class="fa fa-pencil"></i> Ubah</a>
        <a href="javascript:void(0)" onclick="hapus('<?php echo $row->id_detail?>')" class="btn btn-xs btn-danger"> <i class="fa fa-trash-o"></i> Hapus</a>
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
