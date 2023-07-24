<div class="table table-responsive"><!--table-responsive-->
  <table class="table table-bordered table-striped">
    <tr>
      <th width="30%">Nomor </th>
      <th width="55%">Nama Pelanggan</th>
      <th width="5%">Ket</th>
      <?php 
      if($this->ion_auth->in_group(array('admin','admin_pelayanan'))){
        echo '<th width="10%">AKSI</th>';
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
        <td>
          <?php 
          if($row->kemampuan_personil==null){
            echo '<div class="btn btn-xs btn-danger" data-toggle="tooltip" title="Yang Memasukkan data adalah \'PEMOHON\', silahkan cek dahulu hasil inputan kemudian simpan / verifikasi"><i class="fa fa-close"></i></div>';
          } 
          ?>
        </td>
        <?php if($row->bukti_pembayaran==""){ $row->bukti_pembayaran="Upload"; $warna="class='btn btn-xs btn-danger'"; }else{ $row->bukti_pembayaran="Lunas"; $warna="class='btn btn-xs btn-success'";} ?>
        <?php if($this->ion_auth->in_group(array('admin','admin_pelayanan'))){ ?>
          <td>
            <?php if($row->kemampuan_personil<>null){ ?>
              <a href="javascript:void(0)" onclick="valid('<?php echo $row->id?>')" class="btn btn-xs btn-success" title="valid"> <i class="fa fa-check-circle-o"></i></a>
            <?php } ?>
            <a href="<?php echo base_url()."fpps/fpps_pelanggan/form/".$row->id;?>" class="btn btn-xs btn-warning" title="ubah / Verifikasi"> <i class="fa fa-pencil"></i></a>
            <a href="javascript:void(0)" onclick="hapus('<?php echo $row->id?>')" class="btn btn-xs btn-danger" title="hapus"> <i class="fa fa-trash-o"></i></a>
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
    maxVisible: 5,
    firstLastUse: true, 
    first: 'First',
    last: 'Last',
    prev: 'Prev',
    next: 'Next',
  }).on("page", function(event, /* page number here */ num){

    var n = num;
    //$("#content").html("Insert content"); // some ajax content loading...
    $(".page").html("Page " + num);
    get_items(n);

  });
</script>
