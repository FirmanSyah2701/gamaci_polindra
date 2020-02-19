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
                            <strong class="card-title">Akun User</strong>
                            <button type="button" class="btn btn-info pull-right btn-sm" data-toggle="modal" data-target="#myModal" title="Tambah Data Siswa"><i class="fa fa-plus"></i></button>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-hover table-bordered">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama</th>                       
                        <th style="width: 10%;">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $i= 1;
                        foreach ($user->result() as $row) {
                      ?>
                      <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $row->nim;?></td>
                        <td><?= $row->nama; ?></td>                        
                        <td>
                          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit-data<?= $row->id_akun_mhs ?>" title="Edit Akun"><i class="fa fa-pencil"></i></button>
                          <a href="<?= base_url('admin/setting/deleteUser/').$row->id_akun_mhs.''?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau di Hapus?')" title="Hapus Akun"><i class="fa fa-trash"></i></a>
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
          <form action="<?= base_url('admin/setting/addUser')?>" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
              <div class="row form-group">
                  <label class="col-sm-4 control-label">Username</label>
                  <div class="col-sm-8">                    
                    <input type="hidden" name="id_akun_mhs">
                    <select name="nim" class="form-control" required>
                          <option value="">Pilih Nim</option>
                          <?php foreach($mahasiswa->result() as $row) { ?>
                          <option value="<?= $row->nim ?>"><?= $row->nim ?></option>
                          <?php } ?>
                    </select>
                    <!-- <input type="text" class="form-control" name="nim" required pattern="^[0-9]*$" 
                           minlength="7" maxlength="7">
                    -->
                  </div>
              </div>

              <div class="row form-group">
                  <label class="col-sm-4 control-label">Password</label>
                  <div class="col-sm-8">                    
                    <input type="password" class="form-control" name="password" required minlength="4" maxlength="20" pattern="^[A-Za-z]+$">
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
  foreach ($user->result() as $row) {
 ?>
 <!-- Modal Ubah Data -->
  <div id="edit-data<?= $row->id_akun_mhs; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <h5 class="modal-title" id="mediumModalLabel">Ubah Data User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- body modal -->
        <div class="modal-body">
          <form action="<?= base_url('admin/setting/editUser/').$row->id_akun_mhs ?>" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
              <div class="row form-group">                    
                    <input type="hidden" name="id" value="<?= $row->id_akun_mhs; ?>">
              <div class="row form-group">
                  <label class="col-sm-4 control-label">Nama Akun</label>
                  <div class="col-sm-8">                                        
                    <input type="text" name="name" class="form-control" value="<?= $row->nama; ?>">
                  </div>
              </div>

              <div class="row form-group">
                  <label class="col-sm-4 control-label">Username</label>
                  <div class="col-sm-8">                                        
                    <select name="nim" class="form-control" required>
                          <option value="<?= $row->nim?>"><?= $row->nim ?></option>
                          <?php foreach($mahasiswa->result() as $row) { ?>
                          <option value="<?= $row->nim ?>"><?= $row->nim ?></option>
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