<div class="container">
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('')?>">Beranda</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Mahasiswa</li>
        </ol>
    </nav>
    
  <div class="rows">
      <div class="col-md-6">
            <table class="table table-hover table-bordered" cellpadding="5" cellspacing="0" id="bootstrap-data-table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIM</th>
                  <th>Nama Lengkap</th>
                  <th>Jurusan</th>
                  <th>Kelas</th>
                  <th>Alamat</th>
                  <th>Angkatan</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $i= 1;
                  foreach ($mahasiswa->result() as $row) {
                ?>
                <tr>
                  <td><?= $i++ ?></td>
                  <td><?= $row->nim;?></td>
                  <td><?= $row->nama;?></td>
                  <td><?= $row->jurusan; ?></td>
                  <td><?= $row->kelas; ?></td>
                  <td><?= $row->alamat; ?></td>
                  <td><?= $row->angkatan; ?></td>                        
                </tr>            
                <?php } ?>
              </tbody>
            </table>
      </div>
  </div>
</div>