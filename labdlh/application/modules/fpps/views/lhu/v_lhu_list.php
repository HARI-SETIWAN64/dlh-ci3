<div class="table table-responsive"><!--table-responsive-->
  <table class="table table-bordered table-striped">
    <tr>
      <th width="25%">NOMOR</th>
      <th width="10%">JNS SAMPEL</th>
      <th width="40%">NAMA PELANGGAN</th>
      <th width="5%">Form</th>
      <th width="20%">AKSI</th>
    </tr>

    <?php foreach($items as $row) :?>
      <?php 
      $q=$this->db->query("select * from tte where fpps_id='".$row->id."' and (jenis='lhu_non' or jenis='lhu_kan') order by id desc limit 1");
      ?>
      <tr>
        <td><?php echo $row->no_lhu; ?></td>
        <td><?php echo $row->jenis_sampel; ?></td>
        <td><?php echo $row->nama_pelanggan; ?></td>
        <td>
          <?php 
          if($row->kesimpulan == "" or $row->kesimpulan == null){
            $wa_k = "btn-danger";
          }else{
            $wa_k = "btn-success";
          }
          ?>
          <a href="<?php echo base_url()."fpps/lhu/kesimpulan/".$row->id ?>" class="btn btn-xs <?= $wa_k; ?>" title="Kesimpulan LHU" ><i class="fa fa-balance-scale"></i></a>
        </td>
        <td>
          <a href="<?php echo base_url()."fpps/lhu/form/".$row->id ?>" class="btn btn-xs btn-warning" title="Lihat"> <i class="fa fa-eye"></i></a>
          <a href="<?php echo base_url()."fpps/lhu/lhu_pdf/".$row->id."/dlh";?>" class="btn btn-xs btn-success" target="_blank"> <i class="fa fa-print"></i> Dup.</a>
          <?php if($row->validasi_lhu <> "1" and $this->ion_auth->in_group(array('admin','manager_teknis')) ) {?>
            <a href="javascript:void(0)" onclick="finish('<?php echo $row->id?>','kan')" class="btn btn-xs btn-warning" title="setuju"> <i class="fa fa-thumbs-o-up"></i> KAN</a>
            <a href="javascript:void(0)" onclick="finish('<?php echo $row->id?>','non')" class="btn btn-xs btn-warning" title="setuju"> <i class="fa fa-thumbs-o-up"></i> NON</a>
          <?php } ?>
          <?php if($row->validasi_lhu == "1"){ 
            if($q->num_rows()>0){
              $tte = $q->row();

              if($tte->status == "1"){?>
                <a href="<?php echo $tte->url_response;?>" class="btn btn-xs btn-success" target="_blank"> <i class="fa fa-print"></i> TTE</a>
              <?php
              }else if($tte->status == "2"){?>
                <a href="" class="btn btn-xs btn-danger"> <i class="fa fa-close"></i> TTE</a>
              <?php
              }
            }else{

            }
          ?>
          <?php } ?>
        </td> 
      </tr>
    <?php endforeach; ?>
  </table>
</div>

<?php
$total_page = $total_items / 20;
if ($total_page < 1){
  $total_page = '1';
}
?>
<br/>
<span class="label label-info pull-left">Total <?php echo $total_items?></span>
<span class="label label-info pull-right">Page <?php echo $page?></span>
<div id="page-selection" align="center"></div>

<script>


  function finish(id, ket) {
    var answer = confirm("Apakah anda yakin item ini disetujui?")
    if (answer){
      $.ajax({
        url: site+'fpps/lhu/validasi_tte/'+id+'/'+ket, 
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
