<?php
$menu = $this->db->query("SELECT
navigation_items.id,
navigation_items.navigation_id,
navigation_items.title AS NAME,
navigation_items.parent_id AS parent_menu_id,
navigation_items.url AS link,
page.alias as name,
navigation_items.type
FROM
navigation_items
LEFT JOIN page ON page.id = navigation_items.entry_id
ORDER BY
navigation_items.sort ASC");
?>



<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
       <li><a href="<?php echo base_url()?>">HOME</a></li>  
        <li><a href="#">Link</a></li>
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
                
 <?php 

$menu_items = $menu->result();
             
                global $menuItems;
                global $parentMenuIds;

                //create an array of parent_menu_ids to search through and find out if the current items have an children
                foreach($menu_items as $parentId)
                {
                  $parentMenuIds[] = $parentId->parent_menu_id;
                }
                //assign the menu items to the global array to use in the function
                $menuItems = $menu_items;
                
                //recursive function that prints categories as a nested html unorderd list
                function generate_menu($parent)
                {
                        $has_childs = false;
                
                        //this prevents printing 'ul' if we don't have subcategories for this category
                        global $menuItems;
                        global $parentMenuIds;
                        //use global array variable instead of a local variable to lower stack memory requierment
                        foreach($menuItems as $key => $value)
                        {
						
								 if($value->type == 'page'){
								 	$link = 'page/view/'.$value->alias;								 
								 }else{
								 	$link = $value->link;								 
								 }
						
						
						
						
                            if ($value->parent_menu_id == $parent) 
                            {    
                                //if this is the first child print '<ul>'
                                if ($has_childs === false)
                                {
                                  //don't print '<ul>' multiple times  
                                  $has_childs = true;
                                  if($parent != 0)
                                  {
                                    echo '<ul class="dropdown-menu">';
                                  }
                                }
                                
                                if($value->parent_menu_id == 0 && in_array($value->id, $parentMenuIds))
                                {
                                  echo '<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">' . $value->name . ' <b class="caret"></b></a>';
                                }
                                else if($value->parent_menu_id != 0 && in_array($value->id, $parentMenuIds))
                                {
								
			                     echo '<li class="dropdown"><a href="' . base_url().$link . '">' . $value->name . '</a>';
                                }
                                else
                                {
                                  echo '<li><a href="' .base_url().$link. '">' . $value->name . '</a>';
                                }
                                generate_menu($value->id);
                                
                                //call function again to generate nested list for subcategories belonging to this category
                                echo '</li>';
                            }
                        }
                        if ($has_childs === true) echo '</ul>';
                }
                generate_menu(0);
              ?>    
        
      </ul>
     
       <ul class="nav navbar-nav navbar-right">
      <?php if ($this->ion_auth->logged_in()){?>        
      			<?php if ($this->ion_auth->in_group(array('admin','admin_web'))){?> 
                <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User Menu <span class="caret"></span></a>
          <ul class="dropdown-menu">
           <li role="separator" class="divider"></li>
            <li><a href="<?php echo base_url('admin/change_password')?>"><i class="glyphicon glyphicon-user"></i>&nbsp; Ubah Password</a></li>
            <li><a href="<?php echo base_url('auth/logout')?>"><i class="glyphicon glyphicon-off"></i>&nbsp; Log Out</a></li>           
          </ul>
        </li>
                  <?php }else{?>
                  
                  <?php }?>        
       <?php }else{?>
       <li><a href="<?php echo base_url()?>auth/login"><i class="glyphicon glyphicon-user"></i> Login</a></li>
         <?php }?> 
    </ul>
    </div>
  </div>
</nav>

