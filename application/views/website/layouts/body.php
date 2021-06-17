<body>
	<header>
		<div class="title">
        <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container box_1620">
          <div class="navbar-brand logo_h">
            <img src="<?=base_url('assets/images/icons/logo.webp')?>" style="width: 60px;float:left;margin-top:-15px;margin-right: 5px;margin-left: -30px">
            <h1 class="text-danger m-0 p-0" style="font-size: 30px;margin-top:-15px!important"><a  href="<?=site_url('')?>">WEATHER</a></h1>
            <p class="m-0 p-0" style="font-size: 14px;margin-top:-5px !important">INFORMATION & FORECASTING</p>
          </div>   

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		  <div class="collapse navbar-collapse offset" id="navbarSupportedContent" style="margin-left:150px !important">
            <ul class="nav navbar-nav menu_nav justify-content-end">
               
              <li class="nav-item" style="margin-left:130px" id="clock"></li> 
         <div class="nav-right text-center text-lg-right py-4 py-lg-0">
              <a class="button" style="margin-top:-10px;margin-left:370px !important" href="<?=site_url('admin')?>">Log In</a>
            </div>
          </div> 
        </div>
      </nav>
    </div>
  </header>
  <div id="map"></div>
  <script type="text/javascript">
		<!--
		function showTime() {
		    var a_p = "";
		    var today = new Date();
		    var curr_hour = today.getHours();
		    var curr_minute = today.getMinutes();
		    var curr_second = today.getSeconds();
		    if (curr_hour < 12) {
		        a_p = "AM";
		    } else {
		        a_p = "PM";
		    }
		    if (curr_hour == 0) {
		        curr_hour = 12;
		    }
		    if (curr_hour > 12) {
		        curr_hour = curr_hour - 12;
		    }
		    curr_hour = checkTime(curr_hour);
		    curr_minute = checkTime(curr_minute);
		    curr_second = checkTime(curr_second);
		 document.getElementById('clock').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
		    }
 
		function checkTime(i) {
		    if (i < 10) {
		        i = "0" + i;
		    }
		    return i;
		}
		setInterval(showTime, 500);
		</script>
</script>
</body>
