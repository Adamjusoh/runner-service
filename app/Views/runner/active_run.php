<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Active Run Manifest<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="manifest-header d-flex flex-column flex-sm-row justify-content-between align-items-sm-end gap-3">
    <div>
        <a href="<?= base_url('/runner/dashboard') ?>" class="link-back small text-decoration-none d-inline-block mb-2">&larr; Back to Dashboard</a>
        <h1 class="page-title-sm">Shopping List: <?= esc($run['location']) ?></h1>
        <p class="manifest-status-text">
            Status:
            <span class="manifest-status-value"><?= esc(ucfirst(str_replace('_', ' ', $run['status']))) ?></span>
        </p>
    </div>

    <?php if ($canComplete): ?>
        <form action="<?= base_url('/runner/run/complete/' . $run['run_id']) ?>" method="POST" onsubmit="return confirm('Mark this run as delivered?');">
            <?= csrf_field() ?>
            <button type="submit" class="btn btn-success btn-sm shadow-sm">
                Mark Run as Delivered
            </button>
        </form>
    <?php elseif ($run['status'] === 'delivered'): ?>
        <span class="badge-completed">Delivery Completed</span>
    <?php endif; ?>
</div>

<div class="app-card overflow-hidden">
    <?php if (empty($shoppingList)): ?>
        <div class="empty-state">
            No one has placed an order for this run yet.
        </div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-app table-manifest">
                <thead>
                    <tr>
                        <th>Item to Buy</th>
                        <th class="text-center">Qty</th>
                        <th>Customer Info &amp; Address</th>
                        <th class="text-center">Check</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($shoppingList as $item): ?>
                        <tr>
                            <td class="fw-bold"><?= esc($item['item_name']) ?></td>
                            <td class="qty-cell"><?= esc($item['total_quantity']) ?></td>
                            <td class="text-muted">
                                <strong class="text-body"><?= esc($item['customer_name']) ?></strong><br>
                                <span class="delivery-address-text"><?= esc($item['delivery_address']) ?></span>
                            </td>
                            <td class="text-center">
                                <input type="checkbox" class="form-check-input checkbox-lg">
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const runId = <?= esc($run['run_id']) ?>;
    const checkboxes = document.querySelectorAll('.checkbox-lg');
    
    // Load state
    checkboxes.forEach((checkbox, index) => {
        const key = `run_${runId}_item_${index}`;
        if (localStorage.getItem(key) === 'true') {
            checkbox.checked = true;
        }
        
        // Save state on change
        checkbox.addEventListener('change', function() {
            localStorage.setItem(key, this.checked);
        });
    });
});
</script>
<?= $this->endSection() ?>
