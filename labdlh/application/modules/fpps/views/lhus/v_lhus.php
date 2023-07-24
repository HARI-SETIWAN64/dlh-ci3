<div class="box box-default">
	<div class="box-header with-border">
		<div class="col-md-12" style="float: left;">
			<form class="form-horizontal" name="filter" id="filter">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<div class="col-md-9">
								<?php 
								$opts = 'placeholder="Username"';
								echo form_input('nama','','class="form-control" id="nama" placeholder="Search"');
								?>
							</div><!-- /.form-group -->
						</div><!-- col -->
					</div>
					<div class="col-md-1">
						Status :
					</div>
					<div class="col-md-4">
						<?php 
                        echo form_dropdown('status', array("0"=>"Belum", "3"=>"Selesai Belum Disetujui", "1"=>"Selesai"), "", 'class="form-control form-control-sm" onchange="get_items()" id="status"');
						?>
					</div>
				</div><!-- row -->
			</form>
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
    $('.modal-title').text('Merubah Parameter');
    $.get(url+'fpps/lhus/form/'+id,{}, function(data) {
        $("#ajax-modalin").html(data);
    });
}

var url = "<?php echo base_url()?>";
function kesimpulan(id)
{
 	$('#ajax-modal').modal('show');
    $('.modal-title').text('Kesimpulan');
    $.get(url+'fpps/lhus/kesimpulan/'+id,{}, function(data) {
        $("#ajax-modalin").html(data);
    });
}
function ubah_footer(id)
{
 	$('#ajax-modal').modal('show');
    $('.modal-title').text('Merubah Parameter');
    $.get(url+'fpps/lhus/ubah_footer/'+id,{}, function(data) {
        $("#ajax-modalin").html(data);
    });
}

$(function() {
	get_items();
});

var page = '1';
function get_items(page){
    $("#content_items").html('<i class="fa fa-refresh fa-spin"></i>');
	var url = '<?php echo site_url() ?>';
	var datae = {'page' : page};
	$.post(url+'fpps/lhus/lhus_list',
		$(document.filter.elements).serialize() + '&' + $.param(datae),
	function(data) {
		$("#content_items").html(data);
	});
}

</script>