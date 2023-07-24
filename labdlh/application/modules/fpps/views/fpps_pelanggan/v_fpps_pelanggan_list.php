<div class="table table-responsive"><!--table-responsive-->
<table class="table table-bordered table-striped">
  <tr>
    <th width="25%">NOMOR </th>
    <th width="35%">NAMA PELANGGAN</th>
    <!-- <th width="200px">BUKTI PEMBAYARAN</th> -->
    <th width="12%">STATUS</th>
    <th width="12%">KOHIR|BAYAR</th>
    <th width="3%">CTK</th>
    <?php 
    if($this->ion_auth->in_group(array('admin'))){
      echo '<th width="3%">PAD</th>';
    }
    ?>
    <?php 
    if($this->ion_auth->in_group(array('admin','admin_pelayanan','ka_lab','manager_teknis'))){
      echo '<th width="10%">AKSI</th>';
    }
    ?>
  </tr>

 <?php foreach($a as $row) {
    $status = "";
    if($row->validasi_stp == '0' and $row->validasi_lhus == '0' and $row->validasi_lhu == '0'){ 
      $status = "Pengecekan STP";
    }
    if($row->validasi_stp == '1' and $row->validasi_lhus == '0' and $row->validasi_lhu == '0'){ 
      $status = "Proses LHUS";
    }
    if($row->validasi_stp == '1' and $row->validasi_lhus == '1' and $row->validasi_lhu == '0'){ 
      $status = "Cetak LHU";
    }
    if($row->validasi_stp == '1' and $row->validasi_lhus == '1' and $row->validasi_lhu == '1'){ 
      $status = "Dokumen Selesai";
    }
  ?>
    <tr>
      <td>
        <?php echo $row->nomor; ?>
      </td>
      <td>
        <?php echo $row->nama_pelanggan; ?>
      </td>
      <?php if($row->bukti_pembayaran==""){ $row->bukti_pembayaran="Upload"; $warna="class='btn btn-xs btn-danger'"; }else{ $row->bukti_pembayaran="Lunas"; $warna="class='btn btn-xs btn-success'";} ?>
      <!-- <td>
        <a href="<?php echo base_url()."fpps/fpps_pelanggan/form_bukti/".$row->id;?>" <?php echo $warna;?> ><?php echo  $row->bukti_pembayaran; ?></a>
      </td> -->
      <td>
        <?php 
          echo $status;
        ?>
      </td>
      <td>
        <?php 
          $bayar = "";
          if($row->status_penyetoran == 1){
            $bayar = " | <b>Lunas</b>";
          }
          echo $row->no_kohir.$bayar;
        ?>
      </td>
      <td>
        <?php
        if ($this->agent->is_mobile())
        {
          ?>
        <a href="<?php echo base_url()."fpps/fpps_pelanggan/fpps_pdf/".base64_encode($row->id);?>" class="btn btn-xs btn-success" title="cetak mobile"> <i class="fa fa-print"></i></a>
        <?php
        }
        else
        {
          ?>
          <a href="<?php echo base_url()."fpps/fpps_pelanggan/fpps_pdf/".base64_encode($row->id);?>" class="btn btn-xs btn-success" title="cetak" target="_blank" > <i class="fa fa-print"></i></a>
        <?php
        }
        ?>
      </td>

      <?php if($this->ion_auth->in_group(array('admin', 'admin_pelayanan'))){ ?>
          <td>
        <?php if($row->validasi_retribusi == '1'){ ?>
            <a href="<?php echo base_url()."fpps/fpps_pelanggan/cetak_skrd/".base64_encode($row->id);?>" class="btn btn-xs btn-success" target="_blank"> <i class="fa fa-print" title="Cetak SKRD"></i></a>
        <?php }else if($row->validasi_retribusi == '0'){ ?>
            <a href="<?php echo base_url()."fpps/fpps_pelanggan/pengesahan_epad/".$row->id;?>" class="btn btn-xs btn-warning"> <i class="fa fa-check" title="Pengesahan Data Epad" onclick="return confirm('Apakah anda yakin mengesahkan data E-PAD?')"></i></a>
        <?php }else{ ?>
            <a href="<?php echo base_url()."fpps/fpps_pelanggan/veri_pajak/".$row->id;?>" class="btn btn-xs btn-danger"> <i class="fa fa-money" title="Kirim Ke Epad" onclick="return confirm('Apakah anda yakin data ini akan kirim ke E-PAD?')"></i></a>
        <?php } ?>
          </td>
      <?php } ?>
      <?php if($this->ion_auth->in_group(array('admin','admin_pelayanan','ka_lab','manager_teknis'))){ ?>
        <td>
          <a href="javascript:void(0)" onclick="timeline_doc('<?php echo $row->id?>')" class="btn btn-success btn-xs" title="Timeline"><i class="fa fa-sitemap"></i></a>
          <a href="<?php echo base_url()."fpps/fpps_pelanggan/lihat_disable/".$row->id;?>" class="btn btn-xs btn-warning"> <i class="fa fa-eye" title="Lihat"></i></a>
          <a href="javascript:void(0)" onclick="ubah_footer('<?php echo $row->id?>')" class="btn btn-xs btn-success"> <i class="fa fa-tags" title="Footer"></i></a>
          <?php if($row->validasi_fpps<>"1"){ ?>
          <a href="javascript:void(0)" onclick="hapus('<?php echo $row->id?>')" class="btn btn-xs btn-danger" title="Hapus"> <i class="fa fa-trash-o"></i></a>
          <?php } ?>
        </td> 
      <?php } ?>
    </tr>
 <?php } ?>
</table>
</div>

<?php
$total_page = $total_items / 20;
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
