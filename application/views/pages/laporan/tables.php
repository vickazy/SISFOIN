<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            
            <?php $this->load->view('_partial/flash_message') ?>
            
            <h1 class="page-header">
                <?= $title_page ?>
                <?php if ($title_page === "Hasil Pencarian"):?>
                    "<?= $keywords;?>"
                <?php endif ?>
                <?php if ($title_page === "Laporan Masuk"||$title_page === "Laporan Keluar"):?>
                    (<?= date('M Y');?>)
                <?php endif ?>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-12">
                
			<?= form_open($form_action) ?>
			
			<?php if ($form_action === "laporan/kondisi"):?>
				<div class="row">
					<div class="col-md-1">
						<h4>Kondisi</h4>
					</div>
					<div class="col-md-3">
						<div class="form-group"> 
							<?= form_dropdown('id_kondisi', getDropdownList('kondisi', ['id_kondisi', 'kondisi']), $input->id_kondisi, 'id="kondisi" class = "form-control" ') ?>
						</div>
					</div>
					<div class="col-md-1">
						<button type="submit" class="btn btn-primary btn-outline">Cari</button>
					</div>
				</div>
			<?php elseif ($form_action === "laporan/ruang"):?>
				<div class="row">
					<div class="col-md-1">
						<h4>Ruang</h4>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<?php
								$options=array('default'=>'- Pilih -');
								foreach($inventarisss as $inventaris)
								{
									$options[$inventaris->id_ruang] = $inventaris->nama_ruang;
								}
								echo form_dropdown('id_ruang', $options, $first_load ? 'default' : $input->id_ruang, ' class = "form-control"');
							?> 
						</div>
						
					</div>
					<div class="col-md-1">
						<button type="submit" class="btn btn-primary btn-outline">Cari</button>
					</div>
				</div>
			<?php elseif ($form_action === "laporan/masuk"):?>
				<div class="row">
					
					<div class="col-md-5">
						<div class="form-group">
							<h4 class="text col-md-6">Tanggal Awal</h4>
							<div class="input-group date col-md-6" >
								<?= form_input('awal_masuk', $input->awal_masuk, 'class = "form-control datepickers" id="awal_masuk"')?>
								<div class="input-group-addon ">
									<span class="glyphicon glyphicon-th"></span>
								</div>
							</div>
						</div>						
					</div>
					
					<div class="col-md-5">
						<div class="form-group">
							<h4 class="text col-md-6">Tanggal Akhir</h4>
							<div class="input-group date col-md-6" >
								<?= form_input('akhir_masuk', $input->akhir_masuk, 'class = "form-control datepickers" id="akhir_masuk"')?>
								<div class="input-group-addon ">
									<span class="glyphicon glyphicon-th"></span>
								</div>
							</div>
						</div>						
					</div>
					<div class="col-md-1">
						<button type="submit" class="btn btn-primary btn-outline">Cari</button>
					</div>
					
				</div>
			<?php elseif ($form_action === "laporan/keluar"):?>
				<div class="row">
					
					<div class="col-md-5">
						<div class="form-group">
							<h4 class="text col-md-6">Tanggal Awal</h4>
							<div class="input-group date col-md-6" >
								<?= form_input('awal_keluar', $input->awal_keluar, 'class = "form-control datepickers" id="awal_keluar"')?>
								<div class="input-group-addon ">
									<span class="glyphicon glyphicon-th"></span>
								</div>
							</div>
						</div>						
					</div>
					
					<div class="col-md-5">
						<div class="form-group">
							<h4 class="text col-md-6">Tanggal Akhir</h4>
							<div class="input-group date col-md-6" >
								<?= form_input('akhir_keluar', $input->akhir_keluar, 'class = "form-control datepickers" id="akhir_keluar"')?>
								<div class="input-group-addon ">
									<span class="glyphicon glyphicon-th"></span>
								</div>
							</div>
						</div>						
					</div>
					<div class="col-md-1">
						<button type="submit" class="btn btn-primary btn-outline">Cari</button>
					</div>
					
				</div>
			<?php elseif ($form_action === "laporan/jenis_barang"):?>
				<div class="row">
					<div class="col-md-2">
						<h4>Jenis Barang</h4>
					</div>
					<div class="col-md-3">
						<div class="form-group"> 
							<?= form_dropdown('jenis_barang', getDropdownList('data_inventaris', ['jenis_barang', 'jenis_barang']), $input->jenis_barang, 'id="jenis_barang" class = "form-control" ') ?>
						</div>
					</div>
					<div class="col-md-1">
						<button type="submit" class="btn btn-primary btn-outline">Cari</button>
					</div>
				</div>
			<?php elseif ($form_action === "data_inventaris/adv_search"):?>
				<div class="row">
					<div class="col-md-2">
						<h4>Jenis Barang</h4>
					</div>
					<div class="col-md-4">
						<div class="form-group"> 
							<?= form_dropdown('jenis_barang', getDropdownList('data_inventaris', ['jenis_barang', 'jenis_barang']), $input->jenis_barang, 'id="jenis_barang" class = "form-control" ') ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<h4>Ruang</h4>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<?php
								$options=array(null=>'- Pilih -');
								foreach($inventarisss as $inventaris)
								{
									$options[$inventaris->id_ruang] = $inventaris->nama_ruang;
								}
								echo form_dropdown('id_ruang', $options, $first_load ? null : $input->id_ruang, ' class = "form-control"');
							?> 
						</div>						
					</div> 
				</div>
				<div class="row">
					<div class="col-md-2">
						<h4>Kondisi</h4>
					</div>
					<div class="col-md-4">
						<div class="form-group"> 
							<?= form_dropdown('id_kondisi', getDropdownList('kondisi', ['id_kondisi', 'kondisi']), $input->id_kondisi, 'id="kondisi" class = "form-control" ') ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<button type="submit" class="btn btn-primary btn-outline margin-top">Submit Button</button>
						<button type="reset" class="btn btn-danger btn-outline margin-top">Reset Button </button>
						<button type="submit" name="cetak" class="btn btn-success btn-outline margin-top">Cetak Excel</button>
					</div>
				</div>
				<?php endif ?>
			
			<?= form_close() ?>
			
		<?php if (!$first_load||$form_action === "laporan/kondisi"||$form_action === "laporan/masuk"||$form_action === "laporan/keluar"):?>
			
			<?php if ($inventariss):?>
                <h3>Total : <?= $total ?></h3>
                          
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form">
                                <div class="row">
                                    <div class="col-lg-12">

                  <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-user">
                        <thead>
                            <tr>
                                <th class="center" scope="col">No</th>
								
							<?php if ($form_action === "laporan/masuk"):?>
								<th class="center" scope="col">Waktu Masuk</th>
							<?php elseif ($form_action === "laporan/keluar"):?>
								<th class="center" scope="col">Waktu Keluar</th>
								<th class="center" scope="col">Keterangan Keluar</th>								
							<?php endif ?>
								
                                <th class="center" scope="col">Kode Barang</th>
                                <th class="center" scope="col">No Aset</th>
                                <th class="center" scope="col">Jenis Barang</th>
                                
                            <?php if ($id_level_ruang == "252"||$id_level_ruang == "1"||$id_level_ruang == "2"||$id_level_ruang == "6"): ?>
                                <th class="center" scope="col">Lokasi Ruang</th>
                            <?php endif ?>
								<th class="center" scope="col">Kondisi</th>
                                <th class="center" scope="col">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php foreach($inventariss as $inventaris): ?>
                            <tr class="gradeA">
                                <td class="center"><?= ++$i?></td>
								
							<?php if ($form_action === "laporan/masuk"):?>
								<td><?= $inventaris->waktu_masuk ?></td>
							<?php elseif ($form_action === "laporan/keluar"):?>
								<td><?= $inventaris->waktu_keluar ?></td>
								<td><?= $inventaris->ket_keluar ?></td>
                            <?php endif ?>
							
                                <td><?= $inventaris->kd_barang ?></td>
                                <td><?= $inventaris->no_aset ?></td>
                                <td><?= $inventaris->jenis_barang ?></td>
                                
                            <?php if ($id_level_ruang == "252"||$id_level_ruang == "1"||$id_level_ruang == "2"||$id_level_ruang == "6"): ?>
                                <td><a target="_blank" href="<?= $inventaris->link_ruang ?>"><?= $inventaris->nama_ruang ?></a></td>
                            <?php endif ?>
								
                                <td><?= $inventaris->kondisi ?></td>
                                <td class="center"> 
                                    <a target="_blank" href="<?= base_url("data_inventaris/detail/$inventaris->id_inventaris");?>" type="button" class="btn btn-outline btn-primary btn-circle" data-toggle="tooltip" data-placement="top" title="Lihat Detail"><i class="fa  fa-search-plus"></i>
                                    </a>
                                    
                                <?php if ($level === "Admin"||$level === "Operator"||$level === "Laboran"): ?>
                                    <a href="<?= base_url("data_inventaris/edit/$inventaris->id_inventaris");?>" type="button" class="btn btn-outline btn-success btn-circle" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i>
                                    </a>                                 
                                    <a href="<?= base_url("data_inventaris/delete/$inventaris->id_inventaris");?>" onclick="return confirm('Hapus Data?')" type="button" class="btn btn-outline btn-danger btn-circle" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i>
                                <?php endif ?>
                                    
                                </td>
                            </tr>
                          <?php endforeach ?> 
                        </tbody>
                    </table> </div>
                    <!-- /.table-responsive -->
                </div> 
                <!-- /.panel-body -->
              </div> 
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-# -->
    </div>
    <!-- /.row -->
                    </div>
			<?php else: ?>
				<h3>Tidak ada data inventaris.</h3>	
			<?php endif ?>
					
		<?php endif ?>
					
			</div> </div> </div>
<!-- /#page-wrapper -->