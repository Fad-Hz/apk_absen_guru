<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<!-- Breadcrumbs -->
<ul class="uk-breadcrumb">
    <li><a href="<?= base_url('/admin/dashboard') ?>"><span uk-icon="icon: home"></span> Dashboard</a></li>
    <li><span>Data User</span></li>
</ul>

<div class="uk-container uk-margin-top">
    <h2 class="uk-heading-line uk-text-center"><span>Manajemen Data User</span></h2>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="uk-alert-success" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p><?= session()->getFlashdata('success') ?></p>
        </div>
    <?php endif; ?>

    <div class="uk-margin">
        <a href="<?= base_url('/admin/tambahuser') ?>" class="uk-button uk-button-primary">
            <span uk-icon="icon: plus-circle"></span> Tambah User
        </a>
    </div>

    <div class="uk-overflow-auto">
        <table class="uk-table uk-table-divider uk-table-hover uk-table-responsive">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Guru</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($users as $user): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $user['nama_guru']; ?></td>
                        <td><?= $user['username']; ?></td>
                        <td><?= $user['password']; ?></td> <!-- Password tampil apa adanya -->
                        <td>
                            <a href="<?= base_url('/admin/edituser/' . $user['id']) ?>" class="uk-icon-link uk-margin-small-right" uk-icon="file-edit"></a>
                            <a href="<?= base_url('/admin/deleteuser/' . $user['id']) ?>" class="uk-icon-link uk-text-danger" uk-icon="trash" onclick="return confirm('Yakin ingin menghapus user ini?')"></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<div style="margin-bottom: 4rem;"></div>
<?= $this->endSection() ?>