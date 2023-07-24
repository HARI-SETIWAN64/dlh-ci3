<div class="table table-responsive"><!--table-responsive-->
  <table class="table table-bordered table-striped">
    <tr>
      <th width="24%">NOMOR</th>
      <th width="4%">JENIS</th>
      <th width="13%">AKSI</th>
      <th width="30%">PARAMETER</th>
      <th width="5%">HASIL</th>
      <th width="15%">KETERANGAN</th>
      <th width="20%">Waktu</th>
      <th width="7%">AKSI</th>
    </tr>

    <?php $cek = ""; ?>
    <?php foreach($items as $row) {?>
      <?php
      $btn_tte = "";
      $edit = 0;
      $q=$this->db->query("select * from tte where fpps_id='".$row->id."' and jenis='lhus' order by id desc limit 1");
      $q_stp=$this->db->query("select * from tte where fpps_id='".$row->id."' and jenis='stp' order by id desc limit 1");
      if($q->num_rows()>0){
        $tte = $q->row();
        if($tte->status == "1"){
          $btn_tte = '
          <a href="'.$tte->url_response.'" class="btn btn-xs btn-success" target="_blank" title="Cetak TTE">tte</a>
          ';
          $edit=1;
        }elseif ($tte->status == 2) {
          $btn_tte = '
          <div class="btn btn-xs btn-danger" target="_blank" title="Cetak TTE"> <i class="fa fa-close"></i></div>
          ';
          $edit=0;
        }else{
          $btn_tte = '<a href="'.base_url().'fpps/lhus/lhus_pdf/'.$row->id.'" class="btn btn-xs btn-primary" target="_blank" title="Cetak"> <i class="fa fa-print"></i></a>';
          $edit=0;
        }
      }else{
        $btn_tte = '<a href="'.base_url().'fpps/lhus/lhus_pdf/'.$row->id.'" class="btn btn-xs btn-primary" target="_blank" title="Cetak"> <i class="fa fa-print"></i></a>';
        $edit=1;
      }
      ?>

      <tr>
        <?php if($cek<>$row->no_lhus){ ?>
          <td><?php echo $row->no_lhus; ?></td>
          <td><?php echo $row->jenis_sampel; ?></td>
          <td>
            <?php echo $btn_tte;?>
            <?php if($status == '3'){ ?>
              <a href="javascript:void(0)" onClick="kesimpulan('<?php echo $row->id?>')" class="btn btn-xs btn-success" title="Kesimpulan LHUS" ><i class="fa fa-balance-scale"></i></a>
              <?php if($row->validasi_lhus <> "1" and $this->ion_auth->in_group(array('admin','manager_teknis')) ) {?>
                <a href="javascript:void(0)" onclick="verif_lhus('<?php echo $row->id?>')" class="btn btn-xs btn-success" title="Verifikasi TTE"> <i class="fa fa-check"></i></a>
              <?php } ?>
              <?php if($row->validasi_lhus <> "1" and $this->ion_auth->in_group(array('admin','manager_teknis')) ) {?>
                <!-- <a href="javascript:void(0)" onclick="finish('<?php echo $row->id?>')" class="btn btn-xs btn-success" title="setuju"> <i class="fa fa-thumbs-o-up"></i></a> -->
              <?php } ?>
            <?php }else if($status == '0'){ ?>
              <?php if(!$this->ion_auth->in_group(array('analis'))){?>
                <a href="<?php echo base_url()."fpps/lhus/form/".$row->id ?>" class="btn btn-xs btn-warning" title="Edit"> <i class="fa fa-pencil"></i></a>
                <a href="javascript:void(0)" onclick="ubah_footer('<?php echo $row->id?>')" class="btn btn-xs btn-success"> <i class="fa fa-tags" title="Footer"></i></a>
              <?php }?>
            <?php } ?>
          </td> 
        <?php }else{ ?>
          <td></td>
          <td></td>
          <td></td>
        <?php } ?>
        <td>
          <div style="float:left;width:80%;"><?php echo $row->parameter; ?></div>
          <div style="float:right;width:20%;">
            <?php 
            $tgl1 = new DateTime(date("Y-m-d", strtotime($row->validasi_fpps_date)));
            $tgl2 = new DateTime(date("Y-m-d"));
            $hari = $tgl2->diff($tgl1)->days;

            if($hari<=5){
              if($row->lhus_hasil == null) {
                echo '<div class="btn btn-xs btn-info" data-toggle="tooltip" data-toggle="tooltip" title="'.$hari.' Hari Sejak Fpps Disetujui"><i class="fa fa-close"></i></div>';
              }else{
                echo '<div class="btn btn-xs" data-toggle="tooltip" title="Sudah terisi"><i class="fa fa-check"></i></div>';
              }
            }elseif($hari>=6 and $hari<=8){
              if($row->lhus_hasil == null) {
                echo '<div class="btn btn-xs btn-warning" data-toggle="tooltip" title="'.$hari.' Hari Sejak Fpps Disetujui"><i class="fa fa-close"></i></div>';
              }else{
                echo '<div class="btn btn-xs" data-toggle="tooltip" title="Sudah terisi"><i class="fa fa-check"></i></div>';
              }
            }elseif($hari>=9 and $hari<=10){
              if($row->lhus_hasil == null) {
                echo '<div class="btn btn-xs btn-danger" data-toggle="tooltip" title="'.$hari.' Hari Sejak Fpps Disetujui"><i class="fa fa-close"></i></div>';
              }else{
                echo '<div class="btn btn-xs" data-toggle="tooltip" title="Sudah terisi"><i class="fa fa-check"></i></div>';
              }
            }elseif($hari>10){
              if($row->lhus_hasil == null) {
                echo '<div class="btn btn-xs bg-navy" data-toggle="tooltip" title="'.$hari.' Hari Sejak Fpps Disetujui"><i class="fa fa-close"></i></div>';
              }else{
                echo '<div class="btn btn-xs" data-toggle="tooltip" title="Sudah terisi"><i class="fa fa-check"></i></div>';
              }
            } 
            ?>
          </div>
        </td>
        <td><?php echo $row->lhus_hasil; ?></td>
        <td><?php 
        if($row->lhus_hasil == null) {
          if(strlen($row->first_name)>= 15){
            echo substr($row->first_name,0,15)."...";
          }else{
            echo $row->first_name;
          }
        }else{
          echo $row->lhus_keterangan; 
        }
      ?></td>
      <td><?php echo $row->lhus_date_create; ?></td>
      <td> 
        <?php if($this->ion_auth->in_group(array('analis', 'admin')) and $edit=='1'){
          if($q_stp->num_rows()>0){
            $stp = $q_stp->row();
            if($stp->status == "1"){?>
              <a href="javascript:void(0)" onClick="ubah_parameter('<?php echo $row->id_parameter?>')" class="btn btn-xs btn-warning" title="Isi Data Parameter" ><i class="fa fa-pencil"></i></a>
          <?php
            }
          ?>
        <?php }else{?> 
          
          <a href="javascript:void(0)" onClick="ubah_parameter('<?php echo $row->id_parameter?>')" class="btn btn-xs btn-warning" title="Isi Data Parameter" ><i class="fa fa-pencil"></i></a>
      <?php }} ?>
      </td>
    </tr>
    <?php 
    $cek=$row->no_lhus; 
  } 
  ?>
</table>
</div>

<?php
$total_page = $total_items / 50;
if ($total_page < 1){
  $total_page = '1';
}
?>
<br/>
<span class="label label-info pull-left">Total <?php echo $total_items?></span>
<span class="label label-info pull-right">Page <?php echo $page?></span>
<div id="page-selection" align="center"></div>

<script>
  function finish(id) {
    var answer = confirm("Apakah anda yakin item ini telah terisi semua?")
    if (answer){
      $.ajax({
        url: site+'fpps/lhus/validasi/'+id, 
        success: function(r){
          json = $.parseJSON(r);
          if (json.status == 'success') {
            get_items();
          }else{
            alert('gagal...')
          }
        },
        type: "post", 
        dataType: "html"
      }); 
      return false;
    }
    else{}
  }

function verif_lhus(id) {
  var answer = confirm("Apakah anda yakin kirim TTE LHUS?")
  if (answer){
    $.ajax({
      url: site+'fpps/lhus/validasi_tte/'+id, 
      success: function(r){
        json = $.parseJSON(r);
        if (json.status == 'success') {
          get_items();
        }else{
          alert('gagal...')
        }
      },
      type: "post", 
      dataType: "html"
    }); 
    return false;
  }
  else{}
}

function verif_lhu(id) {
  var answer = confirm("Apakah anda yakin kirim TTE data ini?")
  if (answer){
    $.ajax({
      url: site+'fpps/lhu/validasi_tte/'+id+'/kan', 
      success: function(r){
        json = $.parseJSON(r);
        if (json.status == 'success') {
          get_items();
        }else{
          alert('gagal...')
        }
      },
      type: "post", 
      dataType: "html"
    }); 
    return false;
  }
  else{}
}

function ubah_parameter(id)
{
  $('#ajax-modal').modal('show');
  $('.modal-title').text('Penilain');
  $.get(url+'fpps/lhus/ubah_lhus_parameter/'+id,{}, function(data) {
    $("#ajax-modalin").html(data);
  });
}

$('#page-selection').bootpag({
  page : <?php echo $page?>,
  total: <?php echo $total_page+1 ?>,
  maxVisible: 5,
  firstLastUse: true, 
  first: 'First',
  last: 'Last',
  prev: 'Prev',
  next: 'Next',
}).on("page", function(event, /* page number here */ num){

  var n = num;
    //$("#content").html("Insert content"); // some ajax content loading...
    $(".page").html("Page " + num);
    get_items(n);

  });
</script>
