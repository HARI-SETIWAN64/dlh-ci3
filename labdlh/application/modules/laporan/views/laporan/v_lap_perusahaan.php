<div class="table table-responsive"><!--table-responsive-->
  <table class="table table-bordered table-striped">
    <tr>
      <th>Nama</th>
      <th width="20%">NPWRD</th>
      <th width="20%">NIB</th>
      <th width="10%">Perlin</th>
      <th width="10%">Ipal</th>
      <th width="30%">Kab</th>
      <th width="30%">Kec</th>
      <th width="30%">Kel</th>
      <th width="60%">Alamat</th>
      <th width="20%">Telp</th>
      <th width="20%">Email</th>
      <th width="20%">Jenis Usaha</th>
    </tr>

    <?php foreach($items as $row) :?>
      <tr>
        <td><?php echo $row->nama; ?></td>
        <td><?php echo $row->npwp; ?></td>
        <td><?php echo $row->nib; ?></td>
        <td><?php if($row->perlin == '1'){ echo "Ada";}else{ echo "Tidak ada"; } ?></td>
        <td><?php if($row->ipal == '1'){ echo "Ada";}else{ echo "Tidak ada"; } ?></td>
        <td><?php echo $row->kab; ?></td>
        <td><?php echo $row->NAMA_KEC; ?></td>
        <td><?php echo $row->NAMA_KEL; ?></td>
        <td><?php echo $row->alamat; ?></td>
        <td><?php echo $row->telp; ?></td>
        <td><?php echo $row->email; ?></td>
        <td><?php echo $row->jenis_usaha; ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</div>

<?php
$total_page = $total_items / 10000;
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
