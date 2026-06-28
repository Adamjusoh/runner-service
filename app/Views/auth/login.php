<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
User Login
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="app-card auth-card">
    <div class="app-card-body-lg">
        <h2 class="page-title-sm text-center mb-4">Welcome Back</h2>

        <form action="<?= base_url('/login') ?>" method="POST">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label class="form-label form-label-sm">Email Address</label>
                <input type="email" name="email" required class="form-control form-control-sm">
            </div>

            <div class="mb-4">
                <label class="form-label form-label-sm">Password</label>
                <input type="password" name="password" required class="form-control form-control-sm">
            </div>

            <button type="submit" class="btn btn-primary w-100 btn-sm">Sign In</button>
        </form>

        <p class="text-center text-muted small mt-4 mb-0">
            Don't have an account?
            <a href="<?= base_url('/register') ?>" class="link-back fw-medium">Register here</a>
        </p>
    </div>
</div>
<?= $this->endSection() ?>
