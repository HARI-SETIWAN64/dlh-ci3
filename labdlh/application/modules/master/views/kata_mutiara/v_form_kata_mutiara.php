<div class="box box-default">
	<div class="box-header with-border">
		<div class="panel-heading"><strong>Kata Mutiara</strong></div>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-12">
				<div class="panel-body">
					<?php echo form_open_multipart('master/kata_mutiara/form', 'class="form-horizontal"');?>
					<div class="col-md-12">
						<div class="form-group">
							<label for="kata_mutiara" class="col-md-2 control-label">Kata Mutiara * :</label>
							<div class="col-md-10">
			                <?php
			                  $data = array(
			                      'name'        => 'kata_mutiara',
			                      'id'          => 'kata_mutiara',
			                      'value'       => set_value('kata_mutiara'),
			                      'rows'        => '8',
			                      'cols'        => '20',
			                      'style'       => 'width:100%',
			                      'class'       => 'form-control'
			                  );

			                  echo form_textarea($data);
			                  ?>
                  			<?php echo form_error('kata_mutiara') ; ?></div>
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

