<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>TOBA Admin | Log in</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- Bootstrap 3.3.2 -->
  <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css"/>
  <!-- Font Awesome Icons -->
  <link href="<?php echo base_url('assets/dist/css/font-awesome.min.css') ?>" rel="stylesheet"
  type="text/css"/>
  <!-- Ionicons -->
  <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css"/>
  <!-- Theme style -->
  <link href="<?php echo base_url('assets/dist/css/AdminLTE.min.css') ?>" rel="stylesheet" type="text/css"/>
  <!-- iCheck -->
  <link href="<?php echo base_url('assets/plugins/iCheck/square/blue.css') ?>" rel="stylesheet" type="text/css" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
      </head>
      <body class="login-page">
        <div class="login-box">
          <div class="login-logo">
            <a href="<?php echo base_url() ?>"><b>TOBA</b>LTE</a>
          </div><!-- /.login-logo -->
          <?php if (null !== $this->session->userdata('flash-message')) : ?>
            <div class="alert alert-danger alert-dismissable" id="flash-message">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-warning"></i> Alert!</h4>
              <?php echo $this->session->userdata('flash-message') ?>
              <?php $this->session->unset_userdata('flash-message') ?>
            </div>
            <script>
              window.setTimeout( hideFlashMessage, 4000);

              function hideFlashMessage(){
                $('#flash-message').fadeOut('normal');
              }
            </script>
          <?php endif ?>
          <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <form action="" method="POST" id="login-form" novalidate="novalidate">
              <div class="form-group has-feedback">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                <input type="text" class="form-control" id="id" name="id" placeholder="ID"/>
              </div>
              <div class="form-group has-feedback">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password"/>
              </div>
              <div class="row">
                <div class="col-xs-8">    
                  <div class="checkbox icheck">
                    <label>
                      <input type="checkbox"> Remember Me
                    </label>
                  </div>                        
                </div><!-- /.col -->
                <div class="col-xs-4">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div><!-- /.col -->
              </div>
            </form>

          </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->

        <!-- jQuery 2.1.3 -->
        <script src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.1.3.min.js') ?>"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/plugins/validate/jquery.validate.min.js') ?>" type="text/javascript"></script>
        <script>
          $(function () {
            $('#id').focus();

            $('input').iCheck({
              checkboxClass: 'icheckbox_square-blue',
              radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });

            $('#login-form').validate({
              rules: {
                id: 'required',
                password: 'required'
              },
              messages: {
                id: 'Tolong isi dengan ID akun',
                password: 'Tolong isi dengan password akun',
              }
            });
          });
        </script>
      </body>
      </html>