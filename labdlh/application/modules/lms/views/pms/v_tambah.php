<div class="box box-default">
  <div class="box-header with-border">
    <div class="panel-heading"><strong>Dokumen</strong></div>
  </div>
  <div class="box-body">
    <div class="row">
      <div class="col-md-12">
        <div class="panel-body">
          <?php echo form_open_multipart('lms/pms/tambah', 'class="form-horizontal"'); ?>
          <div class="col-md-12">
            <div class="form-group">
              <label for="" class="col-md-2 control-label">
                <div>Nomor Dokumen *</div>
              </label>
              <div class="col-sm-10">
                <?php echo form_input('nomor_dokumen', isset($item->nomor_dokumen) ? $item->nomor_dokumen : '', 'class="form-control"  id="kode"'); ?>
                <?php echo form_error('nomor_dokumen') ; ?>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-md-2 control-label">
                <div>Jenis Dokumen </div>
              </label>
              <div class="col-sm-10" readonly>
                <?php echo form_input('jenis_dokumen', isset($item->jenis_dokumen) ? $item->jenis_dokumen : 'PMS', 'class="form-control" id="jenis_dokumen" readonly'); ?>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-md-2 control-label">
                <div>Nama Dokumen *</div>
              </label>
              <div class="col-sm-10">
                <?php echo form_input('nama_dokumen', isset($item->nama_dokumen) ? $item->nama_dokumen : '', 'class="form-control"  id="kode"'); ?>
                <?php echo form_error('nama_dokumen') ; ?>
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-md-2 control-label">
                <div>Kategori *</div>
              </label>
              <div class="col-sm-10">
                <?php echo form_input('kategori', isset($item->kategori) ? $item->kategori : '', 'class="form-control"  id="kode"'); ?>
                <?php echo form_error('kategori') ; ?>
              </div>
            </div>

            <div class="form-group">
              <label for="file" class="col-md-2 control-label">File * :</label>
              <div class="col-md-10">
                <input type="file" id="file" name="file" required/>
                <?php echo form_error('file'); ?>
              </div>
              <br /><br />
              <div class="form-group">
                <div align="center" id="simpan">
                  <?php echo form_submit('submit', 'Simpan', 'class="btn btn-primary" onclick="return confirm(\'Apakah anda sudah yakin ?\');"'); ?>
                </div>
                <?php echo form_hidden($csrf); ?>
                <?php echo form_close(); ?>
              </div>
            </div>
          </div>
          <div id="distance"> </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>