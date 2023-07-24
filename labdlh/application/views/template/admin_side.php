<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <div align="center">
      <img src="<?= base_url()?>images/logo.jpg" class="img-responsive" >
    </div>
    <!-- administrator -->
    <?php
    $fpps = $this->db->query("select count(*) as jum from fpps where validasi_fpps <> '1'")->row("jum");
    $stp = $this->db->query("select count(*) as jum from fpps where validasi_stp <> '1' and validasi_fpps='1'")->row("jum");
    $lhus = $this->db->query("select count(*) as jum from fpps where validasi_lhus <> '1' and validasi_fpps='1' and validasi_stp='1'")->row("jum");

    $kegiatan = $this->db->query("
      select 
      count(*) as jum 
      from kegiatan 
      where 
      mulai-INTERVAL 1 DAY >= CURDATE() 
      or
      sampai >= CURDATE()
      ")->row("jum");
    
    //PPC
    $penugasan_user = $this->db->query("
      select 
      count(*) as jum 
      from ppc_penugasan
      where 
      (status = '0'
      or
      status = '4')
      and
      user_id = '".$this->session->userdata('user_id')."'

      ")->row("jum");
    $penugasan_admin = $this->db->query("
      select 
      count(*) as jum 
      from ppc_penugasan 
      where 
      status = '3'
      and
      (keterangan = '0'
      or
      keterangan = '1'
      or
      keterangan = '3')

      ")->row("jum");
      //end PPC

      //CMDO
      $alat = $this->db->query("
      select 
      count(id_detail) as jam 
      from detail_alat 
      where
      CURDATE() < nextcal
      and
      CURDATE() > nextcal - INTERVAL 60 DAY
      ")->row("jam");
     //end CMDO
      ?>

      <?php if($this->ion_auth->in_group(array('admin'))){?>
        <ul class="sidebar-menu">
          <li class="header"><i class="fa fa-desktop"></i>&nbsp;&nbsp;Data Transaksi</li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'fpps');}?>">
            <a href="<?php echo base_url()?>fpps/fpps_pelanggan">
              <i class="fa fa-users"></i> <span>FPPS</span>
              <?php
              if($fpps>0){
                echo '<small class="label pull-right bg-red">'.$fpps.'</small>';
              }
              ?>
              <!-- <small class="label pull-right bg-red"><?= $fpps ?></small> -->
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'stp');}?>">
            <a href="<?php echo base_url()?>fpps/stp">
              <i class="fa fa-television"></i> <span>STP</span>
              <?php
              if($stp>0){
                echo '<small class="label pull-right bg-red">'.$stp.'</small>';
              }
              ?>
              <!-- <small class="label pull-right bg-red"><?= $stp ?></small> -->
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'lhus');}?>">
            <a href="<?php echo base_url()?>fpps/lhus">
              <i class="fa fa-dashboard"></i> <span>LHUS</span>
              <?php
              if($lhus>0){
                echo '<small class="label pull-right bg-red">'.$lhus.'</small>';
              }
              ?>
              <!-- <small class="label pull-right bg-red"><?= $lhus ?></small> -->
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'lhu');}?>">
            <a href="<?php echo base_url()?>fpps/lhu">
              <i class="fa fa-shield"></i> <span>LHU</span>
            </a>
          </li>
        </ul>
        <ul class="sidebar-menu">
          <li class="header"><i class="fa fa-gear"></i>&nbsp;&nbsp;MASTER</li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'jenis_sampel');}?>">
            <a href="<?php echo base_url()?>master/jenis_sampel">
              <i class="fa fa-sitemap"></i> <span>Jenis Sampel</span>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'parameter');}?>">
            <a href="<?php echo base_url()?>master/parameter">
              <i class="fa fa-server"></i> <span>Parameter</span>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'perusahaan');}?>">
            <a href="<?php echo base_url()?>master/perusahaan">
              <i class="fa fa-building"></i> <span>Perusahaan</span>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'footer');}?>">
            <a href="<?php echo base_url()?>master/footer">
              <i class="fa fa-tags"></i> <span>Footer</span>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'users');}?>">
            <a href="<?php echo base_url()?>admin/users">
              <i class="fa fa-user"></i> <span>User</span>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'master_penilaian');}?>">
            <a href="<?php echo base_url()?>master/penilaian">
              <i class="fa fa-list-ol"></i> <span>penilaian</span>
            </a>
          </li>
        </ul>
        <ul class="sidebar-menu">
          <li class="header"><i class="fa fa-gear"></i>&nbsp;&nbsp;Laporan</li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'laporan');}?>">
            <a href="<?php echo base_url()?>laporan">
              <i class="fa fa-building"></i> <span>Laporan</span>
            </a>
          </li>
        </ul>
        <ul class="sidebar-menu">
          <li class="header"><i class="fa fa-gear"></i>&nbsp;&nbsp;Internal</li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'galery');}?>">
            <a href="<?php echo base_url()?>internal/galery">
              <i class="fa fa-file-image-o"></i> <span>Galery</span>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'pengaduan');}?>">
            <a href="<?php echo base_url()?>master/pengaduan">
              <i class="fa fa-commenting-o"></i> <span>Pengaduan</span>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'karyawan');}?>">
            <a href="<?php echo base_url()?>internal/karyawan">
              <i class="fa fa-users"></i> <span>Karyawan</span>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'kegiatan');}?>">
            <a href="<?php echo base_url()?>internal/kegiatan">
              <i class="fa fa-bullhorn"></i> <span>Kegiatan</span>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'penilaian');}?>">
            <a href="<?php echo base_url()?>internal/penilaian">
              <i class="fa fa-angellist"></i> <span>Penilaian</span>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'kalender');}?>">
            <a href="<?php echo base_url()?>internal/kalender_kegiatan">
              <i class="fa fa-calendar"></i> <span>Kalender</span>
              <?php
              if($kegiatan>0){
                echo '<small class="label pull-right bg-red">'.$kegiatan.'</small>';
              }
              ?>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'kata_mutiara');}?>">
            <a href="<?php echo base_url()?>master/kata_mutiara">
              <i class="fa fa-bullhorn"></i> <span>Kata Mutiara</span>
            </a>
          </li>
        </ul>
        <ul class="sidebar-menu">
        <li class="header"><i class="fa fa-gear"></i>&nbsp;&nbsp;LMS</li>
        <li class="<?php if (isset($menu)) {
          echo ismenu($menu, 'teknis');
        } ?>">
          <a href="<?php echo base_url() ?>">
            <i class="fa fa-server"></i> <span>Teknis</span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if (isset($menu)) {
              echo ismenu($menu, 'pengujian');
            } ?>">
              <a href="<?php echo base_url() ?>lms/pengujian">
                <i class="fa fa-file-powerpoint-o"></i> <span>Pengujian</span>
              </a>
            </li>
            <li class="<?php if (isset($menu)) {
              echo ismenu($menu, 'sampling');
            } ?>">
              <a href="<?php echo base_url() ?>lms/sampling">
                <i class="fa fa-file-powerpoint-o"></i> <span>Sampling</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="<?php if (isset($menu)) {
          echo ismenu($menu, 'manajeman');
        } ?>">
          <a href="<?php echo base_url() ?>">
            <i class="fa fa-server"></i> <span>Manajemen</span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if (isset($menu)) {
              echo ismenu($menu, 'iso_9001');
            } ?>">
              <a href="<?php echo base_url() ?>lms/iso_9001">
                <i class="fa fa-file-powerpoint-o"></i> <span>ISO-9001</span>
              </a>
            </li>
            <li class="<?php if (isset($menu)) {
              echo ismenu($menu, 'iso_14001');
            } ?>">
              <a href="<?php echo base_url() ?>lms/iso_14001">
                <i class="fa fa-file-powerpoint-o"></i> <span>ISO-14001</span>
              </a>
            </li>
            <li class="<?php if (isset($menu)) {
              echo ismenu($menu, 'iso_17025');
            } ?>">
              <a href="<?php echo base_url() ?>lms/iso_17025">
                <i class="fa fa-file-powerpoint-o"></i> <span>ISO-17025</span>
              </a>
            </li>
            <li class="<?php if (isset($menu)) {
              echo ismenu($menu, 'iso_17043');
            } ?>">
              <a href="<?php echo base_url() ?>lms/iso_17043">
                <i class="fa fa-file-powerpoint-o"></i> <span>ISO-17043</span>
              </a>
            </li>
            <li class="<?php if (isset($menu)) {
              echo ismenu($menu, 'pms');
            } ?>">
              <a href="<?php echo base_url() ?>lms/pms">
                <i class="fa fa-file-powerpoint-o"></i> <span>Performance Manajement System</span>
              </a>
            </li>
            <li class="<?php if (isset($menu)) {
              echo ismenu($menu, 'organisation');
            } ?>">
              <a href="<?php echo base_url() ?>lms/organisation">
                <i class="fa fa-file-powerpoint-o"></i> <span>Organisation</span>
              </a>
            </li>
            <li class="<?php if (isset($menu)) {
              echo ismenu($menu, 'lain_lain');
            } ?>">
              <a href="<?php echo base_url() ?>lms/lain_lain">
                <i class="fa fa-file-powerpoint-o"></i> <span>Lain-lain</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="<?php if (isset($menu)) {
          echo ismenu($menu, 'regulasi');
        } ?>">
          <a href="<?php echo base_url() ?>lms/regulasi">
            <i class="fa fa-file-powerpoint-o"></i> <span>Regulasi</span>
          </a>
        </li>
        <li class="<?php if (isset($menu)) {
          echo ismenu($menu, 'inovasi');
        } ?>">
          <a href="<?php echo base_url() ?>lms/inovasi">
            <i class="fa fa-file-powerpoint-o"></i> <span>Inovasi</span>
          </a>
        </li>
        <li class="<?php if (isset($menu)) {
          echo ismenu($menu, 'lainnya');
        } ?>">
          <a href="<?php echo base_url() ?>lms/lainnya">
            <i class="fa fa-file-powerpoint-o"></i> <span>Lain-lain</span>
          </a>
        </li>
      </ul>
        <ul class="sidebar-menu">
          <li class="header"><i class="fa fa-gear"></i>&nbsp;&nbsp;PPC</li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'tugas');}?>">
            <a href="<?php echo base_url()?>ppc/tugas">
              <i class="fa fa-sitemap"></i> <span>Tugas</span>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'jenis_tugas');}?>">
            <a href="<?php echo base_url()?>ppc/jenis_tugas">
              <i class="fa fa-sitemap"></i> <span>Jenis Tugas</span>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'penugasan');}?>">
            <a href="<?php echo base_url()?>ppc/penugasan">
              <i class="fa fa-server"></i> <span>Penugasan</span>
              <?php
              if($penugasan_admin>0){
                echo '<small class="label pull-right bg-red">'.$penugasan_admin.'</small>';
              }
              ?>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'rekap');}?>">
            <a href="<?php echo base_url()?>ppc/rekap">
              <i class="fa fa-server"></i> <span>Rekap</span>
            </a>
          </li>
        </ul>
        <ul class="sidebar-menu">
          <li class="header"><i class="fa fa-gear"></i>&nbsp;&nbsp;CMDO</li>
        <!-- Fitur Manajemen Alat -->
          <li class="<?php if(isset($menu)){echo ismenu($menu,'alat');}?>">
            <a href="<?php echo base_url()?>cmdo/alat">
              <i class="fa fa-server"></i> <span>Manajemen Alat</span>
            </a>
          </li>
          <!-- Akhir Fitur Manajemen Alat -->

          <!-- Fitur Spesifikasi Alat -->
          <li class="<?php if(isset($menu)){echo ismenu($menu,'spek_alat');}?>">
            <a href="<?php echo base_url()?>cmdo/spek_alat">
              <i class="fa fa-cog"></i> <span>Spesifikasi Alat</span>
            </a>
          </li>
          <!-- Akhir Fitur Spesifikasi Alat -->

          <!-- Fitur Detail Alat -->
          <li class="<?php if(isset($menu)){echo ismenu($menu,'detail_alat');}?>">
            <a href="<?php echo base_url()?>cmdo/detail_alat">
              <i class="fa fa-cogs"></i> <span>Detail Alat</span>
            </a>
          </li>
          <!-- Akhir Fitur Detail Alat -->

          <!-- Fitur Kalendar Kalibrasi -->
          <li class="<?php if(isset($menu)){echo ismenu($menu,'kalender_alat');}?>">
            <a href="<?php echo base_url()?>cmdo/kalender_alat">
              <i class="fa fa-calendar-check-o"></i> <span>Kalender Kalibrasi</span>
              <?php
              if($alat>0){
                echo '<small class="label pull-right bg-red">'.$alat.'</small>';
              }
              ?>
            </a>
          </li>
          <!-- Akhir Fitur Kalendar Kalibrasi -->

          <!-- Fitur Footer Alat -->
          <li class="<?php if(isset($menu)){echo ismenu($menu,'alat_footer');}?>">
            <a href="<?php echo base_url()?>cmdo/footer">
              <i class="fa fa-tags"></i> <span>Footer Inventaris Alat</span>
            </a>
          </li>
          <!-- Akhir Fitur Footer Alat -->
          </ul>
        <ul class="sidebar-menu">
          <li class="header"><i class="fa fa-gear"></i>&nbsp;&nbsp;Uji Banding</li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'ub_ujibanding');}?>">
            <a href="<?php echo base_url()?>ujibanding/">
              <i class="fa fa-file-archive-o"></i> <span>Data</span>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'ub_users');}?>">
            <a href="<?php echo base_url()?>ujibanding/admin/users">
              <i class="fa fa-user"></i> <span>Peserta</span>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'ub_jenis_sampel');}?>">
            <a href="<?php echo base_url()?>ujibanding/jenis_sampel">
              <i class="fa fa-sitemap"></i> <span>Jenis Sampel</span>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'ub_parameter');}?>">
            <a href="<?php echo base_url()?>ujibanding/parameter">
              <i class="fa fa-server"></i> <span>Parameter</span>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'juknis');}?>">
            <a href="<?php echo base_url()?>ujibanding/juknis">
              <i class="fa fa-file-powerpoint-o"></i> <span>Juknis</span>
            </a>
          </li>
        </ul>
        <ul class="sidebar-menu">
          <li class="header"><i class="fa fa-gear"></i>&nbsp;&nbsp;SITE</li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'konten');}?>">
            <a href="<?php echo base_url()?>konten/admin">
              <i class="fa fa-globe"></i> <span>Konten</span>
            </a>
          </li>
        </ul>
      <?php }?>
      <!-- END administrator -->

      <!-- admin pelayanan -->
      <?php if($this->ion_auth->in_group(array('admin_pelayanan'))){?>
        <ul class="sidebar-menu">
          <li class="header"><i class="fa fa-desktop"></i>&nbsp;&nbsp;Data Transaksi</li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'fpps');}?>">
            <a href="<?php echo base_url()?>fpps/fpps_pelanggan">
              <i class="fa fa-users"></i> <span>FPPS</span>
              <?php
              if($fpps>0){
                echo '<small class="label pull-right bg-red">'.$fpps.'</small>';
              }
              ?>
            </a>
          </li>
        </ul>
        <ul class="sidebar-menu">
          <li class="header"><i class="fa fa-gear"></i>&nbsp;&nbsp;MASTER</li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'jenis_sampel');}?>">
            <a href="<?php echo base_url()?>master/jenis_sampel">
              <i class="fa fa-sitemap"></i> <span>Jenis Sampel</span>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'parameter');}?>">
            <a href="<?php echo base_url()?>master/parameter">
              <i class="fa fa-server"></i> <span>Parameter</span>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'perusahaan');}?>">
            <a href="<?php echo base_url()?>master/perusahaan">
              <i class="fa fa-building"></i> <span>Perusahaan</span>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'footer');}?>">
            <a href="<?php echo base_url()?>master/footer">
              <i class="fa fa-tags"></i> <span>Footer</span>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'users');}?>">
            <a href="<?php echo base_url()?>admin/users">
              <i class="fa fa-user"></i> <span>User</span>
            </a>
          </li>
        </ul>
        <ul class="sidebar-menu">
          <li class="header"><i class="fa fa-gear"></i>&nbsp;&nbsp;Laporan</li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'laporan');}?>">
            <a href="<?php echo base_url()?>laporan">
              <i class="fa fa-building"></i> <span>Laporan</span>
            </a>
          </li>
        </ul>
        <ul class="sidebar-menu">
          <li class="header"><i class="fa fa-gear"></i>&nbsp;&nbsp;Internal</li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'galery');}?>">
            <a href="<?php echo base_url()?>internal/galery">
              <i class="fa fa-file-image-o"></i> <span>Galery</span>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'pengaduan');}?>">
            <a href="<?php echo base_url()?>master/pengaduan">
              <i class="fa fa-commenting-o"></i> <span>Pengaduan</span>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'karyawan');}?>">
            <a href="<?php echo base_url()?>internal/karyawan">
              <i class="fa fa-users"></i> <span>Karyawan</span>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'kegiatan');}?>">
            <a href="<?php echo base_url()?>internal/kegiatan">
              <i class="fa fa-message"></i> <span>Kegiatan</span>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'kalender');}?>">
            <a href="<?php echo base_url()?>internal/kalender_kegiatan">
              <i class="fa fa-calendar"></i> <span>Kalender</span>
              <?php
              if($kegiatan>0){
                echo '<small class="label pull-right bg-red">'.$kegiatan.'</small>';
              }
              ?>
              <!-- <small class="label pull-right bg-red"><?= $kegiatan ?></small> -->
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'kata_mutiara');}?>">
            <a href="<?php echo base_url()?>master/kata_mutiara">
              <i class="fa fa-bullhorn"></i> <span>Kata Mutiara</span>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'penilaian');}?>">
            <a href="<?php echo base_url()?>internal/penilaian">
              <i class="fa fa-angellist"></i> <span>Penilaian</span>
            </a>
          </li>
        </ul>
        <ul class="sidebar-menu">
        <li class="header"><i class="fa fa-gear"></i>&nbsp;&nbsp;LMS</li>
        <li class="<?php if (isset($menu)) {
          echo ismenu($menu, 'teknis');
        } ?>">
          <a href="<?php echo base_url() ?>">
            <i class="fa fa-server"></i> <span>Teknis</span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if (isset($menu)) {
              echo ismenu($menu, 'pengujian');
            } ?>">
              <a href="<?php echo base_url() ?>lms/pengujian">
                <i class="fa fa-file-powerpoint-o"></i> <span>Pengujian</span>
              </a>
            </li>
            <li class="<?php if (isset($menu)) {
              echo ismenu($menu, 'sampling');
            } ?>">
              <a href="<?php echo base_url() ?>lms/sampling">
                <i class="fa fa-file-powerpoint-o"></i> <span>Sampling</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="<?php if (isset($menu)) {
          echo ismenu($menu, 'manajeman');
        } ?>">
          <a href="<?php echo base_url() ?>">
            <i class="fa fa-server"></i> <span>Manajemen</span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if (isset($menu)) {
              echo ismenu($menu, 'iso_9001');
            } ?>">
              <a href="<?php echo base_url() ?>lms/iso_9001">
                <i class="fa fa-file-powerpoint-o"></i> <span>ISO-9001</span>
              </a>
            </li>
            <li class="<?php if (isset($menu)) {
              echo ismenu($menu, 'iso_14001');
            } ?>">
              <a href="<?php echo base_url() ?>lms/iso_14001">
                <i class="fa fa-file-powerpoint-o"></i> <span>ISO-14001</span>
              </a>
            </li>
            <li class="<?php if (isset($menu)) {
              echo ismenu($menu, 'iso_17025');
            } ?>">
              <a href="<?php echo base_url() ?>lms/iso_17025">
                <i class="fa fa-file-powerpoint-o"></i> <span>ISO-17025</span>
              </a>
            </li>
            <li class="<?php if (isset($menu)) {
              echo ismenu($menu, 'iso_17043');
            } ?>">
              <a href="<?php echo base_url() ?>lms/iso_17043">
                <i class="fa fa-file-powerpoint-o"></i> <span>ISO-17043</span>
              </a>
            </li>
            <li class="<?php if (isset($menu)) {
              echo ismenu($menu, 'pms');
            } ?>">
              <a href="<?php echo base_url() ?>lms/pms">
                <i class="fa fa-file-powerpoint-o"></i> <span>Performance Manajement System</span>
              </a>
            </li>
            <li class="<?php if (isset($menu)) {
              echo ismenu($menu, 'organisation');
            } ?>">
              <a href="<?php echo base_url() ?>lms/organisation">
                <i class="fa fa-file-powerpoint-o"></i> <span>Organisation</span>
              </a>
            </li>
            <li class="<?php if (isset($menu)) {
              echo ismenu($menu, 'lain_lain');
            } ?>">
              <a href="<?php echo base_url() ?>lms/lain_lain">
                <i class="fa fa-file-powerpoint-o"></i> <span>Lain-lain</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="<?php if (isset($menu)) {
          echo ismenu($menu, 'regulasi');
        } ?>">
          <a href="<?php echo base_url() ?>lms/regulasi">
            <i class="fa fa-file-powerpoint-o"></i> <span>Regulasi</span>
          </a>
        </li>
        <li class="<?php if (isset($menu)) {
          echo ismenu($menu, 'inovasi');
        } ?>">
          <a href="<?php echo base_url() ?>lms/inovasi">
            <i class="fa fa-file-powerpoint-o"></i> <span>Inovasi</span>
          </a>
        </li>
        <li class="<?php if (isset($menu)) {
          echo ismenu($menu, 'lainnya');
        } ?>">
          <a href="<?php echo base_url() ?>lms/lainnya">
            <i class="fa fa-file-powerpoint-o"></i> <span>Lain-lain</span>
          </a>
        </li>
      </ul>
        <ul class="sidebar-menu">
          <li class="header"><i class="fa fa-gear"></i>&nbsp;&nbsp;PPC</li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'penugasan');}?>">
            <a href="<?php echo base_url()?>ppc/penugasan">
              <i class="fa fa-server"></i> <span>Penugasan</span>
              <?php
              if($penugasan_user>0){
                echo '<small class="label pull-right bg-red">'.$penugasan_user.'</small>';
              }
              ?>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'rekap');}?>">
            <a href="<?php echo base_url()?>ppc/rekap">
              <i class="fa fa-server"></i> <span>Rekap</span>
            </a>
          </li>
        </ul>
        <ul class="sidebar-menu">
          <li class="header"><i class="fa fa-gear"></i>&nbsp;&nbsp;Uji Banding</li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'ub_ujibanding');}?>">
            <a href="<?php echo base_url()?>ujibanding/">
              <i class="fa fa-file-archive-o"></i> <span>Data</span>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'ub_users');}?>">
            <a href="<?php echo base_url()?>ujibanding/admin/users">
              <i class="fa fa-user"></i> <span>Peserta</span>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'ub_jenis_sampel');}?>">
            <a href="<?php echo base_url()?>ujibanding/jenis_sampel">
              <i class="fa fa-sitemap"></i> <span>Jenis Sampel</span>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'ub_parameter');}?>">
            <a href="<?php echo base_url()?>ujibanding/parameter">
              <i class="fa fa-server"></i> <span>Parameter</span>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'juknis');}?>">
            <a href="<?php echo base_url()?>ujibanding/juknis">
              <i class="fa fa-file-powerpoint-o"></i> <span>Juknis</span>
            </a>
          </li>
        </ul>
        <ul class="sidebar-menu">
          <li class="header"><i class="fa fa-gear"></i>&nbsp;&nbsp;SITE</li>

          <li class="<?php if(isset($menu)){echo ismenu($menu,'konten');}?>">
            <a href="<?php echo base_url()?>konten/admin">
              <i class="fa fa-globe"></i> <span>Konten</span>
            </a>
          </li>
        </ul>
      <?php }?>
      <!-- end admin pelayanan -->

      <!-- analis -->
      <?php if($this->ion_auth->in_group(array('analis'))){?>
        <ul class="sidebar-menu">
          <li class="header"><i class="fa fa-desktop"></i>&nbsp;&nbsp;Data Transaksi</li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'lhus');}?>">
            <a href="<?php echo base_url()?>fpps/lhus">
              <i class="fa fa-dashboard"></i> <span>LHUS</span>
              <?php
              if($lhus>0){
                echo '<small class="label pull-right bg-red">'.$lhus.'</small>';
              }
              ?>
              <!-- <small class="label pull-right bg-red"><?= $lhus ?></small> -->
            </a>
          </li>
        </ul>
        <ul class="sidebar-menu">
          <li class="header"><i class="fa fa-gear"></i>&nbsp;&nbsp;Internal</li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'kegiatan');}?>">
            <a href="<?php echo base_url()?>internal/kegiatan">
              <i class="fa fa-bullhorn"></i> <span>Kegiatan</span>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'karyawan');}?>">
            <a href="<?php echo base_url()?>internal/karyawan">
              <i class="fa fa-users"></i> <span>Karyawan</span>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'kalender');}?>">
            <a href="<?php echo base_url()?>internal/kalender_kegiatan">
              <i class="fa fa-calendar"></i> <span>Kalender</span>
              <?php
              if($kegiatan>0){
                echo '<small class="label pull-right bg-red">'.$kegiatan.'</small>';
              }
              ?>
              <!-- <small class="label pull-right bg-red"><?= $kegiatan ?></small> -->
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'penilaian');}?>">
            <a href="<?php echo base_url()?>internal/penilaian">
              <i class="fa fa-angellist"></i> <span>Penilaian</span>
            </a>
          </li>
        </ul>
        <ul class="sidebar-menu">
        <li class="header"><i class="fa fa-gear"></i>&nbsp;&nbsp;LMS</li>
        <li class="<?php if (isset($menu)) {
          echo ismenu($menu, 'teknis');
        } ?>">
          <a href="<?php echo base_url() ?>">
            <i class="fa fa-server"></i> <span>Teknis</span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if (isset($menu)) {
              echo ismenu($menu, 'pengujian');
            } ?>">
              <a href="<?php echo base_url() ?>lms/pengujian">
                <i class="fa fa-file-powerpoint-o"></i> <span>Pengujian</span>
              </a>
            </li>
            <li class="<?php if (isset($menu)) {
              echo ismenu($menu, 'sampling');
            } ?>">
              <a href="<?php echo base_url() ?>lms/sampling">
                <i class="fa fa-file-powerpoint-o"></i> <span>Sampling</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="<?php if (isset($menu)) {
          echo ismenu($menu, 'manajeman');
        } ?>">
          <a href="<?php echo base_url() ?>">
            <i class="fa fa-server"></i> <span>Manajemen</span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if (isset($menu)) {
              echo ismenu($menu, 'iso_9001');
            } ?>">
              <a href="<?php echo base_url() ?>lms/iso_9001">
                <i class="fa fa-file-powerpoint-o"></i> <span>ISO-9001</span>
              </a>
            </li>
            <li class="<?php if (isset($menu)) {
              echo ismenu($menu, 'iso_14001');
            } ?>">
              <a href="<?php echo base_url() ?>lms/iso_14001">
                <i class="fa fa-file-powerpoint-o"></i> <span>ISO-14001</span>
              </a>
            </li>
            <li class="<?php if (isset($menu)) {
              echo ismenu($menu, 'iso_17025');
            } ?>">
              <a href="<?php echo base_url() ?>lms/iso_17025">
                <i class="fa fa-file-powerpoint-o"></i> <span>ISO-17025</span>
              </a>
            </li>
            <li class="<?php if (isset($menu)) {
              echo ismenu($menu, 'iso_17043');
            } ?>">
              <a href="<?php echo base_url() ?>lms/iso_17043">
                <i class="fa fa-file-powerpoint-o"></i> <span>ISO-17043</span>
              </a>
            </li>
            <li class="<?php if (isset($menu)) {
              echo ismenu($menu, 'pms');
            } ?>">
              <a href="<?php echo base_url() ?>lms/pms">
                <i class="fa fa-file-powerpoint-o"></i> <span>Performance Manajement System</span>
              </a>
            </li>
            <li class="<?php if (isset($menu)) {
              echo ismenu($menu, 'organisation');
            } ?>">
              <a href="<?php echo base_url() ?>lms/organisation">
                <i class="fa fa-file-powerpoint-o"></i> <span>Organisation</span>
              </a>
            </li>
            <li class="<?php if (isset($menu)) {
              echo ismenu($menu, 'lain_lain');
            } ?>">
              <a href="<?php echo base_url() ?>lms/lain_lain">
                <i class="fa fa-file-powerpoint-o"></i> <span>Lain-lain</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="<?php if (isset($menu)) {
          echo ismenu($menu, 'regulasi');
        } ?>">
          <a href="<?php echo base_url() ?>lms/regulasi">
            <i class="fa fa-file-powerpoint-o"></i> <span>Regulasi</span>
          </a>
        </li>
        <li class="<?php if (isset($menu)) {
          echo ismenu($menu, 'inovasi');
        } ?>">
          <a href="<?php echo base_url() ?>lms/inovasi">
            <i class="fa fa-file-powerpoint-o"></i> <span>Inovasi</span>
          </a>
        </li>
        <li class="<?php if (isset($menu)) {
          echo ismenu($menu, 'lainnya');
        } ?>">
          <a href="<?php echo base_url() ?>lms/lainnya">
            <i class="fa fa-file-powerpoint-o"></i> <span>Lain-lain</span>
          </a>
        </li>
      </ul>
        <ul class="sidebar-menu">
          <li class="header"><i class="fa fa-gear"></i>&nbsp;&nbsp;PPC</li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'penugasan');}?>">
            <a href="<?php echo base_url()?>ppc/penugasan">
              <i class="fa fa-server"></i> <span>Penugasan</span>
              <?php
              if($penugasan_user>0){
                echo '<small class="label pull-right bg-red">'.$penugasan_user.'</small>';
              }
              ?>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'rekap');}?>">
            <a href="<?php echo base_url()?>ppc/rekap">
              <i class="fa fa-server"></i> <span>Rekap</span>
            </a>
          </li>
        </ul>
        <ul class="sidebar-menu">
          <li class="header"><i class="fa fa-gear"></i>&nbsp;&nbsp;CMDO</li>
        <!-- Fitur Manajemen Alat -->
          <li class="<?php if(isset($menu)){echo ismenu($menu,'alat');}?>">
            <a href="<?php echo base_url()?>cmdo/alat">
              <i class="fa fa-server"></i> <span>Manajemen Alat</span>
            </a>
          </li>
          <!-- Akhir Fitur Manajemen Alat -->

          <!-- Fitur Spesifikasi Alat -->
          <li class="<?php if(isset($menu)){echo ismenu($menu,'spek_alat');}?>">
            <a href="<?php echo base_url()?>cmdo/spek_alat">
              <i class="fa fa-cog"></i> <span>Spesifikasi Alat</span>
            </a>
          </li>
          <!-- Akhir Fitur Spesifikasi Alat -->

          <!-- Fitur Detail Alat -->
          <li class="<?php if(isset($menu)){echo ismenu($menu,'detail_alat');}?>">
            <a href="<?php echo base_url()?>cmdo/detail_alat">
              <i class="fa fa-cogs"></i> <span>Detail Alat</span>
            </a>
          </li>
          <!-- Akhir Fitur Detail Alat -->

          <!-- Fitur Kalendar Kalibrasi -->
          <li class="<?php if(isset($menu)){echo ismenu($menu,'kalender_alat');}?>">
            <a href="<?php echo base_url()?>cmdo/kalender_alat">
              <i class="fa fa-calendar-check-o"></i> <span>Kalender Kalibrasi</span>
              <?php
              if($alat>0){
                echo '<small class="label pull-right bg-red">'.$alat.'</small>';
              }
              ?>
            </a>
          </li>
          <!-- Akhir Fitur Kalendar Kalibrasi -->

          <!-- Fitur Footer Alat -->
          <li class="<?php if(isset($menu)){echo ismenu($menu,'alat_footer');}?>">
            <a href="<?php echo base_url()?>cmdo/footer">
              <i class="fa fa-tags"></i> <span>Footer Inventaris Alat</span>
            </a>
          </li>
          <!-- Akhir Fitur Footer Alat -->
          </ul>
      <?php }?>
      <!-- end analis -->


      <!-- Manajer Teknis -->
      <?php if($this->ion_auth->in_group(array('manager_teknis'))){?>
        <ul class="sidebar-menu">
          <li class="header"><i class="fa fa-desktop"></i>&nbsp;&nbsp;Data Transaksi</li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'stp');}?>">
            <a href="<?php echo base_url()?>fpps/stp">
              <i class="fa fa-television"></i> <span>STP</span>
              <?php
              if($stp>0){
                echo '<small class="label pull-right bg-red">'.$stp.'</small>';
              }
              ?>
              <!-- <small class="label pull-right bg-red"><?= $stp ?></small> -->
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'lhus');}?>">
            <a href="<?php echo base_url()?>fpps/lhus">
              <i class="fa fa-dashboard"></i> <span>LHUS</span>
              <?php
              if($lhus>0){
                echo '<small class="label pull-right bg-red">'.$lhus.'</small>';
              }
              ?>
              <!-- <small class="label pull-right bg-red"><?= $lhus ?></small> -->
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'lhu');}?>">
            <a href="<?php echo base_url()?>fpps/lhu">
              <i class="fa fa-shield"></i> <span>LHU</span>
            </a>
          </li>
        </ul>
        <ul class="sidebar-menu">
          <li class="header"><i class="fa fa-gear"></i>&nbsp;&nbsp;MASTER</li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'master_penilaian');}?>">
            <a href="<?php echo base_url()?>master/penilaian">
              <i class="fa fa-list-ol"></i> <span>penilaian</span>
            </a>
          </li>
        </ul>
        <ul class="sidebar-menu">
          <li class="header"><i class="fa fa-gear"></i>&nbsp;&nbsp;Laporan</li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'laporan');}?>">
            <a href="<?php echo base_url()?>laporan">
              <i class="fa fa-building"></i> <span>Laporan</span>
            </a>
          </li>
        </ul>
        <ul class="sidebar-menu">
          <li class="header"><i class="fa fa-gear"></i>&nbsp;&nbsp;Internal</li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'pengaduan');}?>">
            <a href="<?php echo base_url()?>master/pengaduan">
              <i class="fa fa-commenting-o"></i> <span>Pengaduan</span>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'karyawan');}?>">
            <a href="<?php echo base_url()?>internal/karyawan">
              <i class="fa fa-users"></i> <span>Karyawan</span>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'kegiatan');}?>">
            <a href="<?php echo base_url()?>internal/kegiatan">
              <i class="fa fa-bullhorn"></i> <span>Kegiatan</span>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'kalender');}?>">
            <a href="<?php echo base_url()?>internal/kalender_kegiatan">
              <i class="fa fa-calendar"></i> <span>Kalender</span>
              <?php
              if($kegiatan>0){
                echo '<small class="label pull-right bg-red">'.$kegiatan.'</small>';
              }
              ?>
              <!-- <small class="label pull-right bg-red"><?= $kegiatan ?></small> -->
            </a>
          </li>
        </ul>
        <ul class="sidebar-menu">
        <li class="header"><i class="fa fa-gear"></i>&nbsp;&nbsp;LMS</li>
        <li class="<?php if (isset($menu)) {
          echo ismenu($menu, 'teknis');
        } ?>">
          <a href="<?php echo base_url() ?>">
            <i class="fa fa-server"></i> <span>Teknis</span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if (isset($menu)) {
              echo ismenu($menu, 'pengujian');
            } ?>">
              <a href="<?php echo base_url() ?>lms/pengujian">
                <i class="fa fa-file-powerpoint-o"></i> <span>Pengujian</span>
              </a>
            </li>
            <li class="<?php if (isset($menu)) {
              echo ismenu($menu, 'sampling');
            } ?>">
              <a href="<?php echo base_url() ?>lms/sampling">
                <i class="fa fa-file-powerpoint-o"></i> <span>Sampling</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="<?php if (isset($menu)) {
          echo ismenu($menu, 'manajeman');
        } ?>">
          <a href="<?php echo base_url() ?>">
            <i class="fa fa-server"></i> <span>Manajemen</span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if (isset($menu)) {
              echo ismenu($menu, 'iso_9001');
            } ?>">
              <a href="<?php echo base_url() ?>lms/iso_9001">
                <i class="fa fa-file-powerpoint-o"></i> <span>ISO-9001</span>
              </a>
            </li>
            <li class="<?php if (isset($menu)) {
              echo ismenu($menu, 'iso_14001');
            } ?>">
              <a href="<?php echo base_url() ?>lms/iso_14001">
                <i class="fa fa-file-powerpoint-o"></i> <span>ISO-14001</span>
              </a>
            </li>
            <li class="<?php if (isset($menu)) {
              echo ismenu($menu, 'iso_17025');
            } ?>">
              <a href="<?php echo base_url() ?>lms/iso_17025">
                <i class="fa fa-file-powerpoint-o"></i> <span>ISO-17025</span>
              </a>
            </li>
            <li class="<?php if (isset($menu)) {
              echo ismenu($menu, 'iso_17043');
            } ?>">
              <a href="<?php echo base_url() ?>lms/iso_17043">
                <i class="fa fa-file-powerpoint-o"></i> <span>ISO-17043</span>
              </a>
            </li>
            <li class="<?php if (isset($menu)) {
              echo ismenu($menu, 'pms');
            } ?>">
              <a href="<?php echo base_url() ?>lms/pms">
                <i class="fa fa-file-powerpoint-o"></i> <span>Performance Manajement System</span>
              </a>
            </li>
            <li class="<?php if (isset($menu)) {
              echo ismenu($menu, 'organisation');
            } ?>">
              <a href="<?php echo base_url() ?>lms/organisation">
                <i class="fa fa-file-powerpoint-o"></i> <span>Organisation</span>
              </a>
            </li>
            <li class="<?php if (isset($menu)) {
              echo ismenu($menu, 'lain_lain');
            } ?>">
              <a href="<?php echo base_url() ?>lms/lain_lain">
                <i class="fa fa-file-powerpoint-o"></i> <span>Lain-lain</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="<?php if (isset($menu)) {
          echo ismenu($menu, 'regulasi');
        } ?>">
          <a href="<?php echo base_url() ?>lms/regulasi">
            <i class="fa fa-file-powerpoint-o"></i> <span>Regulasi</span>
          </a>
        </li>
        <li class="<?php if (isset($menu)) {
          echo ismenu($menu, 'inovasi');
        } ?>">
          <a href="<?php echo base_url() ?>lms/inovasi">
            <i class="fa fa-file-powerpoint-o"></i> <span>Inovasi</span>
          </a>
        </li>
        <li class="<?php if (isset($menu)) {
          echo ismenu($menu, 'lainnya');
        } ?>">
          <a href="<?php echo base_url() ?>lms/lainnya">
            <i class="fa fa-file-powerpoint-o"></i> <span>Lain-lain</span>
          </a>
        </li>
      </ul>
        <ul class="sidebar-menu">
          <li class="header"><i class="fa fa-gear"></i>&nbsp;&nbsp;PPC</li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'tugas');}?>">
            <a href="<?php echo base_url()?>ppc/tugas">
              <i class="fa fa-sitemap"></i> <span>Tugas</span>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'jenis_tugas');}?>">
            <a href="<?php echo base_url()?>ppc/jenis_tugas">
              <i class="fa fa-sitemap"></i> <span>Jenis Tugas</span>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'penugasan');}?>">
            <a href="<?php echo base_url()?>ppc/penugasan">
              <i class="fa fa-server"></i> <span>Penugasan</span>
              <?php
              if($penugasan_admin>0){
                echo '<small class="label pull-right bg-red">'.$penugasan_admin.'</small>';
              }
              ?>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'rekap');}?>">
            <a href="<?php echo base_url()?>ppc/rekap">
              <i class="fa fa-server"></i> <span>Rekap</span>
            </a>
          </li>
        </ul>
      <?php }?>
      <!-- END Manajer Teknis -->


      <!-- Ka Lab -->
      <?php if($this->ion_auth->in_group(array('ka_lab'))){?>
        <ul class="sidebar-menu">
          <li class="header"><i class="fa fa-desktop"></i>&nbsp;&nbsp;Data Transaksi</li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'fpps');}?>">
            <a href="<?php echo base_url()?>fpps/fpps_pelanggan">
              <i class="fa fa-users"></i> <span>FPPS</span>
              <?php
              if($fpps>0){
                echo '<small class="label pull-right bg-red">'.$fpps.'</small>';
              }
              ?>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'stp');}?>">
            <a href="<?php echo base_url()?>fpps/stp">
              <i class="fa fa-television"></i> <span>STP</span>
              <?php
              if($stp>0){
                echo '<small class="label pull-right bg-red">'.$stp.'</small>';
              }
              ?>
              <!-- <small class="label pull-right bg-red"><?= $stp ?></small> -->
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'lhus');}?>">
            <a href="<?php echo base_url()?>fpps/lhus">
              <i class="fa fa-dashboard"></i> <span>LHUS</span>
              <?php
              if($lhus>0){
                echo '<small class="label pull-right bg-red">'.$lhus.'</small>';
              }
              ?>
              <!-- <small class="label pull-right bg-red"><?= $lhus ?></small> -->
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'lhu');}?>">
            <a href="<?php echo base_url()?>fpps/lhu">
              <i class="fa fa-shield"></i> <span>LHU</span>
            </a>
          </li>
        </ul>
        <ul class="sidebar-menu">
          <li class="header"><i class="fa fa-gear"></i>&nbsp;&nbsp;MASTER</li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'master_penilaian');}?>">
            <a href="<?php echo base_url()?>master/penilaian">
              <i class="fa fa-list-ol"></i> <span>penilaian</span>
            </a>
          </li>
        </ul>
        <ul class="sidebar-menu">
          <li class="header"><i class="fa fa-gear"></i>&nbsp;&nbsp;Laporan</li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'laporan');}?>">
            <a href="<?php echo base_url()?>laporan">
              <i class="fa fa-building"></i> <span>Laporan</span>
            </a>
          </li>
        </ul>
        <ul class="sidebar-menu">
          <li class="header"><i class="fa fa-gear"></i>&nbsp;&nbsp;Internal</li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'pengaduan');}?>">
            <a href="<?php echo base_url()?>master/pengaduan">
              <i class="fa fa-commenting-o"></i> <span>Pengaduan</span>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'karyawan');}?>">
            <a href="<?php echo base_url()?>internal/karyawan">
              <i class="fa fa-users"></i> <span>Karyawan</span>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'kegiatan');}?>">
            <a href="<?php echo base_url()?>internal/kegiatan">
              <i class="fa fa-bullhorn"></i> <span>Kegiatan</span>
            </a>
          </li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'kalender');}?>">
            <a href="<?php echo base_url()?>internal/kalender_kegiatan">
              <i class="fa fa-calendar"></i> <span>Kalender</span>
              <?php
              if($kegiatan>0){
                echo '<small class="label pull-right bg-red">'.$kegiatan.'</small>';
              }
              ?>
              <!-- <small class="label pull-right bg-red"><?= $kegiatan ?></small> -->
            </a>
          </li>
        </ul>
      <?php }?>
      <!-- END Ka Lab -->


      <!-- Ka Pelanggan -->
      <?php if($this->ion_auth->in_group(array('members'))){?>
        <ul class="sidebar-menu">
          <li class="header"><i class="fa fa-desktop"></i>&nbsp;&nbsp;Data Transaksi</li>
          <li class="<?php if(isset($menu)){echo ismenu($menu,'fpps');}?>">
            <a href="<?php echo base_url()?>fpps/fpps_pemohon">
              <i class="fa fa-users"></i> <span>FPPS</span>
              <!-- <small class="label pull-right bg-red"><?= $fpps ?></small> -->
            </a>
          </li>
        </ul>
      <?php }?>
      <!-- END Ka Lab -->

    </section>
  </aside>
