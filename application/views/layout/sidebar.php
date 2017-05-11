<?php
  $is_login             = $this->session->userdata('is_login');
  $level                = $this->session->userdata('level');
  $id_level_ruang       = $this->session->userdata('id_level_ruang');  
?>

<?php if ($is_login): ?>
    <?php if ($level === 'Admin'): ?>
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <?= form_open('data_inventaris/search',['method' => 'GET']) ?>
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            
                            <?= form_input('keywords', $this->input->get('keywords'), 'class = "form-control" id="search" type="text" placeholder="Masukkan Keywords" ')?>
                            
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
						<div class="text-right" style="margin-top:4px!important;"><a href="<?= base_url('adv_search')?>" style="color:#9d9d9d;" >Advanced Search</a>
						</div>
						
                    </li>
                    <?= form_close() ?>
                    
                              <!-- /input-group -->    
                    <li>
                        <a id="menu-home" href="<?= base_url('home');?>"><i class="glyphicon glyphicon-home fa-fw"></i> Beranda</a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-database fa-fw"></i> Data<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a id="menu-inventaris" href="<?= base_url('data_inventaris');?>">Inventaris</a>
                            </li>
                            <li>
                                <a id="menu-ruang" href="<?= base_url('data_ruang');?>">Ruang</a>
                            </li>
                            <li>
                                <a id="menu-lvlruang" href="<?= base_url('under_construction');?>">Level Ruang</a>
                            </li>
                            <li>
                                <a id="menu-kdlokasi" href="<?= base_url('under_construction');?>">Kode Lokasi</a>
                            </li>
                            <li>
                                <a id="menu-kdbarang" href="<?= base_url('under_construction');?>">Kode Barang</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-file-text fa-fw"></i> Laporan<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a id="menu-lapmasuk" href="<?= base_url('laporan/masuk');?>">Inventaris Masuk</a>
                            </li>
                            <li>
                                <a id="menu-lapkeluar" href="<?= base_url('laporan/keluar');?>">Inventaris Keluar</a>
                            </li>
							<li>
                                <a id="menu-lapjenisbarang" href="<?= base_url('laporan/jenis_barang');?>">Jenis Barang</a>
                            </li>
                            <li>
                                <a id="menu-lapperruang" href="<?= base_url('laporan/ruang');?>">Inventaris Per Ruangan</a>
                            </li>
                            <li>
                                <a id="menu-lapkondisi" href="<?= base_url('laporan/kondisi');?>">Kondisi Keseluruhan Inventaris</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="glyphicon glyphicon-cog fa-fw"></i> Tools<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a id="menu-backup" href="<?= base_url('under_construction');?>">Backup Data</a>
                            </li>
                            <li>
                                <a id="menu-restore" href="<?= base_url('under_construction');?>">Restore Data</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a id="menu-user" href="<?= base_url('user');?>"><i class="glyphicon glyphicon-user fa-fw"></i> User</a>
                    </li>

                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->

    <?php else: ?>
            <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    
                    <?= form_open('data_inventaris/search',['method' => 'GET']) ?>
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            
                            <?= form_input('keywords', $this->input->get('keywords'), 'class = "form-control" id="search" type="text" placeholder="Masukkan Keywords" ')?>
                            
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
						<div class="text-right" style="margin-top:4px!important;"><a href="<?= base_url('adv_search')?>" style="color:#9d9d9d;" >Advanced Search</a>
						</div>
                    </li>
                    <?= form_close() ?>
                    
                              <!-- /input-group -->    
                    <li>
                        <a id="menu-home" href="<?= base_url('home');?>"><i class="glyphicon glyphicon-home fa-fw"></i> Beranda</a>
                    </li>

                    <li>
                        <a href="<?= base_url('data_inventaris');?>"><i class="fa fa-database fa-fw"></i> Data Inventaris</a>
                    </li>

                  <?php if ($level == 'Operator'||$level == 'Laboran'): ?>
                    <li>
                        <a href="#"><i class="fa fa-exchange fa-fw"></i> Transaksi<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a id="menu-masuk" href="<?= base_url('transaksi/masuk');?>">Inventaris Masuk</a>
                            </li>
                            <li>
                                <a id="menu-keluar" href="<?= base_url('transaksi/keluar');?>">Inventaris Keluar</a>
                            </li>
                        </ul>
                    </li>
                  <?php endif ?>

                    <li>
                        <a href="#"><i class="fa fa-file-text fa-fw"></i> Laporan<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a id="menu-lapmasuk" href="<?= base_url('laporan/masuk');?>">Inventaris Masuk</a>
                            </li>
                            <li>
                                <a id="menu-lapkeluar" href="<?= base_url('laporan/keluar');?>">Inventaris Keluar</a>
                            </li>
							<li>
                                <a id="menu-lapjenisbarang" href="<?= base_url('laporan/jenis_barang');?>">Jenis Barang</a>
                            </li>

                        <?php if ($id_level_ruang == '1'||$id_level_ruang == '2'||$id_level_ruang == '6'||$id_level_ruang == '252'): ?>
                            <li>
                                <a id="menu-lapperruang" href="<?= base_url('laporan/ruang');?>">Inventaris Per Ruangan</a>
                            </li>
                        <?php endif ?>

                            <li>
                                <a id="menu-lapkondisi" href="<?= base_url('laporan/kondisi');?>">Kondisi Keseluruhan Inventaris</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    <?php endif ?>
<?php endif ?>
