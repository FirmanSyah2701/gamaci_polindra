<div class="container">
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('')?>">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page">Berita</li>
        </ol>
    </nav>
    <div class="rows">
    <?php $no = $offset; foreach ($berita as $row){ ?>
    <div class="col-md-4">
            <div class="panel panel-default">
              <img src="<?= base_url('assets/img/berita/').$row->foto?>" width="100%" alt="<?= $row->foto;?>">
              <div class="panel-body">                            
                <h3><?= $row->judul;?></h3>
				<p><?= word_limiter($row->berita, 4)?></p>
				<p><small class="text-muted"><?= $row->tanggal;?></small></p>
				<a href="<?= base_url('user/detailBerita/').$row->slug;?>">Baca Selengkapnya</a>
              </div>
        </div>
        </div>
    <?php } ?>
    <nav aria-label="Page navigation">
          <?php echo $this->pagination->create_links(); ?>
      </nav>
    </div>
</div>