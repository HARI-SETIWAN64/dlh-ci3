<section>
	<?php echo form_open_multipart('lhu/lhu_admin/form'.$item->nomor_lhus, 'class="form-horizontal"');?>
	<div class="box box-default">
		<div class="box-header with-border">
			<div class="panel-heading"><strong>UMUM</strong></div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
					<div class="panel-body">
						<div class="col-md-6">
							<div class="form-group">
								<label for="nomor_lhus" class="col-md-4 control-label">No * :</label>
								<div class="col-md-8"><?php echo form_input('nomor_lhus', isset($item->nomor_lhus) ? $item->nomor_lhus : '','class="form-control" id="nomor_lhus"');?><?php echo form_error('nomor_lhus') ; ?></div>
							</div>
							<div class="form-group">
								<label for="jenis_sampel_ket" class="col-md-4 control-label">Jenis Sampel :</label>
								<div class="col-md-8"><?php echo form_input('jenis_sampel_ket', isset($item->jenis_sampel_ket) ? $item->jenis_sampel_ket : '','class="form-control"  id="jenis_sampel_ket"');?><?php echo form_error('jenis_sampel_ket') ; ?></div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="no_sampel" class="col-md-4 control-label">No Sampel * :</label>
								<div class="col-md-8"><?php echo form_input('no_sampel', isset($item->no_sampel) ? $item->no_sampel : '','class="form-control" id="no_sampel"');?><?php echo form_error('no_sampel') ; ?></div>
							</div>
							<div class="form-group">
								<label for="tanggal_mulai_pengujian" class="col-md-4 control-label">Mulai Pengujian * :</label>
								<div class="col-md-8"><?php echo form_input('tanggal_mulai_pengujian', isset($item->tanggal_mulai_pengujian) ? $item->tanggal_mulai_pengujian : '','class="form-control"  id="tanggal_mulai_pengujian"');?><?php echo form_error('tanggal_mulai_pengujian') ; ?></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div align="center" id="simpan">
				<?php echo form_submit('submit', 'Simpan','class="btn btn-primary" onclick="return confirm(\'Apakah anda sudah yakin ?\');"');?>
			</div>
			<?php echo form_hidden($csrf); ?>
			<?php echo form_close();?> 
		</div>
		<br/>
	</div>
	<div class="panel panel-info">
		<div class="box-header with-border">
			<div class="panel-heading"><strong>Hasil Pengujian</strong></div>
		</div>
		<div class="panel-body">
          <div class="row">
            <div class="col-md-12">
				<div id="content_items"></div>
			</div>
          </div>
        </div>
  	</div>
</section>

<?php 
$nomor_lhus = !empty($item->nomor_lhus) ? $item->nomor_lhus : '';
$nomor_lhus = !empty($item->nomor_lhus) ? $item->nomor_lhus : '';
 echo form_hidden('nomor_lhus',$nomor_lhus)
?>

<script type="text/javascript">

var url = "<?php echo base_url()?>";
function ubah(id)
{
 	$('#ajax-modal').modal('show');
    $('.modal-title').text('Merubah Parameter');
    $.get(url+'lhu/lhu_admin/ubah_lhus_parameter/'+id,{}, function(data) {
        $("#ajax-modalin").html(data);
    });
}

$(function() {
	get_items();
});

var page = '1';
function get_items(page){
    $("#content_items").html('<i class="fa fa-refresh fa-spin"></i>');
	var url = '<?php echo site_url() ?>';
	var like = {'nama' : '<?php echo $nomor_lhus ?>'};
	var datae = {'page' : page};
	$.post(url+'lhu/lhus_admin/lhus_parameter_list', $.param(like) + '&' + $.param(datae),
	function(data) {
		$("#content_items").html(data);
	});
}

</script>