<div class="col-md-4">
	<div class="panel" >
		<div class="panel-body" style="padding-bottom:0px ">
			<p class="text-center" style="font-size: 120%;">Berita Terbaru</p>
		</div>
	</div>
	<?php 
        $b = $this->m_admin->get_data('id_berita','tb_berita');
     ?>
	<?php $i = 1; ?>
	<?php foreach ($b as $key => $row) { ?>
		<div class="panel panel-default">
          <img src="<?= base_url('assets/img/berita/').$row->foto?>" width="100%" alt="<?= $row->foto;?>">
          <div class="panel-body">                            
            <h3><?= $row->judul;?></h3>
			<p><?= word_limiter($row->berita, 4)?></p>
			<p><small class="text-muted"><?= $row->tanggal;?></small></p>
			<a href="<?= base_url('portal/detailBerita/').$row->slug;?>">Baca Selengkapnya</a>
          </div>
        </div>
	<?php $i++; ?>
    <?php } ?>
<!--1-->
	</div>