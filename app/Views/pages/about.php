<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>About Us — Run2You Project<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-lg-10">
        <!-- Main Section Header -->
        <div class="border-bottom pb-3 mb-4">
            <h1 class="text-primary fw-bold">About Us</h1>
            <p class="text-muted fs-5">Meet the developer and learn about the background of this web application.</p>
        </div>

        <!-- Student Assignment Context -->
        <div class="card mb-4 border-primary">
            <div class="card-body">
                <h5 class="card-title text-primary">Web Application Development Assignment</h5>
                <p class="card-text">
                    This website has been built as a coursework assignment submission for the course <strong>Web Application Development</strong>. The objective of this project is to build a full-stack PHP web application using MVC patterns to solve a real-life community problem.
                </p>
                <div class="table-responsive mt-3">
                    <table class="table table-bordered table-striped">
                        <thead class="table-primary">
                            <tr>
                                <th>Student Name</th>
                                <th>Student ID</th>
                                <th>Task Role</th>
                                <th>Academic Semester</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Adam Jusoh</td>
                                <td>WAD-2026-0817</td>
                                <td>Lead Developer & System Architect</td>
                                <td>Semester 1, 2026</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Developer Biography -->
        <div class="row align-items-center g-4 mb-4">
            <div class="col-md-3 text-center">
                <div class="p-4 bg-light rounded-circle d-inline-block border shadow-sm" style="width: 140px; height: 140px; line-height: 90px;">
                    <span class="fs-1 text-primary fw-bold">AJ</span>
                </div>
            </div>
            <div class="col-md-9">
                <h3>About the Developer</h3>
                <p class="text-muted">
                    Hi, my name is <strong>Adam Jusoh</strong>. I am currently a student focusing on computer science and web application systems. Through building Run2You, I have gained hands-on experience working with CodeIgniter 4 framework, managing database structures (MySQL), building user authentication systems, and designing responsive interfaces using Bootstrap 5.
                </p>
                <p>
                    I enjoy writing clean, modular PHP code and learning about web architecture and databases. This project serves as a culmination of what I have learned during my studies this semester.
                </p>
            </div>
        </div>

        <!-- Project Objectives -->
        <div class="card bg-light border mb-4">
            <div class="card-body">
                <h4 class="card-title mb-3">Project Learning Objectives</h4>
                <ul>
                    <li class="mb-2"><strong>MVC Architecture:</strong> Successfully implemented separation of concerns using CodeIgniter 4 controllers, views, and models.</li>
                    <li class="mb-2"><strong>Database Operations:</strong> Designed tables, relations, and executed CRUD transactions using Query Builder for orders, items, and users.</li>
                    <li class="mb-2"><strong>Role Filter Security:</strong> Implemented middleware filters to restrict access to Runner, Customer, and Admin dashboards.</li>
                    <li class="mb-2"><strong>Responsive UI:</strong> Built layouts that render nicely on screens of different sizes using Bootstrap utility grids.</li>
                </ul>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection() ?>
