<div class="row">
<div class="col-md-12">
<div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">
			  <a href="<?php echo base_url();?>admin/kegiatan/dftr_kgtn" class="btn btn-sm btn-default">
			  <i class="glyphicon glyphicon-menu-left"></i>
			  </a>&nbsp;&nbsp;
			  Detail Kegiatan</h3>
			  	<div class="pull-right">
			  	
				</div>
				</div>
            <div class="box-body">
			<div class="col-md-6">
			<table width="100%" border="0" cellspacing="0" cellpadding="0" class="pull-left">
			<tr>
			<td width="150">Kode Kegiatan</td>
			<td width="10">:</td>
			<td><?= $noted->sikd_kgtn_id ?></td>
	  		</tr>
			<tr>
			<td width="150">Nama Kegiatan</td>
			<td width="10">:</td>
			<td><?= $noted->nm_kegiatan ?></td>
	  		</tr>
			<tr>
			<td width="150">Tahun Anggaran</td>
			<td width="10">:</td>
			<td><?= $thnpil ?></td>
	  		</tr>
			<tr>
			<td width="150">Anggaran (Rp.)</td>
			<td width="10">:</td>
			<td><?= number_format($noted->jml_anggaran,0,",",".") ?></td>
	  		</tr>
			</table>			 
			</div>
			<div class="col-md-6">
			
			</div>
			
		
			</div>
			
</div>
</div>
</div>


<div class="row">
<div class="col-md-12">
<div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">			  
			  Foto 0 %</h3>	
			  	<div class="btn-group pull-right">
				<a href="<?php echo base_url();?>admin/kegiatan/form_foto/<?= $skpdpil ?>/<?= $dpapil ?>/<?= $kgtnpil ?>/<?= $idpil ?>/<?= $thnpil ?>" class="btn btn-sm btn-success" >TAMBAH</a>
			  	<a href="javascript:void(0)" class="btn btn-sm btn-default" onclick="dpa_emskab_fotonol()">LOAD</a>
				</div>
				</div>
            <div class="box-body">
			 
<div id="foto0"></div>
		 
			</div>
			
</div>
</div>
</div>

<div class="row">
<div class="col-md-12">
<div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">			  
			  Foto 50 %</h3>
			  	<div class="btn-group pull-right">
				<a href="<?php echo base_url();?>admin/kegiatan/form_foto2/<?= $skpdpil ?>/<?= $dpapil ?>/<?= $kgtnpil ?>/<?= $idpil ?>/<?= $thnpil ?>" class="btn btn-sm btn-success" >TAMBAH</a>
			  	<a href="javascript:void(0)" class="btn btn-sm btn-default" onclick="dpa_emskab_fotolima()">LOAD</a>
				</div>
				</div>
            <div class="box-body">
			<div id="fotolima" ></div>
			</div>
			
</div>
</div>
</div>

<div class="row">
<div class="col-md-12">
<div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">			  
			  Foto 100 %</h3>
			  	<div class="pull-right">
			  	
				</div>
				</div>
            <div class="box-body">
			
			</div>
			
</div>
</div>
</div>


<script type="application/javascript">

function formuedit(id)
{		
		var url = '<?php echo base_url();?>';
		ajaxmodal(url+'admin/kegiatan/form_foto/'+<?= $idpil ?>+'/'+<?= $skpdpil ?>+'/'+<?= $thnpil ?>+'/'+id);		
}
function formupload()
{		
		var url = '<?php echo base_url();?>';
		ajaxmodal(url+'admin/kegiatan/form_foto/'+<?= $idpil ?>+'/'+<?= $skpdpil ?>+'/'+<?= $thnpil ?>);		
}
</script>

<script type="application/javascript">
$(function() {
	dpa_emskab_fotonol();   
});

var page = '1';
function dpa_emskab_fotonol(page){
	
	
		var image_load = "<div class='text-center'><img src='"+site+"images/loading.gif' /></div>";	
		$("#foto0").html(image_load);		
		var limit = $('#limit').val();		
		var limit = $('#limit').val();
		$.post(site+'admin/kegiatan/detail_kgtn_nol/'+<?= $skpdpil ?>+'/'+<?= $dpapil ?>+'/'+<?= $kgtnpil ?>+'/'+<?= $idpil ?>+'/'+<?= $thnpil ?>, {			
			page:page,
			limit:limit,			
			}, function(data) {
			$("#foto0").html(data);			
		});	
	
}
</script>
<script type="application/javascript">
$(function() {
	dpa_emskab_fotolima();   
});

var page = '1';
function dpa_emskab_fotolima(page){
	
	
		var image_load = "<div class='text-center'><img src='"+site+"images/loading.gif' /></div>";	
		$("#fotolima").html(image_load);		
		var limit = $('#limit').val();		
		var limit = $('#limit').val();
		$.post(site+'admin/kegiatan/detail_kgtn_lima/'+<?= $skpdpil ?>+'/'+<?= $dpapil ?>+'/'+<?= $kgtnpil ?>+'/'+<?= $idpil ?>+'/'+<?= $thnpil ?>, {			
			page:page,
			limit:limit,			
			}, function(data) {
			$("#fotolima").html(data);			
		});	
	
}
</script>