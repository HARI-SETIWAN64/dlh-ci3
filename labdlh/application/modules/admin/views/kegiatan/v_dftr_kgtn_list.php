<?php $no = ($page-1)*$limit+1;?>

<div class="table-responsive">
<table id="mytable" class="tbl table-hover table-bordered" style="width:100%">
<thead>
<tr>
<th rowspan="2">NO</th>
<th><h4><span class="label label-default label-xs">
<?= $total_items ?></span></h4></th>
<th rowspan="2">SUB KEGIATAN</th>
<th colspan="3">FOTO</th>
<th rowspan="2">MAP</th>
</tr>
<tr>
<th>KEGIATAN</th>
<th>( 0 % )</th>
<th>( 50 % )</th>
<th>( 100 % )</th>
</tr>
</thead>
<tbody>
<?php foreach($item as $row): ?>
<tr>
<td align="center"><?= $no ?></td>
<td>
<a href="<?php echo base_url();?>admin/kegiatan/detail_kgtn/<?= $row->SKPD ?>/<?= $row->KD_DPA ?>/<?= $row->KD_KGTN ?>/<?= $row->ID ?>/<?= $row->TAHUN ?>">
<?= $row->KD_KGTN ?></a></td>
<td><?= $row->KD_KGTN ?></td>
<td align="center">
<?php $jum_0 = $this->admin_model->emskab_img0_list(array('a.ID_EMSKGTN'=>$row->ID),'','100','0')->num_rows(); 
if($jum_0){ echo $jum_0; } else { echo '0';}
?>
</td>
<td align="center">
<?php $jum_50 = $this->admin_model->emskab_img50_list(array('a.ID_EMSKGTN'=>$row->ID),'','100','0')->num_rows(); 
if($jum_50){ echo $jum_50; } else { echo '0';}
?>
</td>
<td align="center">
<?php $jum_100 = $this->admin_model->emskab_img100_list(array('a.ID_EMSKGTN'=>$row->ID),'','100','0')->num_rows(); 
if($jum_100){ echo $jum_100; } else { echo '0';}
?>
</td>
<td align="center">
<?php $jum_map = $this->admin_model->emskab_map_list(array('a.id_map_field'=>$row->ID),'','100','0')->num_rows(); 
if($jum_map){ echo '<i class="glyphicon glyphicon-map"></i>'; } else { echo '';}
?>
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
dpa_emskab_kgtn(n);
});

</script>

