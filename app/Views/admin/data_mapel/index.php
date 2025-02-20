<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="uk-container uk-margin-top">

    <ul class="uk-breadcrumb">
        <li><span uk-icon="icon:home"></span><a href="<?= base_url('admin') ?>"> Dashboard</a></li>
        <li class="uk-disabled"><a>Data Mata Pelajaran</a></li>
    </ul>

    <h2 class="uk-heading-line uk-text-center"><span>Data Mata Pelajaran</span></h2>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="uk-alert-success" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p><?= session()->getFlashdata('success') ?></p>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="uk-alert-danger" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p><?= session()->getFlashdata('error') ?></p>
        </div>
    <?php endif; ?>

    <div class="uk-margin-bottom">
        <a href="<?= base_url('admin/tambahmapel') ?>" class="uk-button uk-button-primary">
            <span uk-icon="icon: plus"></span> Tambah Mata Pelajaran
        </a>
    </div>

    <div class="uk-card uk-card-default uk-card-body">
        <table class="uk-table uk-table-divider uk-table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Mata Pelajaran</th>
                    <th>Jam Pelajaran</th>
                    <th>Harga per Jam</th>
                    <th>Angkatan (1-3)</th>
                    <th>Guru Pengampu</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($mapel)) : ?>
                    <?php $no = 1;
                    foreach ($mapel as $m) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= esc($m['nama_mapel']) ?></td>
                            <td><?= esc($m['jp']) ?></td>
                            <td>Rp <?= number_format($m['harga_per_jp'], 0, ',', '.') ?></td>
                            <td><?= esc($m['angkatan']) ?></td>
                            <td><?= esc($m['nama_guru'] ?? 'Belum Ditentukan') ?></td>
                            <td>
                                <a href="<?= base_url('admin/editmapel/' . $m['id']) ?>" class="uk-button uk-button-small">
                                    <span uk-icon="icon: pencil"></span>
                                </a>
                                <a href="<?= base_url('admin/hapusmapel/' . $m['id']) ?>" class="uk-button uk-button-small" onclick="return confirm('Apakah Anda yakin ingin menghapus mata pelajaran ini?')">
                                    <span uk-icon="icon: trash"></span> 
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="7" class="uk-text-center">Tidak ada data mata pelajaran</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<div style="margin-bottom:4rem;"></div>
<?= $this->endSection() ?>