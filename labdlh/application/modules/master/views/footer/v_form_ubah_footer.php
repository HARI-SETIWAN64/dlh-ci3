<form method='post' action='' name='form_footer' class='form-horizontal' id="form_footer" >
<div class="panel panel-default">
  <div class="">
    
  </div>
  <div class="panel-heading">Ubah Jenis Sampel</div>
    <div class="panel-body ">
        <div class="col-md-12">
            <div class="form-group">
              <label for="" class="col-sm-4 control-label"> <div>FPPS Terbit</div> </label>
              <div class="col-sm-8">
              <?php echo form_input('footer_terbit', isset($item->footer_terbit) ? $item->footer_terbit : '','class="form-control"  id="footer_terbit"');?>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-4 control-label"> <div>FPPS Berlaku</div> </label>
              <div class="col-sm-8">
              <?php echo form_input('footer_berlaku', isset($item->footer_berlaku) ? $item->footer_berlaku : '','class="form-control"  id="footer_berlaku"');?>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-4 control-label"> <div>FPPS No DOk</div> </label>
              <div class="col-sm-8">
              <?php echo form_input('footer_no_dok', isset($item->footer_no_dok) ? $item->footer_no_dok : '','class="form-control"  id="footer_no_dok"');?>
              </div>
            </div>
            <hr>
            <div class="form-group">
              <label for="" class="col-sm-4 control-label"> <div>STP Terbit</div> </label>
              <div class="col-sm-8">
              <?php echo form_input('footer_terbit_stp', isset($item->footer_terbit_stp) ? $item->footer_terbit_stp : '','class="form-control"  id="footer_terbit_stp"');?>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-4 control-label"> <div>STP Berlaku</div> </label>
              <div class="col-sm-8">
              <?php echo form_input('footer_berlaku_stp', isset($item->footer_berlaku_stp) ? $item->footer_berlaku_stp : '','class="form-control"  id="footer_berlaku_stp"');?>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-4 control-label"> <div>STP No DOk</div> </label>
              <div class="col-sm-8">
              <?php echo form_input('footer_no_dok_stp', isset($item->footer_no_dok_stp) ? $item->footer_no_dok_stp : '','class="form-control"  id="footer_no_dok_stp"');?>
              </div>
            </div>
            <hr>
            <div class="form-group">
              <label for="" class="col-sm-4 control-label"> <div>LHUS Terbit</div> </label>
              <div class="col-sm-8">
              <?php echo form_input('footer_terbit_lhus', isset($item->footer_terbit_lhus) ? $item->footer_terbit_lhus : '','class="form-control"  id="footer_terbit_lhus"');?>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-4 control-label"> <div>LHUS Berlaku</div> </label>
              <div class="col-sm-8">
              <?php echo form_input('footer_berlaku_lhus', isset($item->footer_berlaku_lhus) ? $item->footer_berlaku_lhus : '','class="form-control"  id="footer_berlaku_lhus"');?>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-4 control-label"> <div>LHUS No DOk</div> </label>
              <div class="col-sm-8">
              <?php echo form_input('footer_no_dok_lhus', isset($item->footer_no_dok_lhus) ? $item->footer_no_dok_lhus : '','class="form-control"  id="footer_no_dok_lhus"');?>
              </div>
            </div>
            <hr>
            <div class="form-group">
              <label for="" class="col-sm-4 control-label"> <div>LHU Terbit</div> </label>
              <div class="col-sm-8">
              <?php echo form_input('footer_terbit_lhu', isset($item->footer_terbit_lhu) ? $item->footer_terbit_lhu : '','class="form-control"  id="footer_terbit_lhu"');?>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-4 control-label"> <div>LHU Berlaku</div> </label>
              <div class="col-sm-8">
              <?php echo form_input('footer_berlaku_lhu', isset($item->footer_berlaku_lhu) ? $item->footer_berlaku_lhu : '','class="form-control"  id="footer_berlaku_lhu"');?>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-4 control-label"> <div>LHU No DOk</div> </label>
              <div class="col-sm-8">
              <?php echo form_input('footer_no_dok_lhu', isset($item->footer_no_dok_lhu) ? $item->footer_no_dok_lhu : '','class="form-control"  id="footer_no_dok_lhu"');?>
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
  $("#ajax_loader").show();
  $.ajax({
    url: '<?= base_url()?>master/footer/simpan_perubahan/1', 
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