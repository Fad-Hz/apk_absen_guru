<?= $this->extend('layouts/user'); ?>

<?= $this->section('content'); ?>

<div class="uk-container uk-margin-large-top">
    <h2 class="uk-text-center uk-margin-medium-bottom">Scan QR Code (Masuk)</h2>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="uk-alert-danger" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p><?= session()->getFlashdata('error') ?></p>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="uk-alert-success" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p><?= session()->getFlashdata('success') ?></p>
        </div>
    <?php endif; ?>

    <div id="video-container" class="uk-border-rounded uk-padding-small uk-box-shadow-small" style="width: 100%; max-width: 400px;">
        <video id="video" class="uk-width-1-1 uk-border-rounded" autoplay playsinline></video>
    </div>

    <form id="presensi-form" action="<?= base_url('/masuk') ?>" method="post" class="uk-margin-medium-top" style="max-width: 400px;">
        <input type="hidden" id="latitude" name="latitude" readonly>
        <input type="hidden" id="longitude" name="longitude" readonly>
        <div class="uk-alert-info uk-text-center">
            <label for="result" class="uk-form-label">Hasil Scan</label>
            <input id="result" name="kode_qr" type="text" class="uk-input uk-text-center">
        </div>

        <div class="uk-text-center uk-margin-top">
            <button id="submit-btn" type="submit" class="uk-button uk-button-primary uk-width-1-1">Presensi Masuk</button>
        </div>
    </form>
</div>

<script src="https://unpkg.com/jsqr/dist/jsQR.js"></script>
<script>
    //... (Your existing JavaScript code for QR scanning and geolocation)
    document.addEventListener("DOMContentLoaded", function() {
        const video = document.getElementById('video');
        const resultElement = document.getElementById('result');
        const form = document.getElementById('presensi-form');
        const submitBtn = document.getElementById('submit-btn');

        navigator.mediaDevices.getUserMedia({
            video: {
                facingMode: {
                    ideal: "environment"
                },
                width: {
                    ideal: 1080
                },
                height: {
                    ideal: 1080
                }
            }
        }).then(stream => {
            video.srcObject = stream;
            video.onloadedmetadata = () => {
                video.play();
                scanQRCode();
            };
        }).catch(err => console.error("Error accessing camera:", err));

        function scanQRCode() {
            if (video.readyState !== video.HAVE_ENOUGH_DATA) {
                requestAnimationFrame(scanQRCode);
                return;
            }

            const canvas = document.createElement('canvas');
            const context = canvas.getContext('2d');
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            context.drawImage(video, 0, 0, canvas.width, canvas.height);

            const imageData = context.getImageData(0, 0, canvas.width, canvas.height);
            const code = jsQR(imageData.data, canvas.width, canvas.height);

            if (code) {
                resultElement.value = code.data;
            }

            requestAnimationFrame(scanQRCode);
        }
    });

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else {
            alert("Geolocation tidak didukung oleh browser ini.");
        }
    }

    function showPosition(position) {
        document.getElementById("latitude").value = position.coords.latitude;
        document.getElementById("longitude").value = position.coords.longitude;
    }

    function showError(error) {
        switch (error.code) {
            case error.PERMISSION_DENIED:
                alert("Pengguna menolak permintaan izin lokasi.");
                break;
            case error.POSITION_UNAVAILABLE:
                alert("Informasi lokasi tidak tersedia.");
                break;
            case error.TIMEOUT:
                alert("Waktu permintaan lokasi habis.");
                break;
            case error.UNKNOWN_ERROR:
                alert("Terjadi kesalahan yang tidak diketahui.");
                break;
        }
    }

    window.onload = getLocation;
</script>

<?= $this->endSection(); ?>