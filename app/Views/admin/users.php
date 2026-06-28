<?= $this->extend('layouts/main') ?>
<?= $this->section('title') ?>Manage Users<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="page-header mb-4">
    <h1 class="page-title">Manage Users</h1>
    <a href="<?= base_url('/admin/dashboard') ?>" class="link-back small text-decoration-none">&larr; Back to Dashboard</a>
</div>

<div class="app-card">
    <div class="app-card-body p-0">
        <div class="table-responsive">
            <table class="table table-app mb-0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= esc($user['full_name']) ?></td>
                        <td class="text-muted"><?= esc($user['email']) ?></td>
                        <td>
                            <span class="badge-role"><?= ucfirst($user['user_type']) ?></span>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
