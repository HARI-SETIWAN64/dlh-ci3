<div class="box box-default">
	<div class="box-header with-border">
		<div class="panel-heading"><strong>PARAMETER</strong></div>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-12">
				<div class="panel-body">
					<?php echo form_open_multipart('master/parameter/form', 'class="form-horizontal"');?>
					<div class="col-md-12">
						<div class="form-group">
							<label for="parameter" class="col-md-2 control-label">Parameter * :</label>
							<div class="col-md-10"><?php echo form_input('parameter', isset($item->parameter) ? $item->parameter : '','class="form-control" id="parameter"');?><?php echo form_error('parameter') ; ?></div>
						</div>
						<div class="form-group">
							<label for="metode" class="col-md-2 control-label">Metode * :</label>
							<div class="col-md-10"><?php echo form_input('metode', isset($item->metode) ? $item->metode : '','class="form-control"  id="metode"');?><?php echo form_error('metode') ; ?></div>
						</div>
						<div class="form-group">
							<label for="baku_mutu" class="col-md-2 control-label">Baku Mutu * :</label>
							<div class="col-md-10"><?php echo form_input('baku_mutu', isset($item->baku_mutu) ? $item->baku_mutu : '','class="form-control"  id="baku_mutu"');?><?php echo form_error('baku_mutu') ; ?></div>
						</div>
						<div class="form-group">
							<label for="satuan" class="col-md-2 control-label">Satuan * :</label>
							<div class="col-md-10"><?php echo form_input('satuan', isset($item->satuan) ? $item->satuan : '','class="form-control"  id="satuan"');?><?php echo form_error('satuan') ; ?></div>
						</div>
						<div class="form-group">
							<label for="sim_tarif_pajak_id" class="col-md-2 control-label">Link Tarif Epad * :</label>
							<div class="col-md-10"><?php echo form_dropdown('sim_tarif_pajak_id', $tarif, isset($item->sim_tarif_pajak_id) ? $item->sim_tarif_pajak_id : '','class="form-control select2" onchange="get_harga();" id="sim_tarif_pajak_id"');?><?php echo form_error('sim_tarif_pajak_id') ; ?></div>
						</div>
						<div class="form-group">
							<label for="harga" class="col-md-2 control-label">Harga * :</label>
							<div class="col-md-10"><?php echo form_input('harga', isset($item->harga) ? $item->harga : '','class="form-control"  id="harga"');?><?php echo form_error('harga') ; ?></div>
						</div>
						<div class="form-group">
							<label for="user_analis" class="col-md-2 control-label">Analis * :</label>
							<div class="col-md-10"><?php echo form_dropdown('user_analis', $analis, isset($item->user_analis) ? $item->user_analis : '','class="form-control"  id="user_analis"');?><?php echo form_error('user_analis') ; ?></div>
						</div>
						<br /><br />
						<div class="form-group">
							<div align="center" id="simpan">
								<?php echo form_submit('submit', 'Simpan','class="btn btn-primary" onclick="return confirm(\'Apakah anda sudah yakin ?\');"');?>
							</div>
							<?php echo form_hidden($csrf); ?>
							<?php echo form_close();?> 
						</div>
					</div>
				</div>
				<div id="distance"> </div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	
	$(function() {
		$('.select2').select2()
	});



	function get_harga() {
		var sim_tarif_pajak_id = $('select[name=sim_tarif_pajak_id]').val();
		$.ajax({
			url: "<?php echo site_url();?>"+'master/parameter/get_harga/'+sim_tarif_pajak_id,
			success: function (r) {
				json = $.parseJSON(r);
				$('[name="harga"]').val(json); 
			},
			type: "post",
			dataType: "html"
		});
	}
</script>