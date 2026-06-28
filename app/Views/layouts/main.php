<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?> - RunIt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100 app-body">

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm app-navbar">
        <div class="container-xl">
            <a href="<?= base_url('/') ?>" class="navbar-brand brand-link">Run2You</a>
            <div class="d-flex align-items-center gap-3 ms-auto">
                <?php if (session()->get('isLoggedIn')): ?>
                    <span class="nav-user-text d-none d-md-inline">Hello, <strong><?= esc(session()->get('full_name')) ?></strong> (<?= ucfirst(session()->get('user_type')) ?>)</span>
                    <a href="<?= base_url(session()->get('user_type') . '/dashboard') ?>" class="nav-link-muted">Dashboard</a>
                    <a href="<?= base_url('/logout') ?>" class="btn-logout">Logout</a>
                <?php else: ?>
                    <a href="<?= base_url('/login') ?>" class="nav-link-muted">Login</a>
                    <a href="<?= base_url('/register') ?>" class="btn btn-primary btn-sm">Register</a>
                <?php endif; ?>
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

    <footer class="app-footer py-4 mt-auto">
        <div class="container-xl text-center app-footer-text">
            &copy; <?= date('Y') ?> RunIt System. Developed for Web Application Development Assignment.
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
