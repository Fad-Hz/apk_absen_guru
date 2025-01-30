<?= $this->extend('layouts/user') ?>

<?= $this->section('content') ?>

<!-- Include QR Code Script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js" integrity="sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSQX0FslNhTDadL4O5SAGapGt4FodqL8My0mA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Flash Message -->
<?php if (session()->getFlashdata('error')): ?>
    <div class="uk-alert-danger" uk-alert style="margin-top:3rem;">
        <a class="uk-alert-close" uk-close></a>
        <p><?= session()->getFlashdata('error') ?></p>
    </div>
<?php endif; ?>

<!-- Flash Message -->
<?php if (session()->getFlashdata('success')): ?>
    <div class="uk-alert-success" uk-alert style="margin-top:3rem;">
        <a class="uk-alert-close" uk-close></a>
        <p><?= session()->getFlashdata('success') ?></p>
    </div>
<?php endif; ?>

<!-- Display Scan Data -->

<?php if (isset($scan[0]['generate_scan']) && $scan[0]['generate_scan']): ?>
        <div class="uk-container uk-text-center uk-margin-top" id="timer-container">
            <span uk-icon="icon: clock; ratio: 2" class="uk-margin-top"></span>
            <h3 id="current-time" class="uk-text-bold" style="font-size: 3rem;"></h3>
        </div>
    <p><?= isset($scan[0]['tanggal']) ? $scan[0]['tanggal'] : 'Tidak Ada Data'; ?></p>
    <script>
        new QRCode(document.getElementById('qr-container'), {
            text: '<?= $scan[0]['generate_scan']; ?>',
            width: 200, // Ukuran QR Code
            height: 200
        });
    </script>

    <!-- Timer Display -->
<?php else: ?>
    <p class="uk-text-warning uk-margin-medium-top">
        <span uk-icon="icon: warning"></span> QR Code tidak tersedia
    </p>
<?php endif; ?>

<!-- Form Section -->
<div class="uk-container uk-text-center uk-margin-top">
    <script>
        window.onload = function() {
            // Timer for real-time clock
            function updateClock() {
                var currentTime = new Date();
                var hours = currentTime.getHours();
                var minutes = currentTime.getMinutes();
                var seconds = currentTime.getSeconds();

                // Format hours, minutes, and seconds
                hours = (hours < 10 ? "0" : "") + hours;
                minutes = (minutes < 10 ? "0" : "") + minutes;
                seconds = (seconds < 10 ? "0" : "") + seconds;

                // Display the clock in the designated element
                document.getElementById("current-time").innerHTML = hours + ":" + minutes + ":" + seconds;

                // Update the form visibility based on time
                var masukForm = document.getElementById('masuk');
                var keluarForm = document.getElementById('keluar');

                if (hours >= 0 && hours < 12) {
                    masukForm.style.display = 'block';
                    keluarForm.style.display = 'none';
                } else {
                    masukForm.style.display = 'none';
                    keluarForm.style.display = 'block';
                }
            }

            // Update clock every second
            setInterval(updateClock, 1000);
        }
    </script>
    <!-- Masuk Form (only visible before 12:00) -->
    <form action="/masuk" method="post" id="masuk" style="display: none;">
        <div class="uk-margin">
            <label class="uk-form-label" for="kode_qr_masuk">
                <span uk-icon="icon: arrow-right"></span> Presensi Masuk
            </label>
            <div class="uk-form-controls uk-flex uk-flex-middle">
                <input
                    id="kode_qr_masuk"
                    name="kode_qr"
                    class="uk-input uk-form-large"
                    type="text"
                    placeholder="Masukkan Kode QR untuk Masuk"
                    required
                    style="flex-grow: 1;">
                <button type="submit" class="uk-button uk-button-primary uk-margin-left">
                    <span uk-icon="icon: check"></span> Kirim
                </button>
            </div>
        </div>
    </form>

    <!-- Keluar Form (only visible after 12:00) -->
    <form action="/keluar" method="post" id="keluar" style="display: none;">
        <div class="uk-margin">
            <label class="uk-form-label" for="kode_qr_keluar">
                <span uk-icon="icon: sign-out"></span> Presensi Keluar
            </label>
            <div class="uk-form-controls uk-flex uk-flex-middle">
                <input
                    id="kode_qr_keluar"
                    name="kode_qr"
                    class="uk-input uk-form-large"
                    type="text"
                    placeholder="Masukkan Kode QR untuk Keluar"
                    required
                    style="flex-grow: 1;">
                <button type="submit" class="uk-button uk-button-danger uk-margin-left">
                    <span uk-icon="icon: check"></span> Kirim
                </button>
            </div>
        </div>
    </form>

    <div style="margin-bottom: 5rem;"></div>
    <?= $this->endSection() ?>