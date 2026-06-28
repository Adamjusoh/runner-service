<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Runner Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="page-header-split d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3">
    <div>
        <h1 class="page-title">My Runs</h1>
        <p class="page-subtitle">Manage your scheduled trips and active shopping lists.</p>
    </div>
    <a href="<?= base_url('/runner/run/create') ?>" class="btn btn-primary btn-sm shadow-sm">
        + Schedule New Run
    </a>
</div>

<div class="app-card overflow-hidden">
    <div class="table-responsive">
        <table class="table table-app">
            <thead>
                <tr>
                    <th>Location</th>
                    <th>Cut-off Time</th>
                    <th class="text-center">Status</th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($runs as $run): ?>

                    <?php
                        $badgeClass = 'badge-status badge-status-closed';
                        $statusText = 'Unknown';

                        if ($run['status'] === 'open') {
                            $badgeClass = 'badge-status badge-status-open';
                            $statusText = 'Open';
                        } elseif ($run['status'] === 'closed_for_shopping') {
                            $badgeClass = 'badge-status badge-status-shopping';
                            $statusText = 'Closed (Shopping)';
                        } elseif ($run['status'] === 'delivered') {
                            $badgeClass = 'badge-status badge-status-delivered';
                            $statusText = 'Delivered';
                        } elseif ($run['status'] === 'cancelled') {
                            $badgeClass = 'badge-status badge-status-cancelled';
                            $statusText = 'Cancelled';
                        }
                    ?>

                    <tr>
                        <td class="fw-medium"><?= esc($run['location']) ?></td>
                        <td class="text-muted"><?= date('d M Y, h:i A', strtotime($run['cutoff_time'])) ?></td>
                        <td class="text-center">
                            <span class="<?= $badgeClass ?>"><?= $statusText ?></span>
                        </td>
                        <td class="text-end">
                            <a href="<?= base_url('/runner/run/active/' . $run['run_id']) ?>" class="btn-manifest">View Manifest</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
