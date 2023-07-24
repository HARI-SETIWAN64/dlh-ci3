<form method='post' action='' name='form_footer' class='form-horizontal' id="form_footer" >
<div class="panel panel-default">
  <div class="">
    
  </div>
  <div class="panel-heading">Ubah Footer Inventaris</div>
    <div class="panel-body ">
        <div class="col-md-12">
            <div class="form-group">
              <label for="" class="col-sm-4 control-label"> <div>Inventaris Terbit</div> </label>
              <div class="col-sm-8">
              <?php echo form_input('footer_terbit', isset($item->footer_terbit) ? $item->footer_terbit : '','class="form-control"  id="footer_terbit"');?>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-4 control-label"> <div>Inventaris Berlaku</div> </label>
              <div class="col-sm-8">
              <?php echo form_input('footer_berlaku', isset($item->footer_berlaku) ? $item->footer_berlaku : '','class="form-control"  id="footer_berlaku"');?>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-4 control-label"> <div>Inventaris No DOk</div> </label>
              <div class="col-sm-8">
              <?php echo form_input('footer_no_dok', isset($item->footer_no_dok) ? $item->footer_no_dok : '','class="form-control"  id="footer_no_dok"');?>
              </div>
            </div>
            <hr>
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
  $("#ajax_loader").show();
  $.ajax({
    url: '<?= base_url()?>cmdo/footer/simpan_perubahan/1', 
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