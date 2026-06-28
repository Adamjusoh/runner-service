<?= $this->extend('layouts/main') ?>

<?php /** @var \CodeIgniter\View\View $this */ ?>

<?= $this->section('title') ?>Admin Dashboard - Run2You<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="page-header">
    <h1 class="page-title">Platform Overview</h1>
    <p class="page-subtitle">Monitor Run2You's financial health and user activity.</p>
</div>

<div class="admin-revenue-banner">
    <div class="admin-revenue-content">
        <h2 class="admin-revenue-title">Total Platform Commission (20% Cut)</h2>
        <div class="admin-revenue-amount">
            RM <?= number_format($platformRevenue, 2) ?>
        </div>
        <p class="admin-revenue-note">Generated entirely from automated transaction fees.</p>
    </div>
    <div class="admin-revenue-circle" aria-hidden="true"></div>
</div>

<div class="row g-4">
    <div class="col-md-6 col-lg-3">
        <div class="stat-card">
            <div class="stat-label">Total Customers</div>
            <div class="stat-value"><?= esc($totalCustomers) ?></div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="stat-card">
            <div class="stat-label">Approved Runners</div>
            <div class="stat-value"><?= esc($totalRunners) ?></div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="stat-card">
            <div class="stat-label">Active Runs (Open)</div>
            <div class="stat-value stat-value-blue"><?= esc($activeRuns) ?></div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="stat-card">
            <div class="stat-label">Completed Runs</div>
            <div class="stat-value stat-value-green"><?= esc($completedRuns) ?></div>
        </div>
    </div>
</div>

<div class="app-card mt-4">
    <div class="app-card-body">
        <h3 class="section-title mb-3">System Management</h3>
        <div class="management-actions">
            <a href="<?= base_url('/admin/users') ?>" class="btn btn-outline-secondary btn-sm">
                Manage User Accounts
            </a>
            <button type="button" disabled class="btn btn-disabled-future btn-sm">
                Export Financial Report (Coming Soon)
            </button>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
