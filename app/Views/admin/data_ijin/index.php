<?= $this->extend('layouts/admin'); ?>
<?= $this->section('content'); ?>

<!-- Breadcrumbs -->
<ul class="uk-breadcrumb uk-margin-small-bottom">
    <li><a href="/admin/dashboard"><span uk-icon="icon: home"></span> Dashboard</a></li>
    <li><span>Data Ijin Guru</span></li>
</ul>

<!-- Tabel Data Ijin -->
<div class="uk-overflow-auto">
    <table class="uk-table uk-table-divider uk-table-striped uk-table-hover uk-box-shadow-small">
        <thead>
            <tr>
                <th>No</th>
                <th><span uk-icon="icon: calendar"></span> Tanggal</th>
                <th><span uk-icon="icon: user"></span> Nama Guru</th>
                <th><span uk-icon="icon: info"></span> Keterangan</th>
                <th><span uk-icon="icon: sign-out"></span> Total Ijin</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($ijin as $i): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $i['tanggal']; ?></td>
                    <td><?= $i['nama_guru']; ?></td>
                    <td>
                        <span class="uk-label uk-label-default"><?= $i['keterangan']; ?></span>
                    </td>
                    <td>
                        <?php
                        // Logika untuk menampilkan total poin terkait
                        foreach ($total_poin as $p) {
                            if ($p['id_guru'] === $i['id_guru']) { // Cocokkan ID guru
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