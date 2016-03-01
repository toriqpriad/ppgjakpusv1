<body class=" theme-blue">
    <script src="../lib/bootstrap/js/bootstrap.js"></script>
        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="" href="index.php"><span class="navbar-brand">   SIM PPG Jakarta Pusat </span></a></div>
            <div class="navbar-collapse collapse" style="height: 1px;">
                <ul id="main-menu" class="nav navbar-nav navbar-right">
                    <li class="dropdown hidden-xs">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-user padding-right-small" style="position:relative;top: 3px;"></span> Super Administrator
                            <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="tentang_akun.php"><span class="fa fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Tentang Akun</a></li>
                            <li class="divider"></li>
                            <li><a href="proses-logout.php"><span class="fa fa-sign-out"></span>&nbsp;&nbsp;&nbsp;&nbsp;Logout</a></li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </div>
    <br><br>

    <?php
    require_once "../db/database.php";
    $adminget = "SELECT * FROM data_admin ";
    $queryadminget = mysql_query($adminget);
    $getadmin = mysql_fetch_object($queryadminget);
    ?>
    <div class="sidebar-nav">
        <br>
        <center><img src="img/<?= $getadmin->logo; ?>" class="img-responsive img-thumbnail" width="150"></center>
        <br>
        <ul>

            <li><a href="index.php" class="nav-header"><i class="fa fa-fw fa-dashboard"></i> Beranda</a></li>
            <li><a href="data-tpq.php" class="nav-header"><i class="fa fa-fw fa-home"></i> Data TPQ</a></li>

            <li><a href="#" data-target=".pengajar" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-bars"></i> Data Pengajar<i class="fa fa-collapse"></i></a></li>
            <li><ul class="pengajar nav nav-list collapse">
                    <li ><a href="data-pengajar.php?lihat-pengajar"><span class="fa fa-external-link"></span> Data Pengajar</a></li>
                </ul>
            </li>
            <li><a href="#" data-target=".caberawit" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-bars"></i> Data Caberawit<i class="fa fa-collapse"></i></a></li>
            <li><ul class="caberawit nav nav-list collapse">
                    <li ><a href="data-caberawit.php?lihat-caberawit"><span class="fa fa-external-link"></span> Data Caberawit</a></li>
                </ul>
            </li>
            <li><a href="#" data-target=".praremaja" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-bars"></i> Data Praremaja<i class="fa fa-collapse"></i></a></li>
            <li><ul class="praremaja nav nav-list collapse">
                    <li ><a href="data-praremaja.php?lihat-praremaja"><span class="fa fa-external-link"></span> Data Praremaja</a></li>
                </ul>
            </li>
            <li><a href="#" data-target=".remaja" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-bars"></i> Data Remaja<i class="fa fa-collapse"></i></a></li>
            <li><ul class="remaja nav nav-list collapse">
                    <li ><a href="data-remaja.php?lihat-remaja"><span class="fa fa-external-link"></span> Data Remaja</a></li>
                </ul>
            </li>
            <li><a href="#" data-target=".pgrs" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-bars"></i> Data Pengurus PPG<i class="fa fa-collapse"></i></a></li>
            <li><ul class="pgrs nav nav-list collapse">
                    <li ><a href="data-pgrs-ppg.php?lihat-pgrs"><span class="fa fa-external-link"></span> Data Pengurus</a></li>
                    <li ><a href="data-pgrshr-ppg.php?lihat-bidang"><span class="fa fa-external-link"></span> Data Pengurus Harian</a></li>
                    <li ><a href="data-bid-ppg.php?lihat-bidang"><span class="fa fa-external-link"></span> Data Bidang PPG</a></li>
                    <li ><a href="data-mswrh-ppg.php?lihat-msw"><span class="fa fa-external-link"></span> Data Hasil Musyawaroh</a></li>
                    <li ><a href="data-kgtn-ppg.php?lihat-kegiatan"><span class="fa fa-external-link"></span> Kegiatan PPG </a></li>
                </ul>
            </li>
            <li><a href="bantuan.html" class="nav-header"><i class="fa fa-fw fa-question-circle"></i> Bantuan</a></li>
            <li><a href="tentang_akun.php" class="nav-header"><i class="fa fa-fw fa-info"></i>Tentang Akun</a></li>
            <li><a href="proses-logout.php" class="nav-header"><i class="fa fa-sign-out"></i>Logout</a></li>


        </ul>
    </div>

    <div class="content">
        <div class="header">
            <div class="stats">
                <?php include 'script-dashboard.php'; ?>
                <p class="stat"><span class="label label-warning"><?php echo $countdatatpq; ?></span> TPQ</p>
                <p class="stat"><span class="label label-success"><?php echo $countdatapeng; ?></span> Pengajar</p>
                <p class="stat"><span class="label label-info"><?php echo $countdatacbr; ?></span> Caberawit</p>
                <p class="stat"><span class="label label-danger"><?php echo $countdatapraremaja; ?></span> Praremaja</p>
                <p class="stat"><span class="label label-default"><?php echo $countdataremaja; ?></span> Remaja</p>
            </div>
            <h1 class="page-title">PPG Jakarta Pusat</h1>
            <ul class="breadcrumb">
                <li><a href="index.php">Home</a> </li>
                <li class="active">Data TPQ</li>
            </ul>

        </div>