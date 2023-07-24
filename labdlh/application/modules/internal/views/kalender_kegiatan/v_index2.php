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
								echo form_input('nama','','class="form-control" id="nama" placeholder="Search"');
								?>
							</div>
						</div><!-- /.form-group -->
					</div><!-- col -->
				</div><!-- row -->
			</form>
		</div>
    	<div style="float: right;">
			<a href="master/jabatan/form/" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> &nbsp;Tambah</a>
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
<script type="text/javascript">
$("#nama").keyup(function(event){

    if(event.keyCode === 3 || event.key === 'Enter'){
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


$(function() {
	get_items();
});

var page = '1';
function get_items(page){
    $("#content_items").html('<i class="fa fa-refresh fa-spin"></i>');
	var url = '<?php echo site_url() ?>';
	var datae = {'page' : page};
	$.post(url+'internal/kalender_kegiatan/data_calender',
		$(document.filter.elements).serialize() + '&' + $.param(datae),
	function(data) {
		$("#content_items").html(data);
	});
}

</script>