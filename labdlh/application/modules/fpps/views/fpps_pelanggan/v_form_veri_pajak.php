<section class="form-horizontal">
  <?php
  if(isset($item->nomor)){
    $nomor = str_replace("/","_",$item->nomor);
  }else{
    $nomor = "";
  }
    // echo form_open_multipart('fpps/stp/form/'.$item->id, 'class="form-horizontal"');
  print form_hidden('jenis_sampel', $item->jenis_sampel);
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
                <div class="col-md-8"><?php echo form_input('nama_pelanggan', isset($item->nama_pelanggan) ? $item->nama_pelanggan : $this->fungsi->nama(),'class="form-control" id="nama_pelanggan" disabled');?><?php echo form_error('nama_pelanggan') ; ?></div>
              </div>
              <div class="form-group">
                <label for="no_telp" class="col-md-4 control-label">Telp * :</label>
                <div class="col-md-8"><?php echo form_input('no_telp', isset($item->no_telp) ? $item->no_telp : $this->fungsi->phone(),'class="form-control"  id="no_telp" disabled');?><?php echo form_error('no_telp') ; ?></div>
              </div>
              <div class="form-group">
                <label for="email" class="col-md-4 control-label">Email * :</label>
                <div class="col-md-8"><?php echo form_input('email', isset($item->email) ? $item->email : $this->fungsi->email(),'class="form-control" id="email" disabled');?><?php echo form_error('email') ; ?></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="jenis_industri" class="col-md-4 control-label">Jns Usaha * :</label>
                <div class="col-md-8"><?php echo form_input('jenis_industri', isset($item->jenis_industri) ? $item->jenis_industri : '','class="form-control" id="jenis_industri" disabled');?><?php echo form_error('jenis_industri') ; ?></div>
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
                    'disabled'    => ''
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
                <div class="col-md-8">
                  <?php echo form_dropdown('jenis_sampel', $jenis_sampel, isset($item->jenis_sampel) ? $item->jenis_sampel : '','class="form-control" id="jenis_sampel" disabled');?><?php echo form_error('jenis_sampel') ; ?>
                </div>
              </div>
              <div class="form-group">
                <label for="jumlah_sampel" class="col-md-4 control-label">Jumlah Sampel * :</label>
                <div class="col-md-8">
                  <?php echo form_input('jumlah_sampel', isset($item->jumlah_sampel) ? $item->jumlah_sampel : '','class="form-control" id="jumlah_sampel" disabled');?><?php echo form_error('jumlah_sampel') ; ?>
                </div>
              </div>
              <div class="form-group">
                <label for="volume_sampel" class="col-md-4 control-label">volume_sampel * :</label>
                <div class="col-md-8">
                  <?php echo form_input('volume_sampel', isset($item->volume_sampel) ? $item->volume_sampel : '','class="form-control" id="volume_sampel" disabled');?><?php echo form_error('volume_sampel') ; ?>
                </div>
              </div>
              <div class="form-group">
                <label for="wadah_sampel" class="col-md-4 control-label">Wadah Sampel * :</label>
                <div class="col-md-8">
                  <?php echo form_input('wadah_sampel', isset($item->wadah_sampel) ? $item->wadah_sampel : '','class="form-control" id="wadah_sampel" disabled');?><?php echo form_error('wadah_sampel') ; ?>
                </div>
              </div>
              <div class="form-group">
                <label for="tanggal_penerimaan" class="col-md-4 control-label">Tgl Penerimaan * :</label>
                <div class="col-md-3">
                  <?php echo form_input('tanggal_penerimaan', isset($item->tanggal_penerimaan) ? $item->tanggal_penerimaan : '','class="form-control" id="tanggal_penerimaan" disabled');?><?php echo form_error('tanggal_penerimaan') ; ?>
                </div>
                <label class="col-md-1 control-label">Jam</label>
                <div class="col-md-4">
                  <?php echo form_input('jam_penerimaan',  isset($item->jam_penerimaan) ? $item->jam_penerimaan : '','class="form-control" id="tanggal_penerimaan" disabled');?><?php echo form_error('tanggal_penerimaan') ; ?>
                </div>
              </div>
              <div class="form-group">
                <label for="tanggal_sampling" class="col-md-4 control-label">Tgl Sampling * :</label>
                <div class="col-md-3">
                  <?php echo form_input('tanggal_sampling', isset($item->tanggal_sampling) ? $item->tanggal_sampling : '','class="form-control" id="tanggal_sampling" disabled');?><?php echo form_error('tanggal_sampling') ; ?>
                </div>
                <label class="col-md-1 control-label">Jam</label>
                <div class="col-md-4">
                  <?php echo form_input('jam_sampling',  isset($item->jam_sampling) ? $item->jam_sampling : '','class="form-control" id="jam_sampling" disabled');?><?php echo form_error('jam_sampling') ; ?>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="tanggal_sampling" class="col-md-4 control-label">Deskripsi * :</label>
                <div class="col-md-8">
                  <?php
                  echo isset($item->deskripsi_sampel) ? $item->deskripsi_sampel : '';
                  ?>
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
          <?php echo form_open('fpps/fpps_pelanggan/kirim_epad/'.$item->id, 'class="form-horizontal"'); ?>
          <strong>Item Pajak Retribusi </strong>
        </div>
      </div>
      <div class="col-md-6 pull-right">
        <div class="row">
          <div class="col-md-3">
            <label class="control-label">Pembayaran * :</label>
          </div>
          <div class="col-md-9">
            <?php echo form_dropdown('jenis_pembayaran', array("paket"=>"Paket", "parameter"=>"Parameter", "paket-parameter"=>"Paket Parameter"), 'paket','class="form-control" id="jenis_pembayaran" onchange="pembayaran()"');?>
          </div>
        </div>
      </div>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-12">
          <br/>
        </div>
        <div class="col-md-12">
          <div id="paket">
            <div class="col-md-2">
              <label class="control-label" style="text-align: center">Pembayaran * :</label>
            </div>
            <div class="col-md-8">
              <?php echo form_dropdown('tarif', $tarif, '','class="form-control select2" id="tarif"');?>
            </div>
            <div class="col-md-2">
              <input type="number" class="form-control" id="volume" name="volume" placeholder="Volume">
            </div>
          </div>
          <div id="paket-parameter">
            <table width="100%">
             <!--<tr>
                <td>
                  <div class="col-md-12">
                    <div class="input-group input-group-sm after-add-more">
                      <?php echo form_dropdown('tarif_list[]', $tarif, '','class="form-control"');?>
                      <div class="input-group-btn"> 
                        <button class="btn btn-info btn-flat add-more" type="button"><i class="glyphicon glyphicon-plus"></i></button>
                      </div>
                    </div>
                  </div>
                </td>
              </tr> -->
              <tr>
                <td>
                  
                </td>
              </tr>
              <tr>
                <td width="2%">
                  1.
                </td>
                <td width="80%">
                  <div class="col-md-12">
                      <?php echo form_dropdown('tarif_list[]', $tarif, '','class="form-control"');?>
                  </div>
                </td>
                <td width="15%">
                  <div class="col-md-12">
                      <input type="number" class="form-control" id="volume" name="volume_list[]" placeholder="volume">
                  </div>
                </td>
              </tr>
              <tr>
                <td width="2%">
                  2.
                </td>
                <td width="80%">
                  <div class="col-md-12">
                      <?php echo form_dropdown('tarif_list[]', $tarif, '','class="form-control"');?>
                  </div>
                </td>
                <td width="15%">
                  <div class="col-md-12">
                      <input type="number" class="form-control" id="volume" name="volume_list[]" placeholder="volume">
                  </div>
                </td>
              </tr>
              <tr>
                <td width="2%">
                  3.
                </td>
                <td width="80%">
                  <div class="col-md-12">
                      <?php echo form_dropdown('tarif_list[]', $tarif, '','class="form-control"');?>
                  </div>
                </td>
                <td width="15%">
                  <div class="col-md-12">
                      <input type="number" class="form-control" id="volume" name="volume_list[]" placeholder="volume">
                  </div>
                </td>
              </tr>
              <tr>
                <td width="2%">
                  4.
                </td>
                <td width="80%">
                  <div class="col-md-12">
                      <?php echo form_dropdown('tarif_list[]', $tarif, '','class="form-control"');?>
                  </div>
                </td>
                <td width="15%">
                  <div class="col-md-12">
                      <input type="number" class="form-control" id="volume" name="volume_list[]" placeholder="volume">
                  </div>
                </td>
              </tr>
              <tr>
                <td width="2%">
                  5.
                </td>
                <td width="80%">
                  <div class="col-md-12">
                      <?php echo form_dropdown('tarif_list[]', $tarif, '','class="form-control"');?>
                  </div>
                </td>
                <td width="15%">
                  <div class="col-md-12">
                      <input type="number" class="form-control" id="volume" name="volume_list[]" placeholder="volume">
                  </div>
                </td>
              </tr>
              <tr>
                <td width="2%">
                  6.
                </td>
                <td width="80%">
                  <div class="col-md-12">
                      <?php echo form_dropdown('tarif_list[]', $tarif, '','class="form-control"');?>
                  </div>
                </td>
                <td width="15%">
                  <div class="col-md-12">
                      <input type="number" class="form-control" id="volume" name="volume_list[]" placeholder="volume">
                  </div>
                </td>
              </tr>
              <tr>
                <td width="2%">
                  7.
                </td>
                <td width="80%">
                  <div class="col-md-12">
                      <?php echo form_dropdown('tarif_list[]', $tarif, '','class="form-control"');?>
                  </div>
                </td>
                <td width="15%">
                  <div class="col-md-12">
                      <input type="number" class="form-control" id="volume" name="volume_list[]" placeholder="volume">
                  </div>
                </td>
              </tr>
              <tr>
                <td width="2%">
                  8.
                </td>
                <td width="80%">
                  <div class="col-md-12">
                      <?php echo form_dropdown('tarif_list[]', $tarif, '','class="form-control"');?>
                  </div>
                </td>
                <td width="15%">
                  <div class="col-md-12">
                      <input type="number" class="form-control" id="volume" name="volume_list[]" placeholder="volume">
                  </div>
                </td>
              </tr>
              <tr>
                <td width="2%">
                  9.
                </td>
                <td width="80%">
                  <div class="col-md-12">
                      <?php echo form_dropdown('tarif_list[]', $tarif, '','class="form-control"');?>
                  </div>
                </td>
                <td width="15%">
                  <div class="col-md-12">
                      <input type="number" class="form-control" id="volume" name="volume_list[]" placeholder="volume">
                  </div>
                </td>
              </tr>
              <tr>
                <td width="2%">
                  10.
                </td>
                <td width="80%">
                  <div class="col-md-12">
                      <?php echo form_dropdown('tarif_list[]', $tarif, '','class="form-control"');?>
                  </div>
                </td>
                <td width="15%">
                  <div class="col-md-12">
                      <input type="number" class="form-control" id="volume" name="volume_list[]" placeholder="volume">
                  </div>
                </td>
              </tr>
            </table>
          </div>
          <div id="parameter"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div align="center" id="simpan">
      <?php echo form_hidden('id_pelanggan', isset($item->id_pelanggan) ? $item->id_pelanggan : ''); ?>
      <?php echo form_submit('submit', 'Kirim Data Ke E-PAD','class="btn btn-primary" onclick="return confirm(\'Apakah anda sudah yakin data yang akan dikirim ke E-PAD sudah benar?\');"');?>
    </div>
    <?php echo form_hidden('nama_pelanggan',isset($item->nama_pelanggan) ? $item->nama_pelanggan : ''); ?>
    <?php echo form_hidden($csrf); ?>
    <?php echo form_close();?> 
  </div>
  
  <div class="copy hide">
    <div class="input-group input-group-sm">
      <?php echo form_dropdown('tarif_list[]', $tarif, '','class="form-control"');?>
      <div class="input-group-btn"> 
        <button class="btn btn-danger btn-flat remove" type="button"><i class="glyphicon glyphicon-remove"></i></button>
      </div>
    </div>
  </div>
</section>
<script type="text/javascript">
  var url = "<?php echo base_url()?>";


  $(function() {
    get_items();
    pembayaran();
    $('.select2').select2();
  });

  $(document).ready(function() {
    $(".add-more").click(function(){ 
      var html = $(".copy").html();
      $(".after-add-more").after(html);
    });
    $("body").on("click",".remove",function(){ 
      $(this).parents(".input-group").remove();
    });
  });


  function pembayaran(){

    // $('select[name=div_alasan]').removeAttr('style');
    var ver = $('select[name=jenis_pembayaran]').val();
    if(ver == 'parameter'){
      $('#parameter').show();
      $('#paket').hide();
      $('#paket-parameter').hide();
    }else if(ver == 'paket'){
      $('#parameter').hide();
      $('#paket').show();
      $('#paket-parameter').hide();
      // $('.select2').select2();
    }else if(ver == 'paket-parameter'){
      $('#parameter').hide();
      $('#paket').hide();
      $('#paket-parameter').show();
      // $('.select2').select2();
    }

  }


  var page = '1';
  function get_items(page){
    $("#parameter").html('<i class="fa fa-refresh fa-spin"></i>');
    var condition =  {'id' : '<?php echo $item->id; ?>'};
    var like = {'id' : '<?php echo $item->id; ?>'};
    var datae = {'page' : page};
    $.post(url+'fpps/fpps_pelanggan/veri_pajak_list', $.param(like) + '&' + $.param(datae),
      function(data) {
        $("#parameter").html(data);
        // $('.select2').select2();
      });
  }
</script>