<?= $this->extend('layouts/user') ?>

<?= $this->section('content') ?>
<div class="uk-container uk-margin-top">
    <h2 class="uk-heading-line uk-text-center"><span>Data Gaji</span></h2>

    <!-- Filter Bulan & Tahun -->
    <form method="GET" class="uk-margin">
        <div class="uk-grid-small" uk-grid>
            <div>
                <select name="bulan" class="uk-select">
                    <?php for ($i = 1; $i <= 12; $i++) : ?>
                        <option value="<?= sprintf('%02d', $i) ?>" <?= ($bulan == sprintf('%02d', $i)) ? 'selected' : '' ?>>
                            <?= date('F', mktime(0, 0, 0, $i, 1)) ?>
                        </option>
                    <?php endfor; ?>
                </select>
            </div>
            <div>
                <select name="tahun" class="uk-select">
                    <?php for ($y = 2023; $y <= date('Y'); $y++) : ?>
                        <option value="<?= $y ?>" <?= ($tahun == $y) ? 'selected' : '' ?>><?= $y ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <div>
                <button type="submit" class="uk-button uk-button-primary">Filter</button>
            </div>
        </div>
    </form>

    <!-- Tabel Data Gaji -->
    <table class="uk-table uk-table-striped">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Total Gaji (Rp)</th>
                <th>Pengurangan Gaji (Rp)</th>
                <th>Sisa Gaji (Rp)</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($gaji)) : ?>
                <?php foreach ($gaji as $row) : ?>
                    <tr>
                        <td><?= date('d-m-Y', strtotime($row['tanggal_gaji'])) ?></td>
                        <td>Rp <?= number_format($row['total_gaji'], 0, ',', '.') ?></td>
                        <td>Rp <?= number_format($row['pengurangan_gaji'], 0, ',', '.') ?></td>
                        <td>Rp <?= number_format($row['sisa_gaji'], 0, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="2" class="uk-text-center">Belum ada data gaji.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>