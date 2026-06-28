<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>System Modules & Features — Run2You<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-10">
        <!-- Section Header -->
        <div class="border-bottom pb-3 mb-4">
            <h1 class="text-primary fw-bold">Features & System Modules</h1>
            <p class="text-muted fs-5">A comprehensive breakdown of all views and user flows in the Run2You platform.</p>
        </div>

        <p class="lead">
            Run2You consists of three distinct subsystems, each tailored to a specific user role. The system uses session authentication and filters to restrict user access to their respective modules.
        </p>

        <!-- Module 1: Runner -->
        <div class="card mb-5">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">1. Runner Module</h4>
            </div>
            <div class="card-body">
                <div class="row align-items-center g-4">
                    <div class="col-md-6">
                        <h5>Key Features:</h5>
                        <ul>
                            <li class="mb-2"><strong>Schedule Runs:</strong> Set the shopping location (e.g. Lotus's), cut-off time, estimated delivery time, and delivery fee.</li>
                            <li class="mb-2"><strong>Consolidated Shopping List:</strong> Once the cut-off time passes, the runner can see a detailed shopping list grouping all orders by item name and quantity.</li>
                            <li class="mb-2"><strong>Confirm Deliveries:</strong> Mark runs as completed, updating the status of all orders under that run to delivered.</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <!-- Mock Screenshot -->
                        <div class="border rounded bg-light p-3">
                            <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-2">
                                <span class="badge bg-secondary">System View: Active Run</span>
                                <span class="text-success fw-bold">Cut-off Reached</span>
                            </div>
                            <div class="card shadow-sm border-0">
                                <div class="card-header bg-dark text-white py-2">
                                    <h6 class="mb-0">Run: Jaya Grocer SS15</h6>
                                </div>
                                <div class="card-body p-2" style="font-size: 0.85rem;">
                                    <p class="mb-1 text-muted"><strong>Shopping Manifest:</strong></p>
                                    <ul class="list-group list-group-flush border mb-2">
                                        <li class="list-group-item py-1">2x Low Fat Milk (Ahmad)</li>
                                        <li class="list-group-item py-1">1x Gardenia Bread (Sarah)</li>
                                        <li class="list-group-item py-1">3x Instant Noodles (Sarah)</li>
                                    </ul>
                                    <button class="btn btn-sm btn-success w-100 py-1">Mark Run as Completed</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Module 2: Customer -->
        <div class="card mb-5">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0">2. Customer Module</h4>
            </div>
            <div class="card-body">
                <div class="row align-items-center g-4">
                    <div class="col-md-6">
                        <h5>Key Features:</h5>
                        <ul>
                            <li class="mb-2"><strong>Browse Active Runs:</strong> Customers can see runs currently open and accepting orders.</li>
                            <li class="mb-2"><strong>Order Placement:</strong> Add multiple item names, quantities, and input the delivery address.</li>
                            <li class="mb-2"><strong>Order History:</strong> View past orders and track current order status.</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <!-- Mock Screenshot -->
                        <div class="border rounded bg-light p-3">
                            <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-2">
                                <span class="badge bg-secondary">System View: Available Runs</span>
                                <span class="text-primary fw-bold">Accepting Orders</span>
                            </div>
                            <div class="card shadow-sm border-0">
                                <div class="card-body p-2" style="font-size: 0.85rem;">
                                    <h6 class="card-title fw-bold mb-1">Lotus's Subang Jaya</h6>
                                    <p class="mb-1 text-muted">Est. Delivery: 8:00 PM</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-primary fw-bold">Fee: RM 2.00</span>
                                        <button class="btn btn-xs btn-primary py-0 px-2" style="font-size: 0.75rem;">Join Run</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Module 3: Admin -->
        <div class="card mb-5">
            <div class="card-header bg-secondary text-white">
                <h4 class="mb-0">3. Administrative Module</h4>
            </div>
            <div class="card-body">
                <div class="row align-items-center g-4">
                    <div class="col-md-6">
                        <h5>Key Features:</h5>
                        <ul>
                            <li class="mb-2"><strong>User Management:</strong> Administrators can view all registered users in the database, including full names, emails, and roles (Runner or Customer).</li>
                            <li class="mb-2"><strong>Security Filter:</strong> Restricts regular users from accessing admin routes.</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <!-- Mock Screenshot -->
                        <div class="border rounded bg-light p-3">
                            <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-2">
                                <span class="badge bg-secondary">System View: Admin Dashboard</span>
                                <span class="text-danger fw-bold">Admin Only</span>
                            </div>
                            <div class="card shadow-sm border-0">
                                <div class="card-body p-2" style="font-size: 0.85rem;">
                                    <p class="mb-1 text-muted"><strong>Registered Users:</strong></p>
                                    <table class="table table-bordered table-sm mb-0" style="font-size: 0.75rem;">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Role</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Adam Jusoh</td>
                                                <td><span class="badge bg-primary">Runner</span></td>
                                            </tr>
                                            <tr>
                                                <td>Siti Aminah</td>
                                                <td><span class="badge bg-info text-dark">Customer</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection() ?>
