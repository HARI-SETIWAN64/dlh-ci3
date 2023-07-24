<div class="box box-default">
	<div class="box-header with-border">
		<div class="panel-heading"><strong>Hasil Tugas</strong></div>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-12">
				<div class="panel-body">
					<?php echo form_open_multipart('ppc/penugasan/simpan_ubah_hasil/'.$id, 'class="form-horizontal"');?>
					<div class="col-md-12">
						<div class="form-group">
							<label for="uraian_hasil" class="col-md-2 control-label">Uraian Hasil * :</label>
							<div class="col-md-10">
								<?php 
								$data = array(
                 'name'        => 'uraian_hasil',
                 'id'          => 'uraian_hasil',
                 'value'       => isset($item->uraian_hasil) ? $item->uraian_hasil : '',
                 'rows'        => '3',
                 'cols'        => '10',
                 'style'       => 'width:90%',
                 'class'       => 'form-control'
               );

               echo form_textarea($data);
               ?>
               <?php echo form_error('uraian_hasil') ; ?></div>
             </div>

             <div class="form-group">
              <label for="uraian_hasil" class="col-md-2 control-label">Status * :</label>
              <div class="col-md-10">
              <input type="radio" name="status" value="3" required> Selesai
                <?php echo form_error('status') ; ?>
              </div>
              </div>

             <div class="form-group">
              <label for="uraian_hasil" class="col-md-2 control-label">File * :</label>
              <div class="col-md-10">
                <input type="file" id="file" name="file" />
                <?php echo form_error('file') ; ?>
              </div>
              <br /><br />
              <div class="form-group">
               <div align="center" id="simpan">
                <?php echo form_submit('submit', 'Simpan','class="btn btn-primary" onclick="return confirm(\'Apakah anda sudah yakin file anda benar ?\');"');?>
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