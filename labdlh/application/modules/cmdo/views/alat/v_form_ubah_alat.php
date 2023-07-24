<form method='post' action='' name='form_alat' class='form-horizontal' id="form_alat" >
<div class="panel panel-default">
  <div class="panel-heading">Ubah Alat</div>
    <div class="panel-body ">
        <div class="col-md-12">
            <div class="form-group">
              <div class="form-group">
                <label for="nama_alat" class="col-md-2 control-label">Nama Alat * : </label>
                  <div class="col-md-10">
                    <?php echo form_input('nama_alat', isset($item->nama_alat) ? $item->nama_alat : '','class="form-control"  id="nama_alat" required');?>
                  </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12" align="right">
                <a class='btn btn-primary' href='javascript:void(0)' onclick='simpan()'><i class="icon icon-briefcase icon-white"></i>&nbsp; Simpan</a>  
              </div>
            </div>  
        </div>
      

    </div> 
</div>
 

 <?php $id_alat = !empty($item->id_alat) ? $item->id_alat : '';?>
 
</form>

<script type="text/javascript">
function simpan()
{
  $("#ajax_loader").show();
  $.ajax({
    url: '<?= base_url()?>cmdo/alat/simpan_perubahan/<?php echo $id_alat?>', 
    data: $(document.form_alat.elements).serialize(), 
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