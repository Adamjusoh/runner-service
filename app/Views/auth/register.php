<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Account Registration
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="app-card auth-card">
    <div class="app-card-body-lg">
        <h2 class="page-title-sm text-center mb-4">Create your Account</h2>

        <?php if (session()->get('errors')): ?>
            <div class="alert alert-danger alert-errors mb-4" role="alert">
                <ul class="mb-0">
                    <?php foreach (session()->get('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('/register') ?>" method="POST">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label class="form-label form-label-sm">Full Name</label>
                <input type="text" name="full_name" value="<?= old('full_name') ?>" required class="form-control form-control-sm">
            </div>

            <div class="mb-3">
                <label class="form-label form-label-sm">Email Address</label>
                <input type="email" name="email" value="<?= old('email') ?>" required class="form-control form-control-sm">
            </div>

            <div class="mb-3">
                <label class="form-label form-label-sm">Register As</label>
                <select name="user_type" required class="form-select form-select-sm">
                    <option value="customer">Customer (Order Groceries)</option>
                    <option value="runner">Runner (Collect & Deliver Orders)</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label form-label-sm">Password</label>
                <input type="password" name="password" required class="form-control form-control-sm">
                <div class="form-text form-text-xs">Must be at least 8 characters long, containing at least one uppercase letter, one lowercase letter, and one number.</div>
            </div>

            <div class="mb-4">
                <label class="form-label form-label-sm">Confirm Password</label>
                <input type="password" name="password_conf" required class="form-control form-control-sm">
            </div>

            <button type="submit" class="btn btn-primary w-100 btn-sm">Create Account</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
