<div class="box box-solid">
	<div class="box-header with-border">
		<div class="box-title">Kegiatan</div>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-12">
				<div class="panel-body">
					<?php echo form_open_multipart('internal/kegiatan/tambah', 'class="form-horizontal"');?>
					<div class="col-md-12">
						<div class="form-group">
							<label for="kegiatan" class="col-md-2 control-label">Kegiatan * :</label>
							<div class="col-md-10"><?php echo form_input('kegiatan', isset($item->kegiatan) ? $item->kegiatan : '','class="form-control" id="kegiatan"');?><?php echo form_error('kegiatan') ; ?></div>
						</div>
						<div class="form-group">
							<label for="uraian" class="col-md-2 control-label">Uraian * :</label>
							<div class="col-md-10">
								<?php 
								$data = array(
							        'name'        => 'uraian',
							        'id'          => 'uraian',
							        'value'       => isset($item->uraian) ? $item->uraian : '',
							        'rows'        => '5',
							        'cols'        => '10',
							        'style'       => 'width:90%',
							        'class'       => 'form-control'
							    );

							    echo form_textarea($data);
							    ?>
								<?php echo form_error('uraian') ; ?></div>
						</div>
						<div class="form-group">
							<label for="mulai" class="col-md-2 control-label">Mulai * :</label>
							<div class="col-md-10"><?php echo form_input('mulai', isset($item->mulai) ? $item->mulai : '','class="form-control" id="mulai"');?><?php echo form_error('mulai') ; ?></div>
						</div>
						<div class="form-group">
							<label for="sampai" class="col-md-2 control-label">Sampai * :</label>
							<div class="col-md-10"><?php echo form_input('sampai', isset($item->sampai) ? $item->sampai : '','class="form-control" id="sampai"');?><?php echo form_error('sampai') ; ?></div>
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
		var currentDate = new Date();
		$('#mulai').datepicker({
			format: "yyyy-mm-dd",
			autoclose: true,
		});
		$("#mulai").datepicker("setDate", currentDate);

		$('#sampai').datepicker({
			format: "yyyy-mm-dd",
			autoclose: true,
		});
		$("#sampai").datepicker("setDate", currentDate);

	});
</script>