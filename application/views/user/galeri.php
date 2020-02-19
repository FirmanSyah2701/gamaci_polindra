<div class="container">
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('')?>">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page">Galeri</li>
        </ol>
    </nav>
    <div class="rows">
    <?php $no = $offset; foreach ($galeri as $row){ ?>
            <div class="col-md-8">
            <div class="panel panel-default">
              <img src="<?= base_url('assets/img/galeri/').$row->foto?>" width="100%" alt="<?= $row->foto;?>">
              <div class="panel-body">                            
                <p><?= $row->deskripsi;?></p>
                <p><small class="text-muted"><?= $row->tanggal;?></small></p>
              </div>
            </div>
        </div>
    <?php } ?>
      <nav aria-label="Page navigation">
          <?php echo $this->pagination->create_links(); ?>
      </nav>
    </div> 
    </div>
</div>