<div class="container">
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('')?>">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page">Gallery</li>
        </ol>
    </nav>
    <div class="rows">
    <div class="col-md-8">
            <?php foreach ($galeri->result() as $row){ ?>
            <div class="panel panel-default">
              <img src="<?= base_url('assets/img/galeri/').$row->foto?>" width="100%" alt="<?= $row->foto;?>">
              <div class="panel-body">
                <p><h1>Judul: <?= $row->judul;?></h1></p>
				<p><h3><?= $row->deskripsi;?></h3></p>
                <p><small class="text-muted"><?= $row->tanggal;?></small></p>
              </div>
            </div>
            </div>
    <?php } ?>
    <?php $this->load->view('sidebar') ?>
    </div>
</div>