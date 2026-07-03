<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Welcome<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<div class="hero-section">
    <div class="row align-items-center position-relative z-1">
        <div class="col-lg-6 mb-5 mb-lg-0 text-center text-lg-start pe-lg-4">
            <span class="badge-pill-primary mb-3 d-inline-block">🚀 Community-Powered Delivery</span>
            <h1 class="hero-title mb-3">Run2You</h1>
            <p class="hero-tagline mb-3">
                Your neighborhood errand &amp; grocery delivery service.
            </p>
            <p class="hero-description mb-4">
                A web application where community members (<strong>Runners</strong>) who are already heading to a store can list their runs, and neighbors (<strong>Customers</strong>) can request items to be bought and delivered — for a fraction of the cost.
            </p>
            <div class="hero-cta d-flex flex-wrap justify-content-center justify-content-lg-start gap-3">
                <a href="<?= base_url('/register') ?>" class="btn-hero-primary">
                    <i class="bi bi-person-plus-fill me-1"></i> Register Now
                </a>
                <a href="<?= base_url('/login') ?>" class="btn-hero-secondary">
                    <i class="bi bi-box-arrow-in-right me-1"></i> Login to Account
                </a>
            </div>
        </div>
        <div class="col-lg-6 position-relative text-center">
            <div class="hero-image-wrapper">
                <img src="<?= base_url('images/community_hero.png') ?>" alt="Neighbors sharing groceries" class="img-fluid rounded-4 shadow-lg hero-main-img" style="max-width: 90%;">
                
                <!-- Glassmorphism Mock Card Overlay -->
                <div class="glass-card mock-run-card d-none d-md-block text-start">
                    <div class="d-flex align-items-center mb-2">
                        <div class="mock-avatar bg-primary text-white me-2"><i class="bi bi-person"></i></div>
                        <div>
                            <h6 class="mb-0 fw-bold">Sarah is at Trader Joe's</h6>
                            <small class="text-muted">Heading back in 15 mins</small>
                        </div>
                    </div>
                    <hr class="my-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="badge bg-success text-white">Accepting Orders</span>
                        <small class="fw-bold text-primary">+$3.00 delivery</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- How It Works -->
<div class="text-center mb-5">
    <div class="section-header text-center">
        <h2 class="section-title-lg">How It Works</h2>
        <p class="section-subtitle">Three simple steps to get started with Run2You.</p>
    </div>
</div>
<div class="row g-4 mb-5">
    <div class="col-md-4">
        <div class="feature-card glass-card-hover text-center">
            <div class="step-icon text-primary mx-auto mb-3"><i class="bi bi-cart-plus"></i></div>
            <h5 class="feature-card-title">Runner Creates a Run</h5>
            <p class="feature-card-text">A resident heading to the store publishes a run with the shop name, cut-off time, delivery fee, and estimated delivery time.</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="feature-card glass-card-hover text-center">
            <div class="step-icon text-primary mx-auto mb-3"><i class="bi bi-people"></i></div>
            <h5 class="feature-card-title">Customers Join &amp; Order</h5>
            <p class="feature-card-text">Neighbors browse open runs, join one heading to their preferred store, and add items they need to a shared order list.</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="feature-card glass-card-hover text-center">
            <div class="step-icon text-primary mx-auto mb-3"><i class="bi bi-box-seam"></i></div>
            <h5 class="feature-card-title">Runner Delivers</h5>
            <p class="feature-card-text">The runner purchases all items in one trip, delivers them to the neighbors, and earns the delivery fee. Everyone wins!</p>
        </div>
    </div>
</div>

<!-- For Runners / For Customers -->
<div class="row g-4 mb-5">
    <div class="col-md-6">
        <div class="role-card role-card-dark">
            <div class="mb-3">
                <span class="badge-pill-primary"><i class="bi bi-bag-check-fill me-1"></i> For Runners</span>
            </div>
            <h3>Earn While You Shop</h3>
            <p>Are you heading to the grocery store? Make your trip profitable by helping your neighbors! Create a run, set your delivery fee and cut-off time, complete the orders. You keep <strong>100% of your earnings</strong>.</p>
            <a href="<?= base_url('/register') ?>" class="btn btn-outline-primary mt-2">
                <i class="bi bi-arrow-right me-1"></i> Start Running
            </a>
        </div>
    </div>
    <div class="col-md-6">
        <div class="role-card role-card-light">
            <div class="mb-3">
                <span class="badge-pill-success"><i class="bi bi-cart-check-fill me-1"></i> For Customers</span>
            </div>
            <h3>Save Money &amp; Time</h3>
            <p>Skip the expensive delivery apps. Browse active runs in your neighborhood, place your order with the items you need, and wait for your <strong>trusted neighbor</strong> to deliver them straight to your door.</p>
            <a href="<?= base_url('/register') ?>" class="btn btn-outline-primary mt-2">
                <i class="bi bi-arrow-right me-1"></i> Join a Run
            </a>
        </div>
    </div>
</div>

<!-- Why We Built This -->
<hr class="divider">
<div class="row justify-content-center text-center py-4">
    <div class="col-lg-7">
        <div class="feature-icon feature-icon-warning mx-auto mb-3">
            <i class="bi bi-lightbulb-fill"></i>
        </div>
        <h3 class="mb-3" style="font-weight:700; color:#0f172a;">Why We Built This Platform</h3>
        <p style="color: var(--run2you-text-muted); line-height:1.75; font-size:0.95rem;">
            Traditional delivery apps charge high service fees and delivery rates that make ordering small things too expensive. <strong>Run2You</strong> enables micro-deliveries within apartment complexes, university student hostels, and housing communities for a fraction of the cost — while fostering community helping and cooperation.
        </p>
    </div>
</div>

<?= $this->endSection() ?>
