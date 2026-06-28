<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Active Run Manifest<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="mb-6 flex justify-between items-end">
    <div>
        <a href="<?= base_url('/runner/dashboard') ?>" class="text-sm text-indigo-600 hover:underline mb-2 inline-block">&larr; Back to Dashboard</a>
        <h1 class="text-2xl font-bold text-gray-900">Shopping List: <?= esc($run['location']) ?></h1>
    </div>
</div>

<div class="bg-white rounded-lg border border-gray-200 shadow-sm overflow-hidden">
    <?php if (empty($shoppingList)): ?>
        <div class="p-8 text-center text-gray-500">
            No one has placed an order for this run yet.
        </div>
    <?php else: ?>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-indigo-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-indigo-800 uppercase tracking-wider">Item to Buy</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-indigo-800 uppercase tracking-wider">Qty</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-indigo-800 uppercase tracking-wider">Customer Info & Address</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-indigo-800 uppercase tracking-wider">Check</th>
                </tr>
            </thead>
            
            <tbody class="bg-white divide-y divide-gray-200">
                <?php foreach ($shoppingList as $item): ?>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900"><?= esc($item['item_name']) ?></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-center font-bold text-indigo-600 bg-indigo-50/30"><?= esc($item['total_quantity']) ?></td>
                        <td class="px-6 py-4 text-sm text-gray-600">
                            <strong><?= esc($item['customer_name']) ?></strong><br>
                            <span class="text-xs text-gray-500 break-words"><?= esc($item['delivery_address']) ?></span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <input type="checkbox" class="h-5 w-5 text-indigo-600 border-gray-300 rounded cursor-pointer">
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>