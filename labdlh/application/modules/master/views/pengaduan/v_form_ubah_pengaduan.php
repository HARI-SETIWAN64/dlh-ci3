<form method='post' action='' name='form_pengaduan' class='form-horizontal' id="form_pengaduan" >
<div class="panel panel-default">
  <div class="panel-heading">Form Tanggapan</div>
    <div class="panel-body ">
        <div class="col-md-12">
            <div class="form-group">
              <label for="" class="col-sm-4 control-label"> <div>Tanggapan</div> </label>
              <div class="col-sm-8">
                <?php
                $data = array(
                  'name'        => 'tanggapan',
                  'id'          => 'tanggapan',
                  'value'       => $item->tanggapan,
                  'rows'        => '8',
                  'cols'        => '20',
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
 

 <?php $id = !empty($item->id) ? $item->id : '';?>
 
</form>

<script type="text/javascript">
function simpan()
{
  $("#ajax_loader").show();
  $.ajax({
    url: '<?= base_url()?>master/pengaduan/simpan_perubahan/<?php echo $id?>', 
    data: $(document.form_pengaduan.elements).serialize(), 
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