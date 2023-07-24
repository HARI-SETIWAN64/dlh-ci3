        
<div class="row">
<div class="col-md-12">
<div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Kegiatan DPA</h3>
			  <div class="pull-right">
			  	<form class="form-inline">
				
				<?php echo $this->fungsi->build_select_year_ems('tahunkode','class="form-control" id="tahunkode" onchange="dpa_emskab_kgtn()"',date('Y',strtotime('NOW')));?>
				<?php echo form_dropdown('skpdkode',$skpd,'','id="skpdkode" onchange="dpa_emskab_kgtn()" style="" class="form-control"');?> 
				<a href="javascript:void(0)" onclick="dpa_emskab_kgtn()" class="btn btn-info"><i class="glyphicon glyphicon-refresh"></i>&nbsp; LOAD</a>
 				</form>
				</div>
				</div>
            <div class="box-body">
			
			<div id="emskabkgtn"></div>
			</div>
			
</div>
</div>
</div>


<script type="application/javascript">



$(function() {
	dpa_emskab_kgtn();   
});

var page = '1';
function dpa_emskab_kgtn(page){
	
	
		var image_load = "<div class='text-center'><img src='"+site+"images/loading.gif' /></div>";	
		$("#emskabkgtn").html(image_load);		
		var limit = $('#limit').val();
		var skpdkode = $('#skpdkode').val();
		var tahunkode = $('#tahunkode').val();
		var limit = $('#limit').val();
		$.post(site+'admin/kegiatan/dftr_kgtn_list', {			
			page:page,
			limit:limit,
			tahunkode:tahunkode,
			skpdkode:skpdkode,
			}, function(data) {
			$("#emskabkgtn").html(data);			
		});	
	
}

</script>