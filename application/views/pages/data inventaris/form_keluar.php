<?php
$id_level_ruang = $this->session->userdata('id_level_ruang');
?>

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1  class="page-header">Inventaris Keluar</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    
                    <?= form_open() ?>
                    <form role="form">
                        
                    <div class="row">                    
                        <div class="col-lg-6">
                                                          
							<div class="form-group">
								<label>Pilih Inventaris</label>
								  	<?php
										$options=array('default'=>'- Pilih -');
										foreach($inventariss as $inventaris)
										{
											$options[$inventaris->id_inventaris] = $inventaris->kd_barang."-".$inventaris->no_aset." : ".$inventaris->jenis_barang;
							   			}
										echo form_dropdown('id_inventaris', $options, $input->id_inventaris, ' class = "form-control"');
									?> 
							</div>
							<?= form_error('id_inventaris','<p class="alert alert-danger">','</p>') ?>
							
							 <div class="form-group">
                                    <label>Keterangan</label>
                                    <?= form_input('ket_keluar', $input->ket_keluar, 'class = "form-control" id="ket_keluar"')?>
                                </div>
                                <?= form_error('ket_keluar','<p class="alert alert-danger">','</p>') ?>
							 <?= form_error('tgl_perlh','<p class="alert alert-danger">','</p>') ?>
                                                            
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                        
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary btn-outline margin-top">Submit Button</button>
                            <button type="reset" class="btn btn-danger btn-outline margin-top">Reset Button</button>
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
    
