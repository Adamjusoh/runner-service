<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Run2You — Your community-powered neighborhood errand and grocery delivery service. Affordable micro-deliveries by neighbors you trust.">
    <title><?= $this->renderSection('title') ?> — Run2You</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100 app-body">

    <nav class="navbar navbar-expand-lg app-navbar sticky-top">
        <div class="container-xl">
            <a href="<?= base_url('/') ?>" class="navbar-brand brand-link">
                <i class="bi bi-basket2-fill"></i> Run2You
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <?php $uri = uri_string(); ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-3">
                    <li class="nav-item">
                        <a class="nav-link <?= ($uri == '' || $uri == '/') ? 'active' : '' ?>" href="<?= base_url('/') ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($uri == 'about') ? 'active' : '' ?>" href="<?= base_url('/about') ?>">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($uri == 'solution') ? 'active' : '' ?>" href="<?= base_url('/solution') ?>">Product Solution</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($uri == 'features') ? 'active' : '' ?>" href="<?= base_url('/features') ?>">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($uri == 'pricing') ? 'active' : '' ?>" href="<?= base_url('/pricing') ?>">Pricing</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center gap-3">
                    <?php if (session()->get('isLoggedIn')): ?>
                        <span class="nav-user-text d-none d-md-inline">Hello, <strong><?= esc(session()->get('full_name')) ?></strong> (<?= ucfirst(session()->get('user_type')) ?>)</span>
                        <a href="<?= base_url(session()->get('user_type') . '/dashboard') ?>" class="nav-link-muted">Dashboard</a>
                        <a href="<?= base_url('/logout') ?>" class="btn-logout">Logout</a>
                    <?php else: ?>
                        <a href="<?= base_url('/login') ?>" class="nav-link-muted">Login</a>
                        <a href="<?= base_url('/register') ?>" class="btn btn-primary btn-sm px-3">Register</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-xl mt-3">
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success mb-0" role="alert">
                <?= esc(session()->getFlashdata('success')) ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger mb-0" role="alert">
                <?= esc(session()->getFlashdata('error')) ?>
            </div>
        <?php endif; ?>
    </div>

    <main class="container-xl flex-grow-1 py-4">
        <?= $this->renderSection('content') ?>
    </main>

    <?php if (strpos(uri_string(), 'dashboard') === false): ?>
    <footer class="app-footer py-5 mt-auto">
        <div class="container-xl">
            <div class="row g-4">
                <div class="col-lg-4 mb-3 mb-lg-0">
                    <a href="<?= base_url('/') ?>" class="footer-brand d-inline-block mb-2">
                        <i class="bi bi-basket2-fill"></i> Run2You
                    </a>
                    <p class="app-footer-text mb-0" style="max-width:300px;">
                        Community-powered neighborhood errand and grocery delivery. By neighbors, for neighbors.
                    </p>
                </div>
                <div class="col-6 col-lg-2">
                    <p class="footer-heading">Pages</p>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><a href="<?= base_url('/') ?>" class="footer-link">Home</a></li>
                        <li class="mb-2"><a href="<?= base_url('/about') ?>" class="footer-link">About Us</a></li>
                        <li class="mb-2"><a href="<?= base_url('/solution') ?>" class="footer-link">Solution</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2">
                    <p class="footer-heading">Platform</p>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><a href="<?= base_url('/features') ?>" class="footer-link">Features</a></li>
                        <li class="mb-2"><a href="<?= base_url('/pricing') ?>" class="footer-link">Pricing</a></li>
                        <li class="mb-2"><a href="<?= base_url('/register') ?>" class="footer-link">Register</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <p class="footer-heading">About This Project</p>
                    <p class="app-footer-text mb-0">
                        Developed by <strong style="color:#e2e8f0;">Adam Jusoh</strong> as a coursework submission for Web Application Development (Semester 1, 2026).
                    </p>
                </div>
            </div>
            <hr style="border-color: #334155; margin: 2rem 0 1rem;">
            <div class="text-center app-footer-text">
                &copy; <?= date('Y') ?> Run2You. Built with CodeIgniter 4 &amp; Bootstrap 5.
            </div>
        </div>
    </footer>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
