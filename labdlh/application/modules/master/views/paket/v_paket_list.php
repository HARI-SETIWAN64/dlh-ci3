<div class="table table-responsive"><!--table-responsive-->
  <table class="table table-bordered table-striped">
    <tr>
      <th width="200px">NAMA PAKET </th>
      <th>JENIS SAMPEL</th>
      <th width="200px">JUMLAH PARAMETER</th>
      <th width="150px">HARGA</th>
      <th width="150px">AKSI</th>
    </tr>

   <?php foreach($a as $row) :?>
      <tr>
        <td>
          <?php echo $row->nama_paket;?>
        </td>
        <td>
          <?php echo $row->jenis_sampel;?>
        </td>
        <td>
          <?php echo "Jumlah";?>
        </td>
        <td>
          <?php echo $row->harga;?>
        </td>
        <?php if($this->ion_auth->in_group(array('admin','members','manager'))){ ?>
          <td>
            <a href="<?php echo base_url()."master/paket/form/".$row->id;?>" class="btn btn-xs btn-warning"> <i class="fa fa-pencil"></i> Ubah</a>
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
