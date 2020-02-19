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
                            <li class="active">Struktur</li>
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
                            <strong class="card-title">Struktur</strong>
                            <button type="button" class="btn btn-info pull-right btn-sm" 
                                data-toggle="modal" data-target="#myModal" title="Tambah Data Gallery"><i class="fa fa-plus"></i>
                            </button>
                            
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-hover table-bordered">
                    <thead class="thead-primary">
                      <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Tanggal</th>
                        <th>Angkatan</th>
                        <th style="width: 50px;">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $i= 1;
                        foreach ($struktur->result() as $row) {
                      ?>
                      <tr>
                        <td><?= $i++ ?></td>
                        <td><a class="fancybox" href="<?= base_url('assets/img/galeri/').$row->foto;?>" 
                            title="Perbesar"><img class="hvr-pulse img-responsive" 
                            src="<?= base_url('assets/img/galeri/').$row->foto?>" 
                            alt="<?= $row->foto;?>" style="width: 100px"></a>
                        </td>
                        <td><?= $row->tanggal; ?></td>
                        <td><?= $row->angkatan; ?></td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#edit-data<?= $row->id_struktur;?>" title="Edit Galeri" >
                                <i class="fa fa-pencil"></i>
                            </button>
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
          <h5 class="modal-title" id="mediumModalLabel">Struktur</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- body modal -->
        <div class="modal-body">
          <form action="<?= base_url('admin/content/addStruktur')?>" class="form-horizontal tasi-form" 
            method="post" enctype="multipart/form-data">
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Foto</label>
                    <div class="col-sm-8">                    
                        <input type="file" class="form-control" name="foto" required>
                        <small class="form-text text-muted">JPG|JPEG|PNG Max 5MB</small>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Tanggal</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" name="tanggal" id="datepicker">
                    </div>
                </div>

              <div class="row form-group">
                  <label class="col-sm-4 control-label">Angkatan</label>
                  <div class="col-sm-8">                                        
                    <input type="text" name="angkatan" class="form-control">
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
  foreach ($struktur->result() as $row) {
 ?>
 <!-- Modal Ubah Data -->
  <div id="edit-data<?= $row->id_struktur; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <h5 class="modal-title" id="mediumModalLabel">Ubah Struktur</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- body modal -->
        <div class="modal-body">
          <form action="<?= base_url('admin/content/editGaleri/').$row->foto?>" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
              <div class="row form-group">
                  <label class="col-sm-4 control-label">Foto</label>
                  <div class="col-sm-8">                    
                    <input type="hidden" name="id" value="<?= $row->id_struktur; ?>">
                    <a class="fancybox" href="<?= base_url('assets/img/galeri/').$row->foto;?>" title="Perbesar"><img class="hvr-pulse img-responsive" src="<?= base_url('assets/img/galeri/').$row->foto?>" alt="<?= $row->foto;?>" style="width: 100px"></a>
                    <input type="file" class="form-control" name="foto" required>
                    <small class="form-text text-muted">JPG|JPEG|PNG Max 5MB</small>
                  </div>
              </div>


              <div class="row form-group">
                  <label class="col-sm-4 control-label">Tanggal</label>
                  <div class="col-sm-4">
                    <input type="date" class="form-control" name="tanggal" id="datepicker" value="<?= $row->tanggal;?>" disabled>
                  </div>
              </div>
              
              <div class="row form-group">
                  <label class="col-sm-4 control-label">Angkatan</label>
                  <div class="col-sm-8">                                        
                    <input type="text" name="angkatan" class="form-control" value="<?= $row->angkatan; ?>">
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