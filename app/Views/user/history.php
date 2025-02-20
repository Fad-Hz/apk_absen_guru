<?= $this->extend('layouts/user'); ?>

<?= $this->section('content'); ?>
<div class="uk-container uk-margin-top">
    <h2 class="uk-heading-line uk-text-center"><span>Riwayat Kehadiran</span></h2>

    <!-- Form Filter Bulan & Tahun -->
    <form action="<?= base_url('history') ?>" method="get" class="uk-grid-small uk-flex-center uk-margin" uk-grid>
        <div class="uk-width-medium">
            <label for="bulan" class="uk-form-label">Bulan:</label>
            <select name="bulan" id="bulan" class="uk-select">
                <?php for ($i = 1; $i <= 12; $i++) : ?>
                    <option value="<?= sprintf('%02d', $i) ?>" <?= ($bulan == sprintf('%02d', $i)) ? 'selected' : '' ?>>
                        <?= date('F', mktime(0, 0, 0, $i, 10)) ?>
                    </option>
                <?php endfor; ?>
            </select>
        </div>
        <div class="uk-width-medium">
            <label for="tahun" class="uk-form-label">Tahun:</label>
            <select name="tahun" id="tahun" class="uk-select">
                <?php for ($y = date('Y') - 5; $y <= date('Y'); $y++) : ?>
                    <option value="<?= $y ?>" <?= ($tahun == $y) ? 'selected' : '' ?>>
                        <?= $y ?>
                    </option>
                <?php endfor; ?>
            </select>
        </div>
        <div class="uk-width-auto uk-margin-top">
            <button type="submit" class="uk-button uk-button-primary"><span uk-icon="search"></span> Filter</button>
        </div>
    </form>

    <!-- Tabel Riwayat Kehadiran -->
    <div class="uk-overflow-auto">
        <table class="uk-table uk-table-striped uk-table-hover uk-table-middle uk-box-shadow-small">
            <thead>
                <tr>
                    <th class="uk-text-center">Tanggal</th>
                    <th class="uk-text-center">Jam Mengajar</th>
                    <th class="uk-text-center">Jam Pulang</th>
                    <th class="uk-text-center">Absen Masuk</th>
                    <th class="uk-text-center">Absen Keluar</th>
                    <th class="uk-text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($history)) : ?>
                    <tr>
                        <td colspan="5" class="uk-text-center uk-text-muted">Tidak ada catatan kehadiran.</td>
                    </tr>
                <?php else : ?>
                    <?php foreach ($history as $row) : ?>
                        <tr>
                            <td class="uk-text-center"> <?= date('d-m-Y', strtotime($row['tanggal'])) ?> </td>
                            <td class="uk-text-center"> <?= $row['jam_mengajar'] ?> </td>
                            <td class="uk-text-center"> <?= $row['jam_pulang'] ?> </td>
                            <td class="uk-text-center"> <?= $row['jam_masuk'] ?> </td>
                            <td class="uk-text-center">
                                <?= ($row['jam_keluar'] == '00:00:00') ? '<span class="uk-text-warning">Belum Presensi Keluar</span>' : $row['jam_keluar'] ?>
                            </td>
                            <td class="uk-text-center">
                                <span class="uk-label <?= ($row['status'] == 'terlambat') ? 'uk-label-danger' : 'uk-label-success' ?>">
                                    <?= ucfirst($row['status']) ?>
                                </span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>