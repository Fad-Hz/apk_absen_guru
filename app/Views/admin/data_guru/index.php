<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<!-- Breadcrumbs -->
<ul class="uk-breadcrumb">
    <li><a href="<?= base_url('/admin/dashboard') ?>"><span uk-icon="icon: home"></span> Dashboard</a></li>
    <li><span>Data Guru</span></li>
</ul>

<div class="uk-container uk-margin-top">
    <h2 class="uk-heading-line uk-text-center"><span>Manajemen Data Guru</span></h2>
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
    
    <div class="uk-margin">
        <a href="<?= base_url('/admin/tambahguru') ?>" class="uk-button uk-button-primary">
            <span uk-icon="icon: plus-circle"></span> Tambah Data Guru
        </a>
    </div>
    <div class="uk-overflow-auto">
        <table class="uk-table uk-table-divider uk-table-hover uk-table-responsive" style="margin-bottom: 5rem;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Guru</th>
                    <th>Jam Masuk</th>
                    <th>Jam Keluar</th>
                    <th>Kehadiran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($guru as $g): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $g['nama_guru']; ?></td>
                        <td><?= $g['jam_masuk']; ?></td>
                        <td><?= $g['jam_keluar']; ?></td>
                        <td>
                            <?= $g['status'] ?>
                        </td>
                        <td>
                            <a href="<?= base_url('/admin/editguru/' . $g['id']) ?>" class="uk-icon-link uk-margin-small-right" uk-icon="file-edit"></a>
                            <form action="<?= base_url('/admin/hapusguru/' . $g['id']) ?>" method="post" style="display:inline;">
                                <button type="submit" class="uk-icon-link uk-text-danger" uk-icon="trash" onclick="return confirm('Yakin ingin menghapus data ini?')"></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>