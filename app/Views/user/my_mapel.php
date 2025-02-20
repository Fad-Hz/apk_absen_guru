<?= $this->extend('layouts/user'); ?>

<?= $this->section('content'); ?>
<div class="container" style="margin-top: 4rem;">
    <h2 class="uk-heading-line uk-text-center"><span>Daftar Mata Pelajaran Anda</span></h2>

    <div class="uk-table-responsive">
        <table class="uk-table uk-table-striped uk-table-hover uk-table-divider">
            <thead>
                <tr>
                    <th>Nama Mata Pelajaran</th>
                    <th>Harga per Jam</th>
                    <th>Jumlah Jam</th>
                    <th>Angkatan</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($mapel)) : ?>
                    <tr>
                        <td colspan="4" class="uk-text-center">Tidak ada mata pelajaran yang tersedia.</td>
                    </tr>
                <?php else : ?>
                    <?php foreach ($mapel as $row) : ?>
                        <tr>
                            <td><?= esc($row['nama_mapel']) ?></td>
                            <td>Rp <?= number_format($row['harga_per_jp'], 0, ',', '.') ?></td>
                            <td><?= esc($row['jp']) ?> Jam</td>
                            <td>Angkatan <?= esc($row['angkatan']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>