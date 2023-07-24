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
		<div class="pull-right">
			<a href="javascript:void(0)" onclick="form('0')" class="btn btn-xs btn-success"> <i class="fa fa-plus"></i></a>
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

	var url = "<?php echo base_url()?>";
	function form(id)
	{
	 	$('#ajax-modal').modal('show');
	    $('.modal-title').text('');
	    $.get(url+'master/penilaian/form/'+id,{}, function(data) {
	        $("#ajax-modalin").html(data);
	    });
	}

	function status(id,status) {
		var answer = confirm("apakah anda yakin sampel sudah dikirim?")
		if (answer){
			$.ajax({
				url: site+'master/penilaian/status/'+id+'/'+status, 
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
		}
		return false;
	}



	function hapus(id) {
	  var answer = confirm("apakah anda yakin item ini dihapus?")
	  if (answer){delet(id);}
	  else{}
	}

	function delet(id){
	  	$.ajax({
	        url: site+'master/penilaian/hapus/'+id, 
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

	function validasi(id){
	  	$.ajax({
	        url: site+'master/penilaian/validasi/'+id, 
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
		$.post(url+'master/penilaian/data_list', $(document.filter.elements).serialize() + '&' + $.param(datae),
			function(data) {
				$("#content_items").html(data);
			});
	}

</script>