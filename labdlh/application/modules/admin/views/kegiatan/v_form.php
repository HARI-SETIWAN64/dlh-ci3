<div class="panel panel-default">
    <div class="panel-heading">Form Upload</div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">

<?php  echo form_open_multipart('admin/kegiatan/form_foto/'.$skpdpil.'/'.$dpapil.'/'.$kgtnpil.'/'.$idpil.'/'.$thnpil, 'id="form_c" class="form-horizontal" ');?>


 <?php  
echo form_hidden('ID_EMSKGTN',$idpil);
echo form_hidden('TAHUN',$thnpil);
echo form_hidden('SKPD',$skpdpil);
?>



      



        <div class="form-group">
          <label for="" class="col-md-2 control-label">Foto</label>
          <div class="col-md-9">
	

            <!-- bootstrap-imageupload. -->
            <div class="imageupload panel panel-default">

                <div class="file-tab panel-body">




                    <label class="btn btn-default btn-file">
                        <span>Browse</span>
                        <!-- The file is stored here. -->
                        <input type="file" name="file">
                    </label>
                    <button type="button" class="btn btn-default">Remove</button>
                </div>
            </div>

          </div>
        </div><!-- /.form-group -->


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






