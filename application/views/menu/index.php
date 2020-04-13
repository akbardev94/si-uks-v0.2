<div class="container-fluid">
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('menu'); ?>"><i class="fas  fa-swatchbook"></i> Menu</a></li>
            <li class="breadcrumb-item active"><a href="<?= base_url('menu/index'); ?>" aria-current="page">Menu Management</a></li>
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

                <a href="" class="btn btn-primary mb-3 menu-add" data-toggle="modal" data-target="#newMenuModal">Add New Menu</a>
                <table class="table table-responsive" class="border" cellspacing="1" style="width:100%;">
                    <thead>
                        <tr style="text-align:center">
                            <th scope="col">#</th>
                            <th scope="col">Menu</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($menu as $m) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $m['menu']; ?></td>
                                <td>
                                    <a href="" data-id="<?= $m['id']; ?>" class="badge badge-success menu-edit" data-toggle="modal" data-target="#editMenuModal">Edit</a>
                                    <a href="<?= base_url('menu/delete/menu/') . $m['id']; ?>" class="badge badge-danger confirm-delete">Delete</a>
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
</div>

<!-- MODAL -->

<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header menu-header">
                <h5 class="modal-title menu-title" id="menu-title">Add new menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="menu-form" action="<?= base_url('menu/index'); ?>" method="post">
                <!-- hidden id -->
                <input type="hidden" name="id" class="id">
                <div class="modal-body menu-body">
                    <input class="form-control menu-input" type="text" id="menu" name="menu" placeholder="Menu name">
                </div>
                <div class="modal-footer menu-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editMenuModal" tabindex="-1" role="dialog" aria-labelledby="editMenuModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header menu-header">
                <h5 class="modal-title menu-title" id="menu-title">Add new menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="menu-form" action="<?= base_url('menu/editMenu'); ?>" method="post">
                <!-- hidden id -->
                <input class="menu-input" type="hidden" value="" name="id">
                <div class="modal-body menu-body">
                    <input class="form-control menus" type="text" id="menus" name="menu" placeholder="Menu name">
                </div>
                <div class="modal-footer menu-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>