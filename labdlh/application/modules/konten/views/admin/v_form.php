<div class="panel panel-default">
  <div class="panel-heading">Form konten</div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-12">
        <?php echo form_open_multipart('konten/admin/form/' . $konten->id, 'id="form_c" class="form-horizontal" '); ?>
        <?php if ($konten->catid <> "") {
          echo form_hidden('title', $konten->title);
          echo form_hidden('catid', $konten->catid);
        } else { ?>
          <div class="form-group">
            <label for="" class="col-md-2 control-label">Kategori</label>
            <div class="col-md-9">
              <?php
              echo form_dropdown('catid', array('1' => 'Berita', '2' => 'Artikel', '3' => 'Info', '4' => 'Profil', '5' => 'Lms'), set_value('catid', $konten->catid), 'class="form-control input-sm" required');
              ?>
            </div>
          </div><!-- /.form-group -->
        <?php } ?>

        <div class="form-group">
          <label for="" class="col-md-2 control-label">Judul</label>
          <div class="col-md-9">
            <?php echo form_input('title', set_value('title', $konten->title), 'class="form-control input-sm" required') ?>
          </div>
        </div><!-- /.form-group -->

        <div class="form-group">
          <label for="" class="col-md-2 control-label">Isi<br />
            <div style=" font-weight:normal; font-size:11px"></div>
          </label>
          <div class="col-md-9">
            <textarea id="editor1" name="introtext"><?= set_value('introtext', $konten->introtext) ?></textarea>
          </div>
        </div><!-- /.form-group -->


        <div class="form-group">
          <label for="" class="col-md-2 control-label">Meta / Keyword</label>
          <div class="col-md-9">
            <?php echo form_input('metakey', set_value('metakey', $konten->metakey), 'class="form-control input-sm" ') ?>
          </div>
        </div>


        <div class="form-group">
          <label for="" class="col-md-2 control-label">Youtube ID</label>
          <div class="col-md-9">
            <?php echo form_input('youtube_id', set_value('youtube_id', $konten->youtube_id), 'class="form-control input-sm"') ?>
          </div>
        </div>
        
        <div class="form-group">
          <label for="" class="col-md-2 control-label">Foto</label>
          <div class="col-md-9">
            <?php if ($konten->images) { ?>
              <img src="<?php echo base_url() ?>images/konten/<?= $konten->images ?>" alt="Image preview"
                class="thumbnail" style="max-width: 250px; max-height: 250px">
            <?php } ?>
            <!-- bootstrap-imageupload. -->
            <div class="imageupload panel panel-default">
              <div class="file-tab panel-body">
                <label class="btn btn-default btn-file">
                  <span>Browse</span>
                  <!-- The file is stored here. -->
                  <input type="file" name="file">
                </label>
                <!-- <button type="button" class="btn btn-default">Remove</button> -->
              </div>
            </div>

          </div>
      </div>

      <!-- <div class="form-group">
                  <label for="" class="col-md-2 control-label">PDF</label>
                  <div class="col-md-9">
                    <div class="pdfupload panel panel-default">
                        <div class="file-tab panel-body">
                            <label class="btn btn-default btn-file">
                                <span>Browse</span>
                                <input type="file" name="file2">
                            </label>
                            <span>--- *Tidak Wajib untuk diisi ---</span>
                        </div>
                    </div>

                  </div>
                </div> -->

      <div class="form-group">
        <label for="" class="col-md-2 control-label"></label>
        <div class="col-md-4">
          <input name="submit" value="Simpan" class="btn btn-primary" type="submit">
        </div>
      </div>
    </div>
    <?php echo form_close() ?>
  </div>
</div>
</div>
</div>

<script src="<?php echo base_url() ?>template/admin/plugins/bootstrap-imageupload/bootstrap-imageupload.js"></script>

<script>
  $(function () {
    CKEDITOR.replace('editor1');
  });
</script>

<script>
  var $imageupload = $('.imageupload');
  $imageupload.imageupload();

  $('#imageupload-disable').on('click', function () {
    $imageupload.imageupload('disable');
    $(this).blur();
  })

  $('#imageupload-enable').on('click', function () {
    $imageupload.imageupload('enable');
    $(this).blur();
  })

  $('#imageupload-reset').on('click', function () {
    $imageupload.imageupload('reset');
    $(this).blur();
  });
</script>