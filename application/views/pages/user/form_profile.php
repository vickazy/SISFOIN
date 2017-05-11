<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
			
			<?php $this->load->view('_partial/flash_message') ?>
            
            <?php if($title_page === "Tambah User" ): ?>
            <div class="alert alert-warning alert-dismissable margin-top">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Dianjurkan untuk membaca petunjuk pengisian terlebih dahulu.
            </div>
            <?php endif ?>
            
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
																
								<?= form_input('id_user', $input->id_user, 'class = "form-control hidden" id="id_user" ')?>
                                                                                                
                                <div class="row">
                                    <div class="col-lg-2">
                                        <h4>Nama User</h4>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">                                
                                            <?= form_input('nama_user', $input->nama_user, 'class = "form-control" id="nama_user" placeholder="Nama User" ')?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <?= form_error('nama_user','<p class="alert alert-danger">','</p>') ?>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-2">
                                        <h4>Username</h4>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <?= form_input('username', $input->username, 'class = "form-control" name="username" id="username" type="username" placeholder="Username" ')?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <?= form_error('username','<p class="alert alert-danger">','</p>') ?>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-2">
                                        <h4>Password</h4>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">                                
                                            <?= form_password('password', $input->password, ' class = "form-control" id="password" type="password" placeholder="Password" value="" ')?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <?= form_error('password','<p class="alert alert-danger">','</p>') ?>
                                    </div>
                                </div>
                                
								<div class="row">
                                    <div class="col-lg-2">
                                        <h4>Level</h4>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                           <?= form_dropdown('id_level', getDropdownList('level', ['id_level', 'nama_level']), $input->id_level, 'id="id_level" class = "form-control" <?php if ($level !== "Admin") : ?> disabled <?php endif ?>') ?>
                                        </div>
                                    </div>
                               	</div>
                                        
                                <div class="row">
                                    <div class="col-lg-2">
                                        <h4>Detail Level</h4>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <?= form_dropdown('id_level_ruang', getDropdownList('level_ruang', ['id_level_ruang', 'pemilik_ruang']), $input->id_level_ruang, 'id="level_ruang" class = "form-control" <?php if ($level !== "Admin") : ?> disabled <?php endif ?>') ?>
                                        </div>
                                    </div>
                                </div>
                                                                                                
                                <button type="submit" class="btn btn-primary btn-outline margin-top">Submit Button</button>
                                <button type="reset" class="btn btn-danger btn-outline margin-top">Reset Button</button>
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
    
