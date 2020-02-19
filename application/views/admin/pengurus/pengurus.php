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
                            <li class="active">Data Pengurus</li>
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
                          <div class="alert alert-success"><?= $this->session->flashdata('pesan'); ?></div>
                        <?php endif ?>
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Pengurus</strong>
                            <?php if ($this->session->userdata("level")=='Admin'){ ?>
                            <button type="button" class="btn btn-info pull-right btn-sm" 
                              data-toggle="modal" data-target="#myModal" 
                              title="Tambah Data Pengurus"><i class="fa fa-plus"></i>
                            </button>
                            <?php } ?>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-hover table-bordered">
                    <thead class="thead-primary">
                      <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama Lengkap</th>
                        <th>Jabatan</th>
                        <?php if ($this->session->userdata("level")=='Admin'){ ?>
                        <th>Aksi</th>
                        <?php } ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $i= 1;
                        foreach ($pengurus->result() as $row) {
                      ?>
                      <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $row->nim;?></td>
                        <td><?= $row->nama;?></td>
                        <td><?= $row->nama_jabatan; ?></td>
                        <?php if ($this->session->userdata("level")=='Admin'){ ?>
                        <td>
                          <button type="button" class="btn btn-primary btn-sm" 
                            data-toggle="modal" data-target="#edit-data<?= $row->nim;?>" 
                            title="Edit Pengurus"><i class="fa fa-pencil"></i>
                          </button>
                          <a href="<?= base_url('admin/manage/deletePengurus/').$row->nim ?>" 
                            class="btn btn-danger btn-sm remove" onclick="return confirm('Yakin mau di Hapus?')" 
                            title="Hapus Carousel"><i class="fa fa-trash"></i>
                          </a>
                        </td>
                        <?php } ?>
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
          <h5 class="modal-title" id="mediumModalLabel">Data Pengurus</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- body modal -->
        <div class="modal-body">
          <form action="<?= base_url('admin/manage/addPengurus')?>" class="form-horizontal tasi-form" method="post">
              <div class="row form-group">
                  <label class="col-sm-4 control-label">NIM</label>                    
                  <div class="col-sm-8">
                      <input type="hidden" name="id_pengurus">    
                      <input type="text" class="form-control" name="nim" pattern="^[0-9]*$" required>
                  </div>
              </div>

              <div class="row form-group">
                  <label class="col-sm-4 control-label">Jabatan</label>
                  <div class="col-sm-8">
                    <select class="form-control" name="kd_jabatan" required>
                          <option value=""> Pilih Jabatan</option>
                          <?php foreach($pengurus->result() as $row) { ?>
                          <option value="<?= $row->kd_jabatan ?>"><?= $row->nama_jabatan ?></option>
                          <?php } ?>    
                    </select>                   
                  </div>
              </div>

              <!-- <div class="row form-group">
                  <label class="col-sm-4 control-label">Tanggal Lahir</label>
                  <div class="col-sm-8">                    
                    <input type="date" class="form-control" name="tanggal_lahir" required="" >
                  </div>
              </div> -->

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
    foreach ($pengurus->result() as $row) {
  ?>
 <!-- Modal Ubah Data -->
  <div id="edit-data<?= $row->nim; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <h5 class="modal-title" id="mediumModalLabel">Ubah Data Pengurus</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- body modal -->
        <div class="modal-body">
          <form action="<?= base_url('admin/manage/editPengurus')?>" class="form-horizontal tasi-form" method="post">
              <div class="row form-group">
                  <label class="col-sm-4 control-label">NIM</label>
                  <div class="col-sm-8">
                    <input type="hidden" name="id_pengurus" value="<?= $row->id_pengurus;?>">
                    <input type="text" class="form-control" name="nim" pattern="^[0-9]*$" 
                    value="<?= $row->nim; ?>" minlength="7" maxlength="7" disabled>
                  </div>
              </div>

              <div class="row form-group">
                  <label class="col-sm-4 control-label">Nama Lengkap</label>
                  <div class="col-sm-8">                    
                    <input type="text" class="form-control" name="nama" required value="<?= $row->nama; ?>" disabled>
                  </div>
              </div>

              <div class="row form-group">
                  <label class="col-sm-4 control-label">Jabatan</label>
                  <div class="col-sm-8">                    
                    <select class="form-control" name="kd_jabatan" required>
                      <option value="<?= $row->kd_jabatan ?>"><?= $row->nama_jabatan ?></option>
                      <?php foreach($pengurus->result() as $row) { ?>
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