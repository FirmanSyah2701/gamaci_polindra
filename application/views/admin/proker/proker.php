<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="<?= base_url('admin/Dashboard')?>">Dashboard</a></li>
                    <li><a href="#">Manage</a></li>
                    <li class="active">Proker</li>
                </ol>
            </div>
        </div>
    </div>
</div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
            <div class="col-md-12">
                <?php if ($this->session->flashdata('pesan')): ?>
                    <div class="alert alert-success"><?php echo $this->session->flashdata('pesan'); ?></div>
                <?php endif ?>
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Proker</strong>
                        <button type="button" class="btn btn-info pull-right btn-sm" data-toggle="modal" 
                            data-target="#myModal" title="Tambah Data Proker"><i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-hover table-bordered">
                        <thead class="thead-primary">
                            <tr>
                            <th>No</th>
                            <th>Nama Proker</th>
                            <th>Tanggal</th>
                            <th>Deskripsi</th>                     
                            <th style="width: 10%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i= 1;
                            foreach ($proker as $row) {
                            ?>
                            <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $row->nama ?></td>     
                            <td><?= $row->tanggal ?></td>
                            <td><?= $row->deskripsi ?></td>             
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit-data<?= $row->id_proker?>" title="Edit Proker"><i class="fa fa-pencil"></i></button>
                                <a href="<?= base_url('admin/manage/deleteProker/').$row->id_proker?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau di Hapus?')" title="Hapus Proker"><i class="fa fa-trash"></i></a>
                            </td>
                            </tr>            
                            <?php } ?>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

<!-- Modal Tambah -->
  <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <h5 class="modal-title" id="mediumModalLabel">Tambah Proker</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- body modal -->
        <div class="modal-body">
          <form action="<?= base_url('admin/manage/addProker')?>" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
              <div class="row form-group">
                  <label class="col-sm-4 control-label">Nama Proker</label>
                  <div class="col-sm-8">                    
                    <input type="hidden" name="id_proker">
                    <input type="text" class="form-control" name="nama" required>
                  </div>
              </div>

              <div class="row form-group">
                  <label class="col-sm-4 control-label">Tanggal</label>
                  <div class="col-sm-8">                    
                    <input type="date" class="form-control" name="tanggal" required>
                  </div>
              </div>

              <div class="row form-group">
                  <label class="col-sm-4 control-label">Deskripsi</label>
                  <div class="col-sm-8">                    
                    <textarea class="form-control" name="deskripsi" required> </textarea>
                  </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Confirm</button>
              </div>
          </form>
        </div>        
      </div>
    </div>
  </div>

  <?php 
  foreach ($proker as $row) {
  ?>
 <!-- Modal Ubah Data -->
  <div id="edit-data<?= $row->id_proker; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <h5 class="modal-title" id="mediumModalLabel">Ubah Data Proker</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- body modal -->
        <div class="modal-body">
          <form action="<?= base_url('admin/manage/editProker/')?>" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
              
              <div class="row form-group">
                  <label class="col-sm-4 control-label">Nama Proker</label>
                  <div class="col-sm-8">                         
                    <input type="hidden" name="id_proker">               
                    <input type="text" name="nama" class="form-control" value="<?= $row->nama; ?>">
                  </div>
              </div>

              <div class="row form-group">
                  <label class="col-sm-4 control-label">Tanggal</label>
                  <div class="col-sm-8">                                        
                    <input type="date" name="tanggal" class="form-control" value="<?= $row->tanggal; ?>">
                  </div>
              </div>

              <div class="row form-group">
                  <label class="col-sm-4 control-label">Deskripsi</label>
                  <div class="col-sm-8">
                    <textarea class="form-control" name="deskripsi"> <?= $row->deskripsi;?> </textarea>
                  </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Confirm</button>
              </div>             
          </form>
        </div>        
      </div>
    </div>
  </div>
<?php } ?>