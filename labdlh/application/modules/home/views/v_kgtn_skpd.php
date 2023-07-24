  
  <section class="white-bg section-padding">
<div class="container">      
<div class="row">
<div class="col-md-12">
<div class="panel panel-default" style="background-image: url('<?= base_url()?>images/images_bg_top.jpg');">
<div class="panel-body" >
<img style="margin-top:-4.5px; float:left; height:100px;" src="<?= base_url()?>images/logob_ems.png" class="img-responsive">
</div> 
</div>
</div>
</div> 
<div class="row">
<div class="col-md-12">
<div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Kegiatan</h3>
			  	<div class="pull-right">
			  	<form class="form-inline">				
				<?php echo $this->fungsi->build_select_year_ems('tahun','class="form-control" id="tahunkode" onchange="get_skpd_kgtn()"',date('Y',strtotime('NOW')));?>
				<?php echo form_dropdown('id_skdp',$skpd,'','id="skpdkode" onchange="get_skpd_kgtn()" style="" class="form-control"');?> 
				
				</div>
				</div>
            <div class="box-body">
			<div id="skpdkgtn"></div>			
			</div>
			
</div>
</div>
</div></div>
</section>


<script type="application/javascript">

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
		$.post(site+'home/kgtn_list/'+tahunkode+'/'+skpdkode, {			
			page:page,
			limit:limit,
			}, function(data) {
			$("#skpdkgtn").html(data);			
		});	
	
}





</script>