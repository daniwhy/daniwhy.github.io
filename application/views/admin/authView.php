<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?=$title?> </title>

    <!-- Bootstrap -->
    <link href="<?=templates('vendors/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=templates('vendors/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?=templates('vendors/nprogress/nprogress.css')?>" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?=templates('vendors/animate.css/animate.min.css')?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?=templates('build/css/custom.min.css')?>" rel="stylesheet">
    <style type="text/css">
      body{
        background-image: url('<?=assets('images/background.jpg')?>');
        background-size: cover;
        background-repeat: no-repeat;
        height: 100vh;
        width: 100%;
        top: 0
      }
      .login_wrapper{
        margin-top: 0
      }
      .form-login{
        background: #fffe;
        margin: 30px;
        padding: 30px
      }
    </style>
  </head>

  <body class="d-flex align-items-center">
        <div class="col-md-6 col-sm-6 col-12">
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <div class="animate form-login">
                <section class="">
                  <form action="<?=site_url('admin/auth/check')?>" method="POST">
                    <h2 class="text-danger"><i class="fa fa-cloud"></i> WEATHER INFORMATION!</h2>
                    <h2>Login Form Just for Admin</h2>
                    <?=$this->session->flashdata('info')?>
                    <div class="form-group">
                      <label>Username</label>
                      <input type="text" class="form-control" placeholder="Username" name="nm_pengguna" required="" />
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" class="form-control" placeholder="Password" name="kt_sandi" required="" />
                    </div>
                    <div>
                      <button type="submit" class="btn btn-primary btn-block submit">Log in</button>
                      <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
                    </div>
                    <div class="clearfix"></div>
                    <div>
                  <a href="<?=site_url('')?>"  style="width:315px" class="btn btn-danger" ><i class="fa fa-reply"></i>  Kembali</a> 
                  </form>	
                </section>
                <form action="<?php echo base_url(). 'admin/auth/simpan'; ?>" method="post">
		                <div class="form-group">
                    <h2>Subscribe for Weather Alert</h2>
                       <input type="text" class="form-control" placeholder="Enter Email Here" name="email" required="" />
                    </div>
                    <div>
                      <button type="submit" class="btn btn-primary btn-block submit">Submit</button>
                    </div>
	              </form>	
                    
              </div>
            </div>
          </div>
          
        </div>
        <div class="col-md-6 d-xs-none">
          <img src="<?=assets('images/orang.png')?>" width="80%">
        </div>
        
  </body>
</html>
