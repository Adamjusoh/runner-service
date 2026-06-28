<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Customer Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900">Available Runs</h1>
    <p class="text-gray-600 mt-2">Join an upcoming supermarket run to save on delivery fees.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php if (empty($activeRuns)): ?>
        <div class="col-span-full bg-white p-8 text-center rounded-lg border border-gray-200">
            <p class="text-gray-500">No active runs available right now. Please check back later!</p>
        </div>
    <?php else: ?>
        <?php foreach ($activeRuns as $run): ?>
            <div class="bg-white rounded-lg border border-gray-200 shadow-sm hover:shadow-md transition p-6">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 mb-2">
                            Accepting Orders
                        </span>
                        <h3 class="text-xl font-bold text-gray-900"><?= esc($run['location']) ?></h3>
                    </div>
                    <span class="text-lg font-bold text-indigo-600">RM <?= number_format($run['delivery_fee'], 2) ?></span>
                </div>
                
                <div class="space-y-2 text-sm text-gray-600 mb-6">
                    <p><strong>Order Cut-off:</strong> <?= date('d M Y, h:i A', strtotime($run['cutoff_time'])) ?></p>
                    <p><strong>Est. Delivery:</strong> <?= date('d M Y, h:i A', strtotime($run['delivery_time'])) ?></p>
                </div>
                
                <a href="<?= base_url('/customer/run/view/' . $run['run_id']) ?>" class="block w-full text-center bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 font-medium text-sm transition">
                    Join this Run
                </a>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>