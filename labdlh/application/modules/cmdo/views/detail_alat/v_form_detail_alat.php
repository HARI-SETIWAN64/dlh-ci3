<div class="box box-default">
	<div class="box-header with-border">
		<div class="panel-heading"><strong>DETAIL ALAT</strong></div>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-12">
				<div class="panel-body">
					<?php if($id_detail==""){$get = "";}else{$get = "/$id_detail";} ?>
					<?php echo form_open_multipart('cmdo/detail_alat/simpan_form'.$get, 'class="form-horizontal"');?>
					<div class="col-md-12">
						<?php if($id_detail==""){ ?>
						    <div class="form-group">
								<label for="id_alat" class="col-md-2 control-label">Nama Alat * :</label>
								<div class="col-md-10">
								<?php echo form_dropdown('id_alat',$alat,'','class="form-control select2" onchange="getspek()" id="id_alat" ');?>
								</div>
								<?php echo form_error('id_alat') ; ?>
							</div>

							<div class="form-group">
								<label for="id_spek" class="col-md-2 control-label">Kode Alat * :</label>
								<div class="col-md-10">
									<?php echo form_dropdown('id_spek',array(),'','class="form-control select2" id="id_spek" name="id_spek" onchange="return autofill();" ');      ?>
								</div>
								<?php echo form_error('id_spek') ; ?>
							</div>
							<div class="form-group">
								<label for="brand" class="col-md-2 control-label">Merk * :</label>
								<div class="col-md-10"><?php echo form_input('brand', isset($item->brand) ? $item->brand : '','class="form-control" id="brand" readonly');?><?php echo form_error('brand') ; ?></div>
						   </div>
							<div class="form-group">
								<label for="model" class="col-md-2 control-label">Model * :</label>
								<div class="col-md-10"><?php echo form_input('model', isset($item->model) ? $item->model : '','class="form-control" id="model" readonly');?><?php echo form_error('model') ; ?></div>
							</div>
							<div class="form-group">
								<label for="noseri" class="col-md-2 control-label">No Seri * :</label>
								<div class="col-md-10"><?php echo form_input('noseri', isset($item->noseri) ? $item->noseri : '','class="form-control" id="noseri" readonly');?><?php echo form_error('noseri') ; ?></div>
							</div>
							<?php }else{ ?>
								<?php foreach ($items as $row){ ?>
								<div class="form-group">
								<label for="id_alat" class="col-md-2 control-label">Nama Alat * :</label>
								<div class="col-md-10">
								<?php echo form_dropdown('id_alat',$alat, isset($row->id_alat) ? $row->id_alat :'','class="form-control select2" onchange="getspek()" id="id_alat" ');?>
								</div>
								<?php echo form_error('id_alat') ; ?>
							</div>
							<div class="form-group">
								<label for="id_spek" class="col-md-2 control-label">Kode Alat * :</label>
								<div class="col-md-5">
								<div class="form-control" readonly >
											<?php echo  $row->kode_alat; ?>
								</div>
								<a><font color="red">*Data Lama</font></a>
								</div>
								<div class="col-md-5">
									<?php echo form_dropdown('id_spek',array(), isset($row->id_spek) ? $row->id_spek :'','class="form-control select2" id="id_spek" name="id_spek" onchange="return autofill();" ');      ?>
								<a><font color="red">*Data Baru</font></a>
								</div>
									<?php echo form_error('id_spek') ; ?>
								</div>
							<div class="form-group">
								<label for="brand" class="col-md-2 control-label">Merk * :</label>
								<div class="col-md-10"><?php echo form_input('brand', isset($row->brand) ? $row->brand : '','class="form-control" id="brand" readonly');?><?php echo form_error('brand') ; ?></div>
						   </div>
							<div class="form-group">
								<label for="model" class="col-md-2 control-label">Model * :</label>
								<div class="col-md-10"><?php echo form_input('model', isset($row->model) ? $row->model : '','class="form-control" id="model" readonly');?><?php echo form_error('model') ; ?></div>
							</div>
							<div class="form-group">
								<label for="noseri" class="col-md-2 control-label">No Seri * :</label>
								<div class="col-md-10"><?php echo form_input('noseri', isset($row->noseri) ? $row->noseri : '','class="form-control" id="noseri" readonly');?><?php echo form_error('noseri') ; ?></div>
							</div>
							<?php } ?>
						<?php } ?>
						<div class="form-group">
							<label for="titikkalibrasi" class="col-md-2 control-label">Titik Kalibrasi * :</label>
							<div class="col-md-10"><?php echo form_input('titikkalibrasi', isset($item->titikkalibrasi) ? $item->titikkalibrasi : '','class="form-control" id="titikkalibrasi" required');?><?php echo form_error('titikkalibrasi') ; ?></div>
						</div>
						<div class="form-group">
							<label for="kelas" class="col-md-2 control-label">Kelas * :</label>
							<div class="col-md-10"><?php echo form_input('kelas', isset($item->kelas) ? $item->kelas : '','class="form-control" id="kelas" required');?><?php echo form_error('kelas') ; ?></div>
						</div>
						<div class="form-group">
							<label for="daya" class="col-md-2 control-label">Daya * :</label>
							<div class="col-md-8"><?php echo form_input('daya', isset($item->daya) ? $item->daya : '','class="form-control" id="daya" required');?><?php echo form_error('daya') ; ?></div>
							<div class="col-md-2"> <?php echo form_dropdown('satuan_daya', array(
									""=>"Satuan", 'V'=>'V', 'W'=>'W', 'A'=>'A', 'J'=>'J', 'VA'=>'VA','Ω'=>'Ω', 'hz'=>'hz', '-'=>'-' ), isset($item->satuan_periode) ? $item->satuan_periode : '','class="form-control" id="satuan_periode"'); ?>
								</div>
						</div>
						<div class="form-group">
								<label for="usagerange" class="col-md-2 control-label form-row">Rentang Pemakaian * :</label>
								<div class="col-md-8"><?php echo form_input('usagerange', isset($item->usagerange) ? $item->usagerange : '','class="form-control" id="usagerange" required');?><?php echo form_error('usagerange') ; ?></div>
								<div class="col-md-2"> <?php echo form_dropdown('satuan_rentang', array(
									""=>"Satuan", '°C'=>'°C', 'ml'=>'ml', 'gram'=>'gram', 'nm'=>'nm', 'μS/cm'=>'μS/cm', 'NTU'=>'NTU', '‰'=>'‰',
									'ppm'=>'ppm', 'm3/min'=>'m3/min', 'L/min'=>'L/min', 'dB'=>'dB', 'ms'=>'ms', 'rpm'=>'rpm', 'Abs'=>'Abs', 's'=>'s', 'mbar'=>'mbar', '-'=>'-' ), isset($item->satuan_rentang) ? $item->satuan_rentang : '','class="form-control" id="satuan_rentang"'); ?>
								</div>
						</div>
						<div class="form-group">
								<label for="resolusion" class="col-md-2 control-label form-row">Resolusi * :</label>
								<div class="col-md-8"><?php echo form_input('resolusion', isset($item->resolusion) ? $item->resolusion : '','class="form-control" id="resolusion" required');?><?php echo form_error('resolusion') ; ?></div>
								<div class="col-md-2"> <?php echo form_dropdown('satuan_resolusi', array(
									""=>"Satuan", '°C'=>'°C', 'ml'=>'ml', 'gram'=>'gram', 'nm'=>'nm', 'μS/cm'=>'μS/cm', 'NTU'=>'NTU', '‰'=>'‰',
									'ppm'=>'ppm', 'm3/min'=>'m3/min', 'L/min'=>'L/min', 'dB'=>'dB', 'ms'=>'ms', 'rpm'=>'rpm', 'Abs'=>'Abs', 's'=>'s', 'mbar'=>'mbar', '-'=>'-' ), isset($item->satuan_resolusi) ? $item->satuan_resolusi : '','class="form-control" id="satuan_resolusi"'); ?>
								</div>
						</div>
						<div class="form-group">
								<label for="tolerance" class="col-md-2 control-label form-row">Toleransi * :</label>
								<div class="col-md-8"><?php echo form_input('tolerance', isset($item->tolerance) ? $item->tolerance : '','class="form-control" id="tolerance" required');?><?php echo form_error('tolerance') ; ?></div>
								<div class="col-md-2"> <?php echo form_dropdown('satuan_toleransi', array(
									""=>"Satuan", '°C'=>'°C', 'ml'=>'ml', 'gram'=>'gram', 'nm'=>'nm', 'μS/cm'=>'μS/cm', 'NTU'=>'NTU', '‰'=>'‰',
									'ppm'=>'ppm', 'm3/min'=>'m3/min', 'L/min'=>'L/min', 'dB'=>'dB', 'ms'=>'ms', 'rpm'=>'rpm', 'Abs'=>'Abs', 's'=>'s', 'mbar'=>'mbar', '-'=>'-' ), isset($item->satuan_toleransi) ? $item->satuan_toleransi : '','class="form-control" id="satuan_toleransi"'); ?>
								</div>
						</div>
						 <div class="form-group">
							<label for="periode" class="col-md-2 control-label form-row">Periode * :</label>
								<div class="col-md-8"><?php echo form_input('periode', isset($item->periode) ? $item->periode : '','class="form-control" id="periode" required');?><?php echo form_error('periode') ; ?></div>
								<div class="col-md-2"> <?php echo form_dropdown('satuan_periode', array(
									""=>"Periode", 'Bulan'=>'Bulan', 'Tahun'=>'Tahun', '-'=>'-' ), isset($item->satuan_periode) ? $item->satuan_periode : '','class="form-control" id="satuan_periode"'); ?>
								</div>
						</div>
	
						<div class="form-group">
							<label for="provider" class="col-md-2 control-label">Provider * :</label>
							<div class="col-md-10"><?php echo form_input('provider', isset($item->provider) ? $item->provider : '','class="form-control" id="provider" required');?><?php echo form_error('provider') ; ?></div>
						</div>

						<?php if($id_detail==""){ ?>
						<div class="form-group">
							<label for="user_id" class="col-md-2 control-label">PIC * :</label>
							<div class="col-md-10"><?php echo form_dropdown('user_id',$pegawai, '','class="form-control" id="user_id" required');?><?php echo form_error('user_id') ; ?></div>
						</div>
						<div class="form-group">
							<label for="lastcal" class="col-md-2 control-label">Kalibrasi Terakhir * :</label>
							<div class="col-md-10">
								<input type="date" name="lastcal" class="form-control" required>
								<?php echo form_error('lastcal'); ?>
							</div>
						</div>
						<div class="form-group">
							<label for="nextcal" class="col-md-2 control-label">Kalibrasi Selanjutnya * :</label>
							<div class="col-md-10">
								<input type="date" name="nextcal" class="form-control" required>
								<?php echo form_error('nextcal'); ?>
							</div>
						</div>
						<div class="form-group">
							<label for="userfile" class="col-md-2 control-label">File * :</label>
							<div class="col-md-10">
								<input type="file" id="file" name="file" />
								<?php echo form_error('file') ; ?>
							</div>
						</div>

						<?php }else{ ?>
							<?php foreach ($items as $row){ ?>
						<div class="form-group">
							<label for="user_id" class="col-md-2 control-label">PIC * :</label>
							<div class="col-md-10"><?php echo form_dropdown('user_id',$pegawai , isset($item->user_id) ? $item->user_id :'','class="form-control" id="user_id"');?><?php echo form_error('user_id') ; ?></div>
						</div>
						<div class="form-group">
							<label for="lastcal" class="col-md-2 control-label">Kalibrasi Terakhir * :</label>
							<div class="col-md-6">
								<input type="date" name="lastcal" class="form-control" value="<?php echo $item->lastcal?>">
								<?php echo form_error('lastcal'); ?>
							</div>
						</div>
						<div class="form-group">
							<label for="nextcal" class="col-md-2 control-label">Kalibrasi Selanjutnya * :</label>
							<div class="col-md-6">
								<input type="date" name="nextcal" class="form-control"  value="<?php echo $item->nextcal?>">
								<?php echo form_error('nextcal'); ?>
							</div>
						</div>
							<div class="form-group">
								<label for="userfile" class="col-md-2 control-label">File * :</label>
								<div class="col-md-6">
									<div class="form-control" readonly >
											<?php echo  $row->file; ?></div>
									</div>
									<input type="file" id="file" name="file" />
									<?php echo form_error('file') ; ?>
								</div>
							
							<div class="form-group">
								<label for="user_id" class="col-md-2 control-label">PIC * :</label>
								<div class="col-md-10"><?php echo form_dropdown('user_id',$pegawai , isset($item->user_id) ? $item->user_id :'','class="form-control" id="user_id"');?><?php echo form_error('user_id') ; ?></div>
							</div>
							<?php } ?>
						<?php } ?>

						

						<div class="form-group">
							<div align="right" id="simpan">
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


<script type="application/javascript">
  $(function() {
    $('.select2').select2()
  }); 
  function getspek(){
    alat = $("#id_alat").val();	
    // alert(alat);
    load('cmdo/detail_alat/spek/'+alat,'#id_spek');
  } 

   function autofill(){
        var wadah =document.getElementById('id_spek').value;
        $.ajax({
                       url:"<?php echo base_url();?>cmdo/detail_alat/cari",
                       data:'&id_spek='+wadah,
                       success:function(data){
                           var hasil = JSON.parse(data);  
                     
            $.each(hasil, function(key,val){ 
                 
               document.getElementById('id_spek').value=val.id_spek;
                           document.getElementById('brand').value=val.brand;
                           document.getElementById('model').value=val.model;
                           document.getElementById('noseri').value=val.noseri;  
                                
                     
                });
            }
                   });
                   
    }

	$(function() {
		var currentDate = new Date();
		$('#lastcal').datepicker({
			format: "yyyy-mm-dd",
			autoclose: true,
		});
		$("#lastcal").datepicker("setDate", currentDate);

		$('#nextcal').datepicker({
			format: "yyyy-mm-dd",
			autoclose: true,
		});
		$("#nextcal").datepicker("setDate", currentDate);

	});
</script>