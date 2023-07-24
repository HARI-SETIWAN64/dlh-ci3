<form method='post' action='' name='form_footer' class='form-horizontal' id="form_footer" >
<div class="panel panel-default">
  <div class="panel-heading">Ubah Footer STP</div>
    <div class="panel-body ">
        <div class="col-md-12">
            <div class="form-group">
              <label for="" class="col-sm-4 control-label"> <div>Revisi/Terbit</div> </label>
              <div class="col-sm-8">
              <?php echo form_input('footer_terbit_stp', isset($item->footer_terbit_stp) ? $item->footer_terbit_stp : '','class="form-control"  id="footer_terbit_stp"');?>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-4 control-label"> <div>Tgl Berlaku</div> </label>
              <div class="col-sm-8">
              <?php echo form_input('footer_berlaku_stp', isset($item->footer_berlaku_stp) ? $item->footer_berlaku_stp : '','class="form-control"  id="footer_berlaku_stp"');?>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-4 control-label"> <div>No Dok</div> </label>
              <div class="col-sm-8">
              <?php echo form_input('footer_no_dok_stp', isset($item->footer_no_dok_stp) ? $item->footer_no_dok_stp : '','class="form-control"  id="footer_no_dok_stp"');?>
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
    url: '<?= base_url()?>fpps/stp/simpan_footer/<?php echo $id?>', 
    data: $(document.form_footer.elements).serialize(), 
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