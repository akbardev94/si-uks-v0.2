<div class="container-fluid">
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('data/datasekolah'); ?>"><i class="fas fa-database"></i> Data</a></li>
            <li class="breadcrumb-item active"><a href="<?= base_url('data/datasekolah'); ?>" aria-current="page">Data Sekolah</a></li>
        </ol>
    </nav>

    <!-- Page Heading -->
    <div class="card-header bg-info mb-4 rounded">
        <h1 class="h2 text-white font-weight-bolder text-center"><?= $title; ?></h1>
    </div>
    <div class="container">
        <div class="row">
            <section class="col-lg-4 connectedSortable">
                <div class="box box-danger">
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('massage'); ?>"></div>
                    <?php foreach ($sekolah as $se) : ?>
                        <div class="box-header with-border">
                            <a href="" onclick="sekolahEdit(<?= $se['id']; ?>)" data-id="<?= $se['id']; ?>" class=" btn btn-success mb-3 mt-4" data-toggle="modal" data-target="#editSekolahModal">Edit Data Sekolah</a>
                        </div><!-- /.box-header -->
                </div>
            </section>

            <section class="col-lg-9 mb-3 mt-4 connectedSortable">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title mb-3">Review</h3>
                    </div><!-- /.box-header -->
                    <div class="card">
                        <div class="box-body no-padding">
                            <div class="box-body">
                                <table width="100%" border="0" cellpadding="0" cellspacing="0" class="isi">
                                    <tbody>
                                        <tr>
                                            <!-- <td colspan="3" rowspan="4" align="center" valign="top" style="border-bottom:double"><img src="../assets/img/logo1.png" width="80" height="75"></td> -->
                                            <td colspan="12" class="h2 text-center font-weight-bolder"><?= $se['sekolah'] ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="12" class="h3 text-center"><?= $se['yayasan'] ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="12" class="mt-3 text-center"><?= $se['alamat'] ?></td>
                                        </tr>
                                        <tr>
                                            <td width="101" style="border-bottom:double">&nbsp;</td>
                                            <td width="25" style="border-bottom:double">&nbsp;</td>
                                            <td width="118" style="border-bottom:double">&nbsp;</td>
                                            <td width="13" style="border-bottom:double">&nbsp;</td>
                                            <td width="26" style="border-bottom:double">&nbsp;</td>
                                            <td width="125" style="border-bottom:double">&nbsp;</td>
                                            <td width="39" style="border-bottom:double">&nbsp;</td>
                                            <td width="90" style="border-bottom:double">&nbsp;</td>
                                            <td width="125" style="border-bottom:double">&nbsp;</td>
                                            <td width="90" style="border-bottom:double">&nbsp;</td>
                                            <td width="13" style="border-bottom:double">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <th>&nbsp;</th>
                                        </tr>
                                        <tr>
                                            <td colspan="6"><span class="mt-5"><?= $se['katamutiara'] ?></span></td>
                                            <td>&nbsp;</td>
                                            <td colspan="3" style="border-bottom:dotted;text-align:center;"><span class="isi"><?= $se['kepalasekolah'] ?></span></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    </tbody>
                                <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
    </div>
</div>
</div>

<!-- MODAL -->

<div class="modal fade" id="editSekolahModal" tabindex="-1" role="dialog" aria-labelledby="editSekolahModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title sekolah-title" id="sekolah-title">Edit Data Sekolah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="sekolah-form" action="<?= base_url('data/dataSekolah'); ?>" method="post">
                <!-- hidden id -->
                <div class="modal-body sekolah-body">
                    <input class="sekolah-input" type="hidden" value="" name="id">

                    <div class="form-group">
                        <input type="text" id="sekolah" name="sekolah" class="form-control text-black-50 sekolah" placeholder="Nama Sekolah">
                        <?= form_error('Nama Sekolah', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <input type="text" id="yayasan" name="yayasan" class="form-control yayasan" placeholder="Nama Yayasan">
                        <?= form_error('Nama Yayasan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <input type="text" id="alamat" name="alamat" class="form-control alamat" placeholder="Alamat">
                        <?= form_error('Alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <input type="text" id="katamutiara" name="katamutiara" class="form-control katamutiara" placeholder="Kata Mutiara">
                        <?= form_error('Kata Mutiara', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <input type="text" id="kepalasekolah" name="kepalasekolah" class="form-control kepalasekolah" placeholder="Kepala Sekolah">
                        <?= form_error('Kepala Sekolah', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <!-- <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input logo" id="logo" name="logo">
                            <label class="custom-file-label" for="image">Upload Logo Max. 1 Mb</label>
                        </div>
                    </div> -->

                </div>
                <div class="modal-footer sekolah-footer">
                    <button type="submit" class="btn btn-primary">Edit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>