<div class="box box-default">
	<div class="box-header with-border">
		<form class="form-horizontal" name="filter" id="filter">
			<?php 
			$opts = 'placeholder="Username"';
			echo form_hidden('nama','','class="form-control" id="nama" placeholder="Search"');
			?>
		</form>
    	<div style="float: left;">
			<b>Footer</b>
		</div>
    	<div style="float: right;">
        	<a href="javascript:void(0)" onclick="ubah('1')" class="btn btn-sm btn-warning"> <i class="fa fa-pencil"></i> Ubah</a>
			<!-- <a href="master/footer/ubah/1" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> &nbsp;Ubah</a> -->
		</div>
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
function ubah(id)
{
 	$('#ajax-modal').modal('show');
    $('.modal-title').text('Merubah Footer');
    $.get(url+'master/footer/ubah/'+id,{}, function(data) {
        $("#ajax-modalin").html(data);
    });
}

function hapus(id) {
  var answer = confirm("apakah anda yakin item ini dihapus?")
  if (answer){delet(id);}
  else{}
}

$(function() {
	get_items();
});

var page = '1';
function get_items(page){
    $("#content_items").html('<i class="fa fa-refresh fa-spin"></i>');
	var url = '<?php echo site_url() ?>';
	var datae = {'page' : page};
	$.post(url+'master/footer/footer_list',$(document.filter.elements).serialize() + '&' + $.param(datae),
	function(data) {
		$("#content_items").html(data);
	});
}

</script>