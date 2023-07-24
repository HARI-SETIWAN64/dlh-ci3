<form method='post' action='' name='form_ubah' class='form-horizontal' id="form_ubah" >
  <div class="panel panel-default">
    <div class="panel-heading">Detail Spesifikasi Alat</div>
      <div class="panel-body ">
          <div class="col-md-12">
           
              <?php foreach ($items as $row){ 
              date_default_timezone_set("Asia/Jakarta");
              $time =  Date('Y-m-d');
              $nextcal= $row->nextcal;
              $startdate = date('Y-m-d', strtotime('-60 days', strtotime($nextcal)));
                if($time < $startdate){ 
                  $statuscal='1'; 
                }elseif($time < $nextcal){
                  $statuscal='2';
                }else{
                  $statuscal='3';
                }
                $data = array('1'=>'Aktif', '2'=>'Hold', '3'=>'Non-Aktif');
              ?>
              <div class="form-group">
                <label for="" class="col-sm-4 control-label"><div><?php echo 'Nama Alat * :'; ?></div> </label>
                <div class="col-sm-8">
                  <div class="form-control">
                    <?php echo $row->nama_alat; ?>
                  </div>
                </div>
              </div>

               <div class="form-group">
                <label for="" class="col-sm-4 control-label"><div><?php echo 'Kode Alat * :'; ?></div> </label>
                <div class="col-sm-8">
                  <div class="form-control">
                    <?php echo $row->kode_alat; ?>
                  </div>
                </div>
              </div>

               <div class="form-group">
                <label for="" class="col-sm-4 control-label"><div><?php echo 'Merk * :'; ?></div> </label>
                <div class="col-sm-8">
                  <div class="form-control">
                    <?php echo $row->brand; ?>
                  </div>
                </div>
              </div>

               <div class="form-group">
                <label for="" class="col-sm-4 control-label"><div><?php echo 'Model * :'; ?></div> </label>
                <div class="col-sm-8">
                  <div class="form-control">
                    <?php echo $row->model; ?>
                  </div>
                </div>
              </div>

                  <div class="form-group">
                <label for="" class="col-sm-4 control-label"><div><?php echo 'No Seri * :'; ?></div> </label>
                <div class="col-sm-8">
                  <div class="form-control">
                    <?php echo $row->noseri; ?>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-sm-4 control-label"><div><?php echo 'Titik Kalibrasi * :'; ?></div> </label>
                <div class="col-sm-8">
                  <div class="form-control">
                    <?php echo $row->titikkalibrasi; ?>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-sm-4 control-label"><div><?php echo 'Kelas * :'; ?></div> </label>
                <div class="col-sm-8">
                  <div class="form-control">
                    <?php echo $row->kelas; ?>
                  </div>
                </div>
              </div>

               <div class="form-group">
                <label for="" class="col-sm-4 control-label"><div><?php echo 'Daya * :'; ?></div> </label>
                <div class="col-sm-8">
                  <div class="form-control">
                    <?php echo $row->daya; ?>
                    <?php echo $row->satuan_daya; ?>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-sm-4 control-label"><div><?php echo 'Rentang Pemakaian * :'; ?></div> </label>
                <div class="col-sm-8">
                  <div class="form-control">
                    <?php echo $row->usagerange; ?>
                    <?php echo $row->satuan_rentang; ?>
                  </div>
                </div>
              </div>
                  <div class="form-group">
                <label for="" class="col-sm-4 control-label"><div><?php echo 'Resolusi * :'; ?></div> </label>
                <div class="col-sm-8">
                  <div class="form-control">
                    <?php echo $row->resolusion; ?>
                    <?php echo $row->satuan_resolusi; ?>
                  </div>
                </div>
              </div>

                  <div class="form-group">
                <label for="" class="col-sm-4 control-label"><div><?php echo 'Toleransi * :'; ?></div> </label>
                <div class="col-sm-8">
                  <div class="form-control">
                    <?php echo $row->tolerance; ?>
                    <?php echo $row->satuan_toleransi; ?>
                  </div>
                </div>
              </div>

                  <div class="form-group">
                <label for="" class="col-sm-4 control-label"><div><?php echo 'Periode * :'; ?></div> </label>
                <div class="col-sm-8">
                  <div class="form-control">
                    <?php echo $row->periode; ?>
                    <?php echo $row->satuan_periode; ?>
                  </div>
                </div>
              </div>

                  <div class="form-group">
                <label for="" class="col-sm-4 control-label"><div><?php echo 'Kalibrasi Terakhir * :'; ?></div> </label>
                <div class="col-sm-8">
                  <div class="form-control">
                    <?php echo $row->lastcal; ?>
                  </div>
                </div>
              </div>

                  <div class="form-group">
                <label for="" class="col-sm-4 control-label"><div><?php echo 'Kalibrasi Selanjutnya * :'; ?></div> </label>
                <div class="col-sm-8">
                  <div class="form-control">
                    <?php echo $row->nextcal; ?>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="" class="col-sm-4 control-label"><div><?php echo 'Provider * :'; ?></div> </label>
                <div class="col-sm-8">
                  <div class="form-control">
                    <?php echo $row->provider; ?>
                  </div>
                </div>
              </div>

                <div class="form-group">
                <label for="file" class="col-sm-4 control-label"><div><?php echo 'File * :'; ?></div> </label>
                <div class="col-sm-8">
                  <div class="form-control">
                  <?php if($row->file <> ""){ ?>
                  <a href="<?php echo base_url().'file/cmdo/'.$row->file ?>" class="btn btn-xs btn-success" title="Download" target="_blank">Download</a>
                  <?php } ?>
                  </div>
                </div>
              </div>

                <div class="form-group">
                <label for="" class="col-sm-4 control-label"><div><?php echo 'Status Kalibrasi * :'; ?></div> </label>
                <div class="col-sm-8">
                  <div class="form-control">
                    <?php echo $data[$statuscal]; ?>
                  </div>
                </div>
              </div>

                  <div class="form-group">
                <label for="" class="col-sm-4 control-label"><div><?php echo 'PIC * :'; ?></div> </label>
                <div class="col-sm-8">
                  <div class="form-control">
                    <?php echo $row->first_name; ?>
                  </div>
                </div>
              </div>

            <?php } ?>
          </div>
      </div> 
  </div>
</form>
