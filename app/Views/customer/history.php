<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Order History - Run2You<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="page-header-split d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-3">
    <div>
        <h1 class="page-title">My Orders</h1>
        <p class="page-subtitle">Track your active orders and view past receipts.</p>
    </div>
    <a href="<?= base_url('/customer/dashboard') ?>" class="link-back small fw-medium text-decoration-none">&larr; Back to Dashboard</a>
</div>

<div class="d-flex flex-column gap-4">
    <?php if (empty($orders)): ?>
        <div class="empty-state-card">
            <p class="text-muted mb-3">You haven't placed any orders yet.</p>
            <a href="<?= base_url('/customer/dashboard') ?>" class="btn btn-primary btn-sm">Browse Active Runs</a>
        </div>
    <?php else: ?>
        <?php foreach ($orders as $order): ?>

            <?php
                $statusBadge = 'badge-status badge-status-closed';
                if ($order['run_status'] == 'open') {
                    $statusBadge = 'badge-status badge-status-open';
                }
                if ($order['run_status'] == 'delivered') {
                    $statusBadge = 'badge-status badge-status-delivered';
                }
                if ($order['run_status'] == 'cancelled') {
                    $statusBadge = 'badge-status badge-status-cancelled';
                }
            ?>

            <div class="order-card">
                <div class="order-card-header d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2">
                    <div>
                        <h3 class="h5 fw-bold mb-1">Run: <?= esc($order['location']) ?></h3>
                        <p class="text-muted small mb-0">Placed on <?= date('d M Y, h:i A', strtotime($order['created_at'])) ?> &bull; <strong class="text-body">Est. Delivery: <?= date('d M Y, h:i A', strtotime($order['delivery_time'])) ?></strong></p>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <span class="small text-muted"><strong>Delivery Fee:</strong> RM <?= number_format($order['delivery_fee'], 2) ?></span>
                        <span class="<?= $statusBadge ?>">
                            <?= strtoupper(str_replace('_', ' ', $order['run_status'])) ?>
                        </span>
                    </div>
                </div>

                <div class="order-card-body">
                    <h4 class="order-items-title">Items Requested</h4>
                    <ul class="list-unstyled mb-0">
                        <?php foreach ($order['items'] as $item): ?>
                            <li class="order-item">
                                <span class="order-item-qty"><?= esc($item['quantity']) ?>x</span>
                                <?= esc($item['item_name']) ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="payment-note">
                    <span class="fw-bold">Payment Note:</span> Please prepare Cash/QR for the cost of your items plus the RM <?= number_format($order['delivery_fee'], 2) ?> delivery fee upon arrival.
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>
