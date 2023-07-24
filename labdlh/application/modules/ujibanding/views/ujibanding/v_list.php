<div class="table table-responsive"><!--table-responsive-->
<table class="table table-bordered table-striped">
  <tr>
    <th width="15%">Tanggal</th>
    <th width="40%">Nama</th>
    <th width="10%">Sampel</th>
    <th width="25%">Status</th>
    <th width="10%">Aksi</th>
  </tr>

 <?php foreach($a as $row) {
    $status = "";
    if($row->status == '0'){ $status = "Antrian pengecekan";
    }else if($row->status == '1'){ $status = "Stujui, menunggu sampel dikirim";
    }else if($row->status == '2'){ $status = "Ditolak, silahakan cek kembali";
    }else if($row->status == '3'){ $status = "Sampel Dikirim";
    }else if($row->status == '4'){ $status = "Sampel Diterima";
    }else if($row->status == '5'){ $status = "Selesai Uji";
    }
  ?>
    <tr>
      <td>
        <?php echo $row->date_create; ?>
      </td>
      <td>
        <?php echo $row->nama_instansi; ?>
      </td>
      <td>
        <?php echo $row->jenis_sampel; ?>
      </td>
      <td>
        <?php 
          echo $status;
        ?>
      </td>
      <td>
        <?php if($row->status == '0'){ ?>
        <a href="ujibanding/validsi_0/<?php echo $row->id; ?>" class="btn btn-xs btn-danger"><i class="fa fa-pencil"></i></a>
        <?php }else if($row->status == '1'){ ?>
        <a href="javascript:void(0)" onclick="status('<?php echo $row->id?>', '3')" class="btn btn-xs btn-danger"><i class="fa fa-send"></i></a>
        <?php }else{?>
        <a href="ujibanding/detail/<?php echo $row->id; ?>" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>
        <?php } ?>
        <?php 
          if($row->file<>""){
            ?>
              <a href="<?php echo base_url()."/contestwangi/file/hasil_uji/".$row->file ?>" class="btn btn-xs btn-success" title="Download PDF Hasil Uji" target="blank">
                <i class="fa fa-file-pdf-o"></i>
              </a>
            <?php
          }
        ?>
      </td>
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
