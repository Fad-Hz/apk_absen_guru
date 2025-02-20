<?= $this->extend('layouts/user'); ?>
<?= $this->section('content'); ?>
 <style>
     #video-container {
         display: flex;
         justify-content: center;
         align-items: center;
         margin-top: 20px;
     }

     video {
         border-radius: 10px;
         box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
         width: 100vw;
         height: 100vw;
         max-width: 400px;
         max-height: 400px;
         object-fit: cover;
     }
 </style>
 </head>

 <body>


     <div class="uk-container uk-margin-large-top">
         <h2 class="uk-text-center uk-margin-medium-bottom">Scan QR Code (Keluar)</h2>

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

         <form id="presensi-form" action="<?= base_url('/keluar') ?>" method="post" class="uk-margin-medium-top" style="max-width: 400px;">
             <div class="uk-alert-info uk-text-center">
                 <label for="result" class="uk-form-label">Hasil Scan</label>
                 <input id="result" name="kode_qr" type="text" class="uk-input uk-text-center">
             </div>

             <div class="uk-text-center uk-margin-top">
                 <button id="submit-btn" type="submit" class="uk-button uk-button-danger uk-width-1-1">Presensi Keluar</button>
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

     </script>

     <?= $this->endSection(); ?>