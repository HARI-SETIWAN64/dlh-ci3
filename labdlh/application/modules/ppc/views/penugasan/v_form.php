<div class="box box-solid">
	<div class="box-header with-border">
		<div class="box-title">Penugasan</div>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-12">
				<div class="panel-body">
					<?php if($id==""){$get = "";}else{$get = "/$id";} ?>
					<?php echo form_open_multipart('ppc/penugasan/simpan_form'.$get, 'class="form-horizontal"');?>
					<div class="col-md-12">
						<div class="form-group">
							<label for="jenis_tugas_id" class="col-md-2 control-label"><Sub></Sub> Jenis Tugas * :</label>
							<div class="col-md-10"><?php echo form_dropdown('jenis_tugas_id',$jenis_tugas,isset($item->jenis_tugas_id) ? $item->jenis_tugas_id : '','class="form-control" id="jenis_tugas_id" required');?></div>
						</div>
						<div class="form-group">
							<label for="user_id" class="col-md-2 control-label"><Sub></Sub> Karyawan * :</label>
							<div class="col-md-10"><?php echo form_dropdown('user_id', $karyawan,isset($item->user_id) ? $item->user_id : '','class="form-control"  id="user_id" required');?></div>
						</div>
						<div class="form-group">
							<label for="uraian_tugas" class="col-md-2 control-label">Uraian Tugas * :</label>
							<div class="col-md-10">
								<?php 
								$data = array(
							        'name'        => 'uraian_tugas',
							        'id'          => 'uraian_tugas',
							        'value'       => isset($item->uraian_tugas) ? $item->uraian_tugas : '',
							        'rows'        => '5',
							        'cols'        => '10',
							        'style'       => 'width:100%',
							        'class'       => 'form-control'
							    );

							    echo form_textarea($data);
							    ?>
								</div>
						</div>
						<?php if($id==""){ ?>
						<div class="form-group">
							<label for="tanggal_penugasan" class="col-md-2 control-label">Tanggal Penugasan * :</label>
							<div class="col-md-10">
							<input type="date" name="tanggal_penugasan" required>
							</div>
						</div>
						<div class="form-group">
							<label for="batas_pengumpulan" class="col-md-2 control-label">Batas Pengumpulan * :</label>
							<div class="col-md-10">
							<input type="datetime-local" name="batas_pengumpulan" required>
							</div>
						</div>
						<div class="form-group">
							<label for="uraian_hasil" class="col-md-2 control-label">File Pendukung * :</label>
							<div class="col-md-4">
								<input type="file" id="file" name="file" />
							</div>
						</div>
						<?php }else{?>
							<div class="form-group">
							<label for="tanggal_penugasan" class="col-md-2 control-label">Tanggal Penugasan * :</label>
							<div class="col-md-10">
							<input type="date" name="tanggal_penugasan" value="<?php echo $item->tanggal_penugasan?>" required>	
							</div>
						</div>
						<div class="form-group">
							<label for="batas_pengumpulan" class="col-md-2 control-label">Batas Pengumpulan * :</label>
							<div class="col-md-10">
							<input type="datetime-local" name="batas_pengumpulan" value="<?php echo $item->batas_pengumpulan?>" required>
							</div>
						</div>
						<div class="form-group">
							<label for="uraian_hasil" class="col-md-2 control-label">File Pendukung * :</label>
							<div class="col-md-6">
								<div class="form-control" readonly>
								<?php echo $item->file_pendukung?>
								</div>
								</div>
								<input type="file" id="file" name="file" />
							</div>
						</div>
						<?php }?>
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
		$('#tanggal_penugasan').datepicker({
			format: "yyyy-mm-dd",
			autoclose: true,
		});
		$("#tanggal_penugasan").datepicker("setDate", currentDate);

		$('#batas_pengumpulan').datepicker({
			format: "yyyy-mm-dd",
			autoclose: true,
		});
		$("#batas_pengumpulan").datepicker("setDate", currentDate);

	});
</script>