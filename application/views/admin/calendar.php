<style>
    @media print {

        .header,
        .sidebar,
        .breadcrumb,
        .title,
        .Kegiatan,
        .Agenda,
        .Cetak,
        .dataTables_filter,
        .dataTables_length,
        .custom-select-sm,
        .dataTables_info,
        .paginate_button,
        .sticky-footer {
            display: none;
        }
    }
</style>

<meta charset="utf-8" />
<div class="container-fluid">
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>"><i class="fas fa-home"></i> Admin</a></li>
            <li class="breadcrumb-item active"><a href="<?= base_url('admin/calendar'); ?>" aria-current="page">Kalender Kegiatan</a></li>
        </ol>
    </nav>

    <!-- Page Heading -->
    <div class="card-header bg-info mb-4 rounded">
        <h1 class="h2 text-white font-weight-bolder text-center title"><?= $title; ?></h1>
    </div>
    <a href="<?= base_url('calendar'); ?>" class="btn btn-warning font-weight-bolder Kegiatan">Klik Kalender Kegiatan</a>
    <a href="javascript:window.print()" class="btn btn-danger font-weight-bolder Cetak">Cetak Agenda</a>
    <div class="card mt-4">
        <div class="h3 card-header bg-primary text-center font-weight-bolder text-white">
            Daftar Agenda
        </div>
        <div class="card-body">
            <table class="table table-responsive table-striped table-bordered dataTable" id="dataTable" cellspacing="2" style="width:100%;">
                <thead>
                    <tr style="text-align:center">
                        <th>No.</th>
                        <th>Agenda</th>
                        <th>Deskripsi</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Tanggal Penulisan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($calendar as $c) : ?>
                        <tr>
                            <td scope="row"><?= $i++; ?></td>
                            <td><?= $c['title']; ?></td>
                            <td><?= $c['description']; ?></td>
                            <td><?php $date = date_create($c['start_date']);
                                echo date_format($date, "d-F-Y") ?></td>
                            <td><?php $date = date_create($c['end_date']);
                                echo date_format($date, "d-F-Y") ?></td>
                            <td><?php $date = date_create($c['create_at']);
                                echo date_format($date, "d-F-Y H:i:s") ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


</div>
</div>