<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $this->fetch("title")?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?= $this->Html->css([
      "/plugins/fontawesome-free/css/all.min.css",
      "/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css",
      "/plugins/icheck-bootstrap/icheck-bootstrap.min.css",
      "/plugins/jqvmap/jqvmap.min.css",
      "/dist/css/adminlte.min.css",
      "/plugins/overlayScrollbars/css/OverlayScrollbars.min.css",
      // "jquery.toolbars.css",
      //"/plugins/daterangepicker/daterangepicker.css",
      //"/plugins/summernote/summernote-bs4.css",
  ]);?>

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <?=
    $this->fetch("TopStyleLinks")
  ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?= $this->element("top-nav")?>
    <?= $this->element("left-sidebar")?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <?= $this->fetch("content")?>
      
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; <?= date("Y")?>.</strong>
    All rights reserved by Kim Phong.
  </footer>
</div>
<!-- ./wrapper -->
<div class="pickmeup pmu-view-days pmu-hidden" id="show-table"><div class="pmu-instance"><nav><div class="pmu-prev pmu-button" style="visibility: visible;">◀</div><div class="pmu-month pmu-button">August, 2020</div><div class="pmu-next pmu-button" style="visibility: visible;">▶</div></nav><nav class="pmu-day-of-week"><div>Mo</div><div>Tu</div><div>We</div><div>Th</div><div>Fr</div><div>Sa</div><div>Su</div></nav><div class="pmu-years"><div class="pmu-button">2014</div><div class="pmu-button">2015</div><div class="pmu-button">2016</div><div class="pmu-button">2017</div><div class="pmu-button">2018</div><div class="pmu-button">2019</div><div class="pmu-selected pmu-button">2020</div><div class="pmu-button">2021</div><div class="pmu-button">2022</div><div class="pmu-button">2023</div><div class="pmu-button">2024</div><div class="pmu-button">2025</div></div><div class="pmu-months"><div class="pmu-button">Jan</div><div class="pmu-button">Feb</div><div class="pmu-button">Mar</div><div class="pmu-button">Apr</div><div class="pmu-button">May</div><div class="pmu-button">Jun</div><div class="pmu-button">Jul</div><div class="pmu-selected pmu-button">Aug</div><div class="pmu-button">Sep</div><div class="pmu-button">Oct</div><div class="pmu-button">Nov</div><div class="pmu-button">Dec</div></div><div class="pmu-days"><div class="pmu-not-in-month pmu-button">27</div><div class="pmu-not-in-month pmu-button">28</div><div class="pmu-not-in-month pmu-button">29</div><div class="pmu-not-in-month pmu-button">30</div><div class="pmu-not-in-month pmu-button">31</div><div class="pmu-saturday pmu-button">1</div><div class="pmu-sunday pmu-button">2</div><div class="pmu-button">3</div><div class="pmu-button">4</div><div class="pmu-button">5</div><div class="pmu-button">6</div><div class="pmu-button">7</div><div class="pmu-saturday pmu-button">8</div><div class="pmu-sunday pmu-button">9</div><div class="pmu-button">10</div><div class="pmu-selected pmu-today pmu-button">11</div><div class="pmu-button">12</div><div class="pmu-button">13</div><div class="pmu-button">14</div><div class="pmu-saturday pmu-button">15</div><div class="pmu-sunday pmu-button">16</div><div class="pmu-button">17</div><div class="pmu-button">18</div><div class="pmu-button">19</div><div class="pmu-button">20</div><div class="pmu-button">21</div><div class="pmu-saturday pmu-button">22</div><div class="pmu-sunday pmu-button">23</div><div class="pmu-button">24</div><div class="pmu-button">25</div><div class="pmu-button">26</div><div class="pmu-button">27</div><div class="pmu-button">28</div><div class="pmu-saturday pmu-button">29</div><div class="pmu-sunday pmu-button">30</div><div class="pmu-button">31</div><div class="pmu-not-in-month pmu-button">1</div><div class="pmu-not-in-month pmu-button">2</div><div class="pmu-not-in-month pmu-button">3</div><div class="pmu-not-in-month pmu-button">4</div><div class="pmu-not-in-month pmu-saturday pmu-button">5</div><div class="pmu-not-in-month pmu-sunday pmu-button">6</div></div></div></div>

<?=
    $this->Html->script([
        "/plugins/jquery/jquery.min.js",
        "/plugins/jquery-ui/jquery-ui.min.js",
        "/plugins/bootstrap/js/bootstrap.bundle.min.js",
        //"/plugins/chart.js/Chart.min.js",
        //"/plugins/sparklines/sparkline.js",
        //"/plugins/jqvmap/jquery.vmap.min.js",
        //"/plugins/jqvmap/maps/jquery.vmap.usa.js",
        //"/plugins/jquery-knob/jquery.knob.min.js",
        //"/plugins/moment/moment.min.js",
        //"/plugins/daterangepicker/daterangepicker.js",
        // "/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js",
        "/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js",
        //"/plugins/summernote/summernote-bs4.min.js",
        "/dist/js/adminlte.js",
        "/dist/js/pages/dashboard.js",
        //"/dist/js/demo.js",
        // "/js/jquery.toolbar.js",
        // "jquery.toolbar.min.js",
    ]);
?>
<?=
  $this->fetch("bottomScriptLinks")
?>
<?=
  $this->fetch("scipt")
?>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- <script>
  $.widget.bridge('uibutton', $.ui.button)
</script> -->
</body>
</html>
