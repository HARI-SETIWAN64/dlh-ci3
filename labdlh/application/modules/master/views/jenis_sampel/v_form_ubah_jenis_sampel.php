<form method='post' action='' name='form_jenis_sampel' class='form-horizontal' id="form_jenis_sampel" >
<div class="panel panel-default">
  <div class="panel-heading">Ubah Jenis Sampel</div>
    <div class="panel-body ">
        <div class="col-md-12">
            <div class="form-group">
              <label for="" class="col-sm-4 control-label"> <div>Kode</div> </label>
              <div class="col-sm-8">
              <?php echo form_input('kode', isset($item->kode) ? $item->kode : '','class="form-control"  id="kode"');?>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-4 control-label"> <div>Jenis Sampel</div> </label>
              <div class="col-sm-8">
              <?php echo form_input('nama', isset($item->nama) ? $item->nama : '','class="form-control"  id="nama"');?>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-4 control-label"> <div>No Urut Dokumen</div> </label>
              <div class="col-sm-8">
              <?php echo form_input('no_urut_dokumen', isset($item->no_urut_dokumen) ? $item->no_urut_dokumen : '','class="form-control"  id="no_urut_dokumen"');?>
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
 

 <?php $kode = !empty($item->kode) ? $item->kode : '';?>
 
</form>

<script type="text/javascript">
function simpan()
{
  $("#ajax_loader").show();
  $.ajax({
    url: '<?= base_url()?>master/jenis_sampel/simpan_perubahan/<?php echo $kode?>', 
    data: $(document.form_jenis_sampel.elements).serialize(), 
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