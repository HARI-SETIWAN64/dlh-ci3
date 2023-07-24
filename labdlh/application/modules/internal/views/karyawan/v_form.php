<div class="box box-default">
	<div class="box-header with-border">
		<div class="panel-heading"><strong>Karyawan</strong></div>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-12">
				<div class="panel-body">
          <?php if($id==""){$get = "";}else{$get = "/$id";} ?>
          <?php echo form_open_multipart('internal/karyawan/simpan_form'.$get, 'class="form-horizontal"');?>
          <div class="col-md-12">
            <div class="form-group">
              <label for="" class="col-md-2 control-label"> <div>Nama Lengkap *</div> </label>
              <div class="col-sm-10">
                <?php echo form_input('first_name', isset($item->first_name) ? $item->first_name : '','class="form-control"  id="first_name" required');?>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-md-2 control-label"> <div>Nip</div> </label>
              <div class="col-sm-10">
                <?php echo form_input('nip', isset($item->nip) ? $item->nip : '','class="form-control"  id="nip"');?>
              </div>
            </div>
            <div class="form-group">
             <label for="ttl" class="col-md-2 control-label">Tempat, Tgl Lahir :</label>
             <div class="col-md-10">
              <?php 
              $data = array(
               'name'        => 'ttl',
               'id'          => 'ttl',
               'value'       => isset($item->ttl) ? $item->ttl : '',
               'rows'        => '3',
               'cols'        => '10',
               'style'       => 'width:90%',
               'class'       => 'form-control'
             );

              echo form_textarea($data);
              ?>
              <?php echo form_error('ttl') ; ?></div>
            </div>
            <div class="form-group">
              <label for="" class="col-md-2 control-label"> <div>Agama *</div> </label>
              <div class="col-sm-10">
              <?php echo form_input('agama', isset($item->agama) ? $item->agama : '','class="form-control"  id="agama" required');?>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-md-2 control-label"> <div>Gol Darah *</div> </label>
              <div class="col-sm-10">
              <?php echo form_input('gol_darah', isset($item->gol_darah) ? $item->gol_darah : '','class="form-control"  id="gol_darah" required');?>
              </div>
            </div>
            <div class="form-group">
              <label for="alamat" class="col-md-2 control-label">Alamat :</label>
              <div class="col-md-10">
                <?php 
                $data = array(
                 'name'        => 'alamat',
                 'id'          => 'alamat',
                 'value'       => isset($item->alamat) ? $item->alamat : '',
                 'rows'        => '3',
                 'cols'        => '10',
                 'style'       => 'width:90%',
                 'class'       => 'form-control'
               );

                echo form_textarea($data);
                ?>
                <?php echo form_error('alamat') ; ?></div>
              </div>
            <div class="form-group">
              <label for="" class="col-md-2 control-label"> <div>Telp *</div> </label>
              <div class="col-sm-10">
              <?php echo form_input('phone', isset($item->phone) ? $item->phone : '','class="form-control"  id="phone" required');?>
              </div>
            </div>

              <div class="form-group">
                <label for="foto" class="col-md-2 control-label">File * :</label>
                <div class="col-md-10">
                  <input type="file" id="foto" name="foto" />
                  <?php echo form_error('foto') ; ?>
                </div>
                <br /><br />
                <div class="form-group">
                 <div align="center" id="simpan">
                  <?php echo form_submit('submit', 'Simpan','class="btn btn-primary" onclick="return confirm(\'Apakah anda sudah yakin ?\');"');?>
                </div>
                <?php echo form_hidden($csrf); ?>
                <?php echo form_close();?> 
              </div>
            </div>
          </div>
          <div id="distance"> </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>