<style>
    @media print {

        .header,
        .export,
        .user,
        .user2,
        .title,
        .review,
        .sidebar,
        .form-group,
        .sticky-footer {
            display: none;
        }
    }
</style>

<div class="container-fluid">
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item user"><a href="<?= base_url('user'); ?>"><i class="fas fa-user"></i> User</a></li>
            <li class="breadcrumb-item active user2"><a href="<?= base_url('user/rapor'); ?>" aria-current="page">Rapor Kesehatan</a></li>
        </ol>
    </nav>

    <!-- Page Heading -->
    <div class="card-header bg-info mb-4 rounded header">
        <h1 class="h2 text-white font-weight-bolder text-center"><?= $title; ?></h1>
    </div>
    <a href="javascript:window.print()" class="btn btn-danger mb-3 ml-2 export">Print or PDF</a>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <?php if ($nis != '') { ?>
            <section class="col-lg-9 mb-3 mt-4 connectedSortable">
                <h3 class="box-title mb-3 review">Review Rapor Kesehatan Siswa</h3>
                <div class="box box-success">
                    <div class="box-header with-border">
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="box-body">
                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <!-- <td colspan="3" rowspan="4" align="center" valign="top" style="border-bottom:double"><img src="../assets/img/logo1.png" width="95" height="90"></td> -->
                                        <td colspan="12" class="h2 font-weight-bolder text-center"><?= $sekolah['sekolah'] ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="12" class="h3 text-center"><?= $sekolah['yayasan'] ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="12" class="h6 text-center"><?= $sekolah['alamat'] ?></td>
                                    </tr>
                                    <tr>
                                        <td width="101" style="border-bottom:double">&nbsp;</td>
                                        <td width="101" style="border-bottom:double">&nbsp;</td>
                                        <td width="13" style="border-bottom:double">&nbsp;</td>
                                        <td width="118" style="border-bottom:double">&nbsp;</td>
                                        <td width="13" style="border-bottom:double">&nbsp;</td>
                                        <td width="26" style="border-bottom:double">&nbsp;</td>
                                        <td width="125" style="border-bottom:double">&nbsp;</td>
                                        <td width="39" style="border-bottom:double">&nbsp;</td>
                                        <td width="13" style="border-bottom:double">&nbsp;</td>
                                        <td width="90" style="border-bottom:double">&nbsp;</td>
                                        <td width="26" style="border-bottom:double">&nbsp;</td>
                                        <td width="125" style="border-bottom:double">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <th>&nbsp;</th>
                                    </tr>
                                    <tr>
                                        <th colspan="12" class="text-center font-weight-bolder h4">RAPOR KESEHATAN SISWA</th>
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
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <th colspan="6" class="h5"><i class='fas fa-usifer'> &nbsp;Identitas Siswa :</i></th>
                                    </tr>
                                    <tr>
                                        <th>&nbsp;</th>
                                    </tr>
                                    <tr>
                                        <th colspan="2">NIS</th>
                                        <th>:</th>
                                        <th><?= $raporSiswa['noinduk'] ?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Nama Lengkap</th>
                                        <th>:</th>
                                        <th colspan="6"><?= $raporSiswa['nama'] ?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Jenis Kelamin</th>
                                        <th>:</th>
                                        <th colspan="6"><?= $raporSiswa['kelamin'] ?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Golongan Darah</th>
                                        <th>:</th>
                                        <th colspan="6"><?= $raporSiswa['gdsiswa'] ?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Alamat</th>
                                        <th>:</th>
                                        <th colspan="6"><?= $raporSiswa['alamatortu'] ?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Kelas</th>
                                        <th>:</th>
                                        <th colspan="6"><?= $raporSiswa['klspos'] ?></th>
                                    </tr>
                                    <tr>
                                        <th>&nbsp;</th>
                                    </tr>
                                    <tr>
                                        <th colspan="6" class="h5"><i class='fas fa-stethoscope'> &nbsp;Data Periksa Kesehatan Siswa :</i></th>
                                    </tr>
                                    <tr>
                                        <th>&nbsp;</th>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Tinggi Badan</th>
                                        <th>:</th>
                                        <th colspan="1" class="text-center"><?= $raporSiswa['tbsiswa'] ?></th>
                                        <th colspan="2">cm</th>
                                        <th colspan="4">Status Gizi</th>
                                        <th>:</th>
                                        <th><?= $raporSiswa['statusgizi'] ?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Berat Badan</th>
                                        <th>:</th>
                                        <th colspan="1" class="text-center"><?= $raporSiswa['bbsiswa'] ?></th>
                                        <th colspan="2">kg</th>
                                        <th colspan="4">Penggunaan Alat Bantu</th>
                                        <th>:</th>
                                        <th><?= $raporSiswa['alatbantu'] ?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Indeks Massa Tubuh</th>
                                        <th>:</th>
                                        <th colspan="3"><?= $raporSiswa['imt'] ?></th>
                                        <th colspan="4">Modalitas Belajar</th>
                                        <th>:</th>
                                        <th><?= $raporSiswa['modalitasbelajar'] ?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Imunisasi</th>
                                        <th>:</th>
                                        <th colspan="3"><?= $raporSiswa['imun'] ?></th>
                                        <th colspan="4">Kebugaran Jasmani</th>
                                        <th>:</th>
                                        <th><?= $raporSiswa['jasmani'] ?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Jenis Disabilitas</th>
                                        <th>:</th>
                                        <th colspan="3"><?= $raporSiswa['disabilitas'] ?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Tekanan Darah</th>
                                        <th>:</th>
                                        <th colspan="3"><?= $raporSiswa['tekdarah'] ?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Kebersihan Rambut</th>
                                        <th>:</th>
                                        <th colspan="3"><?= $raporSiswa['rambut'] ?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Kebersihan Kuku</th>
                                        <th>:</th>
                                        <th colspan="3"><?= $raporSiswa['kuku'] ?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Kebersihan Kulit</th>
                                        <th>:</th>
                                        <th colspan="3"><?= $raporSiswa['kulit'] ?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Kesehatan Rongga Mulut</th>
                                        <th>:</th>
                                        <th colspan="3"><?= $raporSiswa['ronggamulut'] ?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Kesehatan Gigi & Gusi</th>
                                        <th>:</th>
                                        <th colspan="3"><?= $raporSiswa['gigigusi'] ?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Kesehatan Mata</th>
                                        <th>:</th>
                                        <th colspan="3"><?= $raporSiswa['mata'] ?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Kesehatan Telinga</th>
                                        <th>:</th>
                                        <th colspan="3"><?= $raporSiswa['telinga'] ?></th>
                                    </tr>
                                    <tr>
                                        <th>&nbsp;</th>
                                    </tr>
                                    <tr>
                                        <th colspan="6" class="h5"><i class='fas fa-file-medical'> &nbsp;Hasil Periksa Kesehatan Siswa :</i></th>
                                    </tr>
                                    <tr>
                                        <th>&nbsp;</th>
                                    </tr>
                                    <tr>
                                        <th colspan="12">Berdasarkan Hasil pemeriksaan dan rekam kesehatan siswa bahwa Ananda yang bernama <b><?= $raporSiswa['nama'] ?></b> dinyatakan <b><?= $raporSiswa['keterangan'] ?></b> dengan catatan perlu periksakan <b><?= $raporSiswa['catatan'] ?></b>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>&nbsp;</th>
                                    </tr>
                                    <tr>
                                        <th>&nbsp;</th>
                                    </tr>
                                    <tr>
                                        <th>&nbsp;</th>
                                    </tr>
                                    <tr>
                                        <th>&nbsp;</th>
                                    </tr>
                                    <tr>
                                        <th>&nbsp;</th>
                                    </tr>
                                    <tr>
                                        <td colspan="6"><span class="mt-5"><?= $sekolah['katamutiara'] ?></span></td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td colspan="5" style="border-bottom:dotted;text-align:center;"><span class="font-weight-bolder"><?= $sekolah['kepalasekolah'] ?></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>
    </div>
</div>
</div>
<script type="text/javascript">

</script>