<div class="container-fluid">
    <!-- Judul Halaman -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">
            <i class="bi bi-activity"></i> Activity Logs
        </h1>
    </div>

    <!-- Card Utama -->
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover table-sm align-middle mb-0">
                    <thead class="table-dark text-center sticky-top">
                        <tr>
                            <th width="4%">ID</th>
                            <th width="12%">User</th>
                            <th width="10%">Action</th>
                            <th width="15%">Table</th>
                            <th width="8%">Record</th>
                            <th width="20%">Old Data</th>
                            <th width="20%">New Data</th>
                            <th width="11%">Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($logs)): ?>
                            <?php foreach($logs as $log): ?>
                            <tr>
                                <td class="text-center"><?= $log->id ?></td>
                                <td><?= htmlspecialchars($log->username) ?></td>
                                <td class="text-center">
                                    <?php
                                    $action = strtolower($log->action);
                                    $badgeClass = 'bg-secondary';
                                    if ($action == 'create' || $action == 'insert') $badgeClass = 'bg-success';
                                    elseif ($action == 'update') $badgeClass = 'bg-warning text-dark';
                                    elseif ($action == 'delete') $badgeClass = 'bg-danger';
                                    ?>
                                    <span class="badge <?= $badgeClass ?> rounded-pill px-3 py-1">
                                        <?= strtoupper(htmlspecialchars($log->action)) ?>
                                    </span>
                                </td>
                                <td><?= htmlspecialchars($log->table_name) ?></td>
                                <td class="text-center"><?= $log->record_id ?></td>
                                <td class="log-data"><?= nl2br(htmlspecialchars($log->old_data)) ?></td>
                                <td class="log-data"><?= nl2br(htmlspecialchars($log->new_data)) ?></td>
                                <td class="text-center">
                                    <?= date('d-m-Y H:i:s', strtotime($log->created_at)) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" class="text-center text-muted py-4">
                                    <i class="bi bi-info-circle"></i> Belum ada data log.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Style tambahan -->
<style>
    /* Header */
    thead th {
        background-color: #343a40;
        color: #fff;
        position: sticky;
        top: 0;
        z-index: 2;
    }

    /* Border dan radius tabel */
    .table {
        border: 1px solid #dee2e6;
        border-radius: .5rem;
        overflow: hidden;
    }

    /* Ukuran font */
    .table td, .table th {
        font-size: 0.85rem;
        vertical-align: top;
        padding: .5rem .75rem;
    }

    /* Style untuk kolom Old/New Data */
    .log-data {
        white-space: pre-wrap;
        font-size: 0.8rem;
        color: #495057;
    }

    /* Hover row */
    .table-hover tbody tr:hover {
        background-color: #f1f3f5;
    }

    /* Badge */
    .badge {
        font-size: 0.75rem;
    }

    /* Card shadow lembut */
    .card {
        border-radius: .75rem;
    }
</style>
