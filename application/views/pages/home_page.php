<div id="page-wrapper">                            
    <div class="row">
        <div class="col-lg-12">
			<?php $this->load->view('_partial/flash_message') ?>
			
            <div class="alert alert-success alert-dismissable margin-top">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Selamat datang, <?php echo $nama_user;?>. Anda masuk sebagai <?php echo $level;?>.
            </div>
            <h1  class="page-header">Ikhtisar Bulan Ini ( <?= date('M  Y');?> )</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-database fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?= $jumlah_total;?></div>
                            <div>Total Inventaris</div>
                        </div>
                    </div>
                </div>
                <a href="data_inventaris">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="glyphicon glyphicon-alert fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?= $rusak;?></div>
                            <div>Inventaris Rusak</div>
                        </div>
                    </div>
                </div>
                <a href="laporan/kondisi">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="glyphicon glyphicon-import fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?= $masuk;?></div>
                            <div>Inventaris Masuk</div>
                        </div>
                    </div>
                </div>
                <a href="laporan/masuk">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="glyphicon glyphicon-export fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?= $keluar;?></div>
                            <div>Inventaris Keluar</div>
                        </div>
                    </div>
                </div>
                <a href="laporan/keluar">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                <div class="panel-heading">
                    Rekapitulasi Jenis Barang
                </div>
                    
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form">
                                <div class="row">
                                    <div class="col-lg-12">
									  <?php if ($jeniss):?>	
										  <div class="table-responsive">
											<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-jenisbarang">
												<thead>
													<tr>
														<th class="center col-lg-1" scope="col">No</th>
														<th class="center col-lg-8" scope="col">Jenis Barang</th>
														<th class="center col-lg-3" scope="col">Total</th>
													</tr>
												</thead>
												<tbody>
												  <?php foreach($jeniss as $jenis): ?>
													<tr class="gradeA">
														<td class="center"><?= ++$i?></td>
														<td><?= $jenis->jenis_barang ?></td>
														<td class="center"><?= $jenis->count_jenis ?></td>
													</tr>
												  <?php endforeach ?> 
												</tbody>
											  </table> 
											</div>
											<!-- /.table-responsive -->
									  <?php else: ?>
										<h5>Tidak ada data inventaris.</h5>	
									  <?php endif ?>
									</div>
    </div></div></div></div></div></div>
        
            <div class="col-lg-6">
                <div class="panel panel-default">
                <div class="panel-heading">
                    Rekapitulasi Kondisi Barang
                </div>
                    
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form">
                                <div class="row">
                                    <div class="col-lg-12">										
									  <?php if ($kondisis):?>										
										  <div class="table-responsive">
											<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-kondisibarang">
												<thead>
													<tr>
														<th class="center col-lg-1" scope="col">No</th>
														<th class="center col-lg-8" scope="col">Kondisi Barang</th>
														<th class="center col-lg-3" scope="col">Total</th>
													</tr>
												</thead>
												<tbody>
												  <?php foreach($kondisis as $kondisi): ?>
													<tr class="gradeA">
														<td class="center"><?= ++$j?></td>
														<td><?= $kondisi->kondisi ?></td>
														<td class="center"><?= $kondisi->count_kondisi ?></td>
													</tr>
												  <?php endforeach ?>   
												</tbody>
											  </table> 
											</div>
											<!-- /.table-responsive -->
									  <?php else: ?>
										<h5>Tidak ada data inventaris.</h5>	
									  <?php endif ?>
									</div>
    </div></div></div></div></div></div>
    
    </div>    
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
