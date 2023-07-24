        
<div class="row">
<div class="col-md-12">
<div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Import Kegiatan DPA</h3>
			  	<div class="pull-right">
			  	<form class="form-inline">
				
				<?php echo $this->fungsi->build_select_year_ems('tahunkode','class="form-control" id="tahunkode" onchange="get_skpd_kgtn()"',date('Y',strtotime('NOW')));?>
				<?php echo form_dropdown('skpdkode',$skpd,'','id="skpdkode" onchange="get_skpd_kgtn()" style="" class="form-control"');?> 
				
 				</form>
				</div>
				</div>
            <div class="box-body">
			<div id="skpdkgtn"></div>			
			</div>
			
</div>
</div>
</div>


<script type="application/javascript">

function formimpor(kode)
{
		var skpdkode = $('#skpdkode').val();
		var tahunkode = $('#tahunkode').val();
		var url = '<?php echo base_url();?>';
		ajaxmodal(url+'admin/kegiatan/form_impor/'+tahunkode+'/'+kode+'/'+skpdkode);		
}

$(function() {
	get_skpd_kgtn();   
});

var page = '1';
function get_skpd_kgtn(page){
	
	
		var image_load = "<div class='text-center'><img src='"+site+"images/loading.gif' /></div>";	
		$("#skpdkgtn").html(image_load);		
		var limit = $('#limit').val();
		var skpdkode = $('#skpdkode').val();
		var tahunkode = $('#tahunkode').val();
		var limit = $('#limit').val();
		$.post(site+'admin/kegiatan/kgtn_list/'+tahunkode+'/'+skpdkode, {			
			page:page,
			limit:limit,
			tahunkode:tahunkode,
			skpdkode:skpdkode,
			}, function(data) {
			$("#skpdkgtn").html(data);			
		});	
	
}





</script>