<section class="form-horizontal">
  <?php
  echo form_open_multipart('fpps/lhu/kesimpulan/'.$item->id, 'class="form-horizontal"');
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
                <label for="dasar_hukum" class="col-md-4 control-label">Baku Mutu * :</label>
                <div class="col-md-8"><?php echo form_input('dasar_hukum', isset($item->dasar_hukum) ? $item->dasar_hukum : '','class="form-control" id="dasar_hukum"');?><?php echo form_error('dasar_hukum') ; ?></div>
              </div>
              <div class="form-group">
                <label for="metode_pengambilan" class="col-md-4 control-label">Metode Pengambilan * :</label>
                <div class="col-md-8"><?php echo form_input('metode_pengambilan', isset($item->metode_pengambilan) ? $item->metode_pengambilan : '','class="form-control" id="metode_pengambilan"');?><?php echo form_error('metode_pengambilan') ; ?></div>
              </div>
              <div class="form-group">
                <label for="petugas_pengambil" class="col-md-4 control-label">Pengambil Sampel * :</label>
                <div class="col-md-8"><?php echo form_dropdown('petugas_pengambil', $petugas_pengambil, isset($item->petugas_pengambil) ? $item->petugas_pengambil : '','class="form-control" id="petugas_pengambil"');?><?php echo form_error('petugas_pengambil') ; ?></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="kesimpulan" class="col-md-4 control-label">Kesimpulan * :</label>
                <div class="col-md-8">
                  <?php
                  $data = array(
                    'name'        => 'kesimpulan',
                    'id'          => 'kesimpulan',
                    'value'       => isset($item->kesimpulan) ? $item->kesimpulan : "",
                    'rows'        => '5',
                    'cols'        => '10',
                    'style'       => 'width:100%',
                    'class'       => 'form-control',
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
  <div class="panel panel-info">
    <div class="box-header with-border">
      <div class="col-md-6" style="float: left;">
        <div class="panel-heading">
          <strong>Parameter dan Metode Yang Diuji </strong>
        </div>
      </div>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-12">
          <div class="table table-responsive"><!--table-responsive-->
            <table class="table table-bordered table-striped">
              <tr>
                <td>Nama</td>
                <td>Satuan</td>
                <td>Hasil</td>
                <td>Keterangan</td>
                <td>Bintang</td>
                <td>Baku Mutu</td>
              </tr>
              <?php foreach($parameters as $parameter){ ?>
                <tr>
                  <td><?php echo $parameter->nama; ?></td>
                  <td><?php echo $parameter->lhus_satuan; ?></td>
                  <td><?php echo $parameter->lhus_hasil; ?></td>
                  <td><?php echo $parameter->lhus_keterangan; ?></td>
                  <td>
                    <?php $angka = array("0"=>"","1"=>"1","2"=>"2","3"=>"3");?>
                    <?php echo form_dropdown("bintang[".$parameter->id."]", $angka, $parameter->bintang,'class="form-control col-md-8"');?>
                  </td>
                  <td>
                    <?php
                    if($item->petugas_pengambil=="Pelanggan"){
                    }else if($item->petugas_pengambil=="Petugas Laboratorium"){
                    ?>
                      <a href="javascript:void(0)" onClick="ubah_parameter('<?php echo $parameter->id?>')" class="btn btn-xs btn-success" title="Isi Data Parameter" ><i class="fa fa-file-text-o"></i></a>
                    <?php
                    }else{
                    ?>
                      <a href="javascript:void(0)" onClick="ubah_parameter('<?php echo $parameter->id?>')" class="btn btn-xs btn-success" title="Isi Data Parameter" ><i class="fa fa-file-text-o"></i></a>
                    <?php
                    }
                    ?>
                  </td>
                </tr>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br />
  <div class="form-group">
    <div align="center" id="simpan">
      <?php echo form_submit('submit', 'Simpan','class="btn btn-primary" onclick="return confirm(\'Apakah anda sudah yakin ?\');"');?>
    </div>
    <?php echo form_hidden($csrf); ?>
    <?php echo form_close();?> 
    <div id="distance"> </div>
    <div class="clearfix"></div>
  </div>

</section>

<script type="text/javascript">
  var url = "<?php echo base_url()?>";
  function ubah_parameter(id)
  {
    $('#ajax-modal').modal('show');
      $('.modal-title').text('Penilain');
      $.get(url+'fpps/lhu/ubah_lhu_parameter/'+id,{}, function(data) {
          $("#ajax-modalin").html(data);
      });
  }
</script>