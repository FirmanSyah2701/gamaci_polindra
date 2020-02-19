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
                            <li><a href="#">Content</a></li>
                            <li class="active">Berita</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
              <form class="form-horizontal" action="<?= base_url('admin/content/addBeritaDb')?>" method="post" enctype="multipart/form-data">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body card-block">
                            <div class="row form-group">                                  
                              <div class="col-md-12">
                                <input type="hidden" name="id_admin" value="<?php echo $this->session->userdata('id_admin');?>">
                                <input name="judul" type="text" class="form-control" placeholder="Masukkan Judul Berita ..." required="">
                              </div>
                            </div>
                            
                            <div class="row form-group">                                  
                              <div class="col-md-12">
                                <textarea name="berita" class="form-control"></textarea>
                              </div>
                            </div>                              
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                      <div class="card-header">
                        <i class="fa fa-send-o"></i> Publikasi
                      </div>
                            <div class="card-body card-block">
                                <div class="row form-group">                                  
                                  <div class="col-md-12">
                                    <label for="tanggal" class=" form-control-label">Tanggal</label>
                                    <input name="tanggal" type="date" class="form-control" id="datepicker" required>
                                  </div>
                                </div>
                                
                                <div class="row form-group">                                  
                                  <div class="col-md-12">
                                    <label for="gambar" class=" form-control-label">Foto</label>
                                    <input type="file" name="foto" class="form-control">
                                    <small class="form-text text-muted">JPG|PNG Max 5MB</small>
                                  </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?= base_url('admin/content/berita')?>" class="btn btn-danger">Kembali</a>
                            </div>
                      </div>
                </div>
                </form>
                
            </div><!-- .animated -->
        </div><!-- .content -->

        <script src="<?= base_url('assets/tinymce/tinymce.min.js')?>"></script>
        <script>tinymce.init({ selector:'textarea', height:400 });</script>