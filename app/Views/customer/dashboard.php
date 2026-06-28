<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Customer Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="page-header">
    <h1 class="page-title">Available Runs</h1>
    <p class="page-subtitle">Join an upcoming supermarket run to save on delivery fees.</p>
</div>

<div class="row g-4">
    <?php if (empty($activeRuns)): ?>
        <div class="col-12">
            <div class="empty-state-card">
                <p class="text-muted mb-0">No active runs available right now. Please check back later!</p>
            </div>
        </div>
    <?php else: ?>
        <?php foreach ($activeRuns as $run): ?>
            <div class="col-md-6 col-lg-4">
                <div class="app-card run-card h-100">
                    <div class="app-card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <span class="badge-status badge-accepting d-inline-block mb-2">Accepting Orders</span>
                                <h3 class="h5 fw-bold mb-0"><?= esc($run['location']) ?></h3>
                            </div>
                            <span class="run-card-fee">RM <?= number_format($run['delivery_fee'], 2) ?></span>
                        </div>

                        <div class="run-meta mb-4">
                            <p><strong>Order Cut-off:</strong> <?= date('d M Y, h:i A', strtotime($run['cutoff_time'])) ?></p>
                            <p><strong>Est. Delivery:</strong> <?= date('d M Y, h:i A', strtotime($run['delivery_time'])) ?></p>
                        </div>

                        <a href="<?= base_url('/customer/run/view/' . $run['run_id']) ?>" class="btn btn-primary w-100 btn-sm">
                            Join this Run
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>
