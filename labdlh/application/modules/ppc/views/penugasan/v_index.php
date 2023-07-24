<div class="box box-default">
  <form class="form-horizontal" name="filter" id="filter" action="<?php echo base_url(); ?>penugasan/data_list" method="POST">
		<div class="box-header with-border">
			<div class="col-md-6" style="float: left;">
				<b> Penugasan </b>
			</div>
			<div style="float: right;">
      <?php if($this->ion_auth->in_group(array('admin','manager_teknis'))){?>
        <div style="float: right;">
			    <a href="ppc/penugasan/form" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> &nbsp;Tambah</a>
          <!-- <a href="ppc/penugasan/tambah" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> &nbsp;Tambah</a> -->
		    </div>
      <?php }?>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6">
                <div class="form-group" style="align: left;">
                  <label for="kode" class="col-md-3 control-label" style="align: left;">Tahun :</label>
                  <?php 
                  // for($i=date('Y'); $i>=3; $i++);
                  $thn = array('2021'=>'2021', '2022'=>'2022', '2023'=>'2023', '2024'=>'2024', '2025'=>'2025', '2026'=>'2026'); 
                  // $thn = $i;
                  $bln = array(''=>'','01'=>'01','02'=>'02','03'=>'03','04'=>'04','05'=>'05','06'=>'06','07'=>'07','08'=>'08','09'=>'09','10'=>'10','11'=>'11','12'=>'12');
                  ?>
                  <div id="tahun" class="col-md-2"><?php echo form_dropdown('tahun', $thn, date("Y"),'class="form-control" id="tahun"');?></div>
                  <div id="bulan" class="col-md-2"><?php echo form_dropdown('bulan', $bln, date("m"),'class="form-control" id="bulan"');?></div>
                  <div id="html" class="col-md-5">
                    <a href="javascript:void(0)" onclick="get_items()" class="btn btn-success btn-sm" ><i class="fa fa-search"></i> Tampilkan</a>
                  </div>
                </div>
            </div>
            <div class="col-md-6">
            <div class="form-group" style="align: right;">
                  <label for="kode" class="col-md-3 control-label" style="align: right;">Cari :</label>
                  <div class="col-md-7"><?php echo form_input('nama', '','class="form-control" id="nama"');?></div>
                </div>
            </div>
					</div>
				</div>
			</div>
		</div>
  </form>
	<div class="box-body">
		<div class="row">
			<div class="col-md-12">
				<div id="content_items"></div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade"  id="ajax-modal"  tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
      <div id="ajax-modalin"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




<script type="text/javascript">
  $(function() {
    var currentDate = new Date();
    $('#mulai').datepicker({
      format: "yyyy-mm-dd",
      autoclose: true,
    });
    $("#mulai").datepicker("setDate", currentDate);

    $('#sampai').datepicker({
      format: "yyyy-mm-dd",
      autoclose: true,
    });
    $("#sampai").datepicker("setDate", currentDate);

  });
$("#nama").keyup(function(event){

    if(event.keyCode === 13 || event.key === 'Enter'){
       get_items();
    }
});

$('#filter').bind("keypress", function(e) {
  if (e.keyCode == 13) {
    e.preventDefault();
    return false;
  }
});

var url = "<?php echo base_url()?>";
function detail(id)
{
 	$('#ajax-modal').modal('show');
    $('.modal-title').text('Detail Penugasan');
    $.get(url+'ppc/penugasan/detail/'+id,{}, function(data) {
        $("#ajax-modalin").html(data);
    });
}

function hapus(id) {
  var answer = confirm("apakah anda yakin item ini dihapus?")
  if (answer){delet(id);}
  else{}
}

function delet(id){
  	$.ajax({
        url: site+'ppc/penugasan/hapus/'+id, 
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

$(function() {
	get_items();
});

var page = '1';
function get_items(page){
    $("#content_items").html('<i class="fa fa-refresh fa-spin"></i>');
	var url = '<?php echo site_url() ?>';
	var datae = {'page' : page};
	$.post(url+'ppc/penugasan/data_list',$(document.filter.elements).serialize() + '&' + $.param(datae),
	function(data) {
		$("#content_items").html(data);
	});
}

</script>