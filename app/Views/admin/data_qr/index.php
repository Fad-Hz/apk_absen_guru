<?= $this->extend('layouts/admin'); ?>
<?= $this->section('content'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js" integrity="sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSQX0FslNhTDadL4O5SAGapGt4FodqL8My0mA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Breadcrumbs -->
<ul class="uk-breadcrumb">
    <li><a href="/admin/dashboard"><span uk-icon="icon: home"></span> Dashboard</a></li>
    <li><span>Scan QR</span></li>
</ul>

<!-- Flash Messages -->
<?php if (session()->getFlashdata('success')): ?>
    <div class="uk-alert-success" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <p><span uk-icon="icon: check"></span> Berhasil generate code.</p>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="uk-alert-danger" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <p><span uk-icon="icon: warning"></span> Code sudah di generate hari ini!</p>
    </div>
<?php endif; ?>

<!-- Title -->
<h1 class="uk-heading-line uk-text-center uk-margin-medium-bottom"><span>Scan QR Hari Ini</span></h1>

<!-- QR Code Section -->
<div class="uk-flex uk-flex-column uk-flex-middle uk-text-center uk-margin-medium">
    <!-- Date -->
    <h4 class="uk-margin-remove-bottom">
        <span uk-icon="icon: calendar"></span>
        <?= isset($scan[0]['tanggal']) ? $scan[0]['tanggal'] : 'Tidak Ada Data'; ?>
    </h4>

    <!-- QR Code Conditional Rendering -->
    <?php if (isset($scan[0]['generate_scan']) && $scan[0]['generate_scan']): ?>
        <div id="qr-container" class="uk-margin-small-top"></div>
        <script>
            new QRCode(document.getElementById('qr-container'), {
                text: '<?= $scan[0]['generate_scan']; ?>',
                width: 200, // Ukuran QR Code
                height: 200
            });
        </script>
    <?php else: ?>
        <p class="uk-text-warning uk-margin-medium-top">
            <span uk-icon="icon: warning"></span> QR Code tidak tersedia. Silakan generate QR code baru.
        </p>
    <?php endif; ?>

    <!-- Button -->
    <form action="/admin/generatescan" method="POST" class="uk-margin-top" style="margin-bottom: 5rem;">
        <button class="uk-button uk-button-primary uk-button-large uk-border-rounded" type="submit">
            <span uk-icon="icon: plus-circle"></span> Generate QR Code Baru
        </button>
    </form>
</div>

<?= $this->endSection(); ?>