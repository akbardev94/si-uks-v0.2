<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('menu'); ?>"><i class="fas  fa-swatchbook"></i> Menu</a></li>
            <li class="breadcrumb-item active"><a href="<?= base_url('menu/settinguser'); ?>" aria-current="page">Setting User</a></li>
        </ol>
    </nav>

    <!-- Page Heading -->
    <div class="card-header bg-info mb-4 rounded">
        <h1 class="h2 text-white font-weight-bolder text-center"><?= $title; ?></h1>
    </div>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
        <?php endif; ?>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('massage'); ?>"></div>
        <a href="" onclick="return saranaAdd('')" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newUserModal">Tambah User</a>
        <table class="table table-responsive" id="dataTable" cellspacing="1" style="width:100%;">
            <thead>
                <tr style="text-align:center">
                    <th>No.</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th style="width: 5%;">Password</th>
                    <th>Role Id</th>
                    <th>Active</th>
                    <th>Last Login</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($settinguser as $su) : ?>
                    <tr>
                        <td scope="row"><?= $i++; ?></td>
                        <td><?= $su['username'] ?></td>
                        <td><?= $su['email'] ?></td>
                        <td><?= $su['password'] ?></td>
                        <td><?= $su['role_id'] ?></td>
                        <td align="center"><?php if ($su['is_active'] == 1) { ?></>
                                <p class="badge badge-warning">Active</p>
                            <?php } else { ?>
                                <p class="badge badge-danger">Not Active</p>
                            <?php } ?>
                        </td>
                        <td><?= $su['last_login'] ?></td>
                        <td>
                            <a href="" onclick="return userEdit(<?= $su['id']; ?>)" data-id="<?= $su['id']; ?>" class="badge badge-success user-edit" data-toggle="modal" data-target="#editUserModal"><i class="fas fa-edit"></i></a>
                            <a href="<?= base_url('data/delUser/') . $su['id']; ?>" class="badge badge-danger confirm-delete"><i class="fas fa-trash"></i></<a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</div>


<!-- MODAL -->
<div class="modal fade" id="newUserModal" tabindex="-1" role="dialog" aria-labelledby="newtUserModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title user-title" id="user-title">Tambah User Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="user-form" action="<?= base_url('menu/settinguser'); ?>" method="post">
                <!-- hidden id -->
                <div class="modal-body user-body">
                    <input class="hidden" type="hidden" value="" name="id">

                    <div class="form-group">
                        <input type="text" class="form-control username" id="username" name="username" placeholder="Username">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control email" id="email" name="email" placeholder="Email">
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control password" id="password" name="password" placeholder="Password">
                    </div>

                    <div class="form-group">
                        <select name="role_id" id="role_id" class="form-control role_id">
                            <option value="">Select Role</option>
                            <?php foreach ($role as $r) : ?>
                                <option value="<?= $r['id']; ?>"><?= $r['role']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class-="form-group">
                        <div class="form-check">
                            <input class="form-check-input is_active" type="checkbox" value="1" name="is_active" id="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Active ?
                            </label>
                        </div>
                    </div>

                </div>
                <div class="modal-footer user-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title user-title" id="user-title">Tambah User Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="user-form" action="<?= base_url('menu/editUser/'); ?>" method="post">
                <!-- hidden id -->
                <div class="modal-body user-body">
                    <input class="user-input" type="hidden" value="" name="id">

                    <div class="form-group">
                        <input type="text" class="form-control usernames" id="usernames" name="usernames" placeholder="Username">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control emails" id="emails" name="emails" placeholder="Email">
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control passwords" id="passwords" name="passwords" placeholder="Password">
                    </div>

                    <div class="form-group">
                        <select name="role_ids" id="role_ids" class="form-control role_ids">
                            <option value="">Select Role</option>
                            <?php foreach ($settinguser as $su) : ?>
                                <option value="<?= $su['role_id']; ?>"><?= $su['role_id']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class-="form-group">
                        <div class="form-check">
                            <input class="form-check-input is-actives" type="checkbox" value="1" name="is_actives" id="is_actives" checked>
                            <label class="form-check-label" for="is_actives">
                                Active ?
                            </label>
                        </div>
                    </div>

                </div>
                <div class="modal-footer user-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>