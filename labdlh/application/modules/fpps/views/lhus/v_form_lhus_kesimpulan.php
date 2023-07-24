<form method='post' action='' name='form_kesimpulan' class='form-horizontal' id="form_kesimpulan" >
<div class="panel panel-default">
  <div class="panel-heading">Kesimpulan</div>
    <div class="panel-body ">
        <div class="col-md-12">
            <div class="form-group">
              <label for="nomor_lhus" class="col-md-2 control-label">Baku Mutu :</label>
              <div class="col-md-10"><?php echo form_input('dasar_hukum', isset($item->dasar_hukum) ? $item->dasar_hukum : '','class="form-control" id="dasar_hukum" placeholder="Dasar Hukum"');?><?php echo form_error('dasar_hukum') ; ?></div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-2 control-label"> <div>Kesimpulan</div> </label>
              <div class="col-sm-10">
              <?php 
                $data = array(
                      'name'        => 'kesimpulan',
                      'id'          => 'kesimpulan',
                      'value'       => isset($item->kesimpulan) ? $item->kesimpulan : "",
                      'rows'        => '5',
                      'cols'        => '10',
                      'style'       => 'width:100%',
                      'class'       => 'form-control',
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
    url: '<?= base_url()?>fpps/lhus/simpan_kesimpulan/<?php echo $id?>', 
    data: $(document.form_kesimpulan.elements).serialize(), 
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