<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">IMPOR KEGIATAN</h3>
			  	</div>
				
				 <div class="box-body">
				 <form class='form-horizontal' name='form_kgtn' id="form_kgtn" role="form">
  <?php  
echo form_hidden('KD_DPA',$noted->id_dpa_skpd_kgtn);
echo form_hidden('KD_KGTN',$noted->sikd_kgtn_id);
echo form_hidden('TAHUN',$tahunpil);
echo form_hidden('SKPD',$skpdpil);
?>
<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> KEGIATAN</label>

										<div class="col-sm-9"> 
										<?php echo form_input('nm_kgtn',$noted->nm_kegiatan,'class="form-control col-xs-10 col-sm-5" type="text" placeholder="Nama Kegiatan" required readonly="readonly"');?>
										
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> SUB KEGIATAN </label>

										<div class="col-sm-9">
										<?php echo form_input('nm_subkegiatan',$noted->nm_subkegiatan,'class="form-control col-xs-10 col-sm-5" type="text" placeholder="SUB KEGIATAN" required readonly="readonly"');?>
										
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> TAHUN </label>
										<div class="col-sm-9">
										<?php echo $this->fungsi->build_select_year_ems('tahun','class="form-control col-xs-10 col-sm-5" readonly="readonly" disabled',$tahunpil);?>			
										</div>
									</div>
									
									
									
									
									
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">  </label>

										<div class="col-sm-9">
										
<a class='btn btn-primary pull-right' href='javascript:void(0)' onclick='simpan()'><i class="glyphicon glyphicon-floppy-disk"></i>&nbsp; Simpan</a> 

										
										</div>
									</div>
     
</form>
				 </div>
				 </div>





<script language="javascript">
function simpan(){
	$.ajax({
        url: '<?php echo base_url()?>admin/kegiatan/save_impor', 
		data: $(document.form_kgtn.elements).serialize(), 
        success: function(r){          
			json = $.parseJSON(r);
			 if (json.status == 'success') {
			$('#ajax-modal').modal('hide');		
			get_skpd_kgtn();							
				 }else{				  	
				 }
            },
        type: "post", 
        dataType: "html"
    }); 
    return false;
}
</script>

