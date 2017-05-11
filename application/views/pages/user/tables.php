<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            
            <?php $this->load->view('_partial/flash_message') ?>
            
            <h1 class="page-header">
                <div class="row">
                    <div class="col-lg-4">
                        Data User
                    </div>

                    <div class="col-lg-2 col-lg-offset-6">
                        <a href="<?= base_url('user/create');?>" type="button" class="btn btn-outline btn-primary">Tambah User</a>
                    </div>
                </div>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    
    <div class="row">
        <div class="col-lg-12">

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
                                <th class="center" scope="col">Nama</th>
                                <th class="center" scope="col">Username</th>
                                <th class="center" scope="col">Level</th>
                                <th class="center col-lg-3" scope="col">Detail Level</th>
                                <th class="center" scope="col">Diblokir?</th>                              
                                <th class="center" scope="col">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php foreach($users as $user): ?>
                            <tr class="gradeA">
                                <td class="center"><?= ++$i?></td>
                                <td><?= $user->nama_user ?></td>
                                <td><?= $user->username ?></td>
                                <td><?= $user->nama_level?></td>
                                <td><?= $user->pemilik_ruang?></td>
                                <td class="center"><?= $user->is_blokir == 'n' ? 'Tidak' : 'Ya' ?></td>
                                <td class="center"> 
                                    <a href="<?= base_url("user/edit/$user->id_user");?>" type="button" class="btn btn-outline btn-success btn-circle" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i>
                                    </a>                                 
                                    <a href="<?= base_url("user/delete/$user->id_user");?>" onclick="return confirm('Hapus Data?')" type="button" class="btn btn-outline btn-danger btn-circle" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i>
                                    </a>                                 
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
                    </div> </div> </div> </div>
<!-- /#page-wrapper -->