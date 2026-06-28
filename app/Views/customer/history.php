<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Order History - Run2You<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="mb-8 flex justify-between items-end">
    <div>
        <h1 class="text-3xl font-bold text-gray-900">My Orders</h1>
        <p class="text-gray-600 mt-2">Track your active orders and view past receipts.</p>
    </div>
    <a href="<?= base_url('/customer/dashboard') ?>" class="text-sm text-indigo-600 hover:underline font-medium">&larr; Back to Dashboard</a>
</div>

<div class="space-y-6">
    <?php if (empty($orders)): ?>
        <div class="bg-white p-8 text-center rounded-lg border border-gray-200 shadow-sm">
            <p class="text-gray-500">You haven't placed any orders yet.</p>
            <a href="<?= base_url('/customer/dashboard') ?>" class="mt-4 inline-block bg-indigo-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-indigo-700">Browse Active Runs</a>
        </div>
    <?php else: ?>
        <?php foreach ($orders as $order): ?>
            
            <?php 
                $statusColor = 'bg-gray-100 text-gray-800'; // Default / Closed
                if ($order['run_status'] == 'open') $statusColor = 'bg-blue-100 text-blue-800';
                if ($order['run_status'] == 'delivered') $statusColor = 'bg-green-100 text-green-800';
                if ($order['run_status'] == 'cancelled') $statusColor = 'bg-red-100 text-red-800';
            ?>

            <div class="bg-white rounded-lg border border-gray-200 shadow-sm overflow-hidden">
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-200 flex flex-col md:flex-row md:justify-between md:items-center">
                    <div class="mb-2 md:mb-0">
                        <h3 class="text-lg font-bold text-gray-900">Run: <?= esc($order['location']) ?></h3>
                        <p class="text-sm text-gray-500">Placed on <?= date('d M Y, h:i A', strtotime($order['created_at'])) ?></p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <span class="text-sm text-gray-600"><strong>Delivery Fee:</strong> RM <?= number_format($order['delivery_fee'], 2) ?></span>
                        <span class="px-3 py-1 text-xs font-bold rounded-full <?= $statusColor ?>">
                            <?= strtoupper(str_replace('_', ' ', $order['run_status'])) ?>
                        </span>
                    </div>
                </div>

                <div class="px-6 py-4">
                    <h4 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-3">Items Requested</h4>
                    <ul class="space-y-2">
                        <?php foreach ($order['items'] as $item): ?>
                            <li class="flex items-center text-sm text-gray-800">
                                <span class="bg-gray-100 text-gray-600 px-2 py-0.5 rounded text-xs font-bold mr-3"><?= esc($item['quantity']) ?>x</span>
                                <?= esc($item['item_name']) ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="bg-indigo-50/50 px-6 py-3 border-t border-gray-100 text-sm text-indigo-800">
                    <span class="font-bold">Payment Note:</span> Please prepare Cash/QR for the cost of your items plus the RM <?= number_format($order['delivery_fee'], 2) ?> delivery fee upon arrival.
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>