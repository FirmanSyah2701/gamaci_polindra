<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=$title;?></title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">    

    <link rel="stylesheet" href="<?= base_url('assets/sufee/css/normalize.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/sufee/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/sufee/css/font-awesome.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/sufee/css/themify-icons.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/sufee/css/flag-icon.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/sufee/css/cs-skin-elastic.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/sufee/css/lib/datatable/dataTables.bootstrap.min.css')?>">
    <!-- <link rel="stylesheet" href="<?= base_url('assets/sufee/css/bootstrap-select.less')?>"> -->
    <link rel="stylesheet" href="<?= base_url('assets/sufee/scss/style.css')?>">
    <link href="<?= base_url('assets/sufee/css/lib/vector-map/jqvmap.min.css" rel="stylesheet')?>">
    <link href="<?= base_url('assets/zebra/css/bootstrap/zebra_datepicker.css')?>" rel="stylesheet" />
    <link href="<?= base_url('assets/fancybox/jquery.fancybox.css')?>" rel="stylesheet" />
    <link href="<?= base_url('assets/sufee/css/hover.css')?>" rel="stylesheet" />
    <link href="<?= base_url('assets/css/sweetalert2.min.css')?>" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <style>
      .table .thead-primary th {
        color: #fff;
        background-color: #6495ED;
        border-color: #6495ED; }
    </style>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
    <?php $this->load->view('admin/left-panel') ?>
    <div id="right-panel" class="right-panel">
        <?php $this->load->view('admin/right-panel') ?>
        <?php $this->load->view($cont) ?>        
    </div><!-- /#right-panel -->    

    <script src="<?= base_url('assets/sufee/js/vendor/jquery-2.1.4.min.js')?>"></script>
    <script src="<?= base_url('assets/sufee/js/popper.min.js')?>"></script>
    <script src="<?= base_url('assets/sufee/js/plugins.js')?>"></script>
    <script src="<?= base_url('assets/sufee/js/main.js')?>"></script>
    <script src="<?= base_url('assets/sufee/js/lib/chart-js/Chart.bundle.js')?>"></script>
    <script src="<?= base_url('assets/sufee/js/dashboard.js')?>"></script>
    <script src="<?= base_url('assets/sufee/js/widgets.js')?>"></script>
    <script src="<?= base_url('assets/sufee/js/lib/vector-map/jquery.vmap.js')?>"></script>
    <script src="<?= base_url('assets/sufee/js/lib/vector-map/jquery.vmap.min.js')?>"></script>
    <script src="<?= base_url('assets/sufee/js/lib/vector-map/jquery.vmap.sampledata.js')?>"></script>
    <script src="<?= base_url('assets/sufee/js/lib/vector-map/country/jquery.vmap.world.js')?>"></script>
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
    <script src="<?= base_url('assets/zebra/zebra_datepicker.js')?>"></script>    
    <script src="<?= base_url('assets/fancybox/jquery.fancybox.js')?>"></script> 
    <script src="<?= base_url('assets/js/sweetalert2.min.js')?>"></script> 
    <script src="<?= base_url('assets/js/jquery.js')?>"></script>
    <script type="text/javascript">
      $(function() {
        //    fancybox
          jQuery(".fancybox").fancybox();
      });

    </script>

    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );
    </script>

    <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } );
    </script>    
    <script>
    $('#datepicker-example1').Zebra_DatePicker({
      format: 'M d, Y'
    });
  </script>
  
</body>
</html>
