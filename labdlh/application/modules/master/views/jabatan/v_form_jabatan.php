<div class="box box-default">
	<div class="box-header with-border">
		<div class="panel-heading"><strong>JABATAN</strong></div>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-12">
				<div class="panel-body">
					<?php echo form_open_multipart('master/jabatan/form', 'class="form-horizontal"');?>
					<div class="col-md-12">
						<div class="form-group">
							<label for="jabatan" class="col-md-2 control-label">Jabatan * :</label>
							<div class="col-md-10"><?php echo form_input('jabatan', isset($item->jabatan) ? $item->jabatan : '','class="form-control" id="jabatan"');?><?php echo form_error('jabatan') ; ?></div>
						</div>
						<div class="form-group">
							<label for="nama" class="col-md-2 control-label">Nama * :</label>
							<div class="col-md-10"><?php echo form_input('nama', isset($item->nama) ? $item->nama : '','class="form-control"  id="nama"');?><?php echo form_error('nama') ; ?></div>
						</div>
						<div class="form-group">
							<label for="users_id" class="col-md-2 control-label">Analis * :</label>
							<div class="col-md-10"><?php echo form_dropdown('users_id', $users, isset($item->users_id) ? $item->users_id : '','class="form-control"  id="users_id"');?><?php echo form_error('users_id') ; ?></div>
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

