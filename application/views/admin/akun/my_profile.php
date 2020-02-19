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
                            <li><a href="#">Content</a></li>
                            <li class="active">Berita</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title mb-3">My Profile</strong>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    <img class="rounded-circle mx-auto d-block" src="<?= base_url('assets/img/').$this->session->userdata('foto')?>" style="width: 30%;">
                                    <h5 class="text-sm-center mt-2 mb-1"><?= $this->session->userdata('nama')?></h5>
                                    <div class="location text-sm-center"><i class="ti-user"></i> <?= $this->session->userdata('level')?></div>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>