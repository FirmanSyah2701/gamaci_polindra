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
                            <li class="active">Galeri</li>
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
                            <strong class="card-title">Galeri</strong>
                            <?php if ($this->session->userdata("level")=='Admin'){ ?>
                            <button type="button" class="btn btn-info pull-right btn-sm" data-toggle="modal" data-target="#myModal" title="Tambah Data Gallery"><i class="fa fa-plus"></i></button>
                            <?php } ?>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-hover table-bordered">
                    <thead class="thead-primary">
                      <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Deskripsi</th>
                        <th>Penulis</th>
                        <th>Tanggal</th>
                        <?php if ($this->session->userdata("level")=='Admin'){ ?>
                        <th style="width: 50px;">Aksi</th>
                        <?php } ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $i= 1;
                        foreach ($gallery->result() as $row) {
                      ?>
                      <tr>
                        <td><?= $i++ ?></td>
                        <td><a class="fancybox" href="<?= base_url('assets/img/galeri/').$row->foto;?>" title="Perbesar"><img class="hvr-pulse img-responsive" src="<?= base_url('assets/img/galeri/').$row->foto?>" alt="<?= $row->foto;?>" style="width: 100px"></a> </td>
                        <td><a href="" data-toggle="modal" data-target="#lihat-data<?= $row->id_gallery?>" title="Lihat Deskripsi"></a><?= word_limiter($row->deskripsi, 4)?></td>
                        <td><?= $row->nama; ?></td>
                        <td><?= $row->tanggal; ?></td>
                        <?php if ($this->session->userdata("level")=='Admin'){ ?>
                        <td>
                          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit-data<?= $row->id_gallery;?>" title="Edit Galeri" ><i class="fa fa-pencil"></i></button>
                          <button href="<?= base_url('admin/content/deleteGallery/').$row->id_gallery.'/'.$row->foto.''?>" class="btn btn-danger btn-sm btn" onclick="return confirm('Yakin mau di Hapus?')" title="Hapus Galeri"><i class="fa fa-trash"></i></button>
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
          <h5 class="modal-title" id="mediumModalLabel">Data Gallery</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- body modal -->
        <div class="modal-body">
          <form action="<?= base_url('admin/content/addGallery')?>" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
              <div class="row form-group">
                  <label class="col-sm-4 control-label">Foto</label>
                  <div class="col-sm-8">                    
                    <input type="hidden" name="id_admin" value="<?= $this->session->userdata('id_admin') ?>">
                    <input type="file" class="form-control" name="foto" required>
                    <small class="form-text text-muted">JPG|JPEG|PNG Max 5MB</small>
                  </div>
              </div>
              
              <div class="row form-group">
                  <label class="col-sm-4 control-label">Judul</label>
                  <div class="col-sm-8">        
                    <input type="text" name="judul" class="form-control">
                  </div>
              </div>

              <div class="row form-group">
                  <label class="col-sm-4 control-label">Deskripsi</label>
                  <div class="col-sm-8">                                        
                    <textarea name="deskripsi" class="form-control"></textarea>
                  </div>
              </div>

              <div class="row form-group">
                  <label class="col-sm-4 control-label">Tanggal</label>
                  <div class="col-sm-6">
                    <input id="datepicker-example1" type="date" class="form-control" name="tanggal">
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
  foreach ($gallery->result() as $row) {
 ?>
 <!-- Modal Ubah Data -->
  <div id="edit-data<?= $row->id_gallery; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <h5 class="modal-title" id="mediumModalLabel">Ubah Data Galeri</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- body modal -->
        <div class="modal-body">
          <form action="<?= base_url('admin/content/editGallery/').$row->foto?>" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
              <div class="row form-group">
                  <label class="col-sm-4 control-label">Foto</label>
                  <div class="col-sm-8">                    
                    <input type="hidden" name="id" value="<?= $row->id_gallery; ?>">
                    <input type="hidden" name="penulis" value="<?php echo $this->session->userdata('id_admin');?>">
                    <a class="fancybox" href="<?= base_url('assets/img/galeri/').$row->foto;?>" title="Perbesar"><img class="hvr-pulse img-responsive" src="<?= base_url('assets/img/galeri/').$row->foto?>" alt="<?= $row->foto;?>" style="width: 100px"></a>
                    <input type="file" class="form-control" name="foto" required>
                    <small class="form-text text-muted">JPG|JPEG|PNG Max 5MB</small>
                  </div>
              </div>
              
              <div class="row form-group">
                  <label class="col-sm-4 control-label">Deskripsi</label>
                  <div class="col-sm-8">                                        
                    <textarea name="deskripsi" class="form-control"><?= $row->deskripsi; ?></textarea>
                  </div>
              </div>

              <div class="row form-group">
                  <label class="col-sm-4 control-label">Tanggal</label>
                  <div class="col-sm-4">
                    <input type="date"  name="tanggal" id="datepicker" value="<?= $row->tanggal;?>" disabled>
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

<?php 
  foreach ($gallery->result() as $row) {
 ?>
 <!-- Modal Lihat Data -->
  <div id="lihat-data<?= $row->id_gallery?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <h5 class="modal-title" id="mediumModalLabel">Deskripsi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- body modal -->
        <div class="modal-body">
          <?= $row->deskripsi;?> 
        </div>        
      </div>
    </div>
  </div>
<?php } ?>