<div class="row">
<div class="col-md-12">
<div class="box box-info">

            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            
            
<div class="box-body">
  
  
<?php
	// append scripts to <head>
	if ( !empty($crud_data) )
	{
		foreach ($crud_data->css_files as $file)
			echo "<link href='$file' rel='stylesheet'>".PHP_EOL;

		foreach ($crud_data->js_files as $file)
			echo "<script src='$file'></script>".PHP_EOL;
	}
?>


<?php if ( !empty($crud_note) ) echo "<p>".$crud_note."</p>"; ?>

<?php if ( !empty($crud_data) ) echo $crud_data->output; ?>

</div>
</div>


</div>
</div>
