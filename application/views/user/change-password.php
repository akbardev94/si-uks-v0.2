<div class="container-fluid">
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('user'); ?>"><i class="fas fa-user"></i> User</a></li>
            <li class="breadcrumb-item active"><a href="<?= base_url('user/changePassword'); ?>" aria-current="page">Change Password</a></li>
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

                <?= $this->session->flashdata('massage'); ?>

                <?= form_open_multipart('user/changepassword'); ?>

                <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <input type="password" class="form-control" id="current_password" name="current_password">
                    <!-- error message -->
                    <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" class="form-control" id="new_password" name="new_password">
                    <!-- error message -->
                    <?= form_error('new_password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input autocomplete="off" name="confirm_password" type="password" class="form-control" id="confirm_password">
                    <!-- error message -->
                    <?= form_error('confirm_password', '<small class="text-danger pl-2 pt-1">', '</small>'); ?>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
</div>