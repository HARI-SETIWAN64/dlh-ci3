<div class="box box-default">
	<div class="box-header with-border">
		<div class="panel-heading"><strong>Pendidikan</strong></div>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-12">
				<div class="panel-body">
          <?php if($id==""){$get = "";}else{$get = "/$id";} ?>
          <?php echo form_open_multipart('internal/karyawan/pendidikan_simpan_form/'.$users_id.$get, 'class="form-horizontal"');?>
          <div class="col-md-12">
            <div class="form-group">
              <label for="" class="col-md-2 control-label"> <div>No Urut *</div> </label>
              <div class="col-sm-10">
                <?php
                $data = array(
                  'name' => 'urut',
                  'id'   => 'urut',
                  'class'=> 'form-control',
                  'type' => 'number',
                  'value'=> isset($item->urut) ? $item->urut : '',
                );
                echo form_input($data);
                ?>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-md-2 control-label"> <div>Pendidikan</div> </label>
              <div class="col-sm-10">
                <?php 
                $pddkan = array("sd"=>"SD","smp"=>"SMP","sma"=>"SMA","d123"=>"D1/D2/D3","s1"=>"S1","s2"=>"S2","S3"=>"S3");
                echo form_dropdown('pendidikan', $pddkan, isset($item->pendidikan) ? $item->pendidikan : '','class="form-control"  id="pendidikan" required');
                ?>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-md-2 control-label"> <div>Nama Institusi *</div> </label>
              <div class="col-sm-10">
                <?php echo form_input('nama_institusi', isset($item->nama_institusi) ? $item->nama_institusi : '','class="form-control"  id="nama_institusi" required');?>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-md-2 control-label"> <div>Jurusan</div> </label>
              <div class="col-sm-10">
                <?php echo form_input('jurusan', isset($item->jurusan) ? $item->jurusan : '','class="form-control"  id="jurusan"');?>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-md-2 control-label"> <div>Tahun *</div> </label>
              <div class="form-group">
                <div class="col-sm-2">
                  <?php echo form_input('mulai', isset($item->mulai) ? $item->mulai : '','class="form-control" placeholder="mulai" id="mulai" required');?>
                </div>
                <div class="col-md-1" align="center">SD</div>
                <div class="col-sm-2">
                  <?php echo form_input('sampai', isset($item->sampai) ? $item->sampai : '','class="form-control" placeholder="sampai" id="sampai" required');?>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="keterangan" class="col-md-2 control-label">Keterangan :</label>
              <div class="col-md-10">
                <?php 
                $data = array(
                  'name'        => 'keterangan',
                  'id'          => 'keterangan',
                  'value'       => isset($item->keterangan) ? $item->keterangan : '',
                  'rows'        => '3',
                  'cols'        => '10',
                  'style'       => 'width:90%',
                  'class'       => 'form-control'
                );

                echo form_textarea($data);
                ?>
                <?php echo form_error('keterangan') ; ?>
              </div>
            </div>

            <br /><br />
            <div class="form-group">
              <div align="center" id="simpan">
                <?php echo form_submit('submit', 'Simpan','class="btn btn-primary" onclick="return confirm(\'Apakah anda sudah yakin ?\');"');?>
              </div>
              <?php echo form_hidden('users_id',$users_id); ?>
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