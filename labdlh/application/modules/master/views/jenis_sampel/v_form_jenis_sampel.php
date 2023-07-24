<div class="box box-default">
	<div class="box-header with-border">
		<div class="panel-heading"><strong>JENIS SAMPEL</strong></div>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-12">
				<div class="panel-body">
					<?php echo form_open_multipart('master/jenis_sampel/form', 'class="form-horizontal"');?>
					<div class="col-md-12">
						<div class="form-group">
							<label for="kode" class="col-md-2 control-label">Kode * :</label>
							<div class="col-md-10"><?php echo form_input('kode', isset($item->kode) ? $item->kode : '','class="form-control" id="kode"');?><?php echo form_error('kode') ; ?></div>
						</div>
						<div class="form-group">
							<label for="jenis_sampel" class="col-md-2 control-label">Jenis Sampel * :</label>
							<div class="col-md-10"><?php echo form_input('jenis_sampel', isset($item->jenis_sampel) ? $item->jenis_sampel : '','class="form-control"  id="jenis_sampel"');?><?php echo form_error('jenis_sampel') ; ?></div>
						</div>
						<div class="form-group">
							<label for="no_urut_dokumen" class="col-md-2 control-label">No Urut * :</label>
							<div class="col-md-10"><?php echo form_input('no_urut_dokumen', isset($item->no_urut_dokumen) ? $item->no_urut_dokumen : '','class="form-control"  id="no_urut_dokumen"');?><?php echo form_error('no_urut_dokumen') ; ?></div>
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

