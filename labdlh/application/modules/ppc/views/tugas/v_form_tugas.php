<div class="box box-default">
	<div class="box-header with-border">
		<div class="panel-heading"><strong>TUGAS</strong></div>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-12">
				<div class="panel-body">
					<?php echo form_open_multipart('ppc/tugas/form', 'class="form-horizontal"');?>
					<div class="col-md-12">
						<div class="form-group">
							<label for="project" class="col-md-2 control-label">Tugas * :</label>
							<div class="col-md-10"><?php echo form_input('tugas', isset($item->tugas) ? $item->tugas : '','class="form-control" id="tugas"');?><?php echo form_error('tugas') ; ?></div>
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

