<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Features &amp; Modules<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-10">

        <!-- Section Header -->
        <div class="section-header mb-4">
            <h1 class="section-title-lg">Features &amp; System Modules</h1>
            <p class="section-subtitle">A comprehensive breakdown of all views and user flows in the Run2You platform.</p>
        </div>

        <p style="font-size:1rem; color:#475569; line-height:1.75; margin-bottom:2rem;">
            Run2You consists of <strong>three distinct subsystems</strong>, each tailored to a specific user role. The system uses session authentication and middleware filters to restrict user access to their respective modules.
        </p>

        <!-- Module 1: Runner -->
        <div class="module-card">
            <div class="module-header module-header-runner">
                <i class="bi bi-bag-check-fill"></i>
                <span>1. Runner Module</span>
            </div>
            <div class="module-body">
                <div class="row align-items-center g-4">
                    <div class="col-md-6">
                        <h5 style="font-weight:700; color:#0f172a; margin-bottom:1rem;">Key Features:</h5>
                        <ul class="module-feature-list">
                            <li>
                                <span class="module-feature-check"><i class="bi bi-check-circle-fill"></i></span>
                                <div><strong>Schedule Runs:</strong> Set the shopping location (e.g. Lotus's), cut-off time, estimated delivery time, and delivery fee.</div>
                            </li>
                            <li>
                                <span class="module-feature-check"><i class="bi bi-check-circle-fill"></i></span>
                                <div><strong>Consolidated Shopping List:</strong> Once the cut-off time passes, the runner can see a detailed shopping list grouping all orders by item name and quantity.</div>
                            </li>
                            <li>
                                <span class="module-feature-check"><i class="bi bi-check-circle-fill"></i></span>
                                <div><strong>Confirm Deliveries:</strong> Mark runs as completed, updating the status of all orders under that run to delivered.</div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <div class="mock-preview">
                            <div class="mock-preview-bar">
                                <span class="mock-dot mock-dot-red"></span>
                                <span class="mock-dot mock-dot-yellow"></span>
                                <span class="mock-dot mock-dot-green"></span>
                                <span style="font-size:0.7rem; color:#94a3b8; margin-left:0.5rem;">System View: Active Run</span>
                            </div>
                            <div class="mock-preview-body">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span style="font-weight:700; font-size:0.85rem; color:#0f172a;">Run: Jaya Grocer SS15</span>
                                    <span class="badge-pill-success" style="font-size:0.7rem;">Cut-off Reached</span>
                                </div>
                                <p style="font-size:0.75rem; color:#94a3b8; margin-bottom:0.5rem; font-weight:600; text-transform:uppercase; letter-spacing:0.05em;">Shopping Manifest:</p>
                                <div style="background:#f8fafc; border:1px solid #e2e8f0; border-radius:0.5rem; overflow:hidden; font-size:0.8rem;">
                                    <div style="padding:0.5rem 0.75rem; border-bottom:1px solid #f1f5f9; display:flex; justify-content:space-between;">
                                        <span>Low Fat Milk</span>
                                        <span style="font-weight:700; color:#991b1b;">×2 (Ahmad)</span>
                                    </div>
                                    <div style="padding:0.5rem 0.75rem; border-bottom:1px solid #f1f5f9; display:flex; justify-content:space-between;">
                                        <span>Gardenia Bread</span>
                                        <span style="font-weight:700; color:#991b1b;">×1 (Sarah)</span>
                                    </div>
                                    <div style="padding:0.5rem 0.75rem; display:flex; justify-content:space-between;">
                                        <span>Instant Noodles</span>
                                        <span style="font-weight:700; color:#991b1b;">×3 (Sarah)</span>
                                    </div>
                                </div>
                                <button class="btn btn-sm w-100 mt-2" style="background:linear-gradient(135deg,#16a34a,#22c55e); color:#fff; font-size:0.8rem; font-weight:600; border:none; border-radius:0.5rem; padding:0.4rem;">
                                    <i class="bi bi-check-lg me-1"></i> Mark Run as Completed
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Module 2: Customer -->
        <div class="module-card">
            <div class="module-header module-header-customer">
                <i class="bi bi-cart-check-fill"></i>
                <span>2. Customer Module</span>
            </div>
            <div class="module-body">
                <div class="row align-items-center g-4">
                    <div class="col-md-6">
                        <h5 style="font-weight:700; color:#0f172a; margin-bottom:1rem;">Key Features:</h5>
                        <ul class="module-feature-list">
                            <li>
                                <span class="module-feature-check"><i class="bi bi-check-circle-fill"></i></span>
                                <div><strong>Browse Active Runs:</strong> Customers can see runs currently open and accepting orders.</div>
                            </li>
                            <li>
                                <span class="module-feature-check"><i class="bi bi-check-circle-fill"></i></span>
                                <div><strong>Order Placement:</strong> Add multiple item names, quantities, and input the delivery address.</div>
                            </li>
                            <li>
                                <span class="module-feature-check"><i class="bi bi-check-circle-fill"></i></span>
                                <div><strong>Order History:</strong> View past orders and track current order status.</div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <div class="mock-preview">
                            <div class="mock-preview-bar">
                                <span class="mock-dot mock-dot-red"></span>
                                <span class="mock-dot mock-dot-yellow"></span>
                                <span class="mock-dot mock-dot-green"></span>
                                <span style="font-size:0.7rem; color:#94a3b8; margin-left:0.5rem;">System View: Available Runs</span>
                            </div>
                            <div class="mock-preview-body">
                                <div style="background:#fff; border:1px solid #e2e8f0; border-radius:0.5rem; padding:1rem; margin-bottom:0.5rem;">
                                    <div class="d-flex justify-content-between align-items-start mb-1">
                                        <div>
                                            <span style="font-weight:700; font-size:0.9rem; color:#0f172a;">Lotus's Subang Jaya</span>
                                            <p style="font-size:0.75rem; color:#94a3b8; margin-bottom:0;">Est. Delivery: 8:00 PM</p>
                                        </div>
                                        <span class="badge-pill-success" style="font-size:0.7rem;">Accepting</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-2 pt-2" style="border-top:1px solid #f1f5f9;">
                                        <span style="font-weight:700; color:#991b1b; font-size:0.9rem;">RM 2.00</span>
                                        <button class="btn btn-sm" style="background:#991b1b; color:#fff; font-size:0.75rem; font-weight:600; border:none; border-radius:0.375rem; padding:0.25rem 0.75rem;">Join Run</button>
                                    </div>
                                </div>
                                <div style="background:#fff; border:1px solid #e2e8f0; border-radius:0.5rem; padding:1rem;">
                                    <div class="d-flex justify-content-between align-items-start mb-1">
                                        <div>
                                            <span style="font-weight:700; font-size:0.9rem; color:#0f172a;">Jaya Grocer SS15</span>
                                            <p style="font-size:0.75rem; color:#94a3b8; margin-bottom:0;">Est. Delivery: 9:30 PM</p>
                                        </div>
                                        <span class="badge-pill-success" style="font-size:0.7rem;">Accepting</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-2 pt-2" style="border-top:1px solid #f1f5f9;">
                                        <span style="font-weight:700; color:#991b1b; font-size:0.9rem;">RM 1.50</span>
                                        <button class="btn btn-sm" style="background:#991b1b; color:#fff; font-size:0.75rem; font-weight:600; border:none; border-radius:0.375rem; padding:0.25rem 0.75rem;">Join Run</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Module 3: Admin -->
        <div class="module-card">
            <div class="module-header module-header-admin">
                <i class="bi bi-shield-lock-fill"></i>
                <span>3. Administrative Module</span>
            </div>
            <div class="module-body">
                <div class="row align-items-center g-4">
                    <div class="col-md-6">
                        <h5 style="font-weight:700; color:#0f172a; margin-bottom:1rem;">Key Features:</h5>
                        <ul class="module-feature-list">
                            <li>
                                <span class="module-feature-check"><i class="bi bi-check-circle-fill"></i></span>
                                <div><strong>User Management:</strong> Administrators can view all registered users in the database, including full names, emails, and roles (Runner or Customer).</div>
                            </li>
                            <li>
                                <span class="module-feature-check"><i class="bi bi-check-circle-fill"></i></span>
                                <div><strong>Security Filter:</strong> Restricts regular users from accessing admin routes via middleware.</div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <div class="mock-preview">
                            <div class="mock-preview-bar">
                                <span class="mock-dot mock-dot-red"></span>
                                <span class="mock-dot mock-dot-yellow"></span>
                                <span class="mock-dot mock-dot-green"></span>
                                <span style="font-size:0.7rem; color:#94a3b8; margin-left:0.5rem;">System View: Admin Dashboard</span>
                            </div>
                            <div class="mock-preview-body">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span style="font-weight:700; font-size:0.85rem; color:#0f172a;">Registered Users</span>
                                    <span class="badge-pill-danger" style="font-size:0.7rem;">Admin Only</span>
                                </div>
                                <div style="border:1px solid #e2e8f0; border-radius:0.5rem; overflow:hidden;">
                                    <table class="table table-sm mb-0" style="font-size:0.8rem;">
                                        <thead>
                                            <tr style="background:#f8fafc;">
                                                <th style="font-size:0.7rem; text-transform:uppercase; letter-spacing:0.05em; color:#94a3b8; font-weight:600; border-bottom:1px solid #e2e8f0; padding:0.5rem 0.75rem;">Name</th>
                                                <th style="font-size:0.7rem; text-transform:uppercase; letter-spacing:0.05em; color:#94a3b8; font-weight:600; border-bottom:1px solid #e2e8f0; padding:0.5rem 0.75rem;">Role</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="padding:0.5rem 0.75rem; border-bottom:1px solid #f1f5f9;">Adam Jusoh</td>
                                                <td style="padding:0.5rem 0.75rem; border-bottom:1px solid #f1f5f9;"><span class="badge-pill-primary" style="font-size:0.7rem;">Runner</span></td>
                                            </tr>
                                            <tr>
                                                <td style="padding:0.5rem 0.75rem;">Siti Aminah</td>
                                                <td style="padding:0.5rem 0.75rem;"><span style="background:#dbeafe; color:#1e40af; padding:0.2em 0.6em; border-radius:9999px; font-size:0.7rem; font-weight:600;">Customer</span></td>
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
