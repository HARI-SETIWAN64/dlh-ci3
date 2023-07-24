<header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">


        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>



<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
  <ul class="nav navbar-nav">
    <li class="<?php if(isset($menu)){echo ismenu($menu,'home');}?>">
    	<a href="<?php echo base_url()?>"><i class="glyphicon glyphicon-home"></i>&nbsp; Home</a>
    </li>   
	<li class="<?php if(isset($menu)){echo ismenu($menu,'kgtnskpd');}?>">
    	<a href="<?php echo base_url()?>home/kgtn_skpd"><i class="glyphicon glyphicon-list"></i>&nbsp; Daftar Kegiatan SKPD</a>
    </li>
  </ul>
</div>



<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">

    <?php if($this->ion_auth->in_group(array('admin_emskab','admin'))){?>
     <li><a href="<?php echo base_url()?>admin"><i class="glyphicon glyphicon-gift"></i> Admin Panel</a></li>
     <?php }?>
        <?php if (!$this->ion_auth->logged_in()){?>
        <li class="<?php if(isset($menu)){echo ismenu($menu,'login');}?>">
        <a href="<?php echo base_url()?>auth/login"><i class="glyphicon glyphicon-user"></i> Login</a>
        </li>
        <?php }else{?>
        <li class="dropdown user user-menu">
        <!-- Menu Toggle Button -->
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <!-- The user image in the navbar-->
        <i class="glyphicon glyphicon-user"></i>
        <!-- hidden-xs hides the username on small devices so only the image appears. -->
        <span class="hidden-xs"><?php echo $this->session->userdata('email')?> <i class="caret"></i></span>
        </a>
            <ul class="dropdown-menu">
            <!-- Menu Footer-->
                <li class="user-footer">
                    <div class="pull-left">
                        <a href="<?php echo base_url('auth/change_password')?>" class="btn btn-default btn-flat">Password</a>
                    </div>
                    <div class="pull-right">
                        <a href="<?php echo base_url('auth/logout')?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                </li>
            </ul>
        </li>

        <?php }?>

    </ul>
</div>





      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>