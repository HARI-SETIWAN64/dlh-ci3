<section>
  <?php
    echo form_open_multipart('master/paket/form/'.$item->id, 'class="form-horizontal"');
  ?>
    <div class="box box-default">
    <div class="box-header with-border">
      <div class="panel-heading"><strong>SAMPEL</strong></div>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-12">
          <div class="panel-body">
            <div class="col-md-6">
              <div class="form-group">
                <label for="jenis_sampel" class="col-md-4 control-label">Nama Paket * :</label>
                <div class="col-md-8"><?php echo form_input('nama_paket', isset($item->nama_paket) ? $item->nama_paket : '','class="form-control" id="nama_paket"');?><?php echo form_error('nama_paket') ; ?></div>
              </div>
              <div class="form-group">
                <label for="jenis_sampel" class="col-md-4 control-label">Jns Sampel * :</label>
                <div class="col-md-8"><?php echo form_dropdown('jenis_sampel', $jenis_sampel, isset($item->jenis_sampel) ? $item->jenis_sampel : '','class="form-control" id="jenis_sampel" required');?><?php echo form_error('jenis_sampel') ; ?></div>
              </div>
              <div class="form-group">
                <label for="jumlah_sampel" class="col-md-4 control-label">Harga * :</label>
                <div class="col-md-8"><?php echo form_input('harga', isset($item->harga) ? $item->harga : '','class="form-control" id="harga"');?><?php echo form_error('harga') ; ?></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="panel panel-info">
    <div class="box-header with-border">
      <div class="col-md-6" style="float: left;">
        <div class="panel-heading">
          <strong>Parameter dan Metode Yang Diuji </strong>
        </div>
      </div>
      <div style="float: right;">
        <a href="javascript:void(0)" onclick="tambah('<?php echo $item->id?>')" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> &nbsp;Tambah</a>
      </div>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-12">
          <div id="content_items"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div align="center" id="simpan">
      <?php echo form_submit('submit', 'Simpan','class="btn btn-primary" onclick="return confirm(\'Apakah anda sudah yakin ?\');"');?>
    </div>
    <?php echo form_hidden($csrf); ?>
    <?php echo form_close();?> 
  </div>
</section>
<script type="text/javascript">
  var url = "<?php echo base_url()?>";

  
  $(function() {
      get_items();
  });

  function hapus(id) {
    var answer = confirm("apakah anda yakin item ini dihapus?")
    if (answer){delet(id);}
    else{}
  }

  function delet(id){
    $.ajax({
        url: site+'master/paket/hapus_parameter/'+id, 
        success: function(r){
          json = $.parseJSON(r);
          if (json.status == 'success') {
             get_items();
           }else{
              alert('gagal...')
           }
        },
        type: "post", 
        dataType: "html"
    }); 
    return false;
  }

  function tambah(id)
  {
    $('#ajax-modal').modal('show');
      $('.modal-title').text('test');
      $.get(url+'master/paket/form_parameter/'+id,{}, function(data) {
          $("#ajax-modalin").html(data);
      });
  }

  var page = '1';
  function get_items(page){
    $("#content_items").html('<i class="fa fa-refresh fa-spin"></i>');
    var condition =  {'id' : '<?php echo $item->id; ?>'};
    var like = {'id' : '<?php echo $item->id; ?>'};
    var datae = {'page' : page};
    $.post(url+'master/paket/paket_ubah_parameter_list', $.param(like) + '&' + $.param(datae),
    function(data) {
      $("#content_items").html(data);
    });
  }
</script>