<section class="parallax parallax-2" style="background-image: url('<?= base_url()?>images/images_bg_top.jpg'); height:50%; background-position: 50% -92px;">

<div class="container" style="height:130px;">
        <div class="row" >
<div class="col-xs-6" style="float:left">
<img style="margin-top:-4.5px; float:left;" src="<?= base_url()?>images/logob_ems.png" class="img-responsive">
</div> 
<div class="col-xs-6" >
<div class="panel panel-default" style="margin-top:20px; padding-top:15px;">
<div class="panel-body">
<form class="form-horizontal" name="filters" id="filters">			
<div class="form-group">
<label for="kecamatan" class="col-sm-3 control-label">SKPD</label>
<div class="col-sm-9">
<?php echo form_dropdown('id_skdp',$skpd,'','id="id_skdp" onchange="get_unit()" style="" class="form-control"');?> </div></div></form>
</div></div>

</div>
		</div>
 </div>



</section>