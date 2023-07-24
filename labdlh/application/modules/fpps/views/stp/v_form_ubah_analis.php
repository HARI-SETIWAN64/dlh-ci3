<form method='post' action='' name='form_analis' class='form-horizontal' id="form_analis" >
  <div class="panel panel-default">
    <div class="panel-heading">Ubah Analis</div>
    <div class="panel-body ">
      <div class="col-md-12">
        <div class="form-group">
          <label for="" class="col-sm-4 control-label"> <div>Analis</div> </label>
          <div class="col-md-8"><?php echo form_dropdown('users_analis', $analis, isset($parameter->users_analis) ? $parameter->users_analis : '','class="form-control" id="users_analis"');?><?php echo form_error('users_analis') ; ?>
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
      url: '<?= base_url()?>fpps/stp/simpan_stp_parameter/<?php echo $id?>', 
      data: $(document.form_analis.elements).serialize(), 
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