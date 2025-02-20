<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<h1>Data Penggajian</h1>

<table class="uk-table uk-table-hover uk-table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Guru</th>
            <th>Tanggal Gaji</th>
            <th>Total Gaji</th>
            <th>Pengurangan Gaji</th>
            <th>Sisa Gaji</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($gaji as $g) : ?>
            <tr>
                <td><?= $g['id'] ?></td>
                <td><?= $g['nama_guru'] ?></td>
                <td><?= $g['tanggal_gaji'] ?></td>
                <td><?= $g['total_gaji'] ?></td>
                <td><?= $g['pengurangan_gaji'] ?></td>
                <td><?= $g['sisa_gaji'] ?></td>
                <td>
                    <a href="/admin/kurangigaji/<?= $g['id'] ?>" class="uk-button uk-button-small uk-button-warning">Kurangi Gaji</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?= $this->endSection() ?>