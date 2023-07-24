<div class="container">   

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-info">
        <div class="panel-heading">Pendaftaran Pengguna</div>
        <div class="panel-body">
          <?php echo form_open('admin/create_user' , 'class="form-horizontal"');?>
          <div class="form-group">
            <label for="username" class="col-md-3 control-label">
              Nama Pengguna:
            </label>
            <div class="col-md-4">
              <?php echo form_input($username);?>
            </div>
            <?php echo form_error('username') ; ?>
          </div>
          <div class="form-group">
            <label for="first_name" class="col-md-3 control-label">
              <?php //echo lang('create_user_fname_label', 'first_name');?>
              Nama Lengkap:
            </label>
            <div class="col-md-4">
              <?php echo form_input($first_name);?>
            </div>
            <?php echo form_error('first_name') ; ?>
          </div>
          <!-- <div class="form-group">
            <label for="ktp" class="col-md-3 control-label">
              Nomor KTP (NIK):
            </label>
            <div class="col-md-4">
              <?php echo form_input($nik);?>
            </div>
            <?php echo form_error('nik') ; ?>
          </div> -->
          <div class="form-group">
            <label for="no_telp" class="col-md-3 control-label">Nama Perusahaan * :</label>
            <div class="col-md-4">
              <?php echo form_dropdown('perusahaan_id',$perusahaan,'','class="form-control select2" onchange="" id="perusahaan_id" ');?>
            </div>
            <?php echo form_error('perusahaan_id') ; ?>
          </div>
          <div class="form-group">
          <label for="no_telp" class="col-md-3 control-label">Email Pengguna* :</label>
            <div class="col-md-4">
              <?php echo form_input($email);?>
            </div>
            <?php echo form_error('email') ; ?>
          </div>
          <div class="form-group">
          <label for="no_telp" class="col-md-3 control-label">No Telp Pengguna* :</label>
            <div class="col-md-4">
              <?php echo form_input($phone);?>
            </div>
            <?php echo form_error('phone') ; ?>
          </div>
          <div class="form-group">
            <label for="password" class="col-md-3 control-label">
              <?php echo lang('create_user_password_label', 'password');?> 
            </label>
            <div class="col-md-4">
              <?php echo form_input($password);?>
            </div>
            <?php echo form_error('password') ; ?>
          </div>

          <div class="form-group">
            <label for="password" class="col-md-3 control-label">
              <?php echo lang('create_user_password_confirm_label', 'password_confirm');?>
            </label>
            <div class="col-md-4">
              <?php echo form_input($password_confirm);?>
            </div>
            <?php echo form_error('password_confirm') ; ?>
          </div>
          <div class="form-group">
            <label for="password" class="col-md-3 control-label">
              Kecamatan Pengguna
            </label>
            <div class="col-md-4">
              <?php echo form_dropdown('no_kec',$kec,'','class="form-control select2" onchange="getkel()" id="no_kec" ');?>
            </div>
            <?php echo form_error('no_kec') ; ?>
          </div>
          <div class="form-group">
            <label for="password" class="col-md-3 control-label">
              Desa / Kelurahan Pengguna
            </label>
            <div class="col-md-4">
              <div id="kelurahan">
                <?php echo form_dropdown('no_kel',array(),'','class="form-control select2"');      ?>
              </div>
            </div>
            <?php echo form_error('no_kel') ; ?>
          </div>
          <div class="form-group">
            <label for="no_telp" class="col-md-3 control-label">Alamat Pengguna* :</label>
            <div class="col-md-4">
              <?php 
              $data = array(
                'name'        => 'alamat',
                'id'          => 'alamat',
                'value'       => isset($item->alamat) ? $item->alamat : '',
                'rows'        => '5',
                'cols'        => '10',
                'style'       => 'width:100%',
                'class'       => 'form-control'
              );
              echo form_textarea($data);
              ?>
              <?php echo form_error('alamat') ; ?>
            </div>
          </div>

          <div class="form-group">
            <label for="" class="col-md-3 control-label">

            </label>
            <div class="col-md-4">
              <?php echo form_submit('submit', lang('create_user_submit_btn'),'class="btn btn-info"');?>
            </div>
          </div>

          <?php echo form_hidden('company');?>
          <?php echo form_hidden('jenis_industri');?>
          <?php echo form_close();?>

        </div>
      </div>


    </div>
  </div>
</div>



<script type="application/javascript">
  $(function() {
    $('.select2').select2()
  }); 
  function getkel(){
    kec = $("#no_kec").val();	
    // alert(kec);
    load('dropdown/kelurahan/'+kec,'#kelurahan');
  }
</script>
