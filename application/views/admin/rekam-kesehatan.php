<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item "><a href="<?= base_url('admin'); ?>"><i class="fas fa-home"></i> Admin</a></li>
            <li class="breadcrumb-item active"><a href="<?= base_url('admin/rekamsehat'); ?>" aria-current="page">Rekam Kesehatan</a></li>
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
        <!-- <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newPeriksaModal">Add New Periksa</a> -->
        <a href="<?= base_url('admin/exporRekam') ?>" class="btn btn-success mb-3">Export To Excel</a>
        <!-- <a href="" class="btn btn-warning mb-3 ml-2" data-toggle="modal" data-target="#">Import From Excel</a> -->
        <table class="table table-responsive table-striped table-bordered" id="dataTable" cellspacing="1" style="width:100%;">
            <thead>
                <tr style="text-align:center">
                    <th>No.</th>
                    <th>No. Induk</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Kelas</th>
                    <th>Tinggi Badan</th>
                    <th>Berat Badan</th>
                    <th>IMT</th>
                    <th>Imunisasi</th>
                    <th>Jenis Disabilitas</th>
                    <th>Tekanan Darah</th>
                    <th>TB/U</th>
                    <th>Resiko Anemia</th>
                    <th>Kebersihan Rambut</th>
                    <th>Kebersihan Kulit</th>
                    <th>Kebersihan Kuku</th>
                    <th>Kesehatan Rongga Mulut</th>
                    <th>Kesehatan Gigi & Gusi</th>
                    <th>Kesehatan Mata</th>
                    <th>Kesehatan Telinga</th>
                    <th>Gaya Hidup</th>
                    <th>Gangguan Mental Emosional</th>
                    <th>Modalitas Belajar</th>
                    <th>Dominasi Otak</th>
                    <th>Penggunaan Alat Bantu</th>
                    <th>Kebugaran Jasmani</th>
                    <th>Tanggal Update</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <tr>
                    <?php foreach ($rekam as $r) : ?>
                        <td scope="row"><?= $i++; ?></td>
                        <td><?= $r['noinduk'] ?></td>
                        <td><?= $r['nama'] ?></td>
                        <td><?= $r['kelamin'] ?></td>
                        <td><?= $r['klspos'] ?></td>
                        <td><?= $r['tbsiswa'] ?></td>
                        <td><?= $r['bbsiswa'] ?></td>
                        <td><?= $r['imt'] ?></td>
                        <td><?= $r['imun'] ?></td>
                        <td><?= $r['disabilitas'] ?></td>
                        <td><?= $r['tekdarah'] ?></td>
                        <td><?= $r['tbu'] ?></td>
                        <td><?= $r['resikoanemia'] ?></td>
                        <td><?= $r['rambut'] ?></td>
                        <td><?= $r['kulit'] ?></td>
                        <td><?= $r['kuku'] ?></td>
                        <td><?= $r['ronggamulut'] ?></td>
                        <td><?= $r['gigigusi'] ?></td>
                        <td><?= $r['mata'] ?></td>
                        <td><?= $r['telinga'] ?></td>
                        <td><?= $r['gayahidup'] ?></td>
                        <td><?= $r['emosi'] ?></td>
                        <td><?= $r['modalitasbelajar'] ?></td>
                        <td><?= $r['dominasiotak'] ?></td>
                        <td><?= $r['alatbantu'] ?></td>
                        <td><?= $r['jasmani'] ?></td>
                        <td><?php $date = date_create($r['tglupdate']);
                            echo date_format($date, "d-m-y") ?></td>
                        <td>
                            <a href="" onclick="rekamEdit(<?= $r['id']; ?>)" data-id="<?= $r['id']; ?>" class="btn btn-success" data-toggle="modal" data-target="#editRekamModal"><i class="fas fa-edit"></i></a>
                        </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</div>


<!-- MODAL -->

<div class="modal fade" id="editRekamModal" tabindex="-1" role="dialog" aria-labelledby="editRekamModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title rekam-title" id="rekam-title">Add New rekam</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="rekam-form" action="<?= base_url('admin/editRekam'); ?>" method="post">
                <!-- hidden id -->
                <div class="modal-body rekam-body">
                    <input class="rekam-input" type="hidden" value="" name="id">

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
                        <input type="text" class="form-control tbsiswa" id="tbsiswa" name="tbsiswa" placeholder="Tinggi Badan" readonly>
                        <?= form_error('Tinggi Badan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control bbsiswa" id="bbsiswa" name="bbsiswa" placeholder="Berat Badan" readonly>
                        <?= form_error('Berat Badan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <select id="imt" name="imt" class="form-control imt">
                            <option value="">Indeks Massa Tubuh</option>
                            <option value="Sangat Kurus">Sangat Kurus</option>
                            <option value="Kurus">Kurus</option>
                            <option value="Normal">Normal</option>
                            <option value="Gemuk">Gemuk</option>
                            <option value="Sangat Gemuk">Sangat Gemuk</option>
                        </select>
                        <?= form_error('IMT', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <select id="imun" name="imun" class="form-control imun">
                            <option value="">Imunisasi</option>
                            <option value="Belum Imunisasi">Belum Imunisasi</option>
                            <option value="Sudah Imunisasi">Sudah Imunisasi</option>
                        </select>
                        <?= form_error('Imunisasi', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <select id="disabilitas" name="disabilitas" class="form-control disabilitas">
                            <option value="">Jenis Disabilitas</option>
                            <option value="Tidak Ada">Tidak Ada</option>
                            <option value="Netra">Netra</option>
                            <option value="Rungu">Rungu</option>
                            <option value="Rungu Wicara">Rungu Wicara</option>
                            <option value="Grahita">Grahita</option>
                            <option value="Daksa">Daksa</option>
                            <option value="Autisme">Autisme</option>
                            <option value="Ganda">Ganda</option>
                            <option value="ADHD">ADHD</option>
                        </select>
                        <?= form_error('Jenis Disabilitas', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <select id="tekdarah" name="tekdarah" class="form-control tekdarah">
                            <option value="">Tekanan Darah</option>
                            <option value="Normal">Normal</option>
                            <option value="Hiper">Hiper</option>
                            <option value="Hipo">Hipo</option>
                        </select>
                        <?= form_error('Tekanan Darah', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <select id="tbu" name="tbu" class="form-control tbu">
                            <option value="">TB/U ( Stunting )</option>
                            <option value="Tidak">Tidak</option>
                            <option value="Ya">Ya</option>
                        </select>
                        <?= form_error('TB/U( Stunting )', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <select id="resikoanemia" name="resikoanemia" class="form-control resikoanemia">
                            <option value="">Resiko Anemia</option>
                            <option value="Tidak">Tidak</option>
                            <option value="Ya">Ya</option>
                        </select>
                        <?= form_error('Resiko Anemia', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <select id="rambut" name="rambut" class="form-control rambut">
                            <option value="">Kebersihan Rambut</option>
                            <option value="Sehat">Sehat</option>
                            <option value="Tidak Sehat">Tidak Sehat</option>
                        </select>
                        <?= form_error('Kebersihan Rambut', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <select id="kulit" name="kulit" class="form-control kulit">
                            <option value="">Kebersihan Kulit</option>
                            <option value="Sehat">Sehat</option>
                            <option value="Tidak Sehat">Tidak Sehat</option>
                        </select>
                        <?= form_error('Kebersihan Kulit', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <select id="kuku" name="kuku" class="form-control kuku">
                            <option value="">Kebersihan Kuku</option>
                            <option value="Sehat">Sehat</option>
                            <option value="Tidak Sehat">Tidak Sehat</option>
                        </select>
                        <?= form_error('Kebersihan Kuku', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <select id="ronggamulut" name="ronggamulut" class="form-control ronggamulut">
                            <option value="">Kesehatan Rongga Mulut</option>
                            <option value="Sehat">Sehat</option>
                            <option value="Tidak Sehat">Tidak Sehat</option>
                        </select>
                        <?= form_error('Kebersihan Rongga Mulut', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>


                    <div class="form-group">
                        <select id="gigigusi" name="gigigusi" class="form-control gigigusi">
                            <option value="">Kesehatan Gigi & Gusi</option>
                            <option value="Sehat">Sehat</option>
                            <option value="Tidak Sehat">Tidak Sehat</option>
                        </select>
                        <?= form_error('Kesehatan Gigi & Gusi', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <select id="mata" name="mata" class="form-control mata">
                            <option value="">Kesehatan Mata</option>
                            <option value="Normal">Normal</option>
                            <option value="Kelainan Refraksi">Kelainan Refraksi</option>
                            <option value="Low Vision">Low Vision</option>
                            <option value="Kebutaan">Kebutaan</option>
                            <option value="Berkacamata">Berkacamata</option>
                        </select>
                        <?= form_error('Kesehatan Mata', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <select id="telinga" name="telinga" class="form-control telinga">
                            <option value="">Kesehatan Telinga</option>
                            <option value="Sehat">Sehat</option>
                            <option value="Tidak Sehat">Tidak Sehat</option>
                        </select>
                        <?= form_error('Kesehatan Telingan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <select id="gayahidup" name="gayahidup" class="form-control gayahidup">
                            <option value="">Gaya Hidup</option>
                            <option value="Sehat">Sehat</option>
                            <option value="Tidak Sehat">Tidak Sehat</option>
                        </select>
                        <?= form_error('Kesehatan Telingan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <select id="emosi" name="emosi" class="form-control emosi">
                            <option value="">Gangguan Mental Emosional</option>
                            <option value="Tidak Ada">Tidak ada</option>
                            <option value="E">E</option>
                            <option value="C">C</option>
                            <option value="H">H</option>
                            <option value="P">P</option>
                            <option value="Pr">Pr</option>
                        </select>
                        <?= form_error('Ganggun Mental Emosional', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <select id="modalitasbelajar" name="modalitasbelajar" class="form-control modalitasbelajar">
                            <option value="">Gangguan Modalitas Belajar</option>
                            <option value="Tidak Ada">Tidak Ada</option>
                            <option value="Audio">Audio</option>
                            <option value="Visual">Visual</option>
                            <option value="Kinestetik">Kinestetik</option>
                        </select>
                        <?= form_error('Modalitas Belajar', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <select id="dominasiotak" name="dominasiotak" class="form-control dominasiotak">
                            <option value="">Dominasi Otak</option>
                            <option value="Oki">Oki</option>
                            <option value="Oka">Oka</option>
                            <option value="Kika">Kika</option>
                        </select>
                        <?= form_error('Dominasi Otak', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <select id="alatbantu" name="alatbantu" class="form-control alatbantu">
                            <option value="">Penggunaan Alat Bantu</option>
                            <option value="Tidak">Tidak</option>
                            <option value="Ya">Ya</option>
                        </select>
                        <?= form_error('Penggunaan Alat Bantu', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <select id="jasmani" name="jasmani" class="form-control jasmani">
                            <option value="">Kebugaran Jasmani</option>
                            <option value="Sangat Baik">Sangat Baik</option>
                            <option value="Baik">Baik</option>
                            <option value="Cukup">Cukup</option>
                            <option value="Kurang">Kurang</option>
                            <option value="Kurang Sekali">Kurang Sekali</option>
                        </select>
                        <?= form_error('Kebugaran Jasmani', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <input type="date" class="form-control tglupdate" id="tglupdate" name="tglupdate" placeholder="Tanggal Update">
                        <?= form_error('Tanggal Update', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="modal-footer rekam-footer">
                        <button type="submit" class="btn btn-success">Edit</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>