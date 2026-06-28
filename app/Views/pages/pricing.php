<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Pricing & Revenue Model — Run2You<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-10">
        <!-- Section Header -->
        <div class="border-bottom pb-3 mb-4">
            <h1 class="text-primary fw-bold">Pricing & Revenue Model</h1>
            <p class="text-muted fs-5">A study on how the platform remains sustainable and adds value to both users.</p>
        </div>

        <p class="lead">
            As a student project, Run2You was designed with a dual-focus: to keep micro-deliveries highly affordable for local neighborhoods while building a sustainable monetization strategy for the platform's long-term maintenance.
        </p>

        <!-- Current Operational Costs -->
        <div class="card mb-4 border-info">
            <div class="card-body">
                <h4 class="card-title text-info mb-3">User Pricing (Free to Join)</h4>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="p-3 border rounded bg-light h-100">
                            <h5 class="fw-bold">Cost for Customers</h5>
                            <ul class="mb-0">
                                <li><strong>No Account Fees:</strong> Registration is free.</li>
                                <li><strong>Direct Delivery Fee:</strong> Customers only pay the runner-defined delivery fee (e.g. RM 1.50 - RM 3.00 per run).</li>
                                <li>No markup or price inflation on the items requested.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 border rounded bg-light h-100">
                            <h5 class="fw-bold">Cost for Runners</h5>
                            <ul class="mb-0">
                                <li><strong>Free Run Scheduling:</strong> List runs without upfront costs.</li>
                                <li><strong>Keep Earnings:</strong> Keep 100% of the delivery fees collected from customers during the launch phase.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Proposed Monetization Strategy -->
        <h4 class="mt-4 mb-3">Platform Monetization Strategy</h4>
        <p class="text-muted">
            To offset system hosting fees (like domain registration, PHP server hosting, and database backups), the following revenue models are proposed for the next phase of deployment:
        </p>

        <div class="row g-4 mb-4">
            <!-- Revenue Stream 1 -->
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="fs-1 mb-2">📊</div>
                        <h5>1. Platform Commission</h5>
                        <p class="text-muted small">
                            A small 5% commission will be collected from the runner's delivery fees on completed runs. For example, if a runner earns RM 10.00 from a run, the platform takes RM 0.50.
                        </p>
                    </div>
                </div>
            </div>
            <!-- Revenue Stream 2 -->
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="fs-1 mb-2">⭐</div>
                        <h5>2. Run Pinning / Promotion</h5>
                        <p class="text-muted small">
                            Runners can pay a tiny premium fee (e.g. RM 1.00) to pin their run to the top of the Customer Feed, boosting their visibility and increasing the number of customer orders.
                        </p>
                    </div>
                </div>
            </div>
            <!-- Revenue Stream 3 -->
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="fs-1 mb-2">💳</div>
                        <h5>3. Convenience Fee</h5>
                        <p class="text-muted small">
                            When payment gateways (such as FPX or e-Wallets) are integrated, a flat convenience fee of RM 0.30 will be charged per order to cover payment processing charges.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sustainability Study -->
        <div class="card bg-light border p-4 mb-4">
            <h4 class="mb-3">Financial Sustainability Analysis</h4>
            <p>
                In a typical apartment complex of 500 units, assuming a conservative estimate of 20 runs scheduled per week with an average of 4 orders per run:
            </p>
            <ul>
                <li class="mb-2"><strong>Total Runs:</strong> 20 runs/week</li>
                <li class="mb-2"><strong>Total Orders:</strong> 80 orders/week (at RM 2.00 delivery fee = RM 160.00 runner earnings)</li>
                <li class="mb-2"><strong>Platform Revenue (5% Commission + RM 0.30 Convenience Fee):</strong> RM 8.00 + RM 24.00 = RM 32.00/week (RM 128.00/month)</li>
            </ul>
            <p class="mb-0 text-muted small">
                *This monthly revenue is more than sufficient to cover basic shared hosting costs (estimated at RM 45.00/month) and database maintenance, proving the system's economic viability as a micro-business.
            </p>
        </div>

    </div>
</div>
<?= $this->endSection() ?>
