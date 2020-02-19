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
            <?php foreach($berita->result() as $row){ ?>
              <form class="form-horizontal" action="<?= base_url('admin/content/editBeritaDb/').$row->foto;?>" method="post" enctype="multipart/form-data">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body card-block">
                            <div class="row form-group">                                  
                              <div class="col-md-12">
                                <input type="hidden" name="penulis" value="<?php echo $this->session->userdata('id_admin');?>">
                                <input type="hidden" name="id" value="<?= $row->id_berita; ?>">
                                <input name="judul" type="text" class="form-control" placeholder="Masukkan Judul Berita ..." required="" value="<?= $row->judul; ?>">
                              </div>
                            </div>
                            
                            <div class="row form-group">                                  
                              <div class="col-md-12">
                                <textarea name="berita" class="form-control"><?= $row->berita; ?></textarea>
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
                                    <input name="tanggal" type="text" class="form-control" id="datepicker" required="" value="<?= $row->tanggal; ?>">
                                  </div>
                                </div>
                                
                                <div class="row form-group">                                  
                                  <div class="col-md-12">
                                    <label for="gambar" class=" form-control-label">Foto</label>
                                    <input type="file" name="foto" class="form-control">
                                    <small class="form-text text-muted">JPG|PNG Max 5MB</small>
                                    <a class="fancybox" href="<?= base_url('assets/img/berita/').$row->foto; ?>" title="Perbesar"><img class="hvr-pulse img-responsive" src="<?= base_url('assets/img/berita/').$row->foto ?>" alt="<?= $row->foto; ?>" style="width: 290px; margin-top: 10px"></a>
                                  </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?= base_url('admin/content/berita')?>" class="btn btn-danger">Kembali</a>
                            </div>
                      </div>
                </div>
                </form>
                <?php } ?>
            </div><!-- .animated -->
        </div><!-- .content -->

        <script src="<?= base_url('assets/tinymce/tinymce.min.js')?>"></script>
        <script>tinymce.init({ selector:'textarea', height:400 });</script>