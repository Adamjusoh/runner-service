<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Product Solution — Run2You<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-10">
        <!-- Section Title -->
        <div class="border-bottom pb-3 mb-4">
            <h1 class="text-primary fw-bold">Product Solution</h1>
            <p class="text-muted fs-5">Understanding the problem of neighborhood delivery and how Run2You solves it.</p>
        </div>

        <!-- The Problem Statement -->
        <div class="card mb-4 bg-light border-danger">
            <div class="card-body">
                <h3 class="card-title text-danger mb-3">
                    <svg width="24" height="24" fill="currentColor" class="me-2" viewBox="0 0 16 16">
                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                    </svg>
                    The Problem: Expensive & Inefficient Errand Runs
                </h3>
                <p class="card-text">
                    Within small communities (such as apartment buildings, student residential campuses, or neighborhood housing areas), residents face several key problems when they need everyday items from local convenience stores or supermarkets:
                </p>
                <div class="row g-3 mt-2">
                    <div class="col-md-4">
                        <div class="p-3 bg-white border rounded h-100">
                            <h5 class="text-dark fw-bold">1. High Delivery Costs</h5>
                            <p class="text-muted small mb-0">Ordering a small set of groceries (like a bottle of milk or bread) on conventional delivery services comes with high base delivery fees and surcharges, making small orders too expensive.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 bg-white border rounded h-100">
                            <h5 class="text-dark fw-bold">2. Carbon Footprint</h5>
                            <p class="text-muted small mb-0">Every individual placing a delivery order results in a single rider making a single trip. Having multiple solo delivery riders driving into the same residential area is highly inefficient and creates extra carbon emissions.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 bg-white border rounded h-100">
                            <h5 class="text-dark fw-bold">3. Trust and Security</h5>
                            <p class="text-muted small mb-0">Allowing anonymous delivery riders into secure gated communities or dormitory buildings is a security concern. Residents often prefer to have people they know deliver their packages.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- The Solution -->
        <div class="card mb-4 bg-light border-success">
            <div class="card-body">
                <h3 class="card-title text-success mb-3">
                    <svg width="24" height="24" fill="currentColor" class="me-2" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                    The Solution: Run2You Community Delivery
                </h3>
                <p class="card-text">
                    Run2You offers a <strong>community-powered delivery solution</strong>. Rather than hiring professional drivers from outside, the platform leverages the trips that residents are already making.
                </p>
                <div class="row g-3 mt-2">
                    <div class="col-md-4">
                        <div class="p-3 bg-white border rounded h-100">
                            <h5 class="text-dark fw-bold">1. Shared Errands</h5>
                            <p class="text-muted small mb-0">If a resident is already going to the market, they can publish a run. Neighbors who need a few things can "join" the run and add items to a shared list.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 bg-white border rounded h-100">
                            <h5 class="text-dark fw-bold">2. Minimal Fees</h5>
                            <p class="text-muted small mb-0">Because the runner is already traveling to the store, they only charge a small delivery fee (e.g., RM 2.00) to cover their effort, which is much cheaper for customers.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 bg-white border rounded h-100">
                            <h5 class="text-dark fw-bold">3. Building Trust</h5>
                            <p class="text-muted small mb-0">All runners and customers belong to the same local community. Deliveries are made by people you recognize, improving campus or neighborhood security.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- How It Solves the Last Mile -->
        <h4 class="mt-4 mb-3">Key Benefits of the System</h4>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5>Convenience for Customers</h5>
                        <p class="text-muted card-text">
                            No minimum order requirements. Customers can ask for single items (like a single grocery item or soft drink) without incurring high platform penalties.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5>Side Income for Runners</h5>
                        <p class="text-muted card-text">
                            Runners get a consolidated shopping list showing exactly what they need to purchase. They can purchase all items at once, deliver to neighbors on their return home, and make pocket money.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection() ?>
