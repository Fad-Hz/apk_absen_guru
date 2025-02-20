<?= $this->extend('layouts/admin'); ?>
<?= $this->section('content'); ?>

<ul class="uk-breadcrumb">
    <li><a href="<?= base_url('admin/dashboard'); ?>"><span uk-icon="icon: home"></span> Dashboard</a></li>
    <li><span>Data Kehadiran</span></li>
</ul>

<div class="uk-overflow-auto">
    <table class="uk-table uk-table-divider uk-table-striped uk-table-hover uk-box-shadow-small">
        <thead>
            <tr>
                <th><span uk-icon="icon: list"></span> No</th>
                <th><span uk-icon="icon: calendar"></span> Tanggal</th>
                <th><span uk-icon="icon: user"></span> Nama Guru</th>
                <th><span uk-icon="icon: info"></span> Status</th>
                <th><span uk-icon="icon: clock"></span> Jam Masuk</th>
                <th><span uk-icon="icon: clock"></span> Jam Keluar</th>
                <th><span uk-icon="icon: location"></span> Latitude</th>
                <th><span uk-icon="icon: location"></span> Longitude</th>
                <th><span uk-icon="icon: star"></span> Total Hadir</th>
                <th><span uk-icon="icon: map-marker"></span> Cek Lokasi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($hadir as $i): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $i['tanggal']; ?></td>
                    <td><?= $i['nama_guru']; ?></td>
                    <td>
                        <?php if ($i['status'] === 'terlambat'): ?>
                            <span class="uk-label uk-label-danger"><?= $i['status']; ?></span>
                        <?php else: ?>
                            <span class="uk-label uk-label-success"><?= $i['status']; ?></span>
                        <?php endif; ?>
                    </td>
                    <td><?= $i['jam_masuk']; ?></td>
                    <td><?= $i['jam_keluar']; ?></td>
                    <td><?= $i['latitude']; ?></td>
                    <td><?= $i['longitude']; ?></td>
                    <td>
                        <?php
                        foreach ($poin as $p) {
                            if ($p['id_guru'] === $i['id_guru']) {
                                echo $p['total_poin'];
                                break;
                            }
                        }
                        ?>
                    </td>
                    <td>
                        <a href="<?= base_url('/admin/kehadiran/detail/' . $i['id']); ?>" class="uk-button uk-button-default">
                            <span uk-icon="icon: map-marker"></span> Cek Lokasi
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div id="map" style="height: 400px; width: 100%;"></div>
<div style="margin-bottom: 5rem;"></div>

<script>
    let map;

    function initMap(latitude, longitude) {
        map = L.map('map').setView([latitude, longitude], 16); // 16 adalah level zoom

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { // Menggunakan OpenStreetMap tile layer
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([latitude, longitude]).addTo(map)
            .bindPopup('Lokasi Absen').openPopup();
    }

    function tampilkanPeta(latitude, longitude) {
        if (typeof map === 'undefined') {
            // Inisialisasi peta jika belum ada
            initMap(latitude, longitude);
        } else {
            // Update center dan marker jika peta sudah ada
            map.setView([latitude, longitude], 16);
            L.marker([latitude, longitude]).addTo(map)
                .bindPopup('Lokasi Absen').openPopup();
        }
    }
</script>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<?= $this->endSection(); ?>