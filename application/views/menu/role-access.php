<div class="container-fluid">
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('menu/role'); ?>"><i class="fas  fa-swatchbook"></i> Role</a></li>
            <li class="breadcrumb-item active"><a href="#" aria-current="page">Role Access</a></li>
        </ol>
    </nav>

    <!-- Page Heading -->
    <div class="card-header bg-info mb-4 rounded">
        <h1 class="h2 text-white font-weight-bolder text-center"><?= $title; ?></h1>
    </div>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-6">

                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('massage'); ?>"></div>

                <h5 class="mb-3">Role : <?= $role['role']; ?></h5>

                <table class="table table-hover">
                    <thead>
                        <tr style="text-align:center">
                            <th scope="col">#</th>
                            <th scope="col">Menu</th>
                            <th scope="col">Access</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($menu as $m) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $m['menu']; ?></td>
                                <td>
                                    <div class="form-check">
                                        <input data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>" type="checkbox" class="form-check-input check-access" <?= check_access($role['id'], $m['id']); ?>>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>



            </div>
        </div>
        <a class="ml-2" href="<?= base_url('menu/role'); ?>">&laquo Back</a>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->