<form method='post' action='' name='form_mater_penilaian' class='form-horizontal' id="form_mater_penilaian" >
<div class="panel panel-default">
  <div class="panel-heading">Penilaian</div>
    <div class="panel-body ">
        <div class="col-md-12">
            <div class="form-group">
              <label for="" class="col-sm-4 control-label"> <div>Keterangan</div> </label>
              <div class="col-sm-8">
              <?php echo form_input('keterangan', isset($item->keterangan) ? $item->keterangan : '','class="form-control"  id="keterangan"');?>
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
</form>

<script type="text/javascript">
function simpan()
{
  var id = "<?php echo $id; ?>";
  $("#ajax_loader").show();
  $.ajax({
    url: '<?= base_url()?>master/penilaian/form/'+id, 
    data: $(document.form_mater_penilaian.elements).serialize(), 
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