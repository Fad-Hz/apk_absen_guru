<?= $this->extend('layouts/admin'); ?>
<?= $this->section('content'); ?>

<!-- Breadcrumbs -->
<ul class="uk-breadcrumb">
    <li><a href="/admin/dashboard"><span uk-icon="icon: home"></span> Dashboard</a></li>
    <li><span>Data Kehadiran</span></li>
</ul>

<!-- Tabel Kehadiran -->
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
                <th><span uk-icon="icon: star"></span> Total Hadir</th>
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
                    <td>
                        <?php
                        // Logika untuk mencocokkan poin dengan id_guru
                        foreach ($poin as $p) {
                            if ($p['id_guru'] === $i['id_guru']) { // Sesuaikan pencocokan id_guru
                                echo $p['total_poin'];
                                break;
                            }
                        }
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<!-- Margin Bawah -->
<div style="margin-bottom: 5rem;"></div>

<?= $this->endSection(); ?>