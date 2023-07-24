<div class="table table-responsive"><!--table-responsive-->
  <table class="table table-bordered table-striped">
    <tr>
      <th width="15%">Jenis Tugas</th>
      <th width="15%">Karyawan</th>
      <!-- <th width="10%">Uraian Tugas</th>
      <th widht="10">File Pendukung</th> -->
      <th width="15%">Tanggal Penugasan</th>
      <!-- <th width="10%">Batas Pengumpulan</th> -->
      <th width="15%">Status</th>
      <th width="15%">Ketepatan</th>
      <!-- <th width="10%">Hasil Tugas</th>
      <th width="10%">Uraian Hasil</th> -->
      <th widht="15%">Keterangan</th>
      <th width="10%">AKSI</th>
    </tr>
    <?php $status=array('4'=>'Menunggu Diperbaiki', '3'=>'Selesai Dikerjakan', '1'=>'Sedang Dikerjakan', '0'=>'Menunggu Dikerjakan') ?>
    <?php $status_project=array('3'=>'Tepat Waktu','1'=>'Terlambat', '0'=>'') ?>
    <?php $keterangan=array('4'=>'Diterima', '3'=>'Diperbaiki', '1'=>'Dikerjakan Ulang', '0'=>'') ?>
    <?php foreach($items as $row) :?>
      <tr>
        <td><?php echo $row->jenis_tugas; ?></td>
        <td><?php echo $row->first_name; ?></td>
        <!-- <td><?php echo $row->uraian_tugas; ?></td>
        <td>
          <?php if($row->file_pendukung <> ""){ ?>
          <a href="<?php echo base_url().'file/penugasan/'.$row->file_pendukung ?>" class="btn btn-xs btn-success" title="Download" target="_blank">Download</a>
          <?php } ?>
        </td> -->
        <td><?php echo $row->tanggal_penugasan; ?></td>
        <!-- <td><?php echo $row->batas_pengumpulan; ?></td> -->
        <td>
          <?php if($this->ion_auth->in_group(array('analis','admin_pelayanan'))){?>
          <?php if($row->status=="0"){ ?>
            <a href="javascript:void(0)" onclick="status('<?php echo $row->id?>', '1')"class="btn btn-xs btn-danger">Kerjakan</a>
          <?php }else if($row->status=="4"){ ?>
            <a href="javascript:void(0)" onclick="status('<?php echo $row->id?>', '1')"class="btn btn-xs btn-warning">Perbaiki</a>
          <?php }else{ ?>
            <?php echo $status[$row->status]; ?></a>
          <?php } ?>
          <?php }?>
          <!-- tampilan user -->
          <?php if($this->ion_auth->in_group(array('manager_teknis','admin'))){?>
          <?php echo $status[$row->status]; ?>
          <?php }?>
          <!-- tampilan admin -->
        </td>
        <td>
          <?php echo $status_project[$row->status_project]; ?>
        </td>
        <!-- <td>
          <?php if($row->file <> ""){ ?>
          <a href="<?php echo base_url().'file/penugasan/'.$row->file ?>" class="btn btn-xs btn-success" title="Download" target="_blank">Download</a>
          <?php } ?>
        </td>
        <td><?php echo $row->uraian_hasil; ?></td> -->
        <td>
          <?php if($this->ion_auth->in_group(array('manager_teknis','admin'))){?> 
            <?php if($row->status==3){ ?>
              <?php if($row->keterangan==0){ ?>
                <a href="javascript:void(0)" onclick="keterangan('<?php echo $row->id?>', '1', '0', '0')"class="btn btn-xs btn-danger" title="Kerjakan Ulang"><i class="fa fa-remove"></i></a>
                <a href="javascript:void(0)" onclick="keterangan('<?php echo $row->id?>', '3', '4', '0')"class="btn btn-xs btn-warning" title="Perbaiki"><i class="fa fa-wrench"></i></a>
                <a href="javascript:void(0)" onclick="keterangan_diterima('<?php echo $row->id?>', '4')"class="btn btn-xs btn-success" title="Diterima"><i class="fa fa-check"></i></a>
              <?php }else if($row->keterangan==1){ ?>
                <a href="javascript:void(0)" onclick="keterangan('<?php echo $row->id?>', '1', '0', '0')"class="btn btn-xs btn-danger" title="Kerjakan Ulang"><i class="fa fa-remove"></i></a>
                <a href="javascript:void(0)" onclick="keterangan('<?php echo $row->id?>', '3', '4', '0')"class="btn btn-xs btn-warning" title="Perbaiki"><i class="fa fa-wrench"></i></a>
                <a href="javascript:void(0)" onclick="keterangan_diterima('<?php echo $row->id?>', '4')"class="btn btn-xs btn-success" title="Diterima"><i class="fa fa-check"></i></a>
              <?php }else if($row->keterangan==3){ ?>
                <a href="javascript:void(0)" onclick="keterangan('<?php echo $row->id?>', '1', '0', '0')"class="btn btn-xs btn-danger" title="Kerjakan Ulang"><i class="fa fa-remove"></i></a>
                <a href="javascript:void(0)" onclick="keterangan('<?php echo $row->id?>', '3', '4', '0')"class="btn btn-xs btn-warning" title="Perbaiki"><i class="fa fa-wrench"></i></a>
                <a href="javascript:void(0)" onclick="keterangan_diterima('<?php echo $row->id?>', '4')"class="btn btn-xs btn-success" title="Diterima"><i class="fa fa-check"></i></a>
              <?php }else{ ?>
                <?php echo $keterangan[$row->keterangan]; ?>
              <?php } ?>
            <?php }else{?>
              <?php echo $keterangan[$row->keterangan]; ?>
            <?php }?>
          <?php }?>
          <!-- tampilan admin -->

          <?php if($this->ion_auth->in_group(array('analis','admin_pelayanan'))){?>
            <?php echo $keterangan[$row->keterangan]; ?>
          <?php }?>
          <!-- tampilan user -->
        </td>
        <td>
        <?php if($this->ion_auth->in_group(array('admin','manager_teknis'))){?>
          <a href="ppc/penugasan/form/<?php echo $row->id; ?>" class="btn btn-xs btn-warning" title="Ubah"> <i class="fa fa-pencil"></i></a>
          <a href="javascript:void(0)" onclick="hapus('<?php echo $row->id?>')" class="btn btn-xs btn-danger" title="Hapus"> <i class="fa fa-trash-o"></i></a>
          <?php }?>
          <?php if($this->ion_auth->in_group(array('admin','analis','admin_pelayanan'))){?>
            <?php if($row->keterangan==4){ ?>
            <?php }else{?>
              <a href="ppc/penugasan/ubah_hasil/<?php echo $row->id; ?>" class="btn btn-success btn-xs" title="Pengumpulan Hasil Project"><i class="fa fa-clone"></i></a>
            <?php }?>
          <?php }?>
          <a href="javascript:void(0)" onclick="detail('<?php echo $row->id?>')" class="btn btn-xs btn-info" title="Detail"> <i class="fa fa-eye"></i></a>
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
  function status(id, status) {
    var answer = confirm("Apakah anda yakin menyelesaikan Tugas Ini?")
    if (answer){
      $.ajax({
        url: site+'ppc/penugasan/status/'+id+'/'+status, 
        success: function(r){
          json = $.parseJSON(r);
          if (json.status == 'success') {
            get_items();
          }else{
            alert('gagal...')
          }
        },
        type: "post", 
        dataType: "html"
      }); 
      return false;
    }
    else{}
  }

  function keterangan(id, keterangan, status, status_project) {
    var answer = confirm("Jika memilih perbaiki atau kerjakan ulang                                             'JANGAN LUPA MENGUBAH BATAS PENGUMPULAN'")
    if (answer){
      $.ajax({
        url: site+'ppc/penugasan/keterangan/'+id+'/'+keterangan+'/'+status+'/'+status_project, 
        success: function(r){
          json = $.parseJSON(r);
          if (json.status == 'success') {
            get_items();
          }else{
            alert('gagal...')
          }
        },
        type: "post", 
        dataType: "html"
      }); 
      return false;
    }
    else{}
  }

  function keterangan_diterima(id, keterangan) {
    var answer = confirm("Jika memilih perbaiki atau kerjakan ulang                                             'JANGAN LUPA MENGUBAH BATAS PENGUMPULAN'")
    if (answer){
      $.ajax({
        url: site+'ppc/penugasan/keterangan_diterima/'+id+'/'+keterangan, 
        success: function(r){
          json = $.parseJSON(r);
          if (json.status == 'success') {
            get_items();
          }else{
            alert('gagal...')
          }
        },
        type: "post", 
        dataType: "html"
      }); 
      return false;
    }
    else{}
  }

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
