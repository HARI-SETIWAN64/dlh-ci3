<section>
	<div class="form-horizontal">
		<div class="box box-default">
			<div class="box-header with-border">
				<div class="panel-heading"><strong>Instansi</strong></div>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<div class="panel-body">
							<div class="col-md-12">
								<div class="form-group">
									<label for="id_pelanggan" class="col-md-2 control-label">Nama Instansi:</label>
									<div class="col-md-10">
										<div class="form-control">
											<?php echo $item->company; ?>
										</div>										
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="no_telp" class="col-md-4 control-label">Nama User :</label>
									<div class="col-md-8">
										<div class="form-control">
											<?php echo $item->first_name; ?>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="no_telp" class="col-md-4 control-label">Email :</label>
									<div class="col-md-8">
										<div class="form-control">
											<?php echo $item->email; ?>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="no_telp" class="col-md-4 control-label">Telpn :</label>
									<div class="col-md-8">
										<div class="form-control">
											<?php echo $item->phone; ?>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="no_telp" class="col-md-4 control-label">Jenis Sampel :</label>
									<div class="col-md-8">
										<div class="form-control">
											<?php echo $item->jenis_sampel; ?>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="alamat" class="col-md-4 control-label">Alamat :</label>
									<div class="col-md-8">
										<?php
										$data = array(
											'name'        => 'alamat',
											'id'          => 'alamat',
											'value'       => $item->alamat,
											'rows'        => '4',
											'cols'        => '5',
											'style'       => 'width:100%',
											'class'       => 'form-control',
											'readonly'	  => '',	
										);

										echo form_textarea($data); 
										?>
										<?php echo form_error('alamat') ; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="distance"> </div>
					<div class="clearfix"></div>
				</div>

			</div>
		</div>
		<div class="panel panel-info">
			<div class="box-header with-border">
				<div class="panel-heading"><strong>Parameter</strong></div>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" name="filter" id="filter">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<div class="col-md-9">
									<?php 
									echo form_hidden('ujibanding_id',$item->id_ujibanding);
									?>
								</div>
							</div><!-- /.form-group -->
						</div><!-- col -->
					</div><!-- row -->
				</form>
				<div class="col-md-12">
					<div id="content_items"></div>
				</div>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">
	$(function() {
		get_items();
	});

	var url = "<?php echo base_url()?>";
	var page = '1';
	function get_items(page){
		$("#content_items").html('<i class="fa fa-refresh fa-spin"></i>');
		var url = '<?php echo site_url() ?>';
		var datae = {'page' : page};
		$.post(url+'ujibanding/detail_list', $(document.filter.elements).serialize() + '&' + $.param(datae),
			function(data) {
				$("#content_items").html(data);
			});
	}
</script>