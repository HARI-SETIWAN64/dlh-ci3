<form method='post' action='' name='form_parameter' class='form-horizontal' id="form_parameter" >
<div class="panel panel-default">
  <div class="panel-heading">Ubah Parameter</div>
    <div class="panel-body ">
        <div class="col-md-12">
            <div class="form-group">
              <label for="" class="col-sm-4 control-label"> <div>Parameter</div> </label>
              <div class="col-sm-8">
              <?php echo form_input('parameter', isset($item->parameter) ? $item->parameter : '','class="form-control"  id="parameter" readonly="true"');?>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-4 control-label"> <div>Satuan</div> </label>
              <div class="col-sm-8">
              <?php echo form_input('satuan', isset($item->lhus_satuan) ? $item->lhus_satuan : '','class="form-control"  id="satuan"');?>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-4 control-label"> <div>Buku Mutu</div> </label>
              <div class="col-sm-8">
              <?php echo form_input('baku_mutu', isset($item->lhus_baku_mutu) ? $item->lhus_baku_mutu : '','class="form-control"  id="baku_mutu"');?>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-4 control-label"> <div>Hasil</div> </label>
              <div class="col-sm-8">
              <?php echo form_input('hasil', isset($item->lhus_hasil) ? $item->lhus_hasil : '','class="form-control"  id="hasil"');?>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-4 control-label"> <div>Spesifikasi Metode</div> </label>
              <div class="col-sm-8">
              <?php echo form_input('spesifikasi_metode', isset($item->lhus_spesifikasi_metode) ? $item->lhus_spesifikasi_metode : '','class="form-control"  id="lhus_spesifikasi_metode"');?>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-4 control-label"> <div>Keterangan</div> </label>
              <div class="col-sm-8">
              <?php echo form_input('keterangan', isset($item->lhus_keterangan) ? $item->lhus_keterangan : '','class="form-control"  id="keterangan"');?>
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
    url: '<?= base_url()?>fpps/lhu/simpan_lhu_parameter/<?php echo $id?>', 
    data: $(document.form_parameter.elements).serialize(), 
    success: function(r){
      json = $.parseJSON(r);
      if (json.status == 'success') {
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