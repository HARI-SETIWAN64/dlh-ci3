<div class="box box-default">
	<div class="box-header with-border">
		<div class="panel-heading"><strong>Kegiatan</strong></div>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-12">
				<div class="panel-body">
					<?php echo form_open_multipart('internal/kegiatan/simpan_ubah_hasil/'.$id, 'class="form-horizontal"');?>
					<div class="col-md-12">
						<div class="form-group">
							<label for="hasil_kegiatan" class="col-md-2 control-label">Uraian * :</label>
							<div class="col-md-10">
								<?php 
								$data = array(
                 'name'        => 'hasil_kegiatan',
                 'id'          => 'hasil_kegiatan',
                 'value'       => isset($item->hasil_kegiatan) ? $item->hasil_kegiatan : '',
                 'rows'        => '5',
                 'cols'        => '10',
                 'style'       => 'width:90%',
                 'class'       => 'form-control'
               );

               echo form_textarea($data);
               ?>
               <?php echo form_error('hasil_kegiatan') ; ?></div>
             </div>

             <div class="form-group">
              <label for="hasil_kegiatan" class="col-md-2 control-label">File * :</label>
              <div class="col-md-10">
                <input type="file" id="file" name="file" />
                <?php echo form_error('file') ; ?>
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