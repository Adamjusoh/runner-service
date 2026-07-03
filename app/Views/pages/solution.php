<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Product Solution<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-10">

        <!-- Section Header -->
        <div class="section-header mb-4">
            <h1 class="section-title-lg">Product Solution</h1>
            <p class="section-subtitle">Understanding the problem of neighborhood delivery and how Run2You solves it.</p>
        </div>

        <!-- The Problem -->
        <div class="problem-section">
            <div class="problem-section-title">
                <i class="bi bi-exclamation-triangle-fill"></i>
                The Problem: Expensive &amp; Inefficient Errand Runs
            </div>
            <p style="color:#7f1d1d; font-size:0.95rem; line-height:1.7; margin-bottom:1.25rem;">
                Within small communities (such as apartment buildings, student residential campuses, or neighborhood housing areas), residents face several key problems when they need everyday items from local convenience stores or supermarkets:
            </p>
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="point-card">
                        <div class="point-number point-number-danger">1</div>
                        <h5>High Delivery Costs</h5>
                        <p>Ordering a small set of groceries (like a bottle of milk or bread) on conventional delivery services comes with high base delivery fees and surcharges, making small orders too expensive.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="point-card">
                        <div class="point-number point-number-danger">2</div>
                        <h5>Carbon Footprint</h5>
                        <p>Every individual placing a delivery order results in a single rider making a single trip. Having multiple solo delivery riders driving into the same residential area is highly inefficient and creates extra carbon emissions.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="point-card">
                        <div class="point-number point-number-danger">3</div>
                        <h5>Trust &amp; Security</h5>
                        <p>Allowing anonymous delivery riders into secure gated communities or dormitory buildings is a security concern. Residents often prefer to have people they know deliver their packages.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- The Solution -->
        <div class="solution-section">
            <div class="solution-section-title">
                <i class="bi bi-check-circle-fill"></i>
                The Solution: Run2You Community Delivery
            </div>
            <p style="color:#14532d; font-size:0.95rem; line-height:1.7; margin-bottom:1.25rem;">
                Run2You offers a <strong>community-powered delivery solution</strong>. Rather than hiring professional drivers from outside, the platform leverages the trips that residents are already making.
            </p>
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="point-card">
                        <div class="point-number point-number-success">1</div>
                        <h5>Shared Errands</h5>
                        <p>If a resident is already going to the market, they can publish a run. Neighbors who need a few things can "join" the run and add items to a shared list.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="point-card">
                        <div class="point-number point-number-success">2</div>
                        <h5>Minimal Fees</h5>
                        <p>Because the runner is already traveling to the store, they only charge a small delivery fee (e.g., RM 2.00) to cover their effort, which is much cheaper for customers.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="point-card">
                        <div class="point-number point-number-success">3</div>
                        <h5>Building Trust</h5>
                        <p>All runners and customers belong to the same local community. Deliveries are made by people you recognize, improving campus or neighborhood security.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Key Benefits -->
        <hr class="divider">
        <div class="section-header text-center mb-4">
            <h2 class="section-title-lg">Key Benefits</h2>
            <p class="section-subtitle">Why Run2You works for everyone in the community.</p>
        </div>
        <div class="row g-4 mb-3">
            <div class="col-md-6">
                <div class="benefit-card">
                    <div class="feature-icon feature-icon-info mb-3">
                        <i class="bi bi-cart3"></i>
                    </div>
                    <h5 style="font-weight:700; color:#0f172a;">Convenience for Customers</h5>
                    <p class="feature-card-text">
                        No minimum order requirements. Customers can ask for single items (like a single grocery item or soft drink) without incurring high platform penalties.
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="benefit-card">
                    <div class="feature-icon feature-icon-success mb-3">
                        <i class="bi bi-wallet2"></i>
                    </div>
                    <h5 style="font-weight:700; color:#0f172a;">Side Income for Runners</h5>
                    <p class="feature-card-text">
                        Runners get a consolidated shopping list showing exactly what they need to purchase. They can purchase all items at once, deliver to neighbors on their return home, and make pocket money.
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection() ?>
