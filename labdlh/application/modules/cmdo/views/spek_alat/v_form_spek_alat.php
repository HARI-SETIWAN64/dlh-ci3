<div class="box box-default">
	<div class="box-header with-border">
		<div class="panel-heading"><strong>ALAT</strong></div>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-12">
				<div class="panel-body">
					<?php echo form_open_multipart('cmdo/spek_alat/form', 'class="form-horizontal"');?>
					<div class="col-md-12">
						<div class="form-group">
							<label for="id_alat" class="col-md-2 control-label">Nama Alat * :</label>
							<div class="col-md-10"><?php echo form_dropdown('id_alat', $spek_alat, '','class="form-control"  id="id_alat"');?><?php echo form_error('id_alat') ; ?></div>
						</div>
						<div class="form-group">
							<label for="kode_alat" class="col-md-2 control-label">Kode Alat * :</label>
							<div class="col-md-10"><?php echo form_input('kode_alat', isset($item->kode_alat) ? $item->kode_alat : '','class="form-control" id="kode_alat" required');?><?php echo form_error('kode_alat') ; ?></div>
						</div>
						<div class="form-group">
							<label for="brand" class="col-md-2 control-label">Brand* :</label>
							<div class="col-md-10"><?php echo form_input('brand', isset($item->brand) ? $item->brand : '','class="form-control" id="brand" required');?><?php echo form_error('brand') ; ?></div>
						</div>
						<div class="form-group">
							<label for="model" class="col-md-2 control-label">Model* :</label>
							<div class="col-md-10"><?php echo form_input('model', isset($item->model) ? $item->model : '','class="form-control" id="model" required');?><?php echo form_error('model') ; ?></div>
						</div>
						<div class="form-group">
							<label for="noseri" class="col-md-2 control-label">No Seri* :</label>
							<div class="col-md-10"><?php echo form_input('noseri', isset($item->noseri) ? $item->noseri : '','class="form-control" id="noseri" required');?><?php echo form_error('noseri') ; ?></div>
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

