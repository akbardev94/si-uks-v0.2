<head>
    <!-- highchart -->
    <script src="<?= base_url(); ?>assets/js/highchart/highcharts.js"></script>
    <script src="<?= base_url(); ?>assets/js/highchart/exporting.js"></script>
    <script src="<?= base_url(); ?>assets/js/highchart/export-data.js"></script>
    <script src="<?= base_url(); ?>assets/js/highchart/accessibility.js"></script>
</head>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i> Admin</a></li>
            <li class="breadcrumb-item active"><a href="#" aria-current="page">Dashboard</a></li>
        </ol>
    </nav>

    <!-- Page Heading -->
    <div class="card-header bg-info mb-4 rounded">
        <h1 class="h2 text-white font-weight-bolder text-center"><?= $title; ?></h1>
    </div>
    <?= $this->session->flashdata('massage'); ?>
    <div class="card-body bg-gradient-warning  mb-3 col-xl-12">
        <div class="row">
            <div class="col-lg-3 d-none d-lg-block">
                <img src="assets/img/logo1.png" width="160px" height="160px" alt="UKS" class="ml-4 img-responsive"></div>
            <div class="col-lg-7">
                <h1 class="display-8 text-center font-weight-bold text-success">USAHA KESEHATAN SEKOLAH</h1>
                <h1 class="display-8 text-center font-weight-bold text-danger">INDO<span class="text-white">NESIA<span></h1>
                <h1 class="display-6 text-center font-weight-bold">SEHAT & KUAT</h1>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Jumlah Petugas -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah User</div>
                            <div class="h5 mb-0 font-weight-bold"><?= $users; ?> Orang</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-plus fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jenis Obat -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jenis Obat</div>
                            <div class="h5 mb-0 font-weight-bold"><?= $jenis_obat ?> Jenis</div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('data/manageobat'); ?>" class="fas fa-pills fa-2x"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jumlah Obat -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Obat</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold">30 %</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('data/manageobat'); ?>" class="fas fa-prescription-bottle-alt fa-2x"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jumlah Siswa -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Siswa</div>
                            <div class="h5 mb-0 font-weight-bold"><?= $siswa ?> Siswa</div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('data/datasiswa'); ?>" class="fas fa-users fa-2x"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Guru & Karyawan</div>
                            <div class="h5 mb-0 font-weight-bold"><?= $gukar; ?> Orang</div>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('data/datagukar'); ?>" class="fas fa-users fa-2x"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <figure class="highcharts-figure">
        <div id="container"></div>
        <p class="highcharts-description">
            <script>
                Highcharts.chart('container', {

                    title: {
                        text: 'Grafik Kunjungan Siswa Ke UKS'
                    },

                    xAxis: {
                        categories: [
                            'Jan',
                            'Feb',
                            'Mar',
                            'Apr',
                            'May',
                            'Jun',
                            'Jul',
                            'Aug',
                            'Sep',
                            'Oct',
                            'Nov',
                            'Dec'
                        ]
                    },

                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Jumlah Siswa'
                        }
                    },
                    series: [{
                        data: [20, 50, 10, 30, 40, 20, 32, 44, 53, 47, 60, 30],
                        pointStart: 0
                    }]
                });
            </script>
        </p>
    </figure>
</div>
</div>