<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>"><i class="fas fa-home"></i> Admin</a></li>
            <li class="breadcrumb-item active"><a href="<?= base_url('admin/kunjung'); ?>" aria-current="page">Kunjungan Siswa</a></li>
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
        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newKunjungModal">Tambah Kunjungan</a>
        <a href="<?= base_url('admin/exporKunjung') ?>" class="btn btn-success mb-3">Export Ke Excel</a>
        <table class="table table-responsive table-striped table-bordered" id="dataTable" cellspacing="1" style="width:100%;">
            <thead>
                <tr style="text-align:center">
                    <th>No.</th>
                    <th>No. Induk</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Kelas</th>
                    <th>Cek</th>
                    <th>Sakit</th>
                    <th>Obat</th>
                    <th>Jumlah Obat</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Proses</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <tr>
                    <?php foreach ($kunjung as $k) : ?>
                        <td scope="row"><?= $i++; ?></td>
                        <td><?= $k['noinduk'] ?></td>
                        <td><?= $k['nama'] ?></td>
                        <td><?= $k['kelamin'] ?></td>
                        <td><?= $k['klspos'] ?></td>
                        <td><?= $k['cek'] ?></td>
                        <td><?= $k['sakit'] ?></td>
                        <td><?= $k['merkobat'] ?></td>
                        <td><?= $k['jmlobat'] ?></td>
                        <td><?php $date = date_create($k['tgl']);
                            echo date_format($date, "d-F-Y") ?></td>
                        <td><?= $k['keterangan'] ?></td>
                        <td>
                            <a href="" onclick="kunjungEdit(<?= $k['noinduk']; ?>)" data-id="<?= $k['id']; ?>" class="badge badge-success" data-toggle="modal" data-target="#editKunjungModal"><i class="fas fa-edit"></i></a>
                            <a href="<?= base_url('admin/delKunjung/') . $k['id']; ?>" class="badge badge-danger confirm-delete"><i class="fas fa-trash"></i></a>

                        </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</div>

<div class="modal fade" id="newKunjungModal" tabindex="-1" role="dialog" aria-labelledby="newKunjungModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title kunjung-title" id="kunjung-title">Tambah Kunjungan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="kunjung-form" action="<? base_url('admin/kunjung'); ?>" method="post">
                <!-- hidden id -->
                <input class="hidden" type="hidden" value="" name="id">
                <div class="modal-body kunjung-body">

                    <div class="form-group">
                        <select name="noinduk" id="noinduk" class="js-example-basic-single" style="width: 100%">
                            <option value="">- Pilih Siswa -</option>
                            <?php foreach ($siswa as $s) { ?>
                                <option value="<?= $s['noinduk'] ?>"><?= $s['nama'] ?></option>
                            <?php } ?>
                        </select>
                        <?= form_error('noinduk', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <select id="cek" name="cek" class="form-control cek">
                            <option value="">Cek Kunjungan</option>
                            <option value="Berkunjung">Berkunjung</option>
                            <option value="-">-</option>
                        </select>
                        <?= form_error('Cek', '<small class="text-warning pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <select id="sakit" name="sakit" class="form-control sakit">
                            <option value="">Pilih Sakit</option>
                            <option value="Panas">Panas</option>
                            <option value="Pusing">Pusing</option>
                            <option value="Pilek">Pilek</option>
                            <option value="Sakit Perut">Sakit Perut</option>
                        </select>
                        <?= form_error('Sakit', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <select id="obat_id" name="obat_id" class="form-control obat_id">
                            <option value="">Pilih Merk Obat</option>
                            <?php foreach ($obat as $o) : ?>
                                <option value="<?= $o['id']; ?>"><?= $o['merkobat'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('Obat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <input type="number" class="form-control jmlobat" id="jmlobat" name="jmlobat" placeholder="Jumlah Obat">
                        <?= form_error('Jumlah Obat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <input type="date" class="form-control tgl" id="tgl" name="tgl" placeholder="Tanggal">
                        <?= form_error('Tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <input type="textarea" class="form-control keterangan" id="keterangan" name="keterangan" placeholder="Keterangan">
                        <?= form_error('Keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                </div>
                <div class="modal-footer kunjung-footer">
                    <button type="submit" class="btn btn-primary" onclick="kunjungAdd()">Tambah</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
                <!-- </form> -->
        </div>
    </div>
</div>

<div class="modal fade" id="editKunjungModal" tabindex="-1" role="dialog" aria-labelledby="editKunjungModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title kunjung-title" id="kunjung-title">Add New Kunjung</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="kunjung-form" action="<?= base_url('admin/editKunjung'); ?>" method="post">
                <!-- hidden id -->
                <input class="kunjung-input" type="hidden" value="" name="id">
                <div class="modal-body kunjung-body">

                    <div class="form-group">
                        <input type="text" class="form-control noinduks" id="noinduks" name="noinduks" placeholder="No. Induk" readonly>
                        <?= form_error('No. Induk', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control namas" id="namas" name="namas" placeholder="Nama Lengkap" readonly>
                        <?= form_error('Nama Lengkap', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <select id="ceks" name="ceks" class="form-control ceks">
                            <option value="">Cek Kunjungan</option>
                            <option value="Berkunjung">Berkunjung</option>
                            <option value="-">-</option>
                        </select>
                        <?= form_error('Cek', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <select id="sakits" name="sakits" class="form-control sakits">
                            <option value="">Pilih Sakit</option>
                            <option value="Panas">Panas</option>
                            <option value="Pusing">Pusing</option>
                            <option value="Pilek">Pilek</option>
                            <option value="Sakit Perut">Sakit Perut</option>
                        </select>
                        <?= form_error('Sakit', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <select id="obat_ids" name="obat_ids" class="form-control obat_ids">
                            <option value="">Pilih Merk Obat</option>
                            <?php foreach ($obat as $o) : ?>
                                <option value="<?= $o['id']; ?>"><?= $o['merkobat'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('Obat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <input type="number" class="form-control jmlobats" id="jmlobats" name="jmlobats" placeholder="Jumlah Obat">
                        <?= form_error('Jumlah Obat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <input type="date" class="form-control tgls" id="tgls" name="tgls" placeholder="Tanggal">
                        <?= form_error('Tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control keterangans" id="keterangans" name="keterangans" placeholder="Keterangan">
                        <?= form_error('Keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                </div>
                <div class="modal-footer kunjung-footer">
                    <button type="submit" class="btn btn-success">Edit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>