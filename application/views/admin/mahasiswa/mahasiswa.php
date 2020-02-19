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
                            <li><a href="<?= site_url('admin/Dashboard')?>">Dashboard</a></li>
                            <li><a href="#">Manage</a></li>
                            <li class="active">Data Mahasiswa</li>
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
                            <strong class="card-title">Data Mahasiswa</strong>
                            <?php if ($this->session->userdata("level")=='Admin'){ ?>
                            <button type="button" class="btn btn-info pull-right btn-sm" 
                              data-toggle="modal" data-target="#myModal" 
                              title="Tambah Data Mahasiswa"><i class="fa fa-plus"></i>
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
                        <th>Jurusan</th>
                        <th>Kelas</th>
                        <th>Alamat</th>
                        <th>Angkatan</th>
                        <?php if ($this->session->userdata("level")=='Admin'){ ?>
                        <th>Aksi</th>
                        <?php } ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $i= 1;
                        foreach ($mahasiswa as $row) : 
                      ?>
                      <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $row->nim; ?></td>
                        <td><?= $row->nama; ?></td>
                        <td><?= $row->jurusan; ?></td>
                        <td><?= $row->kelas; ?></td>
                        <td><?= $row->alamat; ?></td>
                        <td><?= $row->angkatan; ?></td>
                        <?php if ($this->session->userdata("level")=='Admin'){ ?>
                        <td>
                          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit-data<?= $row->nim;?>" title="Edit Mahasiswa"><i class="fa fa-pencil"></i></button>
                          <a href="<?= site_url('admin/manage/delete/').$row->nim?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau di Hapus?')" title="Hapus Carousel"><i class="fa fa-trash"></i></a>
                        </td>
                        <?php } ?>
                      </tr>            
                        <?php endforeach; ?>
                    </tbody>
                  </table>
                        </div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

  <?php 
    foreach ($mahasiswa as $row) : 
  ?>
        <!-- Modal Tambah -->
  <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <h5 class="modal-title" id="mediumModalLabel">Data Mahasiswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- body modal -->
        <div class="modal-body">
          <form action="<?= base_url('admin/manage/add')?>" class="form-horizontal tasi-form" method="post">
              <div class="row form-group">
                  <label class="col-sm-4 control-label">NIM</label>                    
                  <div class="col-sm-8">
                      <input type="text" class="form-control <?php echo form_error('nim') ? 'is-invalid':''?>" name="nim">
                      <div class="invalid-feedback">
                        <?= form_error('nim'); ?>
                      </div>
                  </div>
              </div>
              
              <div class="row form-group">
                  <label class="col-sm-4 control-label">Nama</label>                    
                  <div class="col-sm-8">    
                      <input type="text" class="form-control <?php echo form_error('nama') ? 'is-invalid':''?>" name="nama" >
                      <div class="invalid-feedback">
                        <?= form_error('nama'); ?>
                      </div>
                  </div>
              </div>

              <div class="row form-group">
                  <label class="col-sm-4 control-label">Jurusan</label>                    
                  <div class="col-sm-8">  
                      <select class="form-control <?php echo form_error('jurusan') ? 'is-invalid':''?>" name="jurusan" >
                        <option value="">-- Pilih Jurusan --</option>
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Teknik Mesin">Teknik Mesin</option>
                        <option value="Teknik Pendingin dan Tata Udara">Teknik Pendingin dan Tata Udara</option>
                        <option value="Teknik Keperawatan">Teknik Keperawatan</option>
                      </select>
                      <div class="invalid-feedback">
                        <?= form_error('jurusan'); ?>
                      </div>
                  </div>
              </div>

              <div class="row form-group">
                  <label class="col-sm-4 control-label">Kelas</label>                    
                  <div class="col-sm-8">
                      <input type="text" class="form-control <?php echo form_error('kelas') ? 'is-invalid':''?>" name="kelas" >
                      <div class="invalid-feedback">
                        <?= form_error('kelas'); ?>
                      </div>
                  </div>
              </div>

              <div class="row form-group">
                  <label class="col-sm-4 control-label">Alamat</label>
                  <div class="col-sm-8">
                    <textarea class="form-control <?php echo form_error('alamat') ? 'is-invalid':''?>" name="alamat" > </textarea>   
                    <div class="invalid-feedback">
                        <?= form_error('alamat'); ?>
                      </div>                
                   </div>
              </div>

              <div class="row form-group">
                  <label class="col-sm-4 control-label">Angkatan</label>                    
                  <div class="col-sm-8">
                      <input type="text" class="form-control <?php echo form_error('angkatan') ? 'is-invalid':''?>" name="angkatan">
                      <div class="invalid-feedback">
                        <?= form_error('angkatan'); ?>
                      </div>
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
    <?php endforeach; ?>
  

  <?php 
  foreach ($mahasiswa as $row) : 
 ?>
 <!-- Modal Ubah Data -->
  <div id="edit-data<?= $row->nim; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <h5 class="modal-title" id="mediumModalLabel">Ubah Data Mahasiswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- body modal -->
        <div class="modal-body">
        <span id="success_message"></span>
          <form action="<?= site_url('admin/manage/editMahasiswa/').$row->nim ?>" class="form-horizontal tasi-form" method="post">
              <div class="row form-group">
                  <label class="col-sm-4 control-label">NIM</label>
                  <div class="col-sm-8">
                    <input type="hidden" name="nim" value="<?= $row->nim;?>">
                    <input type="text" class="form-control" name="nim" required pattern="^[0-9]*$" 
                           minlength="7" maxlength="7" value="<?= $row->nim; ?>" disabled>                    
                  </div>
              </div>

              <div class="row form-group">
                  <label class="col-sm-4 control-label">Nama Lengkap</label>
                  <div class="col-sm-8">                    
                    <input type="text" class="form-control" name="nama" pattern="^[a-zA-Z\s]*$" required value="<?= $row->nama; ?>">
                  </div>
              </div>


              <div class="row form-group">
                  <label class="col-sm-4 control-label">Jurusan</label>
                  <div class="col-sm-8">                    
                    <select class="form-control" name="jurusan" required>
                        <option value="<?= $row->jurusan ?>"><?= $row->jurusan ?></option>
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Teknik Mesin">Teknik Mesin</option>
                        <option value="Teknik Pendingin dan Tata Udara">Teknik Pendingin dan Tata Udara</option>
                        <option value="Teknik Keperawatan">Teknik Keperawatan</option>
                    </select>
                  </div>
              </div>

              <div class="row form-group">
                  <label class="col-sm-4 control-label">Kelas</label>
                  <div class="col-sm-8">                    
                    <input type="text" class="form-control" name="kelas" required="" value="<?= $row->kelas; ?>">      
                  </div>
              </div>
              
              <div class="row form-group">
                  <label class="col-sm-4 control-label">Alamat</label>
                  <div class="col-sm-8">                    
                    <textarea class="form-control" name="alamat" required=""><?= $row->alamat; ?></textarea>
                  </div>
              </div>

              <div class="row form-group">
                  <label class="col-sm-4 control-label">Angkatan</label>
                  <div class="col-sm-8">                    
                    <input type="text" name="angkatan" class="form-control" required pattern="^[0-9]*$" value="<?= $row->angkatan;?>">
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
  <?php endforeach; ?>
