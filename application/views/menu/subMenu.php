<div class="container-fluid">
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('menu'); ?>"><i class="fas  fa-swatchbook"></i> Menu</a></li>
            <li class="breadcrumb-item active"><a href="<?= base_url('menu/subMenu'); ?>" aria-current="page">Submenu Management</a></li>
        </ol>
    </nav>

    <!-- Page Heading -->
    <div class="card-header bg-info mb-4 rounded">
        <h1 class="h2 text-white font-weight-bolder text-center"><?= $title; ?></h1>
    </div>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg">
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= validation_errors(); ?>
                    </div>
                <?php endif; ?>
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('massage'); ?>"></div>
                <a href="" class="btn btn-primary mb-3 submenu-add" data-toggle="modal" data-target="#newSubmenuModal">Add New Submenu</a>
                <table class="table table-responsive" cellspacing="1" style="width:100%;">
                    <thead>
                        <tr style="text-align:center">
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Menu</th>
                            <th scope="col">Url</th>
                            <th scope="col">Icon</th>
                            <th scope="col">Active</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($subMenu as $sm) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $sm['title']; ?></td>
                                <td><?= $sm['menu']; ?></td>
                                <td><?= $sm['url']; ?></td>
                                <td><?= $sm['icon']; ?></td>
                                <td align="center"><?php if ($sm['is_active'] == 1) { ?></>
                                        <p class="badge badge-warning">Active</p>
                                    <?php } else { ?>
                                        <p class="badge badge-danger">Not Active</p>
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="" data-id="<?= $sm['id']; ?>" class="badge badge-success submenu-edit" data-toggle="modal" data-target="#editSubmenuModal">Edit</a>
                                    <a href="<?= base_url('menu/delete/submenu/') . $sm['id']; ?>" class="badge badge-danger confirm-delete">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>


<!-- MODAL -->

<div class="modal fade" id="newSubmenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubmenuModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header submenu-header">
                <h5 class="modal-title submenu-title" id="submenu-title">Add New Submenu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="submenu-form" action="<?= base_url('menu/submenu'); ?>" method="post">
                <div class="modal-body submenu-body">

                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title">
                    </div>

                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Select Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url"></div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon"></div>

                    <div class-="form-group">
                        <div class="form-check">
                            <input class="form-check-input is_active" type="checkbox" value="1" name="is_active" id="is_active">
                            <label class="form-check-label" for="is_active">
                                Active?
                            </label>
                        </div>
                    </div>

                </div>

                <div class="modal-footer submenu-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </form>
        </div>

    </div>
</div>
</div>

<div class="modal fade" id="editSubmenuModal" tabindex="-1" role="dialog" aria-labelledby="editSubmenuModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header submenu-header">
                <h5 class="modal-title submenu-title" id="submenu-title">Add New Submenu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="submenu-form" action="<?= base_url('menu/editSubMenu'); ?>" method="post">
                <div class="modal-body submenu-body">
                    <input class="submenu-input" type="hidden" value="" name="id">

                    <div class="form-group">
                        <input type="text" class="form-control titles" id="titles" name="title" placeholder="Submenu title">
                    </div>

                    <div class="form-group">
                        <select name="menu_id" id="menu_ids" class="form-control menus">
                            <option value="">Select Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control urls" id="urls" name="url" placeholder="Submenu url"></div>

                    <div class="form-group">
                        <input type="text" class="form-control icons" id="icons" name="icon" placeholder="Submenu icon"></div>

                    <div class-="form-group">
                        <div class="form-check">
                            <input class="form-check-input is_actives" type="checkbox" value="1" id="is_actives" name="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Active?
                            </label>
                        </div>
                    </div>

                </div>
                <div class="modal-footer submenu-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </form>
        </div>

    </div>
</div>
</div>