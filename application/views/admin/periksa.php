<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>"><i class="fas fa-home"></i> Admin</a></li>
            <li class="breadcrumb-item active"><a href="<?= base_url('admin/periksa'); ?>" aria-current="page">Periksa dan Keluhan</a></li>
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
        <!-- <a href="" onclick="periksaAdd()" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newPeriksaModal">Add New Periksa</a> -->
        <a href="<?= base_url('admin/exporPeriksa') ?>" class="btn btn-success mb-3">Export To Excel</a>
        <!-- <a href="" class="btn btn-warning mb-3 ml-2" data-toggle="modal" data-target="#">Import From Excel</a> -->
        <table class="table table-responsive table-striped table-bordered" id="dataTable" cellspacing="1" style="width:100%;">
            <thead>
                <tr style="text-align:center">
                    <th>No.</th>
                    <th>No. Induk</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Kelas</th>
                    <th>Gol. Darah</th>
                    <th>Tinggi Badan</th>
                    <th>Berat Badan</th>
                    <th>Status Gizi</th>
                    <th>Keluhan</th>
                    <th>Periksa</th>
                    <th>Tindakan</th>
                    <th>Keterangan</th>
                    <th>Catatan</th>
                    <th>Nama Dokter</th>
                    <th>Tanggal Update</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <tr>
                    <?php foreach ($periksa as $p) : ?>
                        <td scope="row"><?= $i++; ?></td>
                        <td><?= $p['noinduk'] ?></td>
                        <td><?= $p['nama'] ?></td>
                        <td><?= $p['kelamin'] ?></td>
                        <td><?= $p['klspos'] ?></td>
                        <td><?= $p['gdsiswa'] ?></td>
                        <td><?= $p['tbsiswa'] ?></td>
                        <td><?= $p['bbsiswa'] ?></td>
                        <td><?= $p['statusgizi'] ?></td>
                        <td><?= $p['keluhansiswa'] ?></td>
                        <td><?= $p['periksasiswa'] ?></td>
                        <td><?= $p['tindakan'] ?></td>
                        <td><?= $p['keterangan'] ?></td>
                        <td><?= $p['catatan'] ?></td>
                        <td><?= $p['namadokter'] ?></td>
                        <td><?php $date = date_create($p['tglupdate'] );
                            echo date_format($date, "d-m-y") ?></td>
                        <td>
                            <a href="" onclick="periksaEdit(<?= $p['noinduk']; ?>)" data-id="<?= $p['noinduk']; ?>" class="btn btn-success" data-toggle="modal" data-target="#editPeriksaModal"><i class="fas fa-edit"></i></a>
                        </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</div>

<!-- MODAL EDIT -->
<div class="modal fade" id="editPeriksaModal" tabindex="-1" role="dialog" aria-labelledby="editPeriksaModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title periksa-title" id="periksa-title">Add New Periksa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="periksa-form" action="<?= base_url('admin/editPeriksa'); ?>" method="post">
                <!-- hidden id -->
                <div class="modal-body periksa-body">
                    <input class="periksa-input" type="hidden" value="" name="id">

                    <div class="form-group">
                        <input type="text" class="form-control noinduk" id="noinduk" name="noinduk" placeholder="NIS" readonly>
                        <?= form_error('NIS', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control nama" id="nama" name="nama" placeholder="Nama Lengkap" readonly>
                        <?= form_error('Nama Lengkap', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control kelamin" id="kelamin" name="kelamin" placeholder="Jenis Kelamin" readonly>
                        <?= form_error('Jenis Kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control klspos" id="klspos" name="klspos" placeholder="Kelas" readonly>
                        <?= form_error('Kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <select id="gdsiswa" name="gdsiswa" class="form-control gdsiswa">
                            <option value="">Golongan Darah</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                        </select>
                        <?= form_error('Golongan Darah', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control tbsiswa" id="tbsiswa" name="tbsiswa" placeholder="Tinggi Badan">
                        <?= form_error('Tinggi Badan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control bbsiswa" id="bbsiswa" name="bbsiswa" placeholder="Berat Badan">
                        <?= form_error('Berat Badan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <select id="statusgizi" name="statusgizi" class="form-control statusgizi">
                            <option value="">Status Gizi</option>
                            <option value="Baik">Baik</option>
                            <option value="Cukup Baik">Cukup Baik</option>
                            <option value="Kurang Baik">Kurang Baik</option>
                        </select>
                        <?= form_error('Status Gizi', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <select id="keluhansiswa" name="keluhansiswa" class="form-control keluhansiswa">
                            <option value="">Keluhan Siswa</option>
                            <option value="Tidak Ada">Tidak Ada</option>
                            <option value="Ada">Ada</option>
                        </select>
                        <?= form_error('Keluhan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <select id="periksasiswa" name="periksasiswa" class="form-control periksasiswa">
                            <option value="">Periksa Siswa</option>
                            <option value="Sudah Periksa">Sudak Periksa</option>
                            <option value="Belum Periksa">Belum Periksa</option>
                        </select>
                        <?= form_error('Periksa', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <select id="tindakan" name="tindakan" class="form-control tindakan">
                            <option value="">Tindakan</option>
                            <option value="Tidak Ada">Tidak Ada</option>
                            <option value="Rumah Sakit">Dirujuk ke Rumah Sakit</option>
                            <option value="Pukesmas">Dirujuk ke Pukesmas</option>
                            <option value="Klinik">Dirujuk ke Klinik</option>
                        </select>
                        <?= form_error('Tindakan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <select id="keterangan" name="keterangan" class="form-control keterangan">
                            <option value="">Keterangan</option>
                            <option value="Sehat">Sehat</option>
                            <option value="Tidak Sehat">Tidak Sehat</option>
                        </select>
                        <?= form_error('Keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control catatan" id="catatan" name="catatan" placeholder="Catatan">
                        <?= form_error('Catatan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control namadokter" id="namadokter" name="namadokter" placeholder="Nama Dokter">
                        <?= form_error('Nama Dokter', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <input type="date" class="form-control tglupdate" id="tglupdate" name="tglupdate" placeholder="Tanggal Update">
                        <?= form_error('Tanggal Update', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                </div>
                <div class="modal-footer periksa-footer">
                    <button type="submit" class="btn btn-success">Edit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>