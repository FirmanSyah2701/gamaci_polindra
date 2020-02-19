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
                  <li class="active">Form Calon Ketua</li>
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
                  <strong class="card-title">Form Calon Ketua</strong>
              </div>
              <div class="card-body">
                <form action="<?= base_url('mahasiswa/isiDaftar')?>" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                    <div class="row form-group">
                        <label class="col-sm-4 control-label">File</label>                    
                        <div class="col-sm-8">    
                            <input type="hidden" name="nim" value="<?= $this->session->userdata('nim') ?>">
                            <input type="file" class="form-control" name="file" required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-sm-4 control-label">Alasan</label>                    
                        <div class="col-sm-8">  
                            <textarea name="alasan" class="form-control" required></textarea>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-sm-4 control-label">Visi & Misi</label>                    
                        <div class="col-sm-8">
                            <textarea class="form-control" name="visi_misi" required> </textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Confirm</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
                </div>
              </div>