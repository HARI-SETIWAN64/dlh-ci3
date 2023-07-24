<section>
	<?php echo form_open_multipart('master/paket/form', 'class="form-horizontal"');?>
	<div class="box box-default">
		<div class="box-header with-border">
			<div class="panel-heading"><strong>SAMPEL</strong></div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
					<div class="panel-body">
						<div class="col-md-6">
							<div class="form-group">
								<label for="jenis_sampel" class="col-md-4 control-label">Nama Paket * :</label>
								<div class="col-md-8"><?php echo form_input('nama_paket', isset($item->nama_paket) ? $item->nama_paket : '','class="form-control" id="nama_paket"');?><?php echo form_error('nama_paket') ; ?></div>
							</div>
							<div class="form-group">
								<label for="jenis_sampel" class="col-md-4 control-label">Jns Sampel * :</label>
								<div class="col-md-8"><?php echo form_dropdown('jenis_sampel', $jenis_sampel, isset($item->jenis_sampel) ? $item->jenis_sampel : '','class="form-control" id="jenis_sampel" required');?><?php echo form_error('jenis_sampel') ; ?></div>
							</div>
							<div class="form-group">
								<label for="jumlah_sampel" class="col-md-4 control-label">Harga * :</label>
								<div class="col-md-8"><?php echo form_input('harga', isset($item->harga) ? $item->harga : '','class="form-control" id="harga"');?><?php echo form_error('harga') ; ?></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-info">
		<div class="box-header with-border">
			<div class="panel-heading"><strong>Parameter dan Metode Yang Diuji </strong></div>
		</div>
		<div class="panel-body">
          <div class="row">
            <?php foreach ($parameter as $parameters) { ?>
              <div class="col-md-4">
              	<div class="col-md-9">
               		<?php 
               		$cek = "";
               		echo $parameters->parameter;
               		if(isset($parameters->nomor)){
               			if($parameters->nomor!=""){
               				$cek = "checked";
               			}
               		}
               		?>
              	</div>
              	<div class="col-md-3">
               		<input type="checkbox" name="parameter[<?php echo $parameters->id ?>]" value="1" <?php echo $cek; ?>><br>
              	</div>
              </div>
            <?php } ?>
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
	</div>
</section>