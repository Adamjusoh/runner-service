<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Welcome to Run2You<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Hero Section -->
<div class="p-5 mb-4 bg-light rounded-3 border">
    <div class="container-fluid py-5 text-center">
        <h1 class="display-5 fw-bold text-primary">Run2You</h1>
        <p class="col-md-8 mx-auto fs-5 text-muted">
            "Your community-powered neighborhood errand and grocery delivery service."
        </p>
        <p class="col-md-8 mx-auto fs-6">
            Run2You is a web application where community members ("Runners") who are already going to a store or supermarket can list their runs, and neighbors ("Customers") can request items to be bought and delivered for a small fee.
        </p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mt-4">
            <a href="<?= base_url('/register') ?>" class="btn btn-primary btn-lg px-4 gap-3">Register Now</a>
            <a href="<?= base_url('/login') ?>" class="btn btn-outline-secondary btn-lg px-4">Login to Account</a>
        </div>
    </div>
</div>

<!-- Features Overview -->
<div class="row align-items-md-stretch mb-5">
    <div class="col-md-6 mb-4">
        <div class="h-100 p-5 text-white bg-dark rounded-3">
            <h2>For Runners</h2>
            <p>Are you heading to the grocery store or food court? Make your trip profitable by helping your neighbors! Simply create a run, set your delivery fee, set a cut-off time, and complete the orders. You get to keep 100% of your earnings.</p>
            <a href="<?= base_url('/register') ?>" class="btn btn-outline-light">Start Running</a>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="h-100 p-5 bg-white border rounded-3">
            <h2>For Customers</h2>
            <p>Save money and time on delivery fees! Browse active runs in your local neighborhood or apartment complex, place your order with the items you need, and wait for your runner to deliver them straight to your door.</p>
            <a href="<?= base_url('/register') ?>" class="btn btn-outline-primary">Join a Run</a>
        </div>
    </div>
</div>

<!-- Mission Section -->
<div class="row justify-content-center text-center py-4 border-top">
    <div class="col-lg-8">
        <h3 class="mb-3 text-secondary">Why We Built This Platform</h3>
        <p class="text-muted">
            Traditional delivery apps charge high service fees and delivery rates that make ordering small things too expensive. Run2You enables micro-deliveries within apartment complexes, university student hostels, and housing communities for a fraction of the cost, while fostering community helping and cooperation.
        </p>
    </div>
</div>
<?= $this->endSection() ?>
