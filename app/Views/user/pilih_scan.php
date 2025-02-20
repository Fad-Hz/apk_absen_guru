<?= $this->extend('layouts/user'); ?>

<?= $this->section('content'); ?>

<div class="uk-flex uk-flex-center uk-flex-middle uk-height-viewport uk-container">
    <div class="uk-card uk-card-default uk-card-body uk-width-1-2@s">
        <h3 class="uk-card-title uk-text-center">Selamat Datang </h3>

        <div id="realtime-clock" class="uk-text-center uk-margin-medium-bottom uk-text-large"></div>

        <div class="uk-grid-small uk-child-width-1-2@s" uk-grid>
            <div>
                <a href="<?= base_url('scan/masuk') ?>" class="uk-button uk-button-primary uk-width-1-1">Scan Masuk</a>
            </div>
            <div>
                <a href="<?= base_url('scan/keluar') ?>" class="uk-button uk-button-danger uk-width-1-1">Scan Keluar</a>
            </div>
        </div>
    </div>
</div>

<script>
    function updateClock() {
        const now = new Date();
        const timeString = now.toLocaleTimeString('id-ID', {
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit'
        });
        document.getElementById('realtime-clock').textContent = timeString;
    }

    updateClock();
    setInterval(updateClock, 1000);
</script>

<?= $this->endSection(); ?>