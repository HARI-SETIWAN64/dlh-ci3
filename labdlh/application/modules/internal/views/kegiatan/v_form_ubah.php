<form method='post' action='' name='form_ubah' class='form-horizontal' id="form_ubah" >
  <div class="panel panel-default">
    <div class="panel-heading">Ubah Jenis Sampel</div>
      <div class="panel-body ">
          <div class="col-md-12">
              <div class="form-group">
                <label for="" class="col-sm-4 control-label"> <div>Kegiatan</div> </label>
                <div class="col-sm-8">
                <?php echo form_input('kegiatan', isset($item->kegiatan) ? $item->kegiatan : '','class="form-control"  id="kode"');?>
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-4 control-label"> <div>Uraian</div> </label>
                <div class="col-sm-8">
                <?php echo form_input('uraian', isset($item->uraian) ? $item->uraian : '','class="form-control"  id="uraian"');?>
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-4 control-label"> <div>Mulai</div> </label>
                <div class="col-sm-8">
                <?php echo form_input('mulai', isset($item->mulai) ? $item->mulai : '','class="form-control datepicker"  id="mulai"');?>
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-4 control-label"> <div>Sampai</div> </label>
                <div class="col-sm-8">
                <?php echo form_input('sampai', isset($item->sampai) ? $item->sampai : '','class="form-control datepicker"  id="sampai"');?>
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
 

 <?php $kode = !empty($item->id) ? $item->id : '';?>
 
</form>

<script type="text/javascript">
  $(function() {


    $('.datepicker').datepicker({
      format: "yyyy-mm-dd",
      autoclose: true,
    }).on('changeDate', function(ev) {
      // YOUR CODE
      // format: "yyyy-mm-dd"
    }).on('hide', function(event) {
      event.preventDefault();
      event.stopPropagation();
    });

  });

function simpan()
{
  $("#ajax_loader").show();
  $.ajax({
    url: '<?= base_url()?>internal/kegiatan/simpan_ubah/<?php echo $kode?>', 
    data: $(document.form_ubah.elements).serialize(), 
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