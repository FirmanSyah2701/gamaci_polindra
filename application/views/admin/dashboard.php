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
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                  <span class="badge badge-pill badge-success">Hello</span> <?php echo $this->session->userdata('nama');?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>


           <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">                        
                        <h4 class="mb-0">
                            <span class="count"><?= $j_pengurus ?></span>
                        </h4>
                        <p class="text-light">Data Pengurus</p>

                        <div class="" style="height:70px;" height="70">
                            <a href="<?= base_url('admin/manage/pengurus')?>" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.col-->
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-2">
                    <div class="card-body pb-0">                        
                        <h4 class="mb-0">
                            <span class="count"><?= $j_mahasiswa ?></span>
                        </h4>
                        <p class="text-light">Data Mahasiswa</p>

                        <div class="" style="height:70px;" height="70"/>
                        <a href="<?= base_url('admin/manage/mahasiswa')?>" class="btn btn-info">Detail</a>
                        </div>

                    </div>
                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-3">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <span class="count"><?= $j_berita ?></span>
                        </h4>
                        <p class="text-light">Total Berita</p>

                        <div class="" style="height:70px;" height="70"/>
                        <a href="<?= base_url('admin/content/berita')?>" class="btn btn-success">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-4">
                    <div class="card-body pb-0">                        
                        <h4 class="mb-0">
                            <span class="count"><?= $j_gallery ?></span>
                        </h4>
                        <p class="text-light">Total Galeri</p>

                        <div class="" style="height:70px;" height="70"/>
                        <a href="<?= base_url('admin/content/galeri')?>" class="btn btn-danger">Detail</a>
                        </div>

                    </div>
                </div>
            </div>
            
            <!--/.col-->         
            
                <?php
                  if ($this->agent->is_browser())
                  {
                          $agent = $this->agent->browser().' '.$this->agent->version();
                  }         
                  else
                  {
                          $agent = 'Unidentified User Agent';
                  }
                ?>

                <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary">
                        <strong class="card-title text-light">Informasi Pengunjung</strong>
                    </div>
                    <div class="card-body">
                        <div class="row form-group">
                            <div class="col col-md-4"><label class=" form-control-label">Sistem Operasi</label></div>
                            <div class="col-12 col-md-8">
                              <p class="form-control-static"><?php echo $this->agent->platform();?></p>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-4"><label class=" form-control-label">Browser</label></div>
                            <div class="col-12 col-md-8">
                              <p class="form-control-static"><?php echo $agent; ?></p>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-4"><label class=" form-control-label">Tanggal Server</label></div>
                            <div class="col-12 col-md-8">
                              <p class="form-control-static"><?php echo tanggal() ?></p>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-4"><label class=" form-control-label">Jam Server</label></div>
                            <div class="col-12 col-md-8">
                              <p class="form-control-static"><?php echo Date("H:i:s", time()+60*60*6) ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
            <?php $i=1; ?>
            <?php foreach ($berita as $key => $row) { ?>
                <div class="card">
                    <div class="card-header bg-primary">
                        <strong class="card-title text-light">Berita Terbaru</strong>
                    </div>
                    <div class="card-body">
                        <div class="row form-group">
                            <div class="col col-md-4"><label class=" form-control-label">Pada</label></div>
                            <div class="col-12 col-md-8">
                              <p class="form-control-static"><?= $row->tanggal; ?></p>
                            </div>

                            <div class="col col-md-4"><label class=" form-control-label">Judul Berita</label></div>
                            <div class="col-12 col-md-8">
                            <p class="form-control-static"><a target="_blank" href="#"><?= $row->judul; ?></a></p>
                              <a href="<?= base_url('admin/content/berita')?>" class="btn btn-primary btn-sm">Detail</a>
                              <hr width="18%" align="left">
                            </div>
                        </div>
                    </div>
                </div> 
                <?php $i++; ?>
            <?php } ?>
            </div>
        </div> <!-- .content -->