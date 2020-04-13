<div class="container-fluid">
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('menu'); ?>"><i class="fas  fa-swatchbook"></i> Menu</a></li>
            <li class="breadcrumb-item active"><a href="<?= base_url('menu/role'); ?>" aria-current="page">Role</a></li>
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

                <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('massage'); ?>"></div>

                <a href="" class="btn btn-primary mb-3 role-add" data-toggle="modal" data-target="#newRoleModal">Add New Role</a>
                <table class="table table-responsive" cellspacing="1" style="width:100%;">
                    <thead>
                        <tr style="text-align:center">
                            <th scope="col">#</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($role as $r) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $r['role']; ?></td>
                                <td>
                                    <a href="<?= base_url('menu/roleaccess/') . $r['id']; ?>" class="badge badge-warning">Access</a>
                                    <a href="" data-id="<?= $r['id']; ?>" class="badge badge-success role-edit" data-toggle="modal" data-target="#newEditModal">Edit</a>
                                    <a href="<?= base_url('menu/del/') . $r['id']; ?>" class="badge badge-danger confirm-delete">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- MODAL -->

<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title role-title" id="role-title">Add New Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/role'); ?>" method="post">
                <!-- hidden id -->
                <input class="hidden" type="hidden" value="" name="id">
                <div class="modal-body role-body">
                    <div class="form-group">
                        <input type="text" class="form-control role" id="role" name="role" placeholder="Role name">
                    </div>
                </div>
                <div class="modal-footer role-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="newEditModal" tabindex="-1" role="dialog" aria-labelledby="newEditModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title role-title" id="role-titles">Edit Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/edit'); ?>" method="post">
                <!-- hidden id -->
                <input class="role-input" type="hidden" value="" name="id">
                <div class="modal-body role-body">
                    <div class="form-group">
                        <input type="text" class="form-control roles" id="roles" name="role" placeholder="Role name">
                    </div>
                </div>
                <div class="modal-footer role-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>