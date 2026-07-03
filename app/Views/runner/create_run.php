<?= $this->extend('layouts/main') ?>

<?php /** @var \CodeIgniter\View\View $this */ ?>

<?= $this->section('title') ?>Schedule New Run - Run2You<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="content-medium">
    <div class="page-header-split d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
        <div>
            <h1 class="page-title">Schedule a Run</h1>
            <p class="page-subtitle">Set up your next trip to the store or restaurant.</p>
        </div>
        <a href="<?= base_url('/runner/dashboard') ?>" class="link-back small fw-medium text-decoration-none">&larr; Back to Dashboard</a>
    </div>

    <div class="app-card">
        <div class="app-card-body-lg">

            <?php if (session()->get('errors')): ?>
                <div class="alert alert-danger mb-4" role="alert">
                    <ul class="mb-0 ps-3">
                        <?php foreach (session()->get('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('/runner/run/store') ?>" method="POST">
                <?= csrf_field() ?>

                <div class="mb-4">
                    <label class="form-label form-label-sm">Destination (Supermarket or Restaurant)</label>
                    <input type="text" name="location" value="<?= old('location') ?>" required class="form-control form-control-sm">
                    <p class="form-text-xs">Be specific so customers know exactly where you are ordering from.</p>
                </div>

                <div class="row g-4 mb-4">
                    <div class="col-md-6">
                        <label class="form-label form-label-sm">Estimated Delivery Time</label>
                        <div class="d-flex gap-2">
                            <input type="date" id="ui_delivery_date" class="form-control form-control-sm" required>
                            <select id="ui_delivery_time" class="form-select form-select-sm" required>
                                <option value="" disabled selected>Select Time</option>
                            </select>
                        </div>
                        <p class="form-text-xs">When will you arrive back with the items?</p>
                        <input type="hidden" name="delivery_time" id="real_delivery_time">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label form-label-sm">Order Cut-off Time</label>
                        <select id="ui_cutoff_mode" class="form-select form-select-sm" required>
                            <option value="" disabled selected>Select an option</option>
                            <option value="same_day_2">Same day, 2 hours before</option>
                            <option value="same_day_4">Same day, 4 hours before</option>
                            <option value="night_before_8">Night before (8:00 PM)</option>
                            <option value="24_hours">24 hours before</option>
                            <option value="custom">Custom date and time...</option>
                        </select>
                        <p class="form-text-xs">When should customers stop adding items?</p>
                        
                        <div id="ui_custom_cutoff_container" class="d-none mt-2">
                            <div class="d-flex gap-2">
                                <input type="date" id="ui_custom_cutoff_date" class="form-control form-control-sm">
                                <select id="ui_custom_cutoff_time" class="form-select form-select-sm">
                                    <option value="" disabled selected>Select Time</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="cutoff_time" id="real_cutoff_time">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label form-label-sm">Batch Delivery Fee (RM)</label>
                    <div class="input-group input-group-sm input-group-rm">
                        <span class="input-group-text">RM</span>
                        <input type="number" name="delivery_fee" value="<?= old('delivery_fee', '3.00') ?>" required min="0.50" step="0.10" class="form-control">
                    </div>
                    <p class="form-text-xs">The flat fee each customer pays to join this run. You keep 80%.</p>
                </div>

                <div class="form-divider">
                    <button type="submit" class="btn btn-primary w-100 fw-bold py-2 shadow-sm">
                        Publish Run Schedule
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const deliveryDate = document.getElementById('ui_delivery_date');
    const deliveryTime = document.getElementById('ui_delivery_time');
    const cutoffMode = document.getElementById('ui_cutoff_mode');
    const customContainer = document.getElementById('ui_custom_cutoff_container');
    const customDate = document.getElementById('ui_custom_cutoff_date');
    const customTime = document.getElementById('ui_custom_cutoff_time');
    const realDelivery = document.getElementById('real_delivery_time');
    const realCutoff = document.getElementById('real_cutoff_time');
    const form = document.querySelector('form');

    // Populate time dropdowns (every 30 mins)
    const populateTimes = (selectElem) => {
        for(let h=0; h<24; h++) {
            for(let m=0; m<60; m+=30) {
                const hour12 = h % 12 === 0 ? 12 : h % 12;
                const ampm = h < 12 ? 'AM' : 'PM';
                const mins = m === 0 ? '00' : '30';
                const timeText = `${hour12}:${mins} ${ampm}`;
                const hh = h.toString().padStart(2, '0');
                const timeVal = `${hh}:${mins}:00`;
                const opt = new Option(timeText, timeVal);
                selectElem.add(opt);
            }
        }
    };
    
    populateTimes(deliveryTime);
    populateTimes(customTime);

    // Toggle custom cutoff fields
    cutoffMode.addEventListener('change', function() {
        if (this.value === 'custom') {
            customContainer.classList.remove('d-none');
            customDate.required = true;
            customTime.required = true;
        } else {
            customContainer.classList.add('d-none');
            customDate.required = false;
            customTime.required = false;
        }
    });

    form.addEventListener('submit', function(e) {
        if (!deliveryDate.value || !deliveryTime.value) return; 
        
        const deliveryStr = `${deliveryDate.value}T${deliveryTime.value}`;
        const deliveryDt = new Date(deliveryStr);
        
        const formatDt = (dt) => {
            return dt.getFullYear() + '-' + 
                   (dt.getMonth()+1).toString().padStart(2, '0') + '-' + 
                   dt.getDate().toString().padStart(2, '0') + ' ' + 
                   dt.getHours().toString().padStart(2, '0') + ':' + 
                   dt.getMinutes().toString().padStart(2, '0') + ':00';
        };

        realDelivery.value = formatDt(deliveryDt);

        let cutoffDt;
        const mode = cutoffMode.value;
        
        if (mode === 'same_day_2') {
            cutoffDt = new Date(deliveryDt.getTime() - (2 * 60 * 60 * 1000));
        } else if (mode === 'same_day_4') {
            cutoffDt = new Date(deliveryDt.getTime() - (4 * 60 * 60 * 1000));
        } else if (mode === 'night_before_8') {
            cutoffDt = new Date(deliveryDt);
            cutoffDt.setDate(cutoffDt.getDate() - 1);
            cutoffDt.setHours(20, 0, 0, 0);
        } else if (mode === '24_hours') {
            cutoffDt = new Date(deliveryDt.getTime() - (24 * 60 * 60 * 1000));
        } else if (mode === 'custom') {
            if (!customDate.value || !customTime.value) return;
            cutoffDt = new Date(`${customDate.value}T${customTime.value}`);
        }
        
        if (cutoffDt) {
            realCutoff.value = formatDt(cutoffDt);
        }
    });
});
</script>
<?= $this->endSection() ?>
