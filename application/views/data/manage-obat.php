<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('data/datasekolah'); ?>"><i class="fas fa-database"></i> Data</a></li>
            <li class="breadcrumb-item active"><a href="<?= base_url('data/manageobat'); ?>" aria-current="page">Managemen Obat</a></li>
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

                <a href="" onclick="return obatAdd('')" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newObatModal">Tambah Obat</a>
                <table class="table table-responsive table-striped table-bordered" id="dataTable" cellspacing="1" style="width:100%;">
                    <thead>
                        <tr style="text-align:center">
                            <th>No.</th>
                            <th>Kode Obat</th>
                            <th>Merk Obat</th>
                            <th>Kategori</th>
                            <th>Jumlah</th>
                            <th>Tanggal Simpan</th>
                            <th>Tanggal Kedaluwarsa</th>
                            <th>Kondisi</th>
                            <th>Manfaat</th>
                            <th>Bentuk</th>
                            <th>Konsumen</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($obat as $o) : ?>
                            <tr>
                                <td scope="row"><?= $i++; ?></td>
                                <td><?= $o['kode_obat'] ?></td>
                                <td><?= $o['merkobat'] ?></td>
                                <td><?= $o['katobat'] ?></td>
                                <td><?php if ($o['jmlobat'] <= 0) {
                                                            echo "Obat Habis";
                                                        } else {
                                                            echo $o['jmlobat'];
                                                        } ?></td>
                                <td><?php $date = date_create($o['tglsimpan']);
                                    echo date_format($date, "d F Y") ?></td>
                                <td><?php $date = date_create($o['tglkedaluwarsa']);
                                    echo date_format($date, "d F Y") ?></td>
                                <td><?= $o['kondisi'] ?></td>
                                <td><?= $o['manfaat'] ?></td>
                                <td><?= $o['bentuk'] ?></td>
                                <td><?= $o['konsumen'] ?></td>
                                <td>
                                    <a href="" onclick="return obatEdit(<?= $o['id']; ?>)" data-id="<?= $o['id']; ?>" class="badge badge-success" data-toggle="modal" data-target="#editObatModal"><i class="fas fa-edit"></i></a>
                                    <a href="<?= base_url('data/delObat/') . $o['id']; ?>" class="badge badge-danger confirm-delete"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- MODAL ADD -->
    <div class="modal fade" id="newObatModal" tabindex="-1" role="dialog" aria-labelledby="newObatModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title obat-title" id="obat-title">Add New obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="obat-form" action="<?= base_url('data/manageObat'); ?>" method="post">
                    <!-- hidden id -->
                    <input class="hidden" type="hidden" value="" name="id">
                    <div class="modal-body obat-body">

                        <div class="form-group">
                            <input type="text" class="form-control kode_obat" id="kode_obat" name="kode_obat" placeholder="Kode obat">
                            <?= form_error('Kode Obat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control merkobat" id="merkobat" name="merkobat" placeholder="Merk obat">
                            <?= form_error('Merk Obat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <select id="katobat" name="katobat" class="form-control katobat">
                                <option value="">Kategori</option>
                                <option value="Obat Bebas">Obat Bebas</option>
                                <option value="Obat Bebas Terbatas">Obat Bebas Terbatas</option>
                                <option value="Obat Keras">Obat Keras</option>
                                <option value="Jamu">Jamu</option>
                                <option value="Obat Herbal">Obat Herbal</option>
                                <option value="Fitofarmaka">Fitofarmaka</option>
                            </select>
                            <?= form_error('Kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control jmlobat" id="jmlobat" name="jmlobat" placeholder="Jumlah Obat">
                            <?= form_error('Jumlah Obat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <input type="date" class="form-control tglsimpan" id="tglsimpan" name="tglsimpan" placeholder="Tanggal Simpan">
                            <?= form_error('Tanggal Simpan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <input type="date" class="form-control tglkedaluwarsa" id="tglkedaluwarsa" name="tglkedaluwarsa" placeholder="Tanggal Kedaluwarsa">
                            <?= form_error('Tanggal Kedaluwarsa', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <select id="kondisi" name="kondisi" class="form-control kondisi">
                                <option value="">Keterangan</option>
                                <option value="Baik">Baik</option>
                                <option value="Kedaluwarsa">Kedaluwarsa</option>
                            </select>
                            <?= form_error('Kondisi', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control manfaat" id="manfaat" name="manfaat" placeholder="Manfaat">
                            <?= form_error('Manfaat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <select id="bentuk" name="bentuk" class="form-control bentuk">
                                <option value="">Bentuk</option>
                                <option value="Tablet">Tablet</option>
                                <option value="Kapsul">Kapsul</option>
                                <option value="Tablet & Kapsul">Tablet & Kapsul</option>
                                <option value="Tablet, Kapsul & Puyer">Tablet, Kapsul & Puyer</option>
                            </select>
                            <?= form_error('Bentuk Obat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <select id="konsumen" name="konsumen" class="form-control konsumen">
                                <option value="">Konsumen</option>
                                <option value="Dewasa">Dewasa</option>
                                <option value="Anak-anak">Anak-anak</option>
                                <option value="Dewasa & Anak-anak">Dewasa & Anak-anak</option>
                            </select>
                            <?= form_error('Konsumen', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                    </div>
                    <div class="modal-footer obat-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL EDIT-->
    <div class="modal fade" id="editObatModal" tabindex="-1" role="dialog" aria-labelledby="editObatModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title obat-title" id="obat-title">Add New obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="obat-form" action="<?= base_url('data/editObat'); ?>" method="post">
                    <div class="modal-body obat-body">
                        <input class="obat-input" type="hidden" value="" name="id">

                        <div class="form-group">
                            <input type="text" class="form-control kode_obats" id="kode_obats" name="kode_obat" placeholder="Kode obat">
                            <?= form_error('Kode Obat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control merkobats" id="merkobats" name="merkobat" placeholder="Merk obat">
                            <?= form_error('Merk Obat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <select id="katobats" name="katobats" class="form-control katobats">
                                <option value="">Kategori</option>
                                <option value="Obat Bebas">Obat Bebas</option>
                                <option value="Obat Bebas Terbatas">Obat Bebas Terbatas</option>
                                <option value="Obat Keras">Obat Keras</option>
                                <option value="Jamu">Jamu</option>
                                <option value="Obat Herbal">Obat Herbal</option>
                                <option value="Fitofarmaka">Fitofarmaka</option>
                                <?= form_error('Kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control jmlobats" id="jmlobats" name="jmlobats" placeholder="Jumlah Obat">
                            <?= form_error('Jumlah Obat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <input type="date" class="form-control tglsimpans" id="tglsimpans" name="tglsimpans" placeholder="Tanggal Simpan">
                            <?= form_error('Tanggal Simpan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <input type="date" class="form-control tglkedaluwarsas" id="tglkedaluwarsas" name="tglkedaluwarsas" placeholder="Tanggal Kedaluwarsa">
                            <?= form_error('Tanggal Kedaluwarsa', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <select id="kondisis" name="kondisis" class="form-control kondisis">
                                <option value="">Keterangan</option>
                                <option value="Baik">Baik</option>
                                <option value="Kedaluwarsa">Kedaluwarsa</option>
                            </select>
                            <?= form_error('Kondisi', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control manfaats" id="manfaats" name="manfaats" placeholder="Manfaat">
                            <?= form_error('Manfaat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <select id="bentuks" name="bentuks" class="form-control bentuks">
                                <option value="">Bentuk</option>
                                <option value="Tablet">Tablet</option>
                                <option value="Kapsul">Kapsul</option>
                                <option value="Tablet & kapsul">Tablet & kapsul</option>
                                <option value="Tablet, kapsul, & puyer">Tablet, kapsul, & puyer</option>
                            </select>
                            <?= form_error('Bentuk', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>


                        <div class="form-group">
                            <select id="konsumens" name="konsumens" class="form-control konsumens">
                                <option value="">Konsumen</option>
                                <option value="Dewasa">Dewasa</option>
                                <option value="Anak-anak">Anak-anak</option>
                                <option value="Dewasa & Anak-anak">Dewasa & Anak-anak</option>
                            </select>
                            <?= form_error('Konsumen', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                    </div>
                    <div class="modal-footer obat-footer">
                        <button type="submit" class="btn btn-success">Edit</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>