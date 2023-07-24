<form method='post' action='' name='form_ubah' class='form-horizontal' id="form_ubah" >
  <div class="panel panel-default">
    <div class="panel-heading">Detail Penugasan</div>
      <div class="panel-body ">
          <div class="col-md-12">
              <div class="form-group">
                <label for="" class="col-sm-4 control-label"><div>Jenis Tugas	:</div> </label>
                <div class="col-sm-8">
                  <div class="form-control" readonly>
                    <?php echo $item->jenis_tugas; ?>
                  </div>
                </div>
              </div>
			  <div class="form-group">
                <label for="" class="col-sm-4 control-label"><div>Karyawan	:</div> </label>
                <div class="col-sm-8">
                  <div class="form-control" readonly>
                    <?php echo $item->first_name; ?>
                  </div>
                </div>
              </div>
			  <div class="form-group">
							<label for="uraian_tugas" class="col-sm-4 control-label">Uraian Tugas  :</label>
							<div class="col-md-8">
								<?php 
								$data = array(
							        'name'        => 'uraian_tugas',
							        'id'          => 'uraian_tugas',
							        'value'       => isset($item->uraian_tugas) ? $item->uraian_tugas : '',
							        'rows'        => '5',
							        'cols'        => '10',
							        'style'       => 'width:100%',
							        'class'       => 'form-control',
									'readonly'	  => 'true',
							    );

							    echo form_textarea($data);
							    ?>
							</div>
			  </div>
			  <div class="form-group">
                <label for="" class="col-sm-4 control-label"><div>Batas Pengumpulan	:</div> </label>
                <div class="col-sm-8">
                  <div class="form-control" readonly>
                    <?php echo $item->batas_pengumpulan; ?>
                  </div>
                </div>
              </div>
			  <div class="form-group">
                <label for="" class="col-sm-4 control-label"><div>File Pendukung	:</div> </label>
                <div class="col-sm-8">
                  <div class="form-control"readonly>
				  	<?php if($item->file_pendukung <> ""){ ?>
					<a href="<?php echo base_url().'file/penugasan/'.$item->file_pendukung ?>" class="btn btn-xs btn-success" title="Download" target="_blank">Download</a>
					<?php } ?>
                    <?php echo $item->file_pendukung; ?>
				  </div>
				</div>
              </div>
          </div>
		  
      </div> 
  </div>
  <?php if($item->status == 3){ ?>
  <div class="panel panel-default">
    <div class="panel-heading">Detail Hasil Tugas</div>
      <div class="panel-body ">
          <div class="col-md-12">
		  <div class="form-group">
							<label for="uraian_tugas" class="col-sm-4 control-label">Uraian Hasil  :</label>
							<div class="col-md-8">
								<?php 
								$data = array(
							        'name'        => 'uraian_tugas',
							        'id'          => 'uraian_tugas',
							        'value'       => isset($item->uraian_hasil) ? $item->uraian_hasil : '',
							        'rows'        => '5',
							        'cols'        => '10',
							        'style'       => 'width:100%',
							        'class'       => 'form-control',
									'readonly'	  => 'true',
							    );

							    echo form_textarea($data);
							    ?>
							</div>
			  </div>
			  <div class="form-group">
                <label for="" class="col-sm-4 control-label"><div>Hasil Tugas	:</div> </label>
                <div class="col-sm-8">
                  <div class="form-control"readonly>
				  	<?php if($item->file <> ""){ ?>
					<a href="<?php echo base_url().'file/penugasan/'.$item->file ?>" class="btn btn-xs btn-success" title="Download" target="_blank">Download</a>
					<?php } ?>
                    <?php echo $item->file; ?>
                  </div>
                </div>
              </div>
          </div>
      </div> 
  </div>
  <?php } ?>
</form>
