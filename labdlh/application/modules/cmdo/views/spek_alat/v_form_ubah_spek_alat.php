<form method='post' action='' name='form_spek_alat' class='form-horizontal' id="form_spek_alat" >
<div class="panel panel-default">
  <div class="panel-heading">Ubah Spesifikasi Alat</div>
    <div class="panel-body ">
        <div class="col-md-12">
          <?php foreach ($items as $row){ ?>
            <div class="form-group">
              <div class="form-group">
							<label for="id_alat" class="col-md-2 control-label">Nama Alat * :</label>
							<div class="col-md-10">
								<div class="form-control" readonly >
									<?php echo  $row->nama_alat; ?></div>
								</div>
						</div>
            <?php } ?>
            
						<div class="form-group">
							<label for="kode_alat" class="col-md-2 control-label">Kode Alat * :</label>
							<div class="col-md-10"><?php echo form_input('kode_alat', isset($item->kode_alat) ? $item->kode_alat : '','class="form-control" id="kode_alat" required');?><?php echo form_error('kode_alat') ; ?></div>
						</div>
						<div class="form-group">
							<label for="tinggi" class="col-md-2 control-label">Brand * :</label>
							<div class="col-md-10"><?php echo form_input('brand', isset($item->brand) ? $item->brand : '','class="form-control" id="brand" required');?><?php echo form_error('brand') ; ?></div>
						</div>
            <div class="form-group">
							<label for="tinggi" class="col-md-2 control-label">Model * :</label>
							<div class="col-md-10"><?php echo form_input('model', isset($item->model) ? $item->model : '','class="form-control" id="model" required');?><?php echo form_error('model') ; ?></div>
						</div>
            <div class="form-group">
							<label for="tinggi" class="col-md-2 control-label">No Seri * :</label>
							<div class="col-md-10"><?php echo form_input('noseri', isset($item->noseri) ? $item->noseri : '','class="form-control" id="noseri" required');?><?php echo form_error('noseri') ; ?></div>
						</div>
            <div class="form-group">
              <div class="col-sm-12" align="right">
                <a class='btn btn-primary' href='javascript:void(0)' onclick='simpan()'><i class="icon icon-briefcase icon-white"></i>&nbsp; Simpan</a>  
              </div>
            </div>  
        </div>
      

    </div> 
</div>
 

 <?php $id_spek = !empty($item->id_spek) ? $item->id_spek : '';?>
 
</form>

<script type="text/javascript">
function simpan()
{
  $("#ajax_loader").show();
  $.ajax({
    url: '<?= base_url()?>cmdo/spek_alat/simpan_perubahan/<?php echo $id_spek?>', 
    data: $(document.form_spek_alat.elements).serialize(), 
    success: function(r){
      json = $.parseJSON(r);
      if (json.status == 'success') {
      get_items();
      $("#ajax_loader").hide();
      $('#ajax-modal').modal('hide');                     
      }else{
        $("#ajax_loader").hide();
      }
    },
    type: "post", 
    dataType: "html"
  }); 
  return false;
}
</script>