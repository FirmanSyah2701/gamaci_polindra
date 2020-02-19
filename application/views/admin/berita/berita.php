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
                <div class="row">

                <div class="col-md-12">
                  <?php if ($this->session->flashdata('pesan')): ?>
                          <div class="alert alert-success"><?php echo $this->session->flashdata('pesan'); ?></div>
                        <?php endif ?>
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Berita</strong>
                            <?php if ($this->session->userdata("level")=='Admin'){ ?>
                            <a href="<?= base_url('admin/content/addBerita')?>" class="btn btn-info pull-right btn-sm" title="Tambah Berita Baru"><i class="fa fa-plus"></i></a>
                            <?php } ?>
                        </div>
                        <div class="card-body">
                  <table class="table table-hover table-bordered">
                    <thead class="thead-primary">
                      <tr>
                        <th style="width: 30px;">No</th>
                        <th><i class="fa fa-search"></i> Judul</th>
                        <th>Penulis</th>
                        <th>Tanggal</th> 
                        <?php if ($this->session->userdata("level")=='Admin'){ ?>                      
                        <th style="width: 90px;">Aksi</th>
                        <?php } ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $i= 1;
                        foreach ($berita->result() as $row) {
                      ?>
                      <tr>
                        <td><?= $i++ ?></td>
                        <td><a href="" data-toggle="modal" data-target="#lihat-data<?= $row->id_berita?>" title="Lihat Isi Berita"><i class="fa fa-search"></i></a> <?= $row->judul; ?></td>
                        <td><?= $row->nama;?></td>
                        <td><?= $row->tanggal; ?></td>
                        <?php if ($this->session->userdata("level")=='Admin'){ ?>                        
                        <td>
                          <a href="<?= base_url('admin/content/editBerita/').$row->id_berita?>" class="btn btn-primary btn-sm" title="Edit Siswa"><i class="fa fa-pencil"></i></button>
                          <a href="<?= base_url('admin/content/deleteBerita/').$row->id_berita.'/'.$row->foto.''?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau di Hapus?')" title="Hapus Carousel"><i class="fa fa-trash"></i></a>
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

<?php 
  foreach ($berita->result() as $row) {
 ?>
 <!-- Modal Lihat Data -->
  <div id="lihat-data<?= $row->id_berita?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <h5 class="modal-title" id="mediumModalLabel">Isi Berita</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- body modal -->
        <div class="modal-body">
          <?= $row->berita;?> 
        </div>        
      </div>
    </div>
  </div>
<?php } ?>