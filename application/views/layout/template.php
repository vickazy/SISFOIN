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
    
    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url();?>assets/vendor/morrisjs/morris.css" rel="stylesheet">
  
    <!-- DataTables CSS -->
    <link href="<?php echo base_url();?>assets/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url();?>assets/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
	
	<!-- Detpiker CSS -->
    <link href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" >

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <style>
      .margin-top{
        margin-top: 15px;     
      }
      
      .center{
        text-align: center;
      }
    </style>
</head>

<body id="<?= $halaman;?>">

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
          
          <div id="header">
            <?php $this->load->view('layout/header');?>
          </div>
          
          <div id="sidebar">
            <?php $this->load->view('layout/sidebar');?>           
          </div>
                               
        </nav>
      
      <div id="content">
        <?php $this->load->view($main_view);?>      
      </div>
            
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	
	<!-- Date Picker JavaScript -->
    <script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap-datepicker.min.js"></script>
	<script src="<?php echo base_url();?>assets/vendor/bootstrap/js/locales/bootstrap-datepicker.id.min.js"></script>
	<script>$('.datepickers').datepicker({language:'id', format:'yyyy-mm-dd'});</script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>assets/vendor/metisMenu/metisMenu.min.js"></script>
    
    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url();?>assets/vendor/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/morrisjs/morris.min.js"></script>
    <script src="<?php echo base_url();?>assets/data/morris-data.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url();?>assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>assets/dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
