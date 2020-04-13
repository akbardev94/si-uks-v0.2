<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('data/datasekolah'); ?>"><i class="fas fa-database"></i> Data</a></li>
            <li class="breadcrumb-item active"><a href="<?= base_url('data/datasiswa'); ?>" aria-current="page">Data Siswa</a></li>
        </ol>
    </nav>

    <!-- Page Heading -->
    <div class="card-header bg-info mb-4 rounded">
        <h1 class="h2 text-white font-weight-bolder text-center"><?= $title; ?></h1>
    </div>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="row">
            <div class="col-lg">
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= validation_errors(); ?>
                    </div>
                <?php endif; ?>
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('massage'); ?>"></div>

                <a href="" onclick="siswaAdd()" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSiswaModal">Tambah Siswa</a>
                <a href="<?= base_url('data/exporSiswa'); ?>" class="btn btn-success mb-3 ml-2">Export Ke Excel</a>
                <table class="table table-responsive table-striped table-bordered dataTable" id="dataTable" cellspacing="1" style="width:100%;">
                    <thead>
                        <tr style="text-align:center">
                            <th>No.</th>
                            <th>No. Induk</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat Ortu</th>
                            <th>Nama Ayah</th>
                            <th>Nama Ibu</th>
                            <th>No. Telp./HP</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($siswa as $s) : ?>
                            <tr>
                                <td scope="row"><?= $i++; ?></td>
                                <td><?= $s['noinduk'] ?></td>
                                <td><?= $s['nisn'] ?></td>
                                <td><?= $s['nama'] ?></td>
                                <td><?= $s['klspos'] ?></td>
                                <td><?= $s['kelamin'] ?></td>
                                <td><?= $s['tmplahir'] ?></td>
                                <td><?php $date = date_create($s['tgllahir'] );
                            echo date_format($date, "d F Y") ?></td>
                                <td><?= $s['alamatortu'] ?></td>
                                <td><?= $s['namaayah'] ?></td>
                                <td><?= $s['namaibu'] ?></td>
                                <td><?= $s['hape'] ?></td>
                                <td>
                                    <a href="" onclick="siswaEdit(<?= $s['id']; ?>)" data-id="<?= $s['id']; ?>" class="badge badge-success" data-toggle="modal" data-target="#editSiswaModal"><i class="fas fa-edit"></i></a>
                                    <a href="<?= base_url('data/delSiswa/') . $s['id']; ?>" class="badge badge-danger confirm-delete"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- MODAL ADD-->
    <div class="modal fade" id="newSiswaModal" tabindex="-1" role="dialog" aria-labelledby="newSiswaModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title siswa-title" id="siswa-title">Add New Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="siswa-form" action="<?= base_url('data/dataSiswa'); ?>" method="post">
                    <!-- hidden id -->
                    <input class="hidden" type="hidden" value="" name="id">
                    <div class="modal-body siswa-body">

                        <div class="form-group">
                            <input type="text" class="form-control noinduk" id="noinduk" name="noinduk" placeholder="Nomor Induk">
                            <?= form_error('No Induk', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control nisn" id="nisn" name="nisn" placeholder="Nomor Induk Siswa Nasional">
                            <?= form_error('Nomor Induk Siswa Nasional', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control nama" id="nama" name="nama" placeholder="Nama Siswa">
                            <?= form_error('Nama Siswa', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <select id="klspos" name="klspos" class="form-control klspos">
                                <option value="">Kelas</option>
                                <option value="1A">1A</option>
                                <option value="1B">1B</option>
                                <option value="1C">1C</option>
                                <option value="2A">2A</option>
                                <option value="2B">2B</option>
                                <option value="2C">2C</option>
                                <option value="3A">3A</option>
                                <option value="3B">3B</option>
                                <option value="3C">3C</option>
                                <option value="4A">4A</option>
                                <option value="4B">4B</option>
                                <option value="4C">4C</option>
                                <option value="5A">5A</option>
                                <option value="5B">5B</option>
                                <option value="5C">5C</option>
                                <option value="6A">6A</option>
                                <option value="6B">6B</option>
                                <option value="6C">6C</option>
                            </select>
                            <?= form_error('Kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <select name="kelamin" id="kelamin" class="form-control kelamin">
                                <option value="">Jenis Kelamin</option>
                                <option value="Laki-laki">L</option>
                                <option value="Perempuan">P</option>
                            </select>
                            <?= form_error('Jenis Kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control tmplahir" id="tmplahir" name="tmplahir" placeholder="Tempat Lahir">
                            <?= form_error('Tempat Lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <input type="date" class="form-control tgllahir" id="tgllahir" name="tgllahir" placeholder="Tanggal Lahir">
                            <?= form_error('Tanggal Lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                         <div class="form-group">
                            <input type="text" class="form-control alamatortu" id="alamatortu" name="alamatortu" placeholder="Alamat Orang Tua">
                            <?= form_error('Alamat Orang Tua', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control namaayah" id="namaayah" name="namaayah" placeholder="Nama Ayah">
                            <?= form_error('Nama Ayah', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control namaibu" id="namaibu" name="namaibu" placeholder="Nama Ibu">
                            <?= form_error('Nama Ibu', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group ">
                            <input type="text" class="form-control hape" id="hape" name="hape" placeholder="Nomor Telepon/HP">
                            <?= form_error('Nomor Telepon/HP', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                    </div>
                    <div class="modal-footer siswa-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL EDIT -->
    <div class="modal fade" id="editSiswaModal" tabindex="-1" role="dialog" aria-labelledby="editSiswaModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title siswa-title" id="siswa-title">Add New Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="siswa-form" action="<?= base_url('data/editSiswa'); ?>" method="post">
                    <!-- hidden id -->
                    <div class="modal-body siswa-body">
                        <input class="siswa-input" type="hidden" value="" name="id">

                        <div class="form-group">
                            <input type="text" class="form-control noinduks" id="noinduks" name="noinduks" placeholder="Nomor Induk">
                            <?= form_error('Nomor Induk', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control nisns" id="nisns" name="nisns" placeholder="Nomor Induk Siswa Nasional">
                            <?= form_error('Nomor Induk Siswa Nasional', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control namas" id="namas" name="namas" placeholder="Nama Siswa">
                            <?= form_error('Nama Siswa', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <select id="klsposs" name="klsposs" class="form-control klsposs">
                                <option value="">Kelas</option>
                                <option value="1A">1A</option>
                                <option value="1B">1B</option>
                                <option value="1C">1C</option>
                                <option value="2A">2A</option>
                                <option value="2B">2B</option>
                                <option value="2C">2C</option>
                                <option value="3A">3A</option>
                                <option value="3B">3B</option>
                                <option value="3C">3C</option>
                                <option value="4A">4A</option>
                                <option value="4B">4B</option>
                                <option value="4C">4C</option>
                                <option value="5A">5A</option>
                                <option value="5B">5B</option>
                                <option value="5C">5C</option>
                                <option value="6A">6A</option>
                                <option value="6B">6B</option>
                                <option value="6C">6C</option>
                            </select>
                            <?= form_error('Kelas', '<small class="text-danger pl-3">', '</small>'); ?>
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
                            <input type="text" class="form-control tmplahirs" id="tmplahirs" name="tmplahirs" placeholder="Tempat Lahir">
                            <?= form_error('Tempat Lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control tgllahirs" id="tgllahirs" name="tgllahirs" placeholder="Tanggal Lahir">
                            <?= form_error('Tanggal Lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control umurs" id="umurs" name="umurs" placeholder="Umur">
                            <?= form_error('Umur', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control alamatortus" id="alamatortus" name="alamatortus" placeholder="Alamat Orang Tua">
                            <?= form_error('Alamat Orang Tua', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control namaayahs" id="namaayahs" name="namaayahs" placeholder="Nama Ayah">
                            <?= form_error('Nama Ayah', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control namaibus" id="namaibus" name="namaibus" placeholder="Nama Ibu">
                            <?= form_error('Nama Ibu', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>


                        <div class="form-group ">
                            <input type="text" class="form-control hapes" id="hapes" name="hapes" placeholder="Nomor Telepon/HP">
                            <?= form_error('Nomor Telepon/HP', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                    </div>
                    <div class="modal-footer siswa-footer">
                        <button type="submit" class="btn btn-success">Edit</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>