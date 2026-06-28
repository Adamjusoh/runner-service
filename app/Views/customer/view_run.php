<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Join Run<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-lg border border-gray-200 shadow-sm p-6 mb-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-2">Order for: <?= esc($run['location']) ?></h2>
        <div class="flex space-x-6 text-sm text-gray-600 border-t border-gray-100 pt-4 mt-2">
            <p><strong>Cut-off:</strong> <?= date('h:i A', strtotime($run['cutoff_time'])) ?></p>
            <p><strong>Delivery:</strong> <?= date('h:i A', strtotime($run['delivery_time'])) ?></p>
            <p><strong>Delivery Fee:</strong> RM <?= number_format($run['delivery_fee'], 2) ?></p>
        </div>
    </div>

    <form action="<?= base_url('/customer/order/place') ?>" method="POST" class="bg-white rounded-lg border border-gray-200 shadow-sm p-6">
        <?= csrf_field() ?>
        <input type="hidden" name="run_id" value="<?= $run['run_id'] ?>">
        
        <h3 class="text-lg font-bold text-gray-900 mb-4">Your Shopping List</h3>
        
        <div class="space-y-3 mb-6">
            <?php for($i=1; $i<=3; $i++): ?>
            <div class="flex space-x-4">
                <div class="flex-grow">
                    <input type="text" name="item_name[]" placeholder="Item name (e.g., Maggi Kari 5-pack)" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div class="w-24">
                    <input type="number" name="quantity[]" placeholder="Qty" min="1" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>
            </div>
            <?php endfor; ?>
            <p class="text-xs text-gray-500 mt-2">Leave rows blank if not needed.</p>
        </div>

        <div class="mb-6 pt-4 border-t border-gray-100">
            <label class="block text-sm font-medium text-gray-700 mb-1">Delivery Address / Drop-off Location</label>
            <textarea name="delivery_address" required rows="2" placeholder="e.g., UniSZA Student Hostel, Block B, Level 2, Room 12" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
            <p class="text-xs text-gray-500 mt-1">Be specific so the runner knows exactly where to find you on campus or at home.</p>
        </div>

        <button type="submit" class="w-full bg-green-600 text-white font-medium py-2.5 rounded-md hover:bg-green-700 transition">
            Confirm & Place Order
        </button>
    </form>
</div>
<?= $this->endSection() ?>