<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('data/datasekolah'); ?>"><i class="fas fa-database"></i> Data</a></li>
            <li class="breadcrumb-item active"><a href="<?= base_url('data/datasarana'); ?>" aria-current="page">Data Sarana</a></li>
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

                <a href="" onclick="return saranaAdd('')" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSaranaModal">Tambah Sarana</a>
                <table class="table table-responsive table-striped table-bordered" id="dataTable" cellspacing="" style="width:100%;">
                    <thead>
                        <tr style="text-align:center">
                            <th>No.</th>
                            <th>Kode Sarana</th>
                            <th>Nama Sarana</th>
                            <th>Merk</th>
                            <th>Jumlah</th>
                            <th>Kategori</th>
                            <th>Kondisi</th>
                            <th>Tanggal Pembelian</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($sarana as $sr) : ?>
                            <tr>
                                <td scope="row"><?= $i++; ?></td>
                                <td><?= $sr['kode_sarana'] ?></td>
                                <td><?= $sr['namasarana'] ?></td>
                                <td><?= $sr['merksarana'] ?></td>
                                <td><?= $sr['jmlsarana'] ?></td>
                                <td><?= $sr['katsarana'] ?></td>
                                <td><?= $sr['konsarana'] ?></td>
                                <td><?php $date = date_create($sr['tglbeli'] );
                            echo date_format($date, "d F Y") ?></td>
                                <td>
                                    <a href="" onclick="return saranaEdit(<?= $sr['id']; ?>)" data-id="<?= $sr['id']; ?>" class="badge badge-success" data-toggle="modal" data-target="#editSaranaModal"><i class="fas fa-edit"></i></a>
                                    <a href="<?= base_url('data/delsarana/') . $sr['id']; ?>" class="badge badge-danger confirm-delete"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- MODAL ADD -->
    <div class="modal fade" id="newSaranaModal" tabindex="-1" role="dialog" aria-labelledby="newSaranaModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title sarana-title" id="sarana-title">Add New sarana</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="sarana-form" action="<?= base_url('data/dataSarana'); ?>" method="post">
                    <!-- hidden id -->
                    <input class="hidden" type="hidden" value="" name="id">
                    <div class="modal-body sarana-body">

                        <div class="form-group">
                            <input type="text" class="form-control kode_sarana" id="kode_sarana" name="kode_sarana" placeholder="Kode Sarana">
                            <?= form_error('Kode Sarana', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control namasarana" id="namasarana" name="namasarana" placeholder="Nama Sarana">
                            <?= form_error('Nama Sarana', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control merksarana" id="merksarana" name="merksarana" placeholder="Merk">
                            <?= form_error('Merk', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control jmlsarana" id="jmlsarana" name="jmlsarana" placeholder="Jumlah">
                            <?= form_error('Jumlah', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <select id="katsarana" name="katsarana" class="form-control katsarana">
                                <option value="">Kategori</option>
                                <option value="Sangat Baik">Sangat Baik</option>
                                <option value="Baik">Baik</option>
                                <option value="Kurang Baik">Kurang Baik</option>
                            </select>
                            <?= form_error('Kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <select id="konsarana" name="konsarana" class="form-control konsarana">
                                <option value="">Kondisi</option>
                                <option value="Layak Pakai">Layak Pakai</option>
                                <option value="Perbaikan">Perbaikan</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                            <?= form_error('Kondisi', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <input type="date" class="form-control tglbeli" id="tglbeli" name="tglbeli" placeholder="Tanggal Pembelian">
                            <?= form_error('Tanggal Pembelian', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                    </div>
                    <div class="modal-footer sarana-footer">
                        <button type="submit" class="btn btn-primary">Add</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL EDIT -->
    <div class="modal fade" id="editSaranaModal" tabindex="-1" role="dialog" aria-labelledby="editSaranaModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title sarana-title" id="sarana-title">Add New sarana</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="sarana-form" action="<?= base_url('data/editSarana'); ?>" method="post">
                    <!-- hidden id -->
                    <div class="modal-body sarana-body">
                        <input class="sarana-input" type="hidden" value="" name="id">

                        <div class="form-group">
                            <input type="text" class="form-control kode_saranas" id="kode_saranas" name="kode_saranas" placeholder="Kode Sarana">
                            <?= form_error('Kode Sarana', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control namasaranas" id="namasaranas" name="namasaranas" placeholder="Nama Sarana">
                            <?= form_error('Nama Sarana', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control merksaranas" id="merksaranas" name="merksaranas" placeholder="Merk">
                            <?= form_error('Merk', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control jmlsaranas" id="jmlsaranas" name="jmlsaranas" placeholder="Jumlah">
                            <?= form_error('Jumlah', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <select id="katsaranas" name="katsaranas" class="form-control katsaranas">
                                <option value="">Kategori</option>
                                <option value="Sangat Baik">Sangat Baik</option>
                                <option value="Baik">Baik</option>
                                <option value="Kurang Baik">Kurang Baik</option>
                            </select>
                            <?= form_error('Kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <select id="konsaranas" name="konsaranas" class="form-control konsaranas">
                                <option value="">Kondisi</option>
                                <option value="Layak Pakai">Layak Pakai</option>
                                <option value="Perbaikan">Perbaikan</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                            <?= form_error('Kondisi', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <input type="date" class="form-control tglbelis" id="tglbelis" name="tglbelis" placeholder="Tanggal Pembelian">
                            <?= form_error('Tanggal Pembelian', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                    </div>
                    <div class="modal-footer sarana-footer">
                        <button type="submit" class="btn btn-success">Edit</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>