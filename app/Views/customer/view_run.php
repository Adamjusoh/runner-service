<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Join Run<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="content-narrow">
    <div class="app-card mb-4">
        <div class="app-card-body">
            <h2 class="page-title-sm mb-2">Order for: <?= esc($run['location']) ?></h2>
            <div class="run-info-bar">
                <p><strong>Cut-off:</strong> <?= date('h:i A', strtotime($run['cutoff_time'])) ?></p>
                <p><strong>Delivery:</strong> <?= date('h:i A', strtotime($run['delivery_time'])) ?></p>
                <p><strong>Delivery Fee:</strong> RM <?= number_format($run['delivery_fee'], 2) ?></p>
            </div>
        </div>
    </div>

    <form action="<?= base_url('/customer/order/place') ?>" method="POST" class="app-card">
        <div class="app-card-body">
            <?= csrf_field() ?>
            <input type="hidden" name="run_id" value="<?= $run['run_id'] ?>">

            <h3 class="section-title mb-3">Your Shopping List</h3>

            <div class="mb-4">
                <?php for ($i = 1; $i <= 3; $i++): ?>
                <div class="item-row">
                    <div class="item-row-grow">
                        <input type="text" name="item_name[]" class="form-control form-control-sm">
                    </div>
                    <div class="qty-input-col">
                        <input type="number" name="quantity[]" min="1" class="form-control form-control-sm">
                    </div>
                </div>
                <?php endfor; ?>
                <p class="form-text-xs mb-0">Leave rows blank if not needed.</p>
            </div>

            <div class="form-divider mb-4">
                <label class="form-label form-label-sm">Delivery Address / Drop-off Location</label>
                <textarea name="delivery_address" required rows="2" class="form-control form-control-sm"></textarea>
                <p class="form-text-xs">Be specific so the runner knows exactly where to find you on campus or at home.</p>
            </div>

            <button type="submit" class="btn btn-success-order">Confirm &amp; Place Order</button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>
