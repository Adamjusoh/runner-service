<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Runner Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="flex justify-between items-center mb-8">
    <div>
        <h1 class="text-3xl font-bold text-gray-900">My Runs</h1>
        <p class="text-gray-600 mt-2">Manage your scheduled trips and active shopping lists.</p>
    </div>
    <a href="<?= base_url('/runner/run/create') ?>" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 font-medium text-sm transition shadow-sm">
        + Schedule New Run
    </a>
</div>

<div class="bg-white rounded-lg border border-gray-200 shadow-sm overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cut-off Time</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
                <?php foreach ($runs as $run): ?>
                    
                    <!-- Dynamic Status Badge Colors -->
                    <?php
                        $badgeColor = 'bg-gray-100 text-gray-800'; // Default
                        $statusText = 'Unknown';

                        if ($run['status'] === 'open') {
                            $badgeColor = 'bg-green-100 text-green-800';
                            $statusText = 'Open';
                        } elseif ($run['status'] === 'closed_for_shopping') {
                            $badgeColor = 'bg-yellow-100 text-yellow-800';
                            $statusText = 'Closed (Shopping)';
                        } elseif ($run['status'] === 'delivered') {
                            $badgeColor = 'bg-blue-100 text-blue-800';
                            $statusText = 'Delivered';
                        } elseif ($run['status'] === 'cancelled') {
                            $badgeColor = 'bg-red-100 text-red-800';
                            $statusText = 'Cancelled';
                        }
                    ?>

                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?= esc($run['location']) ?></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= date('d M Y, h:i A', strtotime($run['cutoff_time'])) ?></td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <!-- Apply the dynamic color and text here -->
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full <?= $badgeColor ?>">
                                <?= $statusText ?>
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                            <a href="<?= base_url('/runner/run/active/' . $run['run_id']) ?>" class="bg-indigo-50 text-indigo-600 hover:bg-indigo-100 px-3 py-1.5 rounded-md transition">View Manifest</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
    </table>
</div>
<?= $this->endSection() ?>