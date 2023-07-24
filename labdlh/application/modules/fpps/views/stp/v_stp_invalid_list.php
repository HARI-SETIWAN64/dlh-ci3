<div class="table table-responsive"><!--table-responsive-->
  <table class="table table-bordered table-striped">
    <tr>
      <th>NOMOR STP</th>
      <th>NOMOR FPPS</th>
      <th>NAMA PELANGGAN</th>
      <th>Validasi</th>
    </tr>

    <?php foreach($items as $row) :?>
      <tr>
        <td><?php echo str_replace("FPPS","STP",$row->nomor); ?></td>
        <td><?php echo $row->nomor; ?></td>
        <td><?php echo $row->nama_pelanggan; ?></td>
        <?php if($row->bukti_pembayaran=="") $row->bukti_pembayaran="Upload"; else $row->bukti_pembayaran="Lunas" ?>
        <td>
          <a href="<?php echo base_url()."fpps/stp/lihat_disable/".$row->id;?>" class="btn btn-xs btn-warning" title="Lihat"> <i class="fa fa-eye"></i></a>
          <a href="javascript:void(0)" onclick="valid('<?php echo $row->id?>')" class="btn btn-xs btn-success" title="setuju"> <i class="fa fa-check-circle-o"></i></a>
          <a href="javascript:void(0)" onclick="tolak('<?php echo $row->id?>')" class="btn btn-xs btn-danger" title="Tolak"> <i class="fa fa-times-circle-o"></i></a>
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

  function valid(id) {
    var answer = confirm("apakah anda yakin item ini valid?")
    if (answer){
      $.ajax({
        url: site+'fpps/stp/valid/'+id, 
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

function tolak(id) {
  var answer = confirm("apakah anda yakin item ini tolak?")
  if (answer){
    $.ajax({
      url: site+'fpps/stp/tolak/'+id, 
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
