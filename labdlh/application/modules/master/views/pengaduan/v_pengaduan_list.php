<div class="table table-responsive"><!--table-responsive-->
  <table class="table table-bordered table-striped">
    <tr>
      <th width="25%">Isi</th>
      <th width="15%">Tanggal</th>
      <th width="25%">Tanggapan</th>
      <th width="15%">Tanggal</th>
      <th width="10%">Status</th>
      <th width="10%">AKSI</th>
    </tr>
    <?php foreach($items as $row) :?>
      <tr>
        <td><?php echo $row->isi; ?></td>
        <td><?php echo $row->tgl_create; ?></td>
        <td><?php echo $row->tanggapan; ?></td>
        <td><?php echo $row->tgl_tanggapan; ?></td>
        <td>
          <?php if($row->validasi == "0" ) {?>
            <a href="javascript:void(0)" onclick="validasi('<?php echo $row->id?>','1')" title="Menampilkan ke halaman depan">Hide</a>
          <?php }else{ ?>
            <a href="javascript:void(0)" onclick="validasi('<?php echo $row->id?>', '0')" title="Menyembunyikan dari halaman depan">Show</a>
          <?php } ?>
        </td>
        <td>
          <a href="javascript:void(0)" onclick="ubah('<?php echo $row->id?>')" class="btn btn-xs btn-warning"> <i class="fa fa-pencil"></i></a>
          <a href="javascript:void(0)" onclick="hapus('<?php echo $row->id?>')" class="btn btn-xs btn-danger"> <i class="fa fa-trash-o"></i></a>
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


  function validasi(id, validasi) {
    if(validasi == "1"){
      var answer = confirm("Apakah anda yakin pengaduan ini ditampilkan?");
    }else{
      var answer = confirm("Apakah anda yakin pengaduan ini disembunyikan?");
    }
    if (answer){
      $.ajax({
        url: site+'master/pengaduan/validasi/'+id+'/'+validasi, 
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
</script>
