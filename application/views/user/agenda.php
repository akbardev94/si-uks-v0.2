<style>
    @media print {

        .header,
        .sidebar,
        .breadcrumb,
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
            <li class="breadcrumb-item"><a href="<?= base_url('user'); ?>"><i class="fas fa-user"></i> User</a></li>
            <li class="breadcrumb-item active"><a href="<?= base_url('user'); ?>" aria-current="page">Agenda</a></li>
        </ol>
    </nav>

    <!-- Page Heading -->
    <a href="javascript:window.print()" class="btn btn-danger font-weight-bolder mb-3 Cetak">Cetak Agenda</a>
    <div class="card-header bg-info mb-4 rounded">
        <h1 class="h2 text-white font-weight-bolder text-center title"><?= $title; ?> Kegiatan UKS</h1>
    </div>
    <div class="card mt-4">
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