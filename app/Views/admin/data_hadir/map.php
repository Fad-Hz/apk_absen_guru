<?= $this->extend('layouts/admin'); ?>
<?= $this->section('content'); ?>

<ul class="uk-breadcrumb">
    <li><a href="<?= base_url('admin/dashboard'); ?>"><span uk-icon="icon: home"></span> Dashboard</a></li>
    <li><a href="<?= base_url('admin/datakehadiran'); ?>">Data Kehadiran</a></li>
    <li><span>Detail Lokasi</span></li>
</ul>


<div id="map" style="height: 600px; width: 100%;"></div>
<div style="margin-bottom: 5rem;"></div>

<script>
    let map;

    function initMap(latitude, longitude) {
        map = L.map('map').setView([latitude, longitude], 16);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([latitude, longitude]).addTo(map)
            .bindPopup('Lokasi Absen').openPopup();
    }

    // Panggil initMap dengan data yang diterima dari controller
    window.onload = function() {
        const latitude = <?= $latitude ?>;
        const longitude = <?= $longitude ?>;
        initMap(latitude, longitude);
    };
</script>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<?= $this->endSection(); ?>