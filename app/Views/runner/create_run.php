<?= $this->extend('layouts/main') ?>

<?php /** @var \CodeIgniter\View\View $this */ ?>

<?= $this->section('title') ?>Schedule New Run - Run2You<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="max-w-2xl mx-auto">
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Schedule a Run</h1>
            <p class="text-gray-600 mt-2">Set up your next trip to the store or restaurant.</p>
        </div>
        <a href="<?= base_url('/runner/dashboard') ?>" class="text-sm text-indigo-600 hover:underline font-medium">&larr; Back to Dashboard</a>
    </div>

    <div class="bg-white rounded-lg border border-gray-200 shadow-sm p-8">
        
        <?php if (session()->get('errors')): ?>
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-md text-sm mb-6">
                <ul class="list-disc pl-5">
                    <?php foreach (session()->get('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('/runner/run/store') ?>" method="POST" class="space-y-6">
            <?= csrf_field() ?>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Destination (Supermarket or Restaurant)</label>
                <input type="text" name="location" value="<?= old('location') ?>" required placeholder="e.g., Emart, KFC Drive-Thru, Mydin" 
                       class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                <p class="text-xs text-gray-500 mt-1">Be specific so customers know exactly where you are ordering from.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Order Cut-off Time</label>
                    <input type="datetime-local" name="cutoff_time" value="<?= old('cutoff_time') ?>" required 
                           class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                    <p class="text-xs text-gray-500 mt-1">When should customers stop adding items?</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Estimated Delivery Time</label>
                    <input type="datetime-local" name="delivery_time" value="<?= old('delivery_time') ?>" required 
                           class="w-full border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                    <p class="text-xs text-gray-500 mt-1">When will you arrive back with the items?</p>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Batch Delivery Fee (RM)</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="text-gray-500 sm:text-sm">RM</span>
                    </div>
                    <input type="number" name="delivery_fee" value="<?= old('delivery_fee', '3.00') ?>" required min="0.50" step="0.10"
                           class="w-full border border-gray-300 rounded-md pl-10 pr-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                </div>
                <p class="text-xs text-gray-500 mt-1">The flat fee each customer pays to join this run. You keep 80%.</p>
            </div>

            <div class="pt-4 border-t border-gray-100">
                <button type="submit" class="w-full bg-indigo-600 text-white font-bold py-3 rounded-md hover:bg-indigo-700 transition shadow-sm">
                    Publish Run Schedule
                </button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>