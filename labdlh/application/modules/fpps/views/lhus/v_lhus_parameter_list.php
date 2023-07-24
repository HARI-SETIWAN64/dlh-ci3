<div class="table table-responsive"><!--table-responsive-->
<table class="table table-bordered table-striped">
  <tr>
    <th width="30%">PARAMATER</th>
    <th width="10%">SATUAN</th>
    <th width="20%">HASIL</th>
    <th width="30%">KETERANGAN</th>
    <th width="10%">Aksi</th>
  </tr>

 <?php foreach($rows as $row) :?>
    <tr>
      <td><?php echo $row->parameter; ?></td>
      <td><?php echo $row->lhus_satuan; ?></td>
      <td><?php echo $row->lhus_hasil; ?></td>
      <td>
        <?php echo $row->lhus_keterangan; ?>
        <?php
        if($row->lhus_hasil == "0") {
          echo $row->first_name;
        }else{
          echo $row->lhus_keterangan; 
        }
        ?>
      </td>
      <td>
        <a href="javascript:void(0)" onClick="ubah_parameter('<?php echo $row->id?>')" class="btn btn-xs btn-success" title="Isi Data Parameter" ><i class="fa fa-file-text-o"></i></a>
      </td> 
    </tr>
 <?php endforeach; ?>
</table>
</div>

<?php
$total_page = $total_items / 30;
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
