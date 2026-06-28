<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?> - RunIt</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

    <nav class="bg-white shadow-md border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="<?= base_url('/') ?>" class="text-2xl font-bold text-indigo-600 tracking-tight">Run2You</a>
                </div>
                <div class="flex items-center space-x-4">
                    <?php if (session()->get('isLoggedIn')): ?>
                        <span class="text-sm text-gray-600">Hello, <strong><?= esc(session()->get('full_name')) ?></strong> (<?= ucfirst(session()->get('user_type')) ?>)</span>
                        <a href="<?= base_url(session()->get('user_type') . '/dashboard') ?>" class="text-sm font-medium text-gray-700 hover:text-indigo-600">Dashboard</a>
                        <a href="<?= base_url('/logout') ?>" class="text-sm font-medium text-red-600 hover:text-red-700 bg-red-50 px-3 py-1.5 rounded-md transition">Logout</a>
                    <?php else: ?>
                        <a href="<?= base_url('/login') ?>" class="text-sm font-medium text-gray-700 hover:text-indigo-600">Login</a>
                        <a href="<?= base_url('/register') ?>" class="bg-indigo-600 text-white text-sm font-medium px-4 py-2 rounded-md hover:bg-indigo-700 transition">Register</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full mt-4">
        <?php if (session()->getFlashdata('success')): ?>
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-md text-sm">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-md text-sm">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
    </div>

    <main class="flex-grow max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <?= $this->renderSection('content') ?>
    </main>

    <footer class="bg-white border-t border-gray-100 py-6 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-sm text-gray-500">
            &copy; <?= date('Y') ?> RunIt System. Developed for Web Application Development Assignment.
        </div>
    </footer>

</body>
</html>