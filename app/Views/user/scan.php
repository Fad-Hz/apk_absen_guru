<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan QR Code</title>
    <!-- Menambahkan CDN Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Scan QR Code</h1>

        <!-- Video display -->
        <div class="text-center mb-4">
            <video id="video" width="600" height="400" autoplay class="border rounded shadow"></video>
        </div>

        <!-- Menampilkan hasil QR Code yang dipindai -->
        <div class="alert alert-info text-center" role="alert">
            Copy paste QR Code yang Terpindai: <span id="result"></span>
        </div>

        <!-- Tombol untuk menuju halaman presensi -->
        <div class="text-center mt-4">
            <a href="/absen" class="btn btn-primary">Presensi Sekarang</a>
        </div>
    </div>

    <!-- Menambahkan script jsQR -->
    <script src="https://unpkg.com/jsqr/dist/jsQR.js"></script>
    <script>
        // Mengakses elemen video dan result
        const video = document.getElementById('video');
        const resultElement = document.getElementById('result');

        // Mengakses kamera dan menampilkan stream video
        navigator.mediaDevices.getUserMedia({
                video: true
            })
            .then(stream => {
                video.srcObject = stream;
                // Mulai proses scanning setelah video tersedia
                requestAnimationFrame(scanQRCode);
            })
            .catch(err => {
                console.error("Error accessing webcam: ", err);
            });

        function scanQRCode() {
            // Mengambil frame dari video
            const canvas = document.createElement('canvas');
            const context = canvas.getContext('2d');
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            context.drawImage(video, 0, 0, canvas.width, canvas.height);

            // Mencoba membaca QR code dari canvas
            const imageData = context.getImageData(0, 0, canvas.width, canvas.height);
            const code = jsQR(imageData.data, canvas.width, canvas.height);

            if (code) {
                // Menampilkan hasil pemindaian QR code
                resultElement.textContent = code.data;
            }

            // Melakukan pemindaian ulang setiap frame
            requestAnimationFrame(scanQRCode);
        }
    </script>

    <!-- Menambahkan CDN Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>