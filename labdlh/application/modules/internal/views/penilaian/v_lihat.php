<form method='post' action='' name='form_ubah' class='form-horizontal' id="form_ubah" >
  <div class="panel panel-default">
    <div class="panel-heading">Ubah Jenis Sampel</div>
      <div class="panel-body ">
          <div class="col-md-12">
            <?php foreach ($items as $item){ ?>
              <div class="form-group">
                <label for="" class="col-sm-4 control-label"><div><?php echo $item->keterangan; ?></div> </label>
                <div class="col-sm-8">
                  <div class="form-control">
                    <?php echo $item->nilai; ?>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
      </div> 
  </div>
</form>