<form method='post' action='' name='form_kata_mutiara' class='form-horizontal' id="form_kata_mutiara" >
<div class="panel panel-default">
  <div class="panel-heading">Kata Mutiara</div>
    <div class="panel-body ">
        <div class="col-md-12">
            <div class="form-group">
              <label for="" class="col-sm-4 control-label"> <div>Kata Mutiara</div> </label>
              <div class="col-sm-8">
                <?php
                // print_r($item->kata_mutiara);
                  $data = array(
                      'name'        => 'kata_mutiara',
                      'id'          => 'kata_mutiara',
                      'value'       => $item->kata_mutiara,
                      'rows'        => '10',
                      'cols'        => '10',
                      'style'       => 'width:100%',
                      'class'       => 'form-control'
                  );

                  echo form_textarea($data);
                ?>
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
 

 <?php $id = !empty($item->id_kata_mutiara) ? $item->id_kata_mutiara : '';?>
 
</form>

<script type="text/javascript">
function simpan()
{
  $("#ajax_loader").show();
  $.ajax({
    url: '<?= base_url()?>master/kata_mutiara/simpan_perubahan/<?php echo $id?>', 
    data: $(document.form_kata_mutiara.elements).serialize(), 
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