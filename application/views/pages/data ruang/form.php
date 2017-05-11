<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1  class="page-header"><?= $title_page ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?= form_open($form_action) ?>
                            <form role="form">
								
								<?= form_input('id_ruang', $input->id_ruang, 'class = "form-control hidden" id="id_ruang" placeholder="" ')?>
								
                                <div class="row">
                                    <div class="col-lg-2">
                                        <h4>Nama Ruang</h4>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group"> 
                                            <?= form_input('nama_ruang', $input->nama_ruang, 'class = "form-control" id="nama_ruang" placeholder="" ')?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <?= form_error('nama_ruang','<p class="alert alert-danger">','</p>') ?>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-2">
                                        <h4>Pemilik Ruang</h4>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">                                
                                            <?= form_dropdown('id_level_ruang', getDropdownList('level_ruang', ['id_level_ruang', 'pmlk_ruang']), $input->id_level_ruang, 'id="id_level_ruang" class = "form-control" ') ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <?= form_error('nama_user','<p class="alert alert-danger">','</p>') ?>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-2">
                                        <h4>Link Ruang</h4>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <?= form_input('link_ruang', $input->link_ruang, 'class = "form-control" name="link_ruang" id="link_ruang" type="link" placeholder="" ')?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <?= form_error('link_ruang','<p class="alert alert-danger">','</p>') ?>
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-primary btn-outline margin-top">Simpan</button>
                                <button type="reset" class="btn btn-danger btn-outline margin-top">Reset</button>
                            </form>
                            <?= form_close() ?>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>
    
