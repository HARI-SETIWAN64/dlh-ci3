<?php $no = ($page-1)*$limit+1;?>



<div class="table-responsive">
<table id="mytable" class="tbl table-hover table-bordered" style="width:100%">
<thead>
<tr>
<th rowspan="2">NO</th>
<th><h4><span class="label label-default label-xs">
<?= $total_items ?></span></h4></th>
<th rowspan="2">SUB KEGIATAN</th>
<th>DPA</th>
<th rowspan="2">IMPORT</th>
</tr>
<tr>
<th>KEGIATAN</th>
<th>( Rp. )</th>
</tr>
</thead>
<tbody>
<?php $kodedpa_nil = ''; foreach($item as $row): ?>
<?php
if($th_kgtn == '2017') {
	$kodedpa = $this->admin_model->get_emskab($row->dpa_kode_asli,$th_kgtn)->num_rows(); 
	$kodedpa_nil = $kodedpa;
	}
else if($th_kgtn == '2018') {
	$kodedpa = $this->admin_model->get_emskab($row->dpa_kode_asli,$th_kgtn)->num_rows(); 
	$kodedpa_nil = $kodedpa;
	}
else { $kodedpa_nil = 'ok'; }
?>
<tr>
<td align="center"><?= $no ?></td>
<td><?= $row->sikd_kgtn_nm_kgtn ?></td>
<td><?php if($row->nm_subkegiatan) { ?>
		<?= $row->nm_subkegiatan ?>
<?php } else { ?>
		<?php echo '-' ;?>
<?php } ?></td>
<td align="right"><?= number_format($row->jumlah,0,",",".") ?></td>
<td align="center">
<?php if($kodedpa_nil) { ?>
		<span class="glyphicon glyphicon-check"></span>
<?php } else { ?>
		<a style="width:100%" href="javascript:void(0)" class="btn btn-xs btn-info" onclick="formimpor(<?= $row->dpa_kode_asli ?>)"><i class="ace-icon fa fa-pencil bigger-120"></i></a>
<?php } ?>
</td>
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

<span>Halaman <?php echo $page?></span>


<div id="page-selection" align="center"></div>

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

