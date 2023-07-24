<div class="box box-default">
	<div class="box-header with-border">
		<div class="panel-heading"><strong>Kegiatan</strong></div>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-12">
				<div class="panel-body">
          <?php if($id==""){$get = "";}else{$get = "/$id";} ?>
					<?php echo form_open_multipart('ujibanding/juknis/simpan_form'.$get, 'class="form-horizontal"');?>
					<div class="col-md-12">
            <div class="form-group">
              <label for="" class="col-md-2 control-label"> <div>Tampil *</div> </label>
              <div class="col-sm-10">
              <?php echo form_dropdown('tampil', array('1'=>"Tampil","0"=>"Tidak"), '1','class="form-control"  id="tampil" required');?>
              </div>
            </div>
             <div class="form-group">
              <label for="file" class="col-md-2 control-label">File * :</label>
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