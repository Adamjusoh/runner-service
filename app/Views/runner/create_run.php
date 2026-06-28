<?= $this->extend('layouts/main') ?>

<?php /** @var \CodeIgniter\View\View $this */ ?>

<?= $this->section('title') ?>Schedule New Run - Run2You<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="content-medium">
    <div class="page-header-split d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
        <div>
            <h1 class="page-title">Schedule a Run</h1>
            <p class="page-subtitle">Set up your next trip to the store or restaurant.</p>
        </div>
        <a href="<?= base_url('/runner/dashboard') ?>" class="link-back small fw-medium text-decoration-none">&larr; Back to Dashboard</a>
    </div>

    <div class="app-card">
        <div class="app-card-body-lg">

            <?php if (session()->get('errors')): ?>
                <div class="alert alert-danger mb-4" role="alert">
                    <ul class="mb-0 ps-3">
                        <?php foreach (session()->get('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('/runner/run/store') ?>" method="POST">
                <?= csrf_field() ?>

                <div class="mb-4">
                    <label class="form-label form-label-sm">Destination (Supermarket or Restaurant)</label>
                    <input type="text" name="location" value="<?= old('location') ?>" required placeholder="e.g., Emart, KFC Drive-Thru, Mydin" class="form-control form-control-sm">
                    <p class="form-text-xs">Be specific so customers know exactly where you are ordering from.</p>
                </div>

                <div class="row g-4 mb-4">
                    <div class="col-md-6">
                        <label class="form-label form-label-sm">Order Cut-off Time</label>
                        <input type="datetime-local" name="cutoff_time" value="<?= old('cutoff_time') ?>" required class="form-control form-control-sm">
                        <p class="form-text-xs">When should customers stop adding items?</p>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label form-label-sm">Estimated Delivery Time</label>
                        <input type="datetime-local" name="delivery_time" value="<?= old('delivery_time') ?>" required class="form-control form-control-sm">
                        <p class="form-text-xs">When will you arrive back with the items?</p>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label form-label-sm">Batch Delivery Fee (RM)</label>
                    <div class="input-group input-group-sm input-group-rm">
                        <span class="input-group-text">RM</span>
                        <input type="number" name="delivery_fee" value="<?= old('delivery_fee', '3.00') ?>" required min="0.50" step="0.10" class="form-control">
                    </div>
                    <p class="form-text-xs">The flat fee each customer pays to join this run. You keep 80%.</p>
                </div>

                <div class="form-divider">
                    <button type="submit" class="btn btn-primary w-100 fw-bold py-2 shadow-sm">
                        Publish Run Schedule
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
