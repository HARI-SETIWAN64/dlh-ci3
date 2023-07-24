
	 

		<div class="row">
                    
                     <?php foreach($foto0 as $fot):?>
                     <div class="col-md-3">   
                     
				<a href="javascript:void(0)" onclick="detailmap(<?= $fot->ID ?>)" title="Foto">
			<img class="img-responsive img-thumbnail img-polaroid " style="" src="<?php echo base_url();?>images/emsfoto/<?= $fot->images ?>" />
								</a>
								
								 
		  
		 
                                </div>
                                
                                   
                    
                     <?php endforeach?>
                    
                
			</div>