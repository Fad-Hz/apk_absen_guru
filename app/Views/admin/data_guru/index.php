<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<!-- Breadcrumbs -->
<ul class="uk-breadcrumb">
    <li><a href="/admin/dashboard"><span uk-icon="icon: home"></span> Dashboard</a></li>
    <li><span>Data Guru</span></li>
</ul>

<div class="uk-container uk-margin-top">
    <h2 class="uk-heading-line uk-text-center"><span>Manajemen Data Guru</span></h2>
    <div class="uk-margin">
        <a href="/admin/tambahguru" class="uk-button uk-button-primary">
            <span uk-icon="icon: plus-circle"></span> Tambah Data Guru
        </a>
    </div>
    <div class="uk-overflow-auto">
        <table class="uk-table uk-table-divider uk-table-hover uk-table-responsive" style="margin-bottom: 5rem;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Guru</th>
                    <th>Mata Pelajaran</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($guru as $g): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $g['nama_guru']; ?></td>
                        <td><?= $g['nama_mata_pelajaran']; ?></td>
                        <td>
                            <?= $g['status'] ?>
                        </td>
                        <td>
                            <a href="/admin/detailguru/<?= $g['id'] ?>" class="uk-icon-link uk-margin-small-right" uk-icon="info"></a>
                            <a href="/admin/editguru/<?= $g['id'] ?>" class="uk-icon-link uk-margin-small-right" uk-icon="file-edit"></a>
                            <form action="/admin/hapusguru/<?= $g['id'] ?>" method="post" style="display:inline;">
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