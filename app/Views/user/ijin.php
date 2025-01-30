<?= $this->extend('layouts/user') ?>

<?= $this->section('content') ?>
<!-- Flash Message -->
<?php if (session()->getFlashdata('error')): ?>
    <div class="uk-alert-danger" uk-alert style="margin-top: 3rem;">
        <a class="uk-alert-close" uk-close></a>
        <p><?= session()->getFlashdata('error') ?></p>
    </div>
<?php endif ?>

<!-- Form Section -->
<div class="uk-section uk-section-default uk-flex uk-flex-middle" style="min-height: 90vh;">
    <div class="uk-container uk-text-center">
        <!-- Breadcrumbs -->

        <!-- Heading -->
        <h2 class="uk-heading-medium uk-text-bold">Ajukan Izin Ketidakhadiran</h2>
        <p class="uk-text-large uk-margin-medium-bottom">
            Isi form di bawah untuk mengajukan izin ketidakhadiran dengan alasan yang jelas.
        </p>

        <!-- Form -->
        <form action="/ijin" method="post" class="uk-form-stacked uk-width-1-2@m uk-margin-auto">
            <!-- Keterangan Input -->
            <div class="uk-margin">
                <label class="uk-form-label" for="keterangan"><strong>Keterangan</strong></label>
                <div class="uk-form-controls">
                    <input
                        id="keterangan"
                        name="keterangan"
                        class="uk-input uk-form-large"
                        type="text"
                        placeholder="Masukkan keterangan izin..."
                        required>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="uk-button uk-button-primary uk-button-large uk-width-1-1">
                <span uk-icon="icon: check"></span> Kirim
            </button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>