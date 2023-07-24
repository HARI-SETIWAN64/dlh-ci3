<div class="panel panel-default">
    <div class="panel-heading">Form Bukti Pembayarn</div>
      <div class="panel-body">
          <div class="row">
              <div class="col-md-12">
                <?php  echo form_open_multipart('fpps/fpps_pelanggan/simpan_bukti/'.$fpps->id, 'id="form_c" class="form-horizontal" ');?>
                <div class="form-group">
                  <label for="" class="col-md-2 control-label">GAMBAR</label>
                  <div class="col-md-9">
                  <?php if($fpps->bukti_pembayaran){?>
                  <img src="<?php echo base_url()?>images/bukti/<?= $fpps->bukti_pembayaran?>" alt="Image preview" class="thumbnail" style="max-width: 250px; max-height: 250px">
                  <?php }?>
                    <!-- bootstrap-imageupload. -->
                    <div class="pdfupload panel panel-default">
                        <div class="file-tab panel-body">
                            <label class="btn btn-default btn-file">
                                <span>Browse</span>
                                <!-- The file is stored here. -->
                                <input type="file" name="file">
                            </label>
                            <!-- <button type="button" class="btn btn-default">Remove</button> -->
                        </div>
                    </div>

                  </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-md-2 control-label"></label>
                    <div class="col-md-4">
                    	<input name="submit" value="Simpan" class="btn btn-primary" type="submit">
                    </div>
                </div>
              </div>
              <?php echo form_close()?>
          </div>
        </div>
    </div>
</div>
