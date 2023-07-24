<div class="table table-responsive"><!--table-responsive-->
<table class="table table-bordered table-striped">
  <tr>
    <th width="90%">Parameter</th>
    <th width="10%">Valid</th>
  </tr>

 <?php foreach($a as $row) {
    $status = "";
    if($row->stujui == "1"){$status = "Stujui"; $status_id='0'; $color="black";}
    else if($row->stujui == "0"){ $status = "Tolak";  $status_id='1'; $color="red";}
  ?>
    <tr>
      <td>
        <?php echo $row->parameter; ?>
      </td>
      <td>
        <a href="javascript:void(0)" onclick="stujui('<?php echo $row->id?>', <?php echo $status_id; ?>)"><?php echo "<font color='$color'>$status </font>";?></i></a>
      </td>
    </tr>
 <?php } ?>
</table>
</div>

<?php
$total_page = $total_items / 1000;
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
