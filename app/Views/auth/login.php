<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
User Login
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="max-w-md mx-auto bg-white rounded-lg shadow-sm border border-gray-200 p-8 mt-8">
    <h2 class="text-2xl font-bold text-gray-900 text-center mb-6">Welcome Back</h2>
    
    <form action="<?= base_url('/login') ?>" method="POST" class="space-y-5">
        <?= csrf_field() ?>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
            <input type="email" name="email" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm">
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input type="password" name="password" required class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm">
        </div>
        
        <button type="submit" class="w-full bg-indigo-600 text-white font-medium py-2 rounded-md hover:bg-indigo-700 transition text-sm">
            Sign In
        </button>
    </form>
    
    <p class="text-sm text-gray-600 text-center mt-6">
        Don't have an account? 
        <a href="<?= base_url('/register') ?>" class="text-indigo-600 hover:underline font-medium">Register here</a>
    </p>
</div>
<?= $this->endSection() ?>