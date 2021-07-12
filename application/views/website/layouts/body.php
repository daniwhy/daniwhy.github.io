<body>
	<header>
  
		<div class="title">
        <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container box_1620">
          <div class="navbar-brand logo_h">
            <img src="<?=base_url('assets/images/icons/logo.webp')?>" style="width: 60px;float:left;margin-top:-15px;margin-right: 5px;margin-left: -30px">
            <h1 class="text-danger m-0 p-0" style="font-size: 30px;margin-top:-15px!important"><a  href="http://localhost/webcuaca/Beranda/autosave">WEATHER</a></h1>
            <p class="m-0 p-0" style="font-size: 14px;margin-top:-5px !important">INFORMATION & FORECASTING</p>
          </div>   
         
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		  <div class="collapse navbar-collapse offset" id="navbarSupportedContent" style="margin-left:150px !important">
            <ul class="nav navbar-nav menu_nav justify-content-end">
            
              <li class="nav-item" style="font-size: 20px;margin-left:100px" id="clock"></li> 
         <div class="nav-right text-center text-lg-right py-4 py-lg-0">
              <a class="button" style="margin-top:-10px;margin-left:370px !important" href="<?=site_url('admin')?>">Log In</a>
            </div>
          </div> 
        </div>
      </nav>
      <div class="row" onChange="this.form.submit()">
      <div class="col-md-1">
            <?=input_text('data',$perintah)?>
            </div>
            </div>
    </div>         
  </header>
</body>