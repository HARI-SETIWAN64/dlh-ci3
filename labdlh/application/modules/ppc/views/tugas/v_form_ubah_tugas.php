<form method='post' action='' name='form_tugas' class='form-horizontal' id="form_tugas" >
<div class="panel panel-default">
  <div class="panel-heading">Ubah Tugas</div>
    <div class="panel-body ">
        <div class="col-md-12">
            <div class="form-group">
              <label for="" class="col-sm-4 control-label"> <div>Tugas</div> </label>
              <div class="col-sm-8">
              <?php echo form_input('tugas', isset($item->tugas) ? $item->tugas : '','class="form-control"  id="tugas" required');?>
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
 

 <?php $id = !empty($item->id) ? $item->id : '';?>
 
</form>

<script type="text/javascript">
function simpan()
{
  $("#ajax_loader").show();
  $.ajax({
    url: '<?= base_url()?>ppc/tugas/simpan_perubahan/<?php echo $id?>', 
    data: $(document.form_tugas.elements).serialize(), 
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