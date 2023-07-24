<div class="box box-default">
	<div class="box-header with-border">
		<div class="col-md-6" style="float: left;">
			<form class="form-horizontal" name="filter" id="filter">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<div class="col-md-9">
								<?php 
								$opts = 'placeholder="Username"';
								echo form_input('jenis_tugas','','class="form-control" id="jenis_tugas" placeholder="Search"');
								?>
							</div>
						</div><!-- /.form-group -->
					</div><!-- col -->
				</div><!-- row -->
			</form>
		</div>
		<?php if($this->ion_auth->in_group(array('admin','manager_teknis'))){?>
    	<div style="float: right;">
			<a href="ppc/jenis_tugas/form/" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> &nbsp;Tambah</a>
		</div>
		<?php }?>
	</div>
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
$("#jenis_tugas").keyup(function(event){

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
function ubah(id)
{
 	$('#ajax-modal').modal('show');
    $('.modal-title').text('Merubah Jenis Tugas');
    $.get(url+'ppc/jenis_tugas/ubah/'+id,{}, function(data) {
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
        url: site+'ppc/jenis_tugas/hapus/'+id, 
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
	$.post(url+'ppc/jenis_tugas/jenis_tugas_list',$(document.filter.elements).serialize() + '&' + $.param(datae),
	function(data) {
		$("#content_items").html(data);
	});
}

</script>