<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Pricing &amp; Revenue Model<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-10">

        <!-- Section Header -->
        <div class="section-header mb-4">
            <h1 class="section-title-lg">Pricing &amp; Revenue Model</h1>
            <p class="section-subtitle">A study on how the platform remains sustainable and adds value to both users.</p>
        </div>

        <p style="font-size:1rem; color:#475569; line-height:1.75; margin-bottom:2rem;">
            As a student project, Run2You was designed with a dual-focus: to keep micro-deliveries <strong>highly affordable</strong> for local neighborhoods while building a sustainable monetization strategy for the platform's long-term maintenance.
        </p>

        <!-- Free to Join Banner -->
        <div class="pricing-banner">
            <div class="feature-icon feature-icon-success mx-auto mb-3">
                <i class="bi bi-gift-fill"></i>
            </div>
            <div class="pricing-banner-title">Free to Join — Always</div>
            <p class="pricing-banner-subtitle mb-0">No account fees for Customers or Runners. Just register and start using the platform.</p>
        </div>

        <!-- Cost Breakdown -->
        <div class="row g-4 mb-5">
            <div class="col-md-6">
                <div class="pricing-column">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <div class="feature-icon feature-icon-info" style="width:40px;height:40px;border-radius:10px;">
                            <i class="bi bi-cart3" style="font-size:1.1rem;"></i>
                        </div>
                        <h5 class="pricing-column-title mb-0">Cost for Customers</h5>
                    </div>
                    <ul class="pricing-list">
                        <li>
                            <span class="pricing-check"><i class="bi bi-check-circle-fill"></i></span>
                            <div><strong>No Account Fees:</strong> Registration is completely free.</div>
                        </li>
                        <li>
                            <span class="pricing-check"><i class="bi bi-check-circle-fill"></i></span>
                            <div><strong>Direct Delivery Fee:</strong> Only pay the runner-defined delivery fee (e.g. RM 1.50 – RM 3.00 per run).</div>
                        </li>
                        <li>
                            <span class="pricing-check"><i class="bi bi-check-circle-fill"></i></span>
                            <div>No markup or price inflation on the items requested.</div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="pricing-column">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <div class="feature-icon feature-icon-purple" style="width:40px;height:40px;border-radius:10px;">
                            <i class="bi bi-bag-check" style="font-size:1.1rem;"></i>
                        </div>
                        <h5 class="pricing-column-title mb-0">Cost for Runners</h5>
                    </div>
                    <ul class="pricing-list">
                        <li>
                            <span class="pricing-check"><i class="bi bi-check-circle-fill"></i></span>
                            <div><strong>Free Run Scheduling:</strong> List runs without any upfront costs.</div>
                        </li>
                        <li>
                            <span class="pricing-check"><i class="bi bi-check-circle-fill"></i></span>
                            <div><strong>Keep Earnings:</strong> Keep 100% of the delivery fees collected from customers during the launch phase.</div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Monetization Strategy -->
        <hr class="divider">
        <div class="section-header text-center mb-4">
            <h2 class="section-title-lg">Platform Monetization Strategy</h2>
            <p class="section-subtitle">To offset hosting fees and ensure long-term sustainability, the following revenue models are proposed.</p>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="revenue-card">
                    <div class="revenue-icon">📊</div>
                    <h5>Platform Commission</h5>
                    <p>A small <strong>5% commission</strong> will be collected from the runner's delivery fees on completed runs. For example, if a runner earns RM 10.00, the platform takes RM 0.50.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="revenue-card">
                    <div class="revenue-icon">⭐</div>
                    <h5>Run Pinning / Promotion</h5>
                    <p>Runners can pay a small premium fee (e.g. <strong>RM 1.00</strong>) to pin their run to the top of the Customer Feed, boosting visibility and increasing orders.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="revenue-card">
                    <div class="revenue-icon">💳</div>
                    <h5>Convenience Fee</h5>
                    <p>When payment gateways (FPX / e-Wallets) are integrated, a flat <strong>RM 0.30 convenience fee</strong> will be charged per order to cover processing costs.</p>
                </div>
            </div>
        </div>

        <!-- Sustainability Analysis -->
        <div class="sustainability-card mb-3">
            <div class="d-flex align-items-center gap-2 mb-3">
                <div class="feature-icon feature-icon-primary" style="width:40px;height:40px;border-radius:10px;">
                    <i class="bi bi-graph-up-arrow" style="font-size:1.1rem;"></i>
                </div>
                <h4 class="mb-0" style="color:#312e81;">Financial Sustainability Analysis</h4>
            </div>
            <p style="font-size:0.95rem; color:#475569; line-height:1.7; margin-bottom:1rem;">
                In a typical apartment complex of 500 units, assuming a conservative estimate of 20 runs scheduled per week with an average of 4 orders per run:
            </p>
            <div class="sustainability-metric">
                <span class="sustainability-metric-label"><i class="bi bi-calendar-week me-2"></i>Total Runs</span>
                <span class="sustainability-metric-value"><strong>20</strong> runs/week</span>
            </div>
            <div class="sustainability-metric">
                <span class="sustainability-metric-label"><i class="bi bi-box-seam me-2"></i>Total Orders</span>
                <span class="sustainability-metric-value"><strong>80</strong> orders/week (at RM 2.00 fee = RM 160.00 runner earnings)</span>
            </div>
            <div class="sustainability-metric">
                <span class="sustainability-metric-label"><i class="bi bi-cash-stack me-2"></i>Platform Revenue</span>
                <span class="sustainability-metric-value"><strong>RM 32.00</strong>/week (RM 128.00/month) from commission + convenience fees</span>
            </div>
            <p style="font-size:0.85rem; color:#64748b; margin-top:1rem; margin-bottom:0;">
                <i class="bi bi-info-circle me-1"></i>
                This monthly revenue is more than sufficient to cover basic shared hosting costs (estimated at RM 45.00/month) and database maintenance, proving the system's economic viability as a micro-business.
            </p>
        </div>

    </div>
</div>
<?= $this->endSection() ?>
