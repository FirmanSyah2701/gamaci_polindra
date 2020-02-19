<div class="container">
    <nav aria-label="breadcrumb" role="navigation">
    <?php foreach ($berita->result() as $row){ ?>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('')?>">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?=base_url('user/berita')?>">Berita</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $row->judul;?></li>
        </ol>
    </nav>
    <div class="rows">
        <div class="col-md-8">
            <div class="panel panel-default">
              <img src="<?= base_url('assets/img/berita/').$row->foto?>" width="100%" alt="<?= $row->foto;?>">
              <div class="panel-body">                            
                <h3><?= $row->judul;?></h3>
                <p><small class="text-muted"><?= $row->tanggal;?></small></p>
                <p>
                    <?= $row->berita;?>
                </p>
              </div>
            </div>
        </div>
    <?php } ?>
    </div>
</div>