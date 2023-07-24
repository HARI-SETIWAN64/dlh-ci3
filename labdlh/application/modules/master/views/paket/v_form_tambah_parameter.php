<form method='post' action='' name='form_jabatan' class='form-horizontal' id="form_jabatan" >
<div class="panel panel-default">
  <div class="panel-heading">Tambah Parameter</div>
    <div class="panel-body ">
        <div class="col-md-12">
            <div class="form-group">
              <label for="" class="col-sm-4 control-label"> <div>Parameter</div></label>
              <div class="col-md-8"><?php echo form_dropdown('parameter_id', $parameter, isset($item->parameter_id) ? $item->parameter_id : '','class="form-control" id="parameter_id"');?><?php echo form_error('parameter_id') ; ?>
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
<?php 
echo form_hidden('id',$id)
?>
 
</form>

<script type="text/javascript">
function simpan()
{
  $("#ajax_loader").show();
  $.ajax({
    url: '<?= base_url()?>master/paket/simpan_paket_parameter/<?php echo $id?>', 
    data: $(document.form_jabatan.elements).serialize(), 
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