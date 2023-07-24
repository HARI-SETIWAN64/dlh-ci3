
<?php $no = ($page-1)*$limit+1;?>

<br />
<div class="table-responsive">
<table id="mytable" class="tbl table-hover table-bordered" style="width:100%">
<thead>
<tr>
<th rowspan="2">NO</th>
<th align="center"><h4><span class="label label-default label-xs">
<?= $total_items ?></span></h4> </th>
<th rowspan="2">SUB KEGIATAN</th>
<th rowspan="2">ANGGARAN <br />(Rp.)</th>
<th colspan="3">FOTO</th>
<th rowspan="2">MAP</th>
</tr>
<tr>
<th>KEGIATAN</th>
<th>0 %</th>
<th>50 %</th>
<th>100 %</th>
</tr>
</thead>
<tbody>
<?php foreach($item as $row): ?>
<tr>
<td align="center"><?= $no ?></td>
<td><?= $row->sikd_kgtn_nm_kgtn ?></td>
<td>
<?php if($row->nm_subkegiatan) { ?>
		<?= $row->nm_subkegiatan ?>
<?php } else { ?>
		<?php echo '-' ;?>
<?php } ?>
</td>
<td align="right"><?= number_format($row->jumlah,0,",",".") ?></td>
<td>s</td>
<td>s</td>
<td>s</td>
<td>s</td>
</tr> 
 <?php $no++; endforeach;?> 
</tbody>
</table>
</div>

<?php 
$total_page = ceil($total_items/$limit);
if ($total_page < 1){
$total_page = '1';
}
?>




<script>
// init bootpag
$('#page-selection').bootpag({
page : <?php echo $page?>,
total: <?php echo $total_page ?>,
maxVisible: 5 
}).on("page", function(event, /* page number here */ num){

var n = num;

$(".page").html("Page " + num); 
get_skpd_kgtn(n);
});

</script>

