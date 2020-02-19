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
                            <li><a href="#">Setting</a></li>
                            <li class="active">Sosmed</li>
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
                            <strong class="card-title">Sosial Media</strong>
                            <button type="button" class="btn btn-info pull-right btn-sm" 
                              data-toggle="modal" data-target="#myModal" 
                              title="Tambah Data Sosial Media"><i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <div class="card-body">
                  <table class="table table-hover table-bordered">
                    <thead class="thead-primary">
                      <tr>
                        <th width="40px">No</th>
                        <th width="40px"><span class="fa fa-cog"></span></th>                                  
                        <th width="30%">Nama Sosmed</th>
                        <th>Link</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $i= 1;
                        foreach ($sosmed->result() as $row) {
                      ?>
                      <tr>
                        <td><?= $i++ ?></td>
                        <td>
                            <a href="javascript:;" data-toggle="modal" data-target="#edit-data<?= $row->id_sosmed;?>"><i class="fa fa-edit"></i></a>                                      
                        </td> 
                        <td><?= $row->nama_sosmed; ?></td>
                        <td><?= $row->link; ?></td>
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

    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <h5 class="modal-title" id="mediumModalLabel">Data Sosial Media</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- body modal -->
        <div class="modal-body">
          <form action="<?= base_url('admin/setting/addSosmed')?>" class="form-horizontal tasi-form" method="post">
              <div class="row form-group">
                  <label class="col-sm-4 control-label">Nama Sosmed</label>                    
                  <div class="col-sm-8">
                      <input type="hidden" name="id_sosmed">    
                      <input type="text" class="form-control" name="nama_sosmed">
                  </div>
              </div>

              <div class="row form-group">
                  <label class="col-sm-4 control-label">Link</label>
                  <div class="col-sm-8">
                        <input type="text" class="form-control" name="link">                 
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
  foreach ($sosmed->result() as $row) {
 ?>
 <!-- Modal Ubah Data -->
  <div id="edit-data<?= $row->id_sosmed; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <h5 class="modal-title" id="mediumModalLabel">Ubah Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- body modal -->
        <div class="modal-body">
          <form action="<?= base_url('admin/setting/sosmedDb')?>" class="form-horizontal tasi-form" method="post">
              <div class="row form-group">
                  <label class="col-sm-4 control-label">Link</label>
                  <div class="col-sm-8">
                    <input type="hidden" name="id_sosmed" value="<?= $row->id_sosmed;?>">
                    <input type="text" class="form-control" name="nama_sosmed" value="<?= $row->nama_sosmed;?>">
                    <input type="text" class="form-control" name="link" value="<?= $row->link; ?>">                    
                  </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>             
          </form>
        </div>        
      </div>
    </div>
  </div>
<?php } ?>