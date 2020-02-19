<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <?php if ($this->session->userdata("level")=='Admin'){ ?>
            <a class="navbar-brand" href="<?= base_url('admin/dashboard')?>">Admin</a>
            <?php } else { ?>
            <a class="navbar-brand" href="<?= base_url('admin/dashboard')?>">Super Admin</a>
            <?php } ?>
            <a class="navbar-brand hidden" href="./">A</a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li <?php if (@$menu == "Dashboard") {echo "class='active' "; } ?>>
                    <a href="<?= base_url('admin/dashboard')?>"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>
                <li class="menu-item-has-children dropdown <?php if (@$menu == "Manage") {echo "active"; }?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Manage</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-table"></i><a href="<?= base_url('admin/manage/pengurus')?>">Data Pengurus</a></li>
                        <li><i class="fa fa-table"></i><a href="<?= base_url('admin/manage/mahasiswa')?>">Data Mahasiswa</a></li>
                        <?php if ($this->session->userdata("level")=='SuperAdmin'){ ?>
                        <li><i class="fa fa-table"></i><a href="<?= base_url('admin/manage/calon')?>">Data Calon Ketua</a></li>
                        <li><i class="fa fa-table"></i><a href="<?= base_url('admin/manage/proker')?>">Proker</a></li>
                        <?php } ?>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown <?php if (@$menu == "Content") {echo "active"; }?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Content</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-id-badge"></i><a href="<?= base_url('admin/content/berita')?>">Berita</a></li>
                        <?php if ($this->session->userdata("level")=='SuperAdmin'){ ?>
                        <li><i class="fa fa-bars"></i><a href="<?= base_url('admin/content/struktur')?>">Struktur</a></li>                  
                        <?php } ?>
                        <li><i class="fa fa-id-card-o"></i><a href="<?= base_url('admin/content/gallery')?>">Galeri</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown <?php if (@$menu == "Setting") {echo "active"; }?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Setting</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-card"></i><a href="<?= base_url('admin/setting/sosmed')?>">Sosial Media</a></li>
                        <?php if ($this->session->userdata("level")=='Admin'){ ?>
                        <li><i class="fa fa-card"></i><a href="<?= base_url('admin/setting/user')?>">Akun Mahasiswa</a></li>
                        <?php } else { ?>
                            <li><i class="fa fa-card"></i><a href="<?= base_url('admin/setting/akunAdmin')?>">Akun Admin</a></li>
                        <?php } ?>
                    </ul>
                </li>                 
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->    