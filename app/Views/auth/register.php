<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Account Registration
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="max-w-md mx-auto bg-white rounded-lg shadow-sm border border-gray-200 p-8">
    <h2 class="text-2xl font-bold text-gray-900 text-center mb-6">Create your Account</h2>

    <?php if (session()->get('errors')): ?>
        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-2 rounded-md text-xs mb-4">
            <?php foreach (session()->get('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('/register') ?>" method="POST" class="space-y-4">
        <?= csrf_field() ?>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
            <input type="text" name="full_name" value="<?= old('full_name') ?>" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
            <input type="email" name="email" value="<?= old('email') ?>" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Register As</label>
            <select name="user_type" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm bg-white">
                <option value="customer">Customer (Order Groceries)</option>
                <option value="runner">Runner (Collect & Deliver Orders)</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input type="password" name="password" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
            <input type="password" name="password_conf" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm">
        </div>

        <button type="submit" class="w-full bg-indigo-600 text-white font-medium py-2 rounded-md hover:bg-indigo-700 transition text-sm pt-2.5">
            Create Account
        </button>
    </form>
</div>
<?= $this->endSection() ?>