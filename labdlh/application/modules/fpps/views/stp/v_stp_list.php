<div class="table table-responsive"><!--table-responsive-->
	<table class="table table-bordered table-striped">
		<tr>
			<th width="30%">NOMOR STP</th>
			<th width="30%">NOMOR FPPS</th>
			<th>NAMA PELANGGAN</th>
			<th width="100px">Aksi</th>
		</tr>

		<?php foreach($items as $row) :?>
			<?php
			$btn_tte = "";
			$q=$this->db->query("select * from tte where fpps_id='".$row->id."' and jenis='stp' order by id desc limit 1");
			if($q->num_rows()>0){
				$tte = $q->row();
				if($tte->status == "1"){
					$btn_tte = '
					<a href="'.$tte->url_response.'" class="btn btn-xs btn-success" target="_blank" title="Cetak TTE">tte</a>
					';
				}elseif ($tte->status == 2) {
					$btn_tte = '
					<div class="btn btn-xs btn-danger" title="Cetak TTE"> <i class="fa fa-close"></i></div>
					';
				}else{
					$btn_tte = '<a href="'.base_url().'fpps/stp/stp_pdf/'.$row->id.'" class="btn btn-xs btn-primary" target="_blank" title="Cetak"> <i class="fa fa-print"></i></a>';
				}
			}else{
				$btn_tte = '<a href="'.base_url().'fpps/stp/stp_pdf/'.$row->id.'" class="btn btn-xs btn-primary" target="_blank" title="Cetak"> <i class="fa fa-print"></i></a>';
			}

			// sementara
			// $btn_tte = '<a href="'.base_url().'fpps/stp/stp_pdf/'.$row->id.'" class="btn btn-xs btn-primary" target="_blank" title="Cetak"> <i class="fa fa-print"></i></a>';
			?>

			<tr>
				<td><?php echo str_replace("FPPS","STP",$row->nomor); ?></td>
				<td><?php echo $row->nomor; ?></td>
				<td><?php echo $row->nama_pelanggan; ?></td>
				<?php if($row->bukti_pembayaran=="") $row->bukti_pembayaran="Upload"; else $row->bukti_pembayaran="Lunas" ?>
				<td>
					<a href="<?php echo base_url()."fpps/stp/lihat_disable/".$row->id;?>" class="btn btn-xs btn-warning" title="Lihat"> <i class="fa fa-eye"></i></a>
          			<a href="javascript:void(0)" onclick="ubah_footer('<?php echo $row->id?>')" class="btn btn-xs btn-success"> <i class="fa fa-tags" title="Footer"></i></a>
					<!-- <a href="<?php echo base_url()."fpps/stp/form/".$row->id;?>" class="btn btn-xs btn-warning" title="Ubah"> <i class="fa fa-pencil"></i></a> -->
					<!-- <a href="javascript:void(0)" onclick="hapus('<?php echo $row->id?>')" class="btn btn-xs btn-danger"> <i class="fa fa-trash-o" title="Hapus"></i></a> -->
					<?php echo $btn_tte; ?>
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
</script>
