<!DOCTYPE html>
<html>

<head>
    <title><?=$title;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
    <!-- CSS Libs -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/flat/css/bootstrap.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/flat/css/font-awesome.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/flat/css/animate.min.css')?>">
    <!-- CSS App -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/flat/themes/style.css')?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/flat/themes/flat-blue.css')?>">
</head>

<body class="flat-blue login-page" style="background: url(<?= base_url('assets/flat/img/app-header-bg.jpg')?>) no-repeat center center fixed;">
    <div class="container">
        <div class="login-box">
            <div>
                <div class="login-form row">
                    <div class="col-sm-12 text-center login-header">
                        <i class="login-logo fa fa-connectdevelop fa-5x"></i>
                        <h4 class="login-title">Halaman Login Admin</h4>
                    </div>
                    <div class="col-sm-12">
                        <?php if ($this->session->flashdata('Pesan') <> ''){
                            ?>
                          <div class="alert alert-danger" role="alert"><?php echo $this->session->flashdata('Pesan'); ?></div>   
                        <?php } ?>
                        <div class="login-body">
                            <div class="progress hidden" id="login-progress">
                                <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                    Log In...
                                </div>
                            </div>
                            <form action="<?= base_url('admin/login/aksi_login')?>" method="post">
                                <div class="control">
                                    <input type="text" name="nim" class="form-control" placeholder="Username..." required="" />
                                </div>
                                <div class="control">
                                    <input type="password" name="password" class="form-control" placeholder="Password..." required="" />
                                </div>
                                <div class="login-button text-center">
                                    <input type="submit" class="btn btn-primary" value="Login">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Javascript Libs -->
    <script type="text/javascript" src="<?= base_url('assets/flat/js/jquery.min.js')?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/flat/js/bootstrap.min.js')?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/flat/js/Chart.min.js')?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/flat/js/bootstrap-switch.min.js')?>"></script>
    
    <script type="text/javascript" src="<?= base_url('assets/flat/js/jquery.matchHeight-min.js')?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/flat/js/jquery.dataTables.min.js')?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/flat/js/dataTables.bootstrap.min.js')?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/flat/js/select2.full.min.js')?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/flat/js/ace/ace.js')?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/flat/js/ace/mode-html.js')?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/flat/js/ace/theme-github.js')?>"></script>
</body>

</html>
