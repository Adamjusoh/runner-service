<?= $this->extend('layouts/main') ?>
<?= $this->section('title') ?>Manage Users<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-900">Manage Users</h1>
    <a href="<?= base_url('/admin/dashboard') ?>" class="text-sm text-indigo-600 hover:underline">&larr; Back to Dashboard</a>
</div>

<div class="bg-white rounded-lg border border-gray-200 shadow-sm overflow-hidden p-6">
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            <?php foreach ($users as $user): ?>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= esc($user['full_name']) ?></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= esc($user['email']) ?></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm">
                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-indigo-100 text-indigo-800">
                        <?= ucfirst($user['user_type']) ?>
                    </span>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>