<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <title><?php echo "SISFOIN ELEKTRO - Sistem Informasi Inventaris Teknik Elektro Undip";?></title>
  
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/favicon.ico" type="image/x-icon">

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url();?>assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  
  <style>
    .form-error{
      padding: 1px 6px;
      color: #d44950;
      margin-top: 4px;
      background-color: #f2dede;      
    }
    .form-error2{
      padding: 10px 10px;
      color: #d44950;
      text-align: center;
      background-color: #f2dede; 
    }
  </style>
  
</head>

<body>
    <div class="container">
        <div class="row">          
            <div class="col-md-4 col-md-offset-4">             
                <div class="login-panel panel panel-default">
                  
                    <div class="panel-heading">
                        <h3 class="panel-title" style="text-align:center;font-size:24px;">Sign In</h3>
                    </div>
                  
                    <div class="panel-body">
                        <?php echo form_open('login'); ?>
                            <fieldset>
                              
                                <?php $error_message = $this->session->flashdata('error_message'); ?>
                                <?php if (!empty($error_message)): ?>
                                <p class="form-error2" role="alert"><?= $error_message ?></p>
                                <?php endif; ?>
                                
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user fa-fw"></i></span>
                                    <input class="form-control" id="username" name="username" type="username" class="form-control" placeholder="Username" autofocus>

                                    <?= form_error('username')?'<div class="form-error" role="alert">'. form_error('username').'</div>':'' ?>
                                </div>
                                
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock fa-fw"></i></span>
                                    <input class="form-control" id="password" name="password" type="password" placeholder="Password" value="">

                                    <?= form_error('password')?'<div class="form-error" role="alert">'. form_error('password').'</div>':'' ?>
                                </div>
                                                              
                                <!-- Change this to a button or input when using this as a form -->
                                <input class="btn btn-lg btn-success btn-block" type="submit" value="Login" name="login" >
                            </fieldset>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>assets/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>assets/dist/js/sb-admin-2.js"></script>

</body>

</html>
