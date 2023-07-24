<div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-left:-15px; margin-right:-15px;">
      <!-- Indicators -->
      
      <div class="carousel-inner" role="listbox">
   <?php     
 $slide = $this->db->query("SELECT * FROM slide ORDER BY sort ASC")->result();
 ?>

 <?php 	$i = 0;	foreach($slide as $row):
 $i ++;
 
 if($i == '1'){
 $act ='active';	 
 }else{
 $act ='';
 }
 ?>    
 
  	<div class="item <?php echo $act;?>"> 

                 <img src="<?php echo base_url();?>images/berita/<?php echo $row->image;?>"/>
				 
			<?php if($row->link){?>
            
            <div class="carousel-caption"><a href="<?php echo $row->link;?>" target="<?php echo $row->target;?>"><?php echo $row->caption;?></a></div>
            <?php }else{?>
			<div class="carousel-caption"><?php echo $row->caption;?></div>
            <?php }?>				 
				 

	</div>		


 <?php endforeach; ?>  	
        

 
    
        
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->
    
    
    
    
  
    
    
 <style>
 
 
 
 
 .nopadding { 
   //border:solid 1px;
   padding: 0 !important;
   margin: 0 !important;
}


</style>