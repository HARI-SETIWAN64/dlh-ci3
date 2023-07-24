<form method='post' action='' name='form_jabatan' class='form-horizontal' id="form_jabatan" >
<div class="panel panel-default">
  <div class="panel-heading">Ubah Jabatan</div>
    <div class="panel-body ">
        <div class="col-md-12">
            <div class="form-group">
              <label for="" class="col-sm-4 control-label"> <div>Jabatan</div> </label>
              <div class="col-sm-8">
              <?php echo form_input('jabatan', isset($item->jabatan) ? $item->jabatan : '','class="form-control"  id="id"');?>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-4 control-label"> <div>Nama</div> </label>
              <div class="col-sm-8">
              <?php echo form_input('nama', isset($item->nama) ? $item->nama : '','class="form-control"  id="nama"');?>
              </div>
            </div>
            <div class="form-group">
              <label for="users_id" class="col-md-4 control-label">Analis * :</label>
              <div class="col-md-8"><?php echo form_dropdown('users_id', $users, isset($item->users_id) ? $item->users_id : '','class="form-control"  id="users_id"');?><?php echo form_error('users_id') ; ?></div>
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
    url: '<?= base_url()?>master/jabatan/simpan_perubahan/<?php echo $id?>', 
    data: $(document.form_jabatan.elements).serialize(), 
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