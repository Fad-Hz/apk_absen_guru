<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<h1>Persentase Kehadiran Guru</h1>

<form action="<?= base_url('admin/persentase') ?>" method="get">
    <div class="uk-margin">
        <label class="uk-form-label" for="bulan">Bulan:</label>
        <div class="uk-form-controls">
            <select class="uk-select" name="bulan" id="bulan">
                <?php for ($i = 1; $i <= 12; $i++): ?>
                    <option value="<?= $i ?>" <?= ($i == $bulan) ? 'selected' : '' ?>><?= date('F', mktime(0, 0, 0, $i, 10)) ?></option>
                <?php endfor ?>
            </select>
        </div>
    </div>
    <div class="uk-margin">
        <label class="uk-form-label" for="tahun">Tahun:</label>
        <div class="uk-form-controls">
            <select class="uk-select" name="tahun" id="tahun">
                <?php for ($i = date('Y') - 5; $i <= date('Y'); $i++): ?>
                    <option value="<?= $i ?>" <?= ($i == $tahun) ? 'selected' : '' ?>><?= $i ?></option>
                <?php endfor ?>
            </select>
        </div>
    </div>
    <button type="submit" class="uk-button uk-button-primary">Filter</button>
</form>

<table class="uk-table uk-table-hover uk-table-striped">
    <thead>
        <tr>
            <th>Nama Guru</th>
            <th>Jumlah Hari Kerja</th>
            <th>Persentase Kehadiran</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($kehadiran as $k): ?>
            <tr>
                <td><?= $k['nama_guru'] ?></td>
                <td><?= $k['jumlah_hari'] ?></td>
                <td>
                    <?php
                    $persentase = ($k['jumlah_hari'] / 30) * 100; // Calculate percentage based on 30 days
                    echo number_format($persentase, 2) . '%';
                    ?>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<div style="margin-bottom:5rem;"></div>
<?= $this->endSection() ?>