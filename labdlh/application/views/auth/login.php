<div class="container">
        <div class="center-block">
            <div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-12 col-xs-12 no-padding" style="z-index:1">
                <!-- Slider -->
                <div class="mlt-carousel">
                    <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img class="img-responsive center-block" src="<?php echo base_url()?>template/login2/img/step11.png" alt="step1">
                                <div class="item-content">
                                    <!-- <h3>SIMRAL</h3>
                                    <p>SISTEM INFORMASI PERENCANAAN, PENGANGGARAN DAN PELAPORAN KEUANGAN DAERAH</p> -->
                                    <h3>SIMPLING</h3>
                                    <p>Sistem Informasi Manajemen Pelayanan<br/> Laboratorium Lingkungan</p>
                                </div>
                            </div>
                            <div class="item">
                                <img class="img-responsive center-block" src="<?php echo base_url()?>template/login2/img/step1.png" alt="step2">
                                <div class="item-content">
                                    <h3>Dinas Lingkungan Hidup</h3>
                                    <p>Pemerintah Kabupaten Banyuwangi</p>
                                </div>
                            </div>
                            <!-- <div class="item">
                                <img class="img-responsive center-block" src="<?php echo base_url()?>template/login2/img/step3.png" alt="step3">
                                <div class="item-content">
                                    <h3> Proin sed leo sodales</h3>
                                    <p>ultricies posuere leo</p>
                                </div>
                            </div> -->
                        </div>
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <!-- <li data-target="#myCarousel" data-slide-to="2"></li> -->
                        </ol>
                    </div>
                    <!--mlt-carousel-->
                </div>
                <!-- Slider -->
            </div>
            <!-- Login -->

            <div class="col-lg-6 col-lg-offset-right-1 col-md-6 col-md-offset-right-1 col-sm-12 col-xs-12 no-padding">
                <div class="mlt-content">
                    <ul class="nav nav-tabs">
                        <!-- <li class="active"><a href="#register" data-toggle="tab">Register</a></li> -->
                        <li class="active"><a href="#login" data-toggle="tab">Login</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade" id="register">
                            <!--register form-->

                            <form form data-feedback='{"success": "fa-check", "error": "fa-times"}'>
                                <div class="col-lg-10 col-lg-offset-1 col-lg-offset-right-1 col-md-10 col-md-offset-1 col-md-offset-right-1 col-sm-12 col-xs-12 pull-right ">

                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-group has-feedback">
                                        <input type="text" name="fname" id="fname" class="mdl-textfield__input" />
                                        <label class="mdl-textfield__label " for="fullName ">Full Name</label>
                                        <span class="form-control-feedback" aria-hidden="true" id="fname1"></span>
                                    </div>
                                    <!--
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input " type="text" id="fullName ">
                                        <label class="mdl-textfield__label " for="fullName ">Full Name</label>
                                    </div>-->
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
                                        <input class="mdl-textfield__input " type="text " id="emailAddress ">
                                        <label class="mdl-textfield__label " for="emailAddress ">Email Address</label>
                                    </div>

                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
                                        <input class="mdl-textfield__input " type="text " pattern="-?[0-9]*(\.[0-9]+)? " id="mobileNumber ">
                                        <label class="mdl-textfield__label " for="mobileNumber ">Mobile Number</label>
                                        <span class="mdl-textfield__error ">Input is not a number!</span>
                                    </div>

                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
                                        <input class="mdl-textfield__input " type="password " id="SetPassword ">
                                        <label class="mdl-textfield__label " for="SetPassword ">Set Password</label>
                                    </div>

                                    <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect termsLabel" for="ageFlag">
                                <input type="checkbox" id="ageFlag" class="mdl-checkbox__input " checked>
                                <span class="mdl-checkbox__label ">I herby certify that I am atleast 18 years of age</span>
                                </label>

                                    <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="termsFlag">
                                <input type="checkbox" id="termsFlag" class="mdl-checkbox__input ">
                                <span class="mdl-checkbox__label ">I have read and accept the <a href="# ">Terms of Use</a> and <a href="# ">Privacy Policy</a></span>
                                </label>

                                    <button class="btn lt-register-btn " formaction="# ">register now <i class="icon-right pull-right "></i></button>
                                </div>
                            </form>
                            <!--register form-->
                        </div>
                        <div class="tab-pane fade in active" id="login">
                            <!--login form-->
                             <?php echo form_open('auth/login'.($this->input->get('continue') ? '/?continue='.urlencode($this->input->get('continue')) : ''), 'class="form-horizontal"');?>
                                <div class="col-lg-10 col-lg-offset-1 col-lg-offset-right-1 col-md-10 col-md-offset-1 col-md-offset-right-1 col-sm-12 col-xs-12 pull-right ">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <?php echo form_input($identity, '', 'class="mdl-textfield__input"');?> <?php echo form_error('identity') ; ?>
                                        <label class="mdl-textfield__label" for="emailAddress">Username</label>
                                    </div>
                                </div>

                                <div class="col-lg-10 col-lg-offset-1 col-lg-offset-right-1 col-md-10 col-md-offset-1 col-md-offset-right-1 col-sm-12 col-xs-12 pull-right ">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <?php echo form_input($password, '', 'class="mdl-textfield__input"');?> <?php echo form_error('password') ; ?>
                                        <label class="mdl-textfield__label" for="password">Password</label>
                                    </div>
                                </div>

                                <div class="col-lg-10 col-lg-offset-1 col-lg-offset-right-1 col-md-10 col-md-offset-1 col-md-offset-right-1 col-sm-12 col-xs-12 pull-right ">
                                    <div class="row">
                                        <br>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="rememberPass">
                                        <input type="checkbox" id="rememberPass" class="mdl-switch__input">
                                        <span class="mdl-switch__label">Remember</span>
                                        </label>

                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style=" text-align:right;">
                                            <a href="#">Reset Password</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-10 col-lg-offset-1 col-lg-offset-right-1 col-md-10 col-md-offset-1 col-md-offset-right-1 col-sm-12 col-xs-12 pull-right ">
                                    <?php echo form_submit('Login', lang('login_submit_btn'),'class="btn lt-register-btn"');?>
                                </div>

                                <?php if (!empty($message)) { ?>
                                    <?php echo "<br/><br/>".$message; ?>
                                <?php } ?>
                            <?php echo form_close(); ?>
                            <!--login form-->
                        </div>
                    </div>
                </div>
                <!--Login-->
            </div>
            <!--center-block-->
        </div>
        <!--container-->
    </div>