<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1  class="page-header"><?= $title_page ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    
    <div class="row">
        <div class="col-lg-12">
			
			<?php if($title_page === "Inventaris Masuk" ): ?>
            <div class="alert alert-warning alert-dismissable margin-top">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Dianjurkan untuk membaca petunjuk pengisian terlebih dahulu.
            </div>
            <?php endif ?>
			
            <div class="panel panel-default">
                <div class="panel-body">
                    
                    <?= form_open($form_action) ?>
                    <form role="form">
                        
                    <div class="row">                    
                        <div class="col-lg-6">
                                
								<?= form_input('id_inventaris', $input->id_inventaris, 'class = "form-control hidden" id="id_inventaris"')?>
							
                                <?= form_input('id_level_ruang', $input->id_level_ruang, 'class = "form-control hidden" id="id_level_ruang"')?>
                                
                                <div class="form-group">
                                    <label>Kode Lokasi</label>
                                    <?= form_input('kd_lokasi', $input->kd_lokasi, 'class = "form-control" id="kd_lokasi"')?> 
                                </div>
								<?= form_error('kd_lokasi','<p class="alert alert-danger">','</p>') ?>
                                
                                <div class="form-group">
                                    <label>Kode Barang</label>
                                    <?= form_input('kd_barang', $input->kd_barang, 'class = "form-control" id="kd_barang"')?>              
                                </div>
                                <?= form_error('kd_barang','<p class="alert alert-danger">','</p>') ?>
                                
                                <div class="form-group">
                                    <label>Nomor Aset</label>
                                    <?= form_input('no_aset', $input->no_aset, 'class = "form-control" id="no_aset"')?>
                                </div>
                                <?= form_error('no_aset','<p class="alert alert-danger">','</p>') ?>
                                
                                <div class="form-group">
                                    <label>Jenis Barang</label>
                                    <?= form_input('jenis_barang', $input->jenis_barang, 'class = "form-control" id="jenis_barang"')?>
                                </div>
                                <?= form_error('jenis_barang','<p class="alert alert-danger">','</p>') ?>
                            
                                <div class="form-group">
                                    <label>Lokasi Ruang</label>
									<?php
										$options=array('default'=>'- Pilih -');
										foreach($ruangs as $ruang)
										{
											$options[$ruang->id_ruang] = $ruang->nama_ruang;
										}
										echo form_dropdown('id_ruang', $options, $input->id_ruang , ' class = "form-control"');
									?> 
                                </div>
                                <?= form_error('id_ruang','<p class="alert alert-danger">','</p>') ?>
                                
                                <div class="form-group">
                                    <label>Tahun Anggaran</label>
                                    <?= form_input('thn_angg', $input->thn_angg, 'class = "form-control" id="thn_angg"')?>
                                </div>
                                <?= form_error('thn_angg','<p class="alert alert-danger">','</p>') ?>
							
							                                <div class="form-group">
                                    <label>Periode</label>
                                    <?= form_input('periode', $input->periode, 'class = "form-control" id="periode"')?>
                                </div>
                                <?= form_error('periode','<p class="alert alert-danger">','</p>') ?>

                                <div class="form-group">
                                    <label>Nomor SPPA</label>
                                    <?= form_input('no_sppa', $input->no_sppa, 'class = "form-control" id="no_sppa"')?>
                                </div>
                                <?= form_error('no_sppa','<p class="alert alert-danger">','</p>') ?>
                                
                                <div class="form-group">
                                    <label>Tanggal Perolehan</label>
									<div class="input-group date" >
                                    	<?= form_input('tgl_perlh', $input->tgl_perlh, 'class = "form-control datepickers" id="tgl_perlh"')?>
										<div class="input-group-addon ">
											<span class="glyphicon glyphicon-th"></span>
										</div>
									</div>
                                </div>
                                <?= form_error('tgl_perlh','<p class="alert alert-danger">','</p>') ?>
                                                                                               
                                <div class="form-group">
                                    <label>Tercatat</label>
                                    <?= form_dropdown('tercatat', getDropdownList('status', ['id_status', 'status']), $input->tercatat, 'id="tercatat" class = "form-control" ') ?>
                                </div>
                                <?= form_error('tercatat','<p class="alert alert-danger">','</p>') ?>
                                
                                <div class="form-group">
                                    <label>Kondisi</label>
                                    <?= form_dropdown('id_kondisi', getDropdownList('kondisi', ['id_kondisi', 'kondisi']), $input->id_kondisi, 'id="kondisi" class = "form-control" ') ?>
                                </div>
                                <?= form_error('id_kondisi','<p class="alert alert-danger">','</p>') ?>
                                                            
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                        <div class="col-lg-6">
							
							<div class="form-group">
								<label>Tanggal Pembukuan</label>
								<div class="input-group date" >
									<?= form_input('tgl_buku', $input->tgl_buku, 'class = "form-control datepickers" id="tgl_buku"')?>
									<div class="input-group-addon ">
										<span class="glyphicon glyphicon-th"></span>
									</div>
								</div>
							</div>
							<?= form_error('tgl_buku','<p class="alert alert-danger">','</p>') ?>
							
							<div class="form-group">
								<label>Jenis Transaksi</label>
								<?= form_input('jns_trn', $input->jns_trn, 'class = "form-control" id="jns_trn"')?>
							</div>
							
							<div class="form-group">
								<label>Dasar Harga</label>
								<?= form_input('dsr_hrg', $input->dsr_hrg, 'class = "form-control" id="dsr_hrg"')?>
							</div>
							
							<div class="form-group">
								<label>Kode Data</label>
								<?= form_input('kd_data', $input->kd_data, 'class = "form-control" id="kd_data"')?>
							</div>
							
							<div class="form-group">
								<label>Kuantitas</label>
								<?= form_input('kuantitas', $input->kuantitas, 'class = "form-control" id="kuantitas"')?>
							</div>
							
							<div class="form-group">
								<label>Harga Satuan</label>
								<?= form_input('rph_sat', $input->rph_sat, 'class = "form-control" id="rph_sat"')?>
							</div>
							
							<div class="form-group">
								<label>Harga Aset</label>
								<?= form_input('rph_aset', $input->rph_aset, 'class = "form-control" id="rph_aset"')?>
							</div>
							
							<div class="form-group">
								<label>Keterangan</label>
								<?= form_input('keterangan', $input->keterangan, 'class = "form-control" id="keterangan"')?>
							</div>
							
							<div class="form-group">
								<label>Merk Type</label>
								<?= form_input('merk_type', $input->merk_type, 'class = "form-control" id="merk_type"')?>
							</div>
							
							<div class="form-group">
								<label>Asal Perolehan</label>
								<?= form_input('asal_perlh', $input->asal_perlh, 'class = "form-control" id="asal_perlh"')?>
							</div>
							
							<div class="form-group">
								<label>Nomor Bukti</label>
								<?= form_input('no_bukti', $input->no_bukti, 'class = "form-control" id="no_bukti"')?>
							</div>
							
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary btn-outline margin-top">Submit Button</button>
                            <button type="reset" class="btn btn-danger btn-outline margin-top">Reset Button </button>
                        </div>
                    </div>
                        
                    </form>
                    <?= form_close() ?>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>
