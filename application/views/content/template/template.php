<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="#">
  <link rel="icon" type="image/png" href="#">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    <?= $title ?>
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="<?=base_url()?>assets/css/googleapis-montserrat.css" rel="stylesheet" />
  <link href="<?=base_url()?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="<?=base_url()?>assets/paper/css/bootstrap.min.css" rel="stylesheet" />


  <link href="<?=base_url()?>assets/paper/css/paper-dashboard.css?v=2.0.0&&<?=rand()?>" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?=base_url()?>assets/paper/demo/demo.css?<?=rand()?>" rel="stylesheet" />
  <style type="text/css">
    .sub-menu{
      margin-left: 10%;
    }
  </style>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="#" hidden="">
          </div>
        </a>
        <a href="<?=base_url()?>" class="simple-text logo-normal">
          TMMIN Tooling
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="logo text-center">
        <a href="#" id="dummy" class="simple-text logo-normal">
          <i class="nc-icon nc-single-02"></i>
          <?=$this->session->userdata('u_nama')?> | <i class="btn btn-danger nc-icon nc-button-power" id="logout"></i>
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="<?=$nav[0]?>">
            <a href="<?=base_url('dashboard')?>">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="<?=$nav[1]?>">
            <a href="#" aria-expanded="true">
              <i class="nc-icon nc-settings"></i>
              <p>Lemari
              </p>
            </a>
            <div class="collapse show" id="componentsExamples" aria-expanded="true">
              <ul class="nav">
                <?php foreach ($list_lemari as $all) { ?>
                  <li class="sub-menu">
                    <a href="<?=base_url('lemari/'.$all->b_id)?>">
                      <i class="nc-icon nc-settings"></i>
                      <p><?=$all->b_nama?></p>
                    </a>
                  </li>
                <?php } ?>             
              </ul>
            </div>
          </li>

          <?php if($this->session->userdata('u_username') == 'admin'){?>
          <li class="<?=$nav[2]?>">
            <a href="<?=base_url('users')?>">
              <i class="nc-icon nc-circle-10"></i>
              <p>User Management</p>
            </a>
          </li>
          <?php }?>

          <li class="active-pro hidden">
          </li>
          
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent" style="position: fixed; background-color: #f4f3ef !important">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo"><?= $title ?></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" style="display: none">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end hidden" id="navigation" style="display: none !important">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link btn-magnify" href="#pablo">
                  <i class="nc-icon nc-layout-11"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-bell-55"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link btn-rotate" href="#pablo">
                  <i class="nc-icon nc-settings-gear-65"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <!-- <div class="panel-header panel-header-lg">
  
  <canvas id="bigDashboardChart"></canvas>
  
  
</div> -->
    <div class="content">
      <?php echo $_content; ?>
    </div>

      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">            
            <a href="http://daiichimandiri.com" style="color: black">              
              <img src="<?=base_url('assets/img/logo.png?'.rand())?>" height="30" style="display= inline-block">
              PT. Daiichi Mandiri
            </a>
            </nav>
            <div class="credits ml-auto" style="margin-top: 5px">
              <span class="copyright">
                © Template by Creative Tim
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="<?=base_url()?>assets/paper/js/core/popper.min.js"></script>
  <script src="<?=base_url()?>assets/paper/js/core/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/paper/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Chart JS -->
  <script src="<?=base_url()?>assets/paper/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?=base_url()?>assets/paper/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?=base_url()?>assets/paper/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?=base_url()?>assets/paper/demo/demo.js"></script>
  <script type="text/javascript">
    $('#logout').click(function(event) {
      window.location.replace('<?=base_url("logout")?>');
    });
    $('#dummy').click(function(event) {
      event.preventDefault();
    });
  </script>
</body>

</html>