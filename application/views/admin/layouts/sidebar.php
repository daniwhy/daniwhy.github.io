 <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-cloud"></i> <span>WEATHER</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?=templates('production/images/img.jpg')?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span><?=$this->session->nm_pengguna?></span>
                <h2><?=$this->session->level?></h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="<?=site_url('admin/')?>"><i class="fa fa-home"></i> Beranda</a></li>
                  <?php if($this->session->level=='Admin'){ ?>
                  <li><a href="<?=site_url('admin/lokasiaws')?>"><i class="fa fa-folder"></i> Lokasi AWS </span></a>
                   </li>
                  <?php } ?>
                  <li><a href="<?=site_url('admin/map')?>"><i class="fa fa-map"></i> Maps </span></a>
                  <li><a href="<?=site_url('admin/auth/out')?>"><i class="fa fa-sign-out"></i> Keluar</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
