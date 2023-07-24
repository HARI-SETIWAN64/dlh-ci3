<section>
  <?php
  if(isset($item->nomor)){
    $nomor = "/".str_replace("/","_",$item->nomor);
  }else{
    $nomor = "";
  }
  echo form_open_multipart('fpps/fpps_pemohon/form/'.$item->id, 'class="form-horizontal"');
  ?>
  <div class="box box-default">
    <div class="box-header with-border">
      <div class="panel-heading"><strong>Data Pelanggan</strong></div>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-12">
          <div class="panel-body">
            <div class="col-md-6">
              <div class="form-group">
                <label for="nama_pelanggan" class="col-md-4 control-label">Nama * :</label>
                <div class="col-md-8"><?php echo form_input('nama_pelanggan', isset($item->nama_pelanggan) ? $item->nama_pelanggan : $this->fungsi->nama(),'class="form-control" id="nama_pelanggan" readonly');?><?php echo form_error('nama_pelanggan') ; ?></div>
              </div>
              <div class="form-group">
                <label for="no_telp" class="col-md-4 control-label">Telp * :</label>
                <div class="col-md-8"><?php echo form_input('no_telp', isset($item->no_telp) ? $item->no_telp : $this->fungsi->phone(),'class="form-control"  id="no_telp" readonly');?><?php echo form_error('no_telp') ; ?></div>
              </div>
              <div class="form-group">
                <label for="email" class="col-md-4 control-label">Email * :</label>
                <div class="col-md-8"><?php echo form_input('email', isset($item->email) ? $item->email : $this->fungsi->email(),'class="form-control" id="email" readonly');?><?php echo form_error('email') ; ?></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="jenis_industri" class="col-md-4 control-label">Jns Usaha * :</label>
                <div class="col-md-8"><?php echo form_input('jenis_industri', isset($item->jenis_industri) ? $item->jenis_industri : '','class="form-control" id="jenis_industri" readonly');?><?php echo form_error('jenis_industri') ; ?></div>
              </div>
              <div class="form-group">
                <label for="alamat" class="col-md-4 control-label">Alamat * :</label>
                <div class="col-md-8">
                  <?php
                  $data = array(
                    'name'        => 'alamat',
                    'id'          => 'alamat',
                    'value'       => isset($item->alamat) ? $item->alamat : $this->fungsi->alamat(),
                    'rows'        => '3',
                    'cols'        => '5',
                    'style'       => 'width:100%',
                    'class'       => 'form-control',
                    'readonly'    => 'readonly'
                  );

                  echo form_textarea($data); 
                  ?>
                  <?php echo form_error('alamat') ; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="distance"> </div>
        <div class="clearfix"></div>
      </div>

    </div>
  </div>
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
                <label for="jenis_sampel" class="col-md-4 control-label">Jns Sampel * :</label>
                <div class="col-md-8"><?php echo form_dropdown('jenis_sampel', $jenis_sampel, isset($item->jenis_sampel) ? $item->jenis_sampel : '','class="form-control" id="jenis_sampel" required');?><?php echo form_error('jenis_sampel') ; ?></div>
              </div>
              <div class="form-group">
                <label for="jumlah_sampel" class="col-md-4 control-label">Jumlah Sampel * :</label>
                <div class="col-md-8"><?php echo form_input('jumlah_sampel', isset($item->jumlah_sampel) ? $item->jumlah_sampel : '','class="form-control" id="jumlah_sampel"');?><?php echo form_error('jumlah_sampel') ; ?></div>
              </div>
              <div class="form-group">
                <label for="volume_sampel" class="col-md-4 control-label">Volume Sampel * :</label>
                <div class="col-md-8"><?php echo form_input('volume_sampel', isset($item->volume_sampel) ? $item->volume_sampel : '','class="form-control" id="volume_sampel"');?><?php echo form_error('volume_sampel') ; ?></div>
              </div>
              <div class="form-group">
                <label for="petugas_pengambil" class="col-md-4 control-label">Pengambil Sampel * :</label>
                <div class="col-md-8"><?php echo form_dropdown('petugas_pengambil', $petugas_pengambil, isset($item->petugas_pengambil) ? $item->petugas_pengambil : '','class="form-control" id="petugas_pengambil"');?><?php echo form_error('petugas_pengambil') ; ?></div>
              </div>
              <div class="form-group">
                <label for="deskripsi_sampel" class="col-md-4 control-label">Lokasi Sampel * :</label>
                <div class="col-md-8">
                  <?php
                  $data = array(
                    'name'        => 'deskripsi_sampel',
                    'id'          => 'deskripsi_sampel',
                    'value'       => isset($item->deskripsi_sampel) ? $item->deskripsi_sampel : '',
                    'rows'        => '3',
                    'cols'        => '10',
                    'style'       => 'width:100%',
                    'class'       => 'form-control '
                  );
                  echo form_textarea($data); 
                  ?>
                  <?php echo form_error('deskripsi_sampel') ; ?>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="wadah_sampel" class="col-md-4 control-label">Wadah Sampel * :</label>
                <div class="col-md-8"><?php echo form_input('wadah_sampel', isset($item->wadah_sampel) ? $item->wadah_sampel : '','class="form-control" id="wadah_sampel"');?><?php echo form_error('wadah_sampel') ; ?></div>
              </div>
              <div class="form-group">
                <label for="tanggal_penerimaan" class="col-md-4 control-label">Tgl Penerimaan * :</label>
                <div class="col-md-3">
                  <?php echo form_input('tanggal_penerimaan', isset($item->tanggal_penerimaan) ? $item->tanggal_penerimaan : '','class="form-control" id="tanggal_penerimaan"');?><?php echo form_error('tanggal_penerimaan') ; ?>
                </div>  
                <label for="tanggal_penerimaan" class="col-md-1 control-label">Jam</label>
                <div class="col-md-4 bootstrap-timepicker">
                  <?php echo form_input('jam_penerimaan', isset($item->jam_sampling) ? $item->jam_penerimaan : '','class="form-control timepicker" id="jam_penerimaan"');?><?php echo form_error('jam_penerimaan') ; ?>
                </div>
              </div>
              <div class="form-group">
                <label for="tanggal_sampling" class="col-md-4 control-label">Tgl Sampling * :</label>
                <div class="col-md-3">
                  <?php echo form_input('tanggal_sampling', isset($item->tanggal_sampling) ? $item->tanggal_sampling : '','class="form-control" id="tanggal_sampling"');?><?php echo form_error('tanggal_sampling') ; ?>
                </div>
                <label class="col-md-1 control-label">Jam</label>
                <div class="col-md-4 bootstrap-timepicker">
                  <?php echo form_input('jam_sampling', isset($item->jam_sampling) ? $item->jam_sampling : '','class="form-control timepicker" id="jam_sampling"');?><?php echo form_error('jam_sampling') ; ?>
                </div>
              </div>

              <div class="form-group">
                <label for="pengukuran_lapangan" class="col-md-4 control-label">Pngkuran Lpangan * :</label>
                <div class="col-md-8">
                  <?php
                  $data = array(
                    'name'        => 'pengukuran_lapangan',
                    'id'          => 'pengukuran_lapangan',
                    'value'       => isset($item->pengukuran_lapangan) ? $item->pengukuran_lapangan : '',
                    'rows'        => '3',
                    'cols'        => '10',
                    'style'       => 'width:100%',
                    'class'       => 'form-control '
                  );
                  echo form_textarea($data); 
                  ?>
                  <?php echo form_error('pengukuran_lapangan') ; ?>
                </div>
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
  <div id="distance"> </div>
  <div class="clearfix"></div>
  <br />
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
    CKEDITOR.replace('deskripsi_sampel', 
    {
      removeButtons: 'Copy, Paste, Cut,PasteText,PasteFromWord,Undo,Redo, Cut, Link, style, Bold'
    }
    );

    var currentDate = new Date();
    $('#tanggal_penerimaan').datepicker({
      format: "dd-mm-yyyy",
      autoclose: true,
    });
    $("#tanggal_penerimaan").datepicker("setDate", currentDate);


    var currentDate = new Date();
    $('#tanggal_sampling').datepicker({
      format: "dd-mm-yyyy",
      autoclose: true,
    });
    $("#tanggal_sampling").datepicker("setDate", currentDate);

    $(".timepicker").timepicker({
      showInputs: false,
      minuteStep: true,
    });
    get_items();
  });

  function hapus(id) {
    var answer = confirm("apakah anda yakin item ini dihapus?")
    if (answer){delet(id);}
    else{}
  }

  function delet(id){
    $.ajax({
      url: site+'fpps/fpps_pemohon/hapus_parameter/'+id, 
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
    $('.modal-title').text('Tambah Parameter');
    $.get(url+'fpps/fpps_pemohon/form_parameter/'+id,{}, function(data) {
      $("#ajax-modalin").html(data);
    });
  }

  $(document).ready(function(){
    $('#nama_pelanggan').autocomplete({
      source: "<?php echo site_url('fpps/fpps_pelanggan/get_autocomplete');?>",
      select: function (event, ui) {
        $('[name="nama_pelanggan"]').val(ui.item.label); 
        $('[name="alamat"]').val(ui.item.alamat); 
        $('[name="no_telp"]').val(ui.item.phone); 
        $('[name="company"]').val(ui.item.company); 
        $('[name="email"]').val(ui.item.email); 
      }
    });
  });

  var page = '1';
  function get_items(page){
    $("#content_items").html('<i class="fa fa-refresh fa-spin"></i>');
    var condition =  {'id' : '<?php echo $item->id; ?>'};
    var like = {'id' : '<?php echo $item->id; ?>'};
    var datae = {'page' : page};
    $.post(url+'fpps/fpps_pelanggan/fpps_ubah_parameter_list', $.param(like) + '&' + $.param(datae),
      function(data) {
        $("#content_items").html(data);
      });
  }
</script>