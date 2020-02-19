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
                            <li><a href="#">Table</a></li>
                            <li class="active">Akun</li>
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
                            <strong class="card-title">Akun</strong>
                            <button type="button" class="btn btn-info pull-right btn-sm" data-toggle="modal" data-target="#myModal" title="Tambah Data Siswa"><i class="fa fa-plus"></i></button>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-hover table-bordered">
                    <thead class="thead-primary">
                      <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Level</th>                     
                        <th style="width: 10%;">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $i= 1;
                        foreach ($akun as $row) {
                      ?>
                      <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $row->nim ?></td>     
                        <td><?= $row->nama ?></td>
                        <td><?= $row->level ?></td>     
                        <td><?= $row->nama_jabatan ?></td>

                        <td>
                          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit-data<?= $row->id_admin?>" title="Edit Akun"><i class="fa fa-pencil"></i></button>
                          <a href="<?= base_url('admin/setting/deleteAkun/').$row->id_admin?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau di Hapus?')" title="Hapus Akun"><i class="fa fa-trash"></i></a>
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
          <h5 class="modal-title" id="mediumModalLabel">Tambah Akun</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- body modal -->
        <div class="modal-body">
          <form action="<?= base_url('admin/setting/addAkun')?>" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
              <div class="row form-group">
                  <label class="col-sm-4 control-label">Username</label>
                  <div class="col-sm-8">                    
                          <select name="nim" class="form-control" required>
                            <option value="">Pilih Akun</option>
                            <?php foreach($akun as $row) { ?>
                            <option value="<?= $row->nim ?>"><?= $row->nim ?></option>
                            <?php } ?>
                          </select>
                  </div>
              </div>

              <div class="row form-group">
                  <label class="col-sm-4 control-label">Level</label>
                  <div class="col-sm-8">                    
                        <select name="level" class="form-control" required>
                          <option value="">Pilih Level</option>
                          <option value="SuperAdmin">Super Admin</option>
                          <option value="Admin">Admin</option>
                        </select>
                  </div>
              </div>

              <div class="row form-group">
                  <label class="col-sm-4 control-label">Jabatan</label>
                  <div class="col-sm-8">                    
                        <select name="kd_jabatan" class="form-control" required>
                          <option value="">Pilih Jabatan</option>
                          <?php foreach($akun as $row) { ?>
                          <option value="<?= $row->kd_jabatan ?>"><?= $row->nama_jabatan ?></option>
                          <?php } ?>
                        </select>
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
  foreach ($akun as $row) {
 ?>
 <!-- Modal Ubah Data -->
  <div id="edit-data<?= $row->id_admin; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <h5 class="modal-title" id="mediumModalLabel">Ubah Data Akun</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- body modal -->
        <div class="modal-body">
          <form action="<?= base_url('admin/setting/editAkun/')?>" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
              
              <div class="row form-group">
                  <label class="col-sm-4 control-label">Nama Akun</label>
                  <div class="col-sm-8">                                        
                    <input type="text" name="nama" class="form-control" value="<?= $row->nama ?>">
                  </div>
              </div>

              <div class="row form-group">
                  <label class="col-sm-4 control-label">Username</label>
                  <div class="col-sm-8">                                        
                  <select name="nim" class="form-control" required>
                            <option value="<?= $row->nim ?>"><?= $row->nim ?></option>
                            <?php foreach($akun->result() as $row) { ?>
                            <option value="<?= $row->nim ?>"><?= $row->nim ?></option>
                            <?php } ?>
                          </select>
                  </div>
              </div>

              <div class="row form-group">
                  <label class="col-sm-4 control-label">Level</label>
                  <div class="col-sm-8">                    
                        <select name="level" class="form-control" required>
                          <option value="<?= $row->level ?>"><?= $row->level; ?></option>
                          <option value="SuperAdmin">Super Admin</option>
                          <option value="Admin">Admin</option>
                        </select>
                  </div>
              </div>

              <div class="row form-group">
                  <label class="col-sm-4 control-label">Jabatan</label>
                  <div class="col-sm-8">                    
                        <select name="kd_jabatan" class="form-control" required>
                          <option value="<?= $row->kd_jabatan ?>"><?= $row->nama_jabatan ?></option>
                          <?php foreach($akun->result() as $row) { ?>
                          <option value="<?= $row->kd_jabatan ?>"><?= $row->nama_jabatan ?></option>
                          <?php } ?>
                        </select>
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