<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="<?= base_url('home');?>">
        SISFOIN ELEKTRO -
        <?php 
            if      ($id_level_ruang == '1'){ echo "Umum"; }
            elseif  ($id_level_ruang == '2'){ echo "Lab. Power "; }
            elseif  ($id_level_ruang == '3'){ echo "Lab. TI"; }
            elseif  ($id_level_ruang == '4'){ echo "Lab. Telkom"; }
            elseif  ($id_level_ruang == '5'){ echo "Lab. Elka"; }
            elseif  ($id_level_ruang == '6'){ echo "Lab. Kontrol"; } 
            elseif  ($id_level_ruang == '252'){ echo "Keseluruhan"; } 
        ?> 
    </a>
</div>
<!-- /.navbar-header -->

<ul class="nav navbar-top-links navbar-right">
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">
            <li><a href="<?= base_url('user/profile');?>"><i class="fa fa-user fa-fw"></i> User Profile</a>
            </li>
            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
            </li>
            <li class="divider"></li>
            <li><a href="<?= base_url('logout');?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
            </li>
        </ul>
        <!-- /.dropdown-user -->
    </li>
    <!-- /.dropdown -->
</ul>
<!-- /.navbar-top-links -->