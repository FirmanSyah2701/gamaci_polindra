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
                    <li><a href="<?= base_url('admin/dashboard')?>">Dashboard</a></li>
                    <li><a href="#">Table</a></li>
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
                        <strong class="card-title">List Daftar Calon Ketua</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-hover table-bordered">
                        <thead class="thead-primary">
                            <tr>
                            <th style="width: 2px;">No</th>
                            <th>Nim</th>
                            <th>Nama</th>
                            <!-- <th>Jurusan</th>
                            <th>Kelas</th> -->
                            <th style="width: 120px;">KTP dan Foto</th>
                            <th>Alasan</th>
                            <th>Visi & Misi</th>
                            <th>Download</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i= 1;
                            foreach ($calon as $row) {
                            ?>
                            <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $row->nim; ?></td>
                            <td><?= $row->nama; ?></td>
                            <td><?= $row->file; ?></td>
                            <td><?= $row->alasan; ?></td>
                            <td><?= $row->visi_misi; ?></td>
                            <td>
                                <a href="<?= base_url().'admin/manage/download/'.$row->id_candidate; ?>" 
                                    class="btn btn-success btn-sm"><i class="fa fa-download"></i>
                                </a>
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