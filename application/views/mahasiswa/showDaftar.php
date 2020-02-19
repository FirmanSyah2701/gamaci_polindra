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
                            <li><a href="<?= base_url('mahasiswa')?>">Dashboard</a></li>
                            <li><a href="#">Form</a></li>
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
                            <strong class="card-title">Form Pendaftaran Calon Ketua</strong>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-hover table-bordered">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>File</th>
                        <th>Alasan</th>
                        <th>Visi Misi</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $i= 1;
                        foreach ($calon->result() as $row) {
                      ?>
                      <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $row->nama; ?></td>
                        <td><?= $row->file; ?></td>
                        <td><?= $row->alasan; ?></td>
                        <td><?= $row->visi_misi; ?></td>
                        <td>
                          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit-data<?= $row->nim ?>" title="Edit Mahasiswa"><i class="fa fa-pencil"></i></button>
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

  <?php 
    foreach ($calon->result() as $row) {
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
          <form action="<?= base_url('admin/manage/editMahasiswa')?>" class="form-horizontal tasi-form" method="post">

              <div class="row form-group">
                  <label class="col-sm-4 control-label">File</label>
                  <div class="col-sm-8">
                    <input type="hidden" name="nim" value="<?= $row->nim;?>">                    
                    <input type="file" class="form-control" name="file" required>
                  </div>
              </div>


              <div class="row form-group">
                  <label class="col-sm-4 control-label">Alasan</label>
                  <div class="col-sm-8">                    
                    <textarea name="alasan" class="form-control"><?= $row->alasan ?></textarea>
                  </div>
              </div>

              <div class="row form-group">
                  <label class="col-sm-4 control-label">Kelas</label>
                  <div class="col-sm-8">                    
                    <textarea name="visi_misi" class="form-control"><?= $row->visi_misi ?></textarea>    
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