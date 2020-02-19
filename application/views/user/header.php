<header id="header">
    <div class="container-fluid">
        <div id="logo" class="pull-left">
            <h1><a href="#intro" class="scrollto">Gamaci</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#intro"><img src="img/logo.png" alt="" title="" /></a>-->
        </div> 
        <nav id="nav-menu-container">
        <ul class="nav-menu">
            <li class="menu-active"><a href="<?= base_url('user')?>">Beranda</a></li>
            <li class="menu"><a href="<?= base_url('user/berita')?>">Berita</a></li>
            <li class="menu-has-children"><a href="#">Profil</a>
                <ul>
                    <li><a href="">Sejarah</a></li>
                    <li><a href="">Struktur Organisasi</a></li>
                    <li><a href="">Tujuan</a></li>
                </ul>
            </li>
            <li class="menu-has-children"><a href="#">Data</a>
                <ul>
                    <li><a href="<?= base_url('user/mahasiswa')?>">Data Mahasiswa</a></li>
                    <li><a href="<?= base_url('user/pengurus')?>">Data Pengurus</a></li>
                </ul>
            </li>
            <li class="menu"><a href="<?= base_url('user/galeri')?>">Galeri</a></li>
            <li class="menu-has-children"><a href="<?= base_url('login')?>">Login</a></li>
        </ul>
        </nav><!-- #nav-menu-container -->
    </div>
</header><!-- #header -->

<section id="intro">
    <div class="intro-container">
        <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators"></ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
            <div class="carousel-background"><img src="<?= base_url('assets/img/Trusmi.jpg')?>" width="100%"></div>
            <div class="carousel-container">
                <div class="carousel-content">
                <h2>Gamaci Polindra</h2>
                <a href="#featured-services" class="btn-get-started scrollto">Get Started</a>
                </div>
            </div>
            </div>
            <div class="carousel-item">
            <div class="carousel-background"><img src="assets/image/trusmi.jpg"></div>
            <div class="carousel-container">
                <div class="carousel-content">
                <h2>At vero eos et accusamus</h2>
                <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut.</p>
                <a href="#featured-services" class="btn-get-started scrollto">Get Started</a>
                </div>
            </div>
            </div>
            <div class="carousel-item">
            <div class="carousel-background"><img src="assets/image/trusmi.jpg"></div>
            <div class="carousel-container">
                <div class="carousel-content">
                <h2>Temporibus autem quibusdam</h2>
                <p>Beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt omnis iste natus error sit voluptatem accusantium.</p>
                <a href="#featured-services" class="btn-get-started scrollto">Get Started</a>
                </div>
            </div>
            </div>
            <div class="carousel-item">
            <div class="carousel-background"><img src="assets/image/trusmi.jpg"></div>
            <div class="carousel-container">
                <div class="carousel-content">
                <h2>Nam libero tempore</h2>
                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum.</p>
                <a href="#featured-services" class="btn-get-started scrollto">Get Started</a>
                </div>
            </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
    </div>
</section><!-- #intro -->