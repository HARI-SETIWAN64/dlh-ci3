<div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">UPLOAD IMAGE</h3>
			  	</div>
				
				 <div class="box-body">
				 <form class='form-horizontal' name='form_foto' id="form_foto" role="form">
				   <?php  
echo form_hidden('ID_EMSKGTN',$emskabid);
echo form_hidden('TAHUN',$tahunpil);
echo form_hidden('SKPD',$skpdpil);
?>
 
<div class="form-group">
          <label for="" class="col-md-3 control-label"></label>
          <div class="col-md-9">
	<?php if($noted->images){?>
	<img src="<?php echo base_url()?>images/emsfoto/<?= $noted->images?>" alt="Image preview" class="thumbnail" style="max-width: 250px; max-height: 250px">
	<?php }?>

            <!-- bootstrap-imageupload. -->
            <div class="imageupload panel panel-default">

                <div class="file-tab panel-body">




                    <label class="btn btn-default btn-file">
                        <span>Browse</span>
                        <!-- The file is stored here. -->
                        <input type="file" name="file_name">
                    </label>
                    <button type="button" class="btn btn-default">Remove</button>
                </div>
            </div>

          </div>
        </div>
									
									
									
									
									
									
									
									
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">  </label>

										<div class="col-sm-9">
										
<a class='btn btn-primary pull-left' href='javascript:void(0)' onclick='simpan()'><i class="glyphicon glyphicon-upload"></i>&nbsp; Upload</a> 

										
										</div>
									</div>
     
</form>
				 </div>
				 </div>






<script language="javascript">
function simpan(){
	var data = new FormData(document.getElementById("form_foto"));
	$.ajax({
        url: '<?php echo base_url()?>admin/kegiatan/save_form_foto', 
		data: $(document.form_foto.elements).serialize(),			
        success: function(r){          
			json = $.parseJSON(r);
			 if (json.status == 'success') {
			$('#ajax-modal').modal('hide');		
			dpa_emskab_fotonol();							
				 }else{				  	
				 }
            },
        type: "post", 
        dataType: "json",
		fileElementId	:"userfile",
		contentType: false,
    	processData: false,
		mimeType:"multipart/form-data"
    }); 
    return false;
}
</script>

 

