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
												<th class="center" scope="col">Kode Lokasi</th>
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
												<td><?= $inventaris->kd_lokasi ?></td>
												<td><?= $inventaris->kd_barang ?></td>
												<td><?= $inventaris->no_aset ?></td>
												<td><?= $inventaris->jenis_barang ?></td>

											<?php if ($id_level_ruang == "252"||$id_level_ruang == "1"||$id_level_ruang == "2"||$id_level_ruang == "6"): ?>
												<td><a target="_blank" href="<?= $inventaris->link_ruang ?>"><?= $inventaris->nama_ruang ?></a></td>
											<?php endif ?>

												<td><?= $inventaris->kondisi ?></td>
												<td class="center"> 
													<a href="<?= base_url("data_inventaris/detail/$inventaris->id_inventaris");?>" type="button" class="btn btn-outline btn-primary btn-circle" data-toggle="tooltip" data-placement="top" title="Lihat Detail"><i class="fa  fa-search-plus"></i>
													</a>

												<?php if ($level === "Operator"||$level === "Laboran"||$level === "Admin"): ?>
													<a href="<?= base_url("data_inventaris/edit/$inventaris->id_inventaris");?>" type="button" class="btn btn-outline btn-success btn-circle" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i>
													</a>                                 
													<a href="<?= base_url("data_inventaris/delete/$inventaris->id_inventaris");?>" onclick="return confirm('Hapus Data?')" type="button" class="btn btn-outline btn-danger btn-circle" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i>
												<?php endif ?>

												</td>
											</tr>
										  <?php endforeach ?> 
										</tbody>
									  </table> 
									</div>
									<!-- /.table-responsive -->
								</div> 
								<!-- /.panel-body -->
							  </div> 
							<!-- /.panel -->
						</div>
						<!-- /.col-lg-# -->
					</div>
    
				</div>
				
		  <?php else: ?>
			<h3>Tidak ada data inventaris.</h3>	
		  <?php endif ?>
		</div> 
	</div>
	<!-- /.row -->
</div>
<!-- /#page-wrapper -->