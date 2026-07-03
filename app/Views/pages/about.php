<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>About Us<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-10">

        <!-- Section Header -->
        <div class="section-header mb-4">
            <h1 class="section-title-lg">About Us</h1>
            <p class="section-subtitle">Meet the developer and learn about the background of this web application.</p>
        </div>

        <!-- Assignment Context Card -->
        <div class="about-assignment-card">
            <div class="d-flex align-items-center gap-2 mb-3">
                <div class="feature-icon feature-icon-primary" style="width:40px;height:40px;border-radius:10px;">
                    <i class="bi bi-mortarboard-fill" style="font-size:1.1rem;"></i>
                </div>
                <h5 class="mb-0">Web Application Development Assignment</h5>
            </div>
            <p class="mb-3" style="color:#475569; font-size:0.95rem; line-height:1.7;">
                This website has been built as a coursework assignment submission for the course <strong>Web Application Development</strong>. The objective of this project is to build a full-stack PHP web application using MVC patterns to solve a real-life community problem.
            </p>
            <div class="table-responsive">
                <table class="table table-bordered mb-0" style="font-size:0.9rem;">
                    <thead>
                        <tr style="background:#e0e7ff;">
                            <th style="color:#3730a3;">Student Name</th>
                            <th style="color:#3730a3;">Student ID</th>
                            <th style="color:#3730a3;">Task Role</th>
                            <th style="color:#3730a3;">Academic Semester</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Adam Jusoh</strong></td>
                            <td>WAD-2026-0817</td>
                            <td>Lead Developer &amp; System Architect</td>
                            <td>Semester 1, 2026</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Developer Biography -->
        <div class="developer-card">
            <div class="d-flex align-items-start gap-4 flex-wrap flex-md-nowrap">
                <div class="developer-avatar mx-auto mx-md-0">AJ</div>
                <div>
                    <h3 style="font-weight:700; color:#0f172a; margin-bottom:0.75rem;">About the Developer</h3>
                    <p style="color:#64748b; line-height:1.75; font-size:0.95rem;">
                        Hi, my name is <strong style="color:#1e293b;">Adam Jusoh</strong>. I am currently a student focusing on computer science and web application systems. Through building Run2You, I have gained hands-on experience working with CodeIgniter 4 framework, managing database structures (MySQL), building user authentication systems, and designing responsive interfaces using Bootstrap 5.
                    </p>
                    <p style="color:#64748b; line-height:1.75; font-size:0.95rem; margin-bottom:0;">
                        I enjoy writing clean, modular PHP code and learning about web architecture and databases. This project serves as a culmination of what I have learned during my studies this semester.
                    </p>
                </div>
            </div>
        </div>

        <!-- Project Learning Objectives -->
        <div class="objectives-card">
            <div class="d-flex align-items-center gap-2 mb-3">
                <div class="feature-icon feature-icon-success" style="width:40px;height:40px;border-radius:10px;">
                    <i class="bi bi-check-circle-fill" style="font-size:1.1rem;"></i>
                </div>
                <h4 class="mb-0" style="font-weight:700; color:#0f172a;">Project Learning Objectives</h4>
            </div>
            <ul class="objectives-list">
                <li>
                    <div class="objective-icon"><i class="bi bi-layers-fill"></i></div>
                    <div>
                        <strong style="color:#0f172a;">MVC Architecture:</strong>
                        <span style="color:#64748b;">Successfully implemented separation of concerns using CodeIgniter 4 controllers, views, and models.</span>
                    </div>
                </li>
                <li>
                    <div class="objective-icon"><i class="bi bi-database-fill"></i></div>
                    <div>
                        <strong style="color:#0f172a;">Database Operations:</strong>
                        <span style="color:#64748b;">Designed tables, relations, and executed CRUD transactions using Query Builder for orders, items, and users.</span>
                    </div>
                </li>
                <li>
                    <div class="objective-icon"><i class="bi bi-shield-lock-fill"></i></div>
                    <div>
                        <strong style="color:#0f172a;">Role Filter Security:</strong>
                        <span style="color:#64748b;">Implemented middleware filters to restrict access to Runner, Customer, and Admin dashboards.</span>
                    </div>
                </li>
                <li>
                    <div class="objective-icon"><i class="bi bi-phone-fill"></i></div>
                    <div>
                        <strong style="color:#0f172a;">Responsive UI:</strong>
                        <span style="color:#64748b;">Built layouts that render nicely on screens of different sizes using Bootstrap utility grids.</span>
                    </div>
                </li>
            </ul>
        </div>

    </div>
</div>
<?= $this->endSection() ?>
