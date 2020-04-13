<div class="container-fluid">
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('user'); ?>"><i class="fas fa-user"></i> User</a></li>
            <li class="breadcrumb-item active"><a href="<?= base_url('user/index'); ?>" aria-current="page">Profile</a></li>
        </ol>
    </nav>

    <!-- Page Heading -->
    <div class="card-header bg-info mb-4 rounded">
        <h1 class="h2 text-white font-weight-bolder text-center"><?= $title; ?></h1>
    </div>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <?= $this->session->flashdata('massage'); ?>
            </div>
        </div>
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?= $user['username']; ?></h5>
                        <p class="card-text"><?= $user['email']; ?></p>
                        <p class="card-text"><small class="text-muted">Member Since <?= date('d F Y', $user['date_created']); ?></small></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3 border-bottom-success" style="max-width: 540px;">
            <div class="no-gutters">
                <div class="col-md-13">
                    <div class="card-body">
                        <?= form_open_multipart('user/edit'); ?>
                        <h5 class="card-title text-center font-weight-bold bg-success text-light">Identitas</h5>
                        <p class="card-text">Nama Lengkap &nbsp;&nbsp;&nbsp;: <?= $user['nama_lengkap']; ?></p>
                        <p class="card-text">Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $user['alamat']; ?></p>
                        <p class="card-text">Kelas &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<?= $user['kelas']; ?></p>
                        <p class="card-text">No. HP/Telepon &nbsp;: <?= $user['phone']; ?></p>
                        <p class="card-text">Nama Bapak &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $user['namabapak']; ?></p>
                        <p class="card-text">Nama Ibu &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $user['namaibu']; ?></p>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
</div>
<!-- End of Main Content -->