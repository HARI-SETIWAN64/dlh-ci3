<section class="form-horizontal">
  <div class="panel panel-info">
    <div class="box-header with-border">
      <div class="col-md-6" style="float: left;">
        <div class="panel-heading">
          <?php echo form_open('fpps/fpps_pelanggan/pengesahan_epad/'.$id, 'class="form-horizontal"'); ?>
          <strong>Pengesahan Epad </strong>
        </div>
      </div>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-6">
          <table width="100%" class="table table-bordered table-striped">
            <tr>
              <td colspan="3" align="center"> Data Simpling </td>
            </tr>
            <tr>
              <td width="75%">Parameter</td>
              <td width="5%">Volume</td>
              <td width="20%">Harga</td>
            </tr>
            <?php 
            $total_lab = 0;
            foreach($labs as $lab){ 
              echo "
              <tr>
              <td>".$lab->parameter."</td>
              <td>1</td>
              <td align='right'>".number_format($lab->harga,2,',','.')."</td>
              </tr>
              ";
              $total_lab+=$lab->harga;
            }?>
            <tr>
              <td colspan="2"><b>Jumlah</b></td>
              <td align='right'><b><?php echo number_format($total_lab,2,',','.'); ?></b></td>
            </tr>
          </table>
        </div>
        <div class="col-md-6">
          <table width="100%" class="table table-bordered table-striped">
            <tr>
              <td colspan="3" align="center"> Data EPAD </td>
            </tr>
            <tr>
              <td width="75%">Uraian Tarif pajak</td>
              <td width="5%">Volume</td>
              <td width="20%">Harga</td>
            </tr>
            <?php 
            $total_epad = 0;
            foreach($epads as $epad){ 
              echo "
              <tr>
              <td>".$epad->uraian_tarif_pajak."</td>
              <td>".$epad->omset."</td>
              <td align='right'>".number_format($epad->biaya,2,',','.')."</td>
              </tr>
              ";
              $total_epad+=$epad->biaya;
            }
            ?>
            <td colspan="2"><b>Jumlah</b></td>
            <td align='right'><b><?php echo number_format($total_epad,2,',','.'); ?></b></td>
          </tr>
        </tr>
      </table>
    </div>
  </div>
</div>
</div>
<div class="panel panel-info">
  <div class="box-header with-border">
    <div class="col-md-6" style="float: left;">
      <div class="panel-heading">
        <strong>Form Pengesahan</strong>
      </div>
    </div>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-6">
        <div>
          <div class="form-group">
            <label for="" class="col-sm-4 control-label">Status</label>
            <div class="col-sm-8">
              <?php
              echo form_dropdown('status', array( "0"=>"", "1"=>"Disahkan", ""=>"Batalkan (Hapus data di epad)"),"0",'class="form-control input-sm col-sm-12" required ');  ?>
            </div>
          </div>
        </div>
        <div>
          
          <div class="form-group">
            <label for="" class="col-sm-4 control-label">Penandatangan</label>
            <div class="col-sm-8">
              <?php
              echo form_dropdown('jabatan',$pejabat,set_value('jabatan',isset($fpps->jabatan)?$item->jabatan:'12200106343531'),'class="form-control input-sm col-sm-12" required ');  ?>
            </div>
          </div>
        </div>

      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label class="col-sm-4 control-label">Tanggal</label>
          <?php
          if($fpps->tgl_terima == '0000-00-00'){
            $fpps->tgl_terima = date('Y-m-d', strtotime('NOW'));
          }
          ?>

          <div class="col-sm-2">
            <?php echo $this->fungsi->build_select_day('hari','class="form-control input-sm" ',date('d', strtotime($fpps->tgl_terima)));?>
          </div>
          <div class="col-sm-3">
            <?php echo $this->fungsi->build_select_month('bulan','class="form-control input-sm" ',date('m', strtotime($fpps->tgl_terima)));?>
          </div>
          <div class="col-sm-3">
            <?php echo form_dropdown('tahun',array('2025'=>'2025', '2024'=>'2024', '2023'=>'2023', '2022'=>'2022'),date('Y', strtotime($fpps->tgl_terima)),' class="form-control input-sm"');?>
          </div>
        </div><!-- /.form-group -->
      </div>

    </div>
  </div>
</div>
<div class="form-group">
  <div align="center" id="simpan">
    <?php echo form_submit('submit', 'Simpan','class="btn btn-primary" onclick="return confirm(\'Apakah anda sudah yakin data ini akan dilanjutkan?\');"');?>
  </div>
  <?php echo form_hidden($csrf); ?>
  <?php echo form_close();?> 
</div>
</section>
<script type="text/javascript">
  var url = "<?php echo base_url()?>";


  $(function() {
    get_items();
    pembayaran();
    $('.select2').select2();
  });

  $(document).ready(function() {
    $(".add-more").click(function(){ 
      var html = $(".copy").html();
      $(".after-add-more").after(html);
    });
    $("body").on("click",".remove",function(){ 
      $(this).parents(".input-group").remove();
    });
  });


  function pembayaran(){

    // $('select[name=div_alasan]').removeAttr('style');
    var ver = $('select[name=jenis_pembayaran]').val();
    if(ver == 'parameter'){
      $('#parameter').show();
      $('#paket').hide();
      $('#paket-parameter').hide();
    }else if(ver == 'paket'){
      $('#parameter').hide();
      $('#paket').show();
      $('#paket-parameter').hide();
      // $('.select2').select2();
    }else if(ver == 'paket-parameter'){
      $('#parameter').hide();
      $('#paket').hide();
      $('#paket-parameter').show();
      // $('.select2').select2();
    }

  }


  var page = '1';
  function get_items(page){
    $("#parameter").html('<i class="fa fa-refresh fa-spin"></i>');
    var condition =  {'id' : '<?php echo $item->id; ?>'};
    var like = {'id' : '<?php echo $item->id; ?>'};
    var datae = {'page' : page};
    $.post(url+'fpps/fpps_pelanggan/veri_pajak_list', $.param(like) + '&' + $.param(datae),
      function(data) {
        $("#parameter").html(data);
        // $('.select2').select2();
      });
  }
</script>