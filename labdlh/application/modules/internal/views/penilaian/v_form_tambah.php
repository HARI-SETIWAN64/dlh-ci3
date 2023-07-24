<div class="box box-solid">
	<div class="box-header with-border">
		<div class="box-title">Nama Pegawai</div>
	</div>
	<div class="box-body">
		<div class="row">
			<?php echo form_open_multipart('internal/penilaian/tambah', 'class="form-horizontal"');?>
			<div class="panel-body">
				<div class="col-md-4">
					<div class="form-group">
						<div class="col-md-12"><?php echo form_dropdown('master_penilaian_id', $penilaian, '','class="form-control"  id="master_penilaian_id"');?><?php echo form_error('master_penilaian_id') ; ?></div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="user_id" class="col-md-4 control-label">Nama * :</label>
						<div class="col-md-8"><?php echo form_dropdown('user_id', $pegawai, '','class="form-control"  id="user_id"');?><?php echo form_error('user_id') ; ?></div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="tanggal" class="col-md-6 control-label">Tanggal * :</label>
						<div class="col-md-6"><?php echo form_input('tanggal',date("Y-m-d"),'class="form-control" id="tanggal"');?><?php echo form_error('tanggal') ; ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="box box-solid">
	<div class="box-header with-border">
		<div class="box-title">Penilaian</div>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="panel-body">
				<div class="col-md-12">
					<?php foreach($soals as $soal){ ?>
						<div class="form-group">
							<label for="<?php echo "ket_".$soal->id ?>" class="col-md-10 control-label"><?php echo $soal->keterangan ?> </label>
							<div class="col-md-2">
								<?php $angka = array("1"=>"1","2"=>"2","3"=>"3","4"=>"4","5"=>"5","6"=>"6","7"=>"7","8"=>"8","9"=>"9","10"=>"10",)?>
								<?php echo form_dropdown("nilai_id[".$soal->id."]", $angka, '','class="form-control"');?>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<br />
<div class="form-group">
	<div align="center" id="simpan">
		<?php echo form_submit('submit', 'Simpan','class="btn btn-primary" onclick="return confirm(\'Apakah anda sudah yakin ?\');"');?>
	</div>
	<?php echo form_hidden($csrf); ?>
	<?php echo form_close();?> 
	<div id="distance"> </div>
	<div class="clearfix"></div>
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