<div class="box box-default">
	<div class="box-header with-border">
		<div class="panel-heading"><strong>Pelatihan</strong></div>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-12">
				<div class="panel-body">
          <?php if($id==""){$get = "";}else{$get = "/$id";} ?>
          <?php echo form_open_multipart('internal/karyawan/pelatihan_simpan_form/'.$users_id.$get, 'class="form-horizontal"');?>
          <div class="col-md-12">
            <div class="form-group">
              <label for="" class="col-md-2 control-label"> <div>Pelatihan *</div> </label>
              <div class="col-sm-10">
                <?php 
                echo form_input('nama_pelatihan', isset($item->nama_pelatihan) ? $item->nama_pelatihan : '','class="form-control"  id="nama_pelatihan" required');
                ?>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-md-2 control-label"> <div>Tanggal *</div> </label>
              <div class="col-sm-10">
                <?php echo form_input('tgl', isset($item->tgl) ? $item->tgl : '','class="form-control"  id="tgl" required');?>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-md-2 control-label"> <div>Penyelenggara *</div> </label>
              <div class="col-sm-10">
                <?php echo form_input('penyeleggaran', isset($item->penyeleggaran) ? $item->penyeleggaran : '','class="form-control"  id="penyeleggaran" required');?>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-md-2 control-label"> <div>Lama Pelatihan *</div> </label>
              <div class="col-sm-10">
                <?php echo form_input('lama_pelatihan', isset($item->lama_pelatihan) ? $item->lama_pelatihan : '','class="form-control"  id="lama_pelatihan" required');?>
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
<script type="text/javascript">
  
  $(function() {
    var currentDate = new Date();
    $('#tgl').datepicker({
      format: "yyyy-mm-dd",
      autoclose: true,
    });
  });
</script>