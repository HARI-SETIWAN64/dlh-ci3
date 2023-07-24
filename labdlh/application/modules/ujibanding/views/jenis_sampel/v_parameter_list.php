<div class="table table-responsive"><!--table-responsive-->
<table class="table table-bordered table-striped">
  <tr>
    <th width="100px">KODE</th>
    <th>JENIS SAMPEL</th>
    <th width="200px">Tampil</th>
  </tr>

 <?php foreach($items as $row) :?>
    <tr>
      <td><?php echo $row->kode; ?></td>
      <td><?php echo $row->nama; ?></td>
      <td>
        <?php 
          if($row->tampil_uji_banding == "1"){$tampil = "Tampil"; $tampil_id='0'; $color="black";}
          else if($row->tampil_uji_banding == "0"){ $tampil = "Tutup";  $tampil_id='1'; $color="red";}
        ?>
        <a href="javascript:void(0)" onclick="tampil('<?php echo $row->id?>', <?php echo $tampil_id; ?>)"><?php echo "<font color='$color'>$tampil </font>";?></i></a>
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
