<form method='post' action='' name='form_parameter' class='form-horizontal' id="form_parameter" >
<div class="panel panel-default">
  <div class="panel-heading">Ubah Parameter</div>
    <div class="panel-body ">
        <div class="col-md-12">
            <div class="form-group">
              <label for="" class="col-sm-4 control-label"> <div>Parameter</div> </label>
              <div class="col-sm-8">
              <?php echo form_input('parameter', isset($item->parameter) ? $item->parameter : '','class="form-control"  id="parameter"');?>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-4 control-label"> <div>Metode</div> </label>
              <div class="col-sm-8">
              <?php echo form_input('metode', isset($item->metode) ? $item->metode : '','class="form-control"  id="metode"');?>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-4 control-label"> <div>Baku mutu</div> </label>
              <div class="col-sm-8">
              <?php echo form_input('baku_mutu', isset($item->baku_mutu) ? $item->baku_mutu : '','class="form-control"  id="baku_mutu"');?>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-4 control-label"> <div>Satuan</div> </label>
              <div class="col-sm-8">
              <?php echo form_input('satuan', isset($item->satuan) ? $item->satuan : '','class="form-control"  id="satuan"');?>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-4 control-label"> <div>Metode</div> </label>
              <div class="col-sm-8">
              <?php echo form_input('metode', isset($item->metode) ? $item->metode : '','class="form-control"  id="metode"');?>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-4 control-label"> <div>Harga</div> </label>
              <div class="col-sm-8">
              <?php echo form_input('harga', isset($item->harga) ? $item->harga : '','class="form-control"  id="harga"');?>
              </div>
            </div>
            <div class="form-group">
              <label for="user_analis" class="col-md-4 control-label">Analis * :</label>
              <div class="col-md-8"><?php echo form_dropdown('user_analis', $analis, isset($item->user_analis) ? $item->user_analis : '','class="form-control"  id="user_analis"');?><?php echo form_error('user_analis') ; ?></div>
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
 $id = !empty($item->id) ? $item->id : '';
 echo form_hidden('id',$id)
 ?>
 
</form>

<script type="text/javascript">
function simpan()
{
  $("#ajax_loader").show();
  $.ajax({
    url: '<?= base_url()?>master/parameter/simpan_perubahan/<?php echo $id?>', 
    data: $(document.form_parameter.elements).serialize(), 
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