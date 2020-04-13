<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('data/datasekolah'); ?>"><i class="fas fa-database"></i> Data</a></li>
            <li class="breadcrumb-item active"><a href="<?= base_url('data/datagukar'); ?>" aria-current="page">Data GuKar</a></li>
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

        <a href="" onclick="gukarAdd()" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newGukarModal">Tambah Guru</a>
        <!-- <a href="" class="btn btn-success mb-3 ml-2" data-toggle="modal" data-target="#">Export Ke Excel</a> -->
        <table class="table table-responsive table-striped table-bordered dataTable" id="dataTable" cellspacing="1" style="width:100%;">
            <thead>
                <tr style="text-align:center">
                    <th>No.</th>
                    <th>NIY</th>
                    <th>Nama</th>
                    <th>TTL</th>
                    <th>Jenis Kelamin</th>
                    <th>Jabatan</th>
                    <th>Alamat</th>
                    <th>No. Telp.</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($gukar as $gk) : ?>
                    <tr>
                        <td scope="row"><?= $i++; ?></td>
                        <td><?= $gk['niy']; ?></td>
                        <td><?= $gk['nama']; ?></td>
                        <td><?= $gk['ttl']; ?></td>
                        <td><?= $gk['kelamin']; ?></td>
                        <td><?= $gk['jabatan']; ?></td>
                        <td><?= $gk['alamat']; ?></td>
                        <td><?= $gk['notelp']; ?></td>
                        <td>
                            <a href="" onclick="gukarEdit(<?= $gk['id']; ?>)" data-id="<?= $gk['id']; ?>" class="badge badge-success" data-toggle="modal" data-target="#editGukarModal"><i class="fas fa-edit"></i></a>
                            <a href="<?= base_url('data/delgukar/') . $gk['id']; ?>" class="badge badge-danger confirm-delete"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</div>


<!-- MODAL ADD -->
<div class="modal fade" id="newGukarModal" tabindex="-1" role="dialog" aria-labelledby="newGukarModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title gukar-title" id="gukar-title">Add New Gukar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="gukar-form" action="<?= base_url('data/dataGukar'); ?>" method="post">
                <!-- hidden id -->
                <div class="modal-body gukar-body">
                    <input class="hidden" type="hidden" value="" name="id">

                    <div class="form-group gukar">
                        <input type="text" class="form-control niy" id="niy" name="niy" placeholder="NIY">
                        <?= form_error('NIY', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control nama" id="nama" name="nama" placeholder="Nama Guru/Karyawan">
                        <?= form_error('Nama Guru/Karyawan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control ttl" id="ttl" name="ttl" placeholder="Tempat Tanggal Lahir">
                        <?= form_error('Tempat Tanggal Lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <select name="kelamin" id="kelamin" class="form-control kelamin">
                            <option value="">Jenis Kelamin</option>
                            <option value="L">L</option>
                            <option value="P">P</option>
                        </select>
                        <?= form_error('Jenis Kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <select id="jabatan" name="jabatan" class="form-control jabatan">
                            <option value="">Jabatan</option>
                            <option value="Kepala Sekolah">Kepala Sekolah</option>
                            <option value="Waka Kurikulum">Waka Kurikulum</option>
                            <option value="Waka Kesiswaan">Waka Kesiswaan</option>
                            <option value="Waka ART & Sarpras">Waka ART & Sarpras</option>
                            <option value="Wali Kelas">Wali Kelas</option>
                            <option value="Guru Kelas">Guru Kelas</option>
                            <option value="Guru PAI">Guru PAI</option>
                            <option value="Guru PJOK">Guru PJOK</option>
                            <option value="Guru Pendamping Khusus (GPK)">Guru Pendamping Khusus (GPK)</option>
                            <option value="Staf TU">Staf TU</option>
                            <option value="IT Support">IT Support</option>
                            <option value="Pustakawan">Pustakawan</option>
                            <option value="Koperasi">Koperasi</option>
                            <option value="Security">Security</option>
                            <option value="Cleaning Service">Cleaning Service</option>
                        </select>
                        <?= form_error('Jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control alamat" id="alamat" name="alamat" placeholder="Alamat">
                        <?= form_error('Alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control notelp" id="notelp" name="notelp" placeholder="Nomor Telepon/HP">
                        <?= form_error('Nomor Telepon/HP', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <!-- <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input foto" id="foto" name="foto">
                            <label class="custom-file-label" for="image">Upload Foto Max. 2 Mb</label>
                        </div>
                    </div> -->

                </div>
                <div class="modal-footer gukar-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL EDIT -->
<div class="modal fade" id="editGukarModal" tabindex="-1" role="dialog" aria-labelledby="editGukarModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title gukar-title" id="gukar-title">Add New Gukar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="gukar-form" action="<?= base_url('data/editGukar'); ?>" method="post">
                <!-- hidden id -->
                <div class="modal-body gukar-body">
                    <input class="gukar-input" type="hidden" value="" name="id">

                    <div class="form-group gukar">
                        <input type="text" class="form-control niys" id="niys" name="niys" placeholder="NIY">
                        <?= form_error('NIY', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control namas" id="namas" name="namas" placeholder="Nama Guru/Karyawan">
                        <?= form_error('Nama Guru/Karyawan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control ttls" id="ttls" name="ttls" placeholder="Tempat Tanggal Lahir">
                        <?= form_error('Tempat Tanggal Lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <select name="kelamins" id="kelamins" class="form-control kelamins">
                            <option value="">Jenis Kelamin</option>
                            <option value="L">L</option>
                            <option value="P">P</option>
                        </select>
                        <?= form_error('Jenis Kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <select id="jabatans" name="jabatans" class="form-control jabatans">
                            <option value="">Jabatan</option>
                            <option value="Kepala Sekolah">Kepala Sekolah</option>
                            <option value="Waka Kurikulum">Waka Kurikulum</option>
                            <option value="Waka Kesiswaan">Waka Kesiswaan</option>
                            <option value="Waka ART & Sarpras">Waka ART & Sarpras</option>
                            <option value="Wali Kelas">Wali Kelas</option>
                            <option value="Koordinator Kelas">Koordinator Kelas</option>
                            <option value="Guru PAI">Guru PAI</option>
                            <option value="Guru PJOK">Guru PJOK</option>
                            <option value="Guru Pendamping Khusus (GPK)">Guru Pendamping Khusus (GPK)</option>
                            <option value="IT Support">IT Support</option>
                            <option value="Staf TU">Staf TU</option>
                            <option value="Pustakawan">Pustakawan</option>
                            <option value="Koperasi">Koperasi</option>
                            <option value="Security">Security</option>
                            <option value="Cleaning Service">Cleaning Service</option>
                        </select>
                        <?= form_error('Jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control alamats" id="alamats" name="alamats" placeholder="Alamat">
                        <?= form_error('Alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control notelps" id="notelps" name="notelps" placeholder="Nomor Telepon/HP">
                        <?= form_error('Nomor Telepon/HP', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <!-- <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input fotos" id="fotos" name="fotos">
                            <label class="custom-file-label" for="image">Upload Foto Max. 2 Mb</label>
                        </div>
                    </div> -->

                </div>
                <div class="modal-footer gukar-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>