<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <title>Gamaci Polindra</title>
    <link rel="shortcut icon" href="<?= base_url('assets/img/gamaci.jpg')?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/jquery-ui.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/sufee/css/lib/datatable/dataTables.bootstrap.min.css')?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('asset/lib/animate/animate.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('asset/lib/ionicons/css/ionicons.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('asset/lib/owlcarousel/assets/owl.carousel.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('asset/lib/lightbox/css/lightbox.min.css')?>" rel="stylesheet">
</head>
<body>

	<?php $this->load->view('user/header') ?>
	<br><br><br><br>
    <?php $this->load->view($cont) ?>
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
	<?php $this->load->view('user/footer') ?>
    <script src="<?= base_url('assets/js/bootstrap.js')?>"></script>
    <script src="<?= base_url('assets/js/jquery.js')?>"></script>
    <script src="<?= base_url('assets/js/jquery-ui.js')?>"></script>
    <script src="<?= base_url('assets/js/main.js')?>"></script>
    <script src="<?= base_url('assets/sufee/js/lib/data-table/datatables.min.js')?>"></script>
    <script src="<?= base_url('assets/sufee/js/lib/data-table/dataTables.bootstrap.min.js')?>"></script>
    <script src="<?= base_url('assets/sufee/js/lib/data-table/dataTables.buttons.min.js')?>"></script>
    <script src="<?= base_url('assets/sufee/js/lib/data-table/buttons.bootstrap.min.js')?>"></script>
    <script src="<?= base_url('assets/sufee/js/lib/data-table/jszip.min.js')?>"></script>
    <script src="<?= base_url('assets/sufee/js/lib/data-table/pdfmake.min.js')?>"></script>
    <script src="<?= base_url('assets/sufee/js/lib/data-table/vfs_fonts.js')?>"></script>
    <script src="<?= base_url('assets/sufee/js/lib/data-table/buttons.html5.min.js')?>"></script>
    <script src="<?= base_url('assets/sufee/js/lib/data-table/buttons.print.min.js')?>"></script>
    <script src="<?= base_url('assets/sufee/js/lib/data-table/buttons.colVis.min.js')?>"></script>
    <script src="<?= base_url('assets/sufee/js/lib/data-table/datatables-init.js')?>"></script> 
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <!-- Uncomment below i you want to use a preloader -->
    <!-- <div id="preloader"></div> -->

    <!-- JavaScript Libraries -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table').DataTable();
        });
    </script>
</body>
</html>