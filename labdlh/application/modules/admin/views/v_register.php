<?php echo form_open('auth/register' , 'class="form-horizontal"');?>
<section>
  <div class="box box-default">
    <div class="box-header with-border">
      <div class="panel-heading"><strong>Data Pelanggan</strong></div>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-12">
          <div class="panel-body">
            <div class="form-group">
              <label for="nama_pelanggan" class="col-md-2 control-label">Username * :</label>
              <div class="col-md-8">
                <?php echo form_input($username);?>
              </div>
              <?php echo form_error('username') ; ?>
            </div>
            <div class="form-group">
              <label for="nama_pelanggan" class="col-md-2 control-label">Nama Lengkap * :</label>
              <div class="col-md-8">
                <?php echo form_input($first_name);?>
              </div>
              <?php echo form_error('first_name') ; ?>
            </div>
            <div class="form-group">
              <label for="no_telp" class="col-md-2 control-label">NIK * :</label>
              <div class="col-md-8">
                <?php echo form_input($nik);?>
              </div>
              <?php echo form_error('nik') ; ?>
            </div>
            <div class="form-group">
              <label for="no_telp" class="col-md-2 control-label">Email * :</label>
              <div class="col-md-8">
                <?php echo form_input($email);?>
              </div>
              <?php echo form_error('email') ; ?>
            </div>
            <div class="form-group">
              <label for="no_telp" class="col-md-2 control-label">Telepon * :</label>
              <div class="col-md-8">
                <?php echo form_input($phone);?>
              </div>
              <?php echo form_error('phone') ; ?>
            </div>
            <div class="form-group">
              <label for="no_telp" class="col-md-2 control-label">Nama Perusahaan * :</label>
              <div class="col-md-8">
                <?php echo form_input($company);?>
              </div>
              <?php echo form_error('company') ; ?>
            </div>
            <div class="form-group">
              <label for="no_telp" class="col-md-2 control-label">Alamat * :</label>
              <div class="col-md-8">
                  <?php 
                  $data = array(
                      'name'        => 'ALAMAT',
                      'id'          => 'ALAMAT',
                      'value'       => isset($item->ALAMAT) ? $item->ALAMAT : '',
                      'rows'        => '5',
                      'cols'        => '10',
                      'style'       => 'width:100%',
                      'class'       => 'form-control'
                  );
                  echo form_textarea($data);
                  ?>
                <?php echo form_error('ALAMAT') ; ?>
              </div>
            </div>
            <div class="form-group">
              <label for="no_telp" class="col-md-2 control-label">Password * :</label>
              <div class="col-md-8">
                <?php echo form_input($password);?>
              </div>
              <?php echo form_error('password') ; ?>
            </div>
            <div class="form-group">
              <label for="no_telp" class="col-md-2 control-label">Ulangi Pass * :</label>
              <div class="col-md-8">
                <?php echo form_input($password_confirm);?>
              </div>
              <?php echo form_error('password_confirm') ; ?>
            </div>
            <div class="form-group">
              <div class="col-md-4"></div>
              <div class="col-md-8">
                <?php echo form_submit('submit', lang('create_user_submit_btn'),'class="btn btn-info"');?>
              </div>
            </div>
          </div>
        </div>
        <div id="distance"> </div>
        <div class="clearfix"></div>
      </div>
        
    </div>
  </div>
</section>