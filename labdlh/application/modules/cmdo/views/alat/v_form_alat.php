<div class="box box-default">
	<div class="box-header with-border">
		<div class="panel-heading"><strong>ALAT</strong></div>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-12">
				<div class="panel-body">
					<?php echo form_open_multipart('cmdo/alat/form', 'class="form-horizontal"');?>
					<div class="col-md-12">
						<div class="form-group">
							<label for="nama_alat" class="col-md-2 control-label">Nama Alat * :</label>
							<div class="col-md-10"><?php echo form_input('nama_alat', isset($item->nama_alat) ? $item->nama_alat : '','class="form-control" id="nama_alat" required');?><?php echo form_error('nama_alat') ; ?></div>
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

