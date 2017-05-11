<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            
            <?php $this->load->view('_partial/flash_message') ?>
            
            <h1 class="page-header">
                <div class="row">
                    <div class="col-lg-4">
                        <?= $title_page ?>
                    </div>

                    <div class="col-lg-2 col-lg-offset-6">
                        <a href="<?= base_url('data_ruang/create');?>" type="button" class="btn btn-outline btn-primary">Tambah Ruang</a>
                    </div>
                </div>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            
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
                                <th class="center" scope="col">Nama Ruang</th>
                                <th class="center" scope="col">Pemilik Ruang</th>
                                <th class="center" scope="col">Link Ruang</th>
                                <th class="center col-lg-1" scope="col">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php foreach($ruangs as $ruang): ?>
                            <tr class="gradeA">
                                <td class="center"><?= ++$i?></td>
                                <td><a target="_blank" href="<?= $ruang->link_ruang ?>"><?= $ruang->nama_ruang ?></a></td>
                                <td><?= $ruang->pemilik_ruang ?></td>
                                <td><?= $ruang->link_ruang ?></td>

                                <td class="center"> 
                                    <a href="<?= base_url("data_ruang/edit/$ruang->id_ruang");?>" type="button" class="btn btn-outline btn-success btn-circle" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i>
                                    </a>                                 
                                    <a href="<?= base_url("data_ruang/delete/$ruang->id_ruang");?>" onclick="return confirm('Hapus Data?')" type="button" class="btn btn-outline btn-danger btn-circle" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i>
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