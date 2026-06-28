<?= $this->extend('layouts/main') ?>

<?php /** @var \CodeIgniter\View\View $this */ ?>

<?= $this->section('title') ?>Admin Dashboard - Run2You<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900">Platform Overview</h1>
    <p class="text-gray-600 mt-2">Monitor Run2You's financial health and user activity.</p>
</div>

<div class="bg-indigo-600 rounded-lg shadow-lg p-8 mb-8 text-white relative overflow-hidden">
    <div class="relative z-10">
        <h2 class="text-indigo-100 text-lg font-medium mb-1">Total Platform Commission (20% Cut)</h2>
        <div class="text-5xl font-extrabold tracking-tight">
            RM <?= number_format($platformRevenue, 2) ?>
        </div>
        <p class="mt-4 text-sm text-indigo-200">Generated entirely from automated transaction fees.</p>
    </div>
    <div class="absolute top-0 right-0 -mr-8 -mt-8 w-64 h-64 rounded-full bg-white opacity-10"></div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    
    <div class="bg-white rounded-lg border border-gray-200 shadow-sm p-6">
        <div class="text-sm font-medium text-gray-500 uppercase tracking-wide mb-1">Total Customers</div>
        <div class="text-3xl font-bold text-gray-900"><?= esc($totalCustomers) ?></div>
    </div>

    <div class="bg-white rounded-lg border border-gray-200 shadow-sm p-6">
        <div class="text-sm font-medium text-gray-500 uppercase tracking-wide mb-1">Approved Runners</div>
        <div class="text-3xl font-bold text-gray-900"><?= esc($totalRunners) ?></div>
    </div>

    <div class="bg-white rounded-lg border border-gray-200 shadow-sm p-6">
        <div class="text-sm font-medium text-gray-500 uppercase tracking-wide mb-1">Active Runs (Open)</div>
        <div class="text-3xl font-bold text-blue-600"><?= esc($activeRuns) ?></div>
    </div>

    <div class="bg-white rounded-lg border border-gray-200 shadow-sm p-6">
        <div class="text-sm font-medium text-gray-500 uppercase tracking-wide mb-1">Completed Runs</div>
        <div class="text-3xl font-bold text-green-600"><?= esc($completedRuns) ?></div>
    </div>

</div>

<div class="mt-8 bg-white rounded-lg border border-gray-200 shadow-sm p-6">
    <h3 class="text-lg font-bold text-gray-900 mb-4">System Management</h3>
    <div class="flex space-x-4">
        <a href="<?= base_url('/admin/users') ?>" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Manage User Accounts
        </a>
        <button disabled class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-400 cursor-not-allowed">
            Export Financial Report (Coming Soon)
        </button>
    </div>
</div>
<?= $this->endSection() ?>