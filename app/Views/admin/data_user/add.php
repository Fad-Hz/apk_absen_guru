<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<!-- Breadcrumbs -->
<ul class="uk-breadcrumb">
    <li><a href="<?= base_url('/admin/dashboard') ?>"><span uk-icon="icon: home"></span> Dashboard</a></li>
    <li><a href="<?= base_url('/admin/datauser') ?>">Data User</a></li>
    <li><span>Tambah User</span></li>
</ul>

<div class="uk-container uk-margin-top">
    <h2 class="uk-heading-line uk-text-center"><span>Tambah User</span></h2>

    <form action="<?= base_url('/admin/tambahuser') ?>" method="post">
        <div class="uk-margin">
            <label class="uk-form-label">Nama Guru</label>
            <div class="uk-form-controls">
                <select class="uk-select" name="id_guru">
                    <?php foreach ($gurus as $guru): ?>
                        <option value="<?= $guru['id'] ?>"><?= $guru['nama_guru'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="uk-margin">
            <label class="uk-form-label">Username</label>
            <div class="uk-form-controls">
                <input class="uk-input" type="text" name="username" required>
            </div>
        </div>

        <div class="uk-margin">
            <label class="uk-form-label">Password</label>
            <div class="uk-form-controls">
                <input class="uk-input" type="text" name="password" required> <!-- Password dalam bentuk teks -->
            </div>
        </div>

        <div class="uk-margin">
            <label class="uk-form-label">Role</label>
            <div class="uk-form-controls">
                <select class="uk-select" name="role">
                    <option value="guru">Guru</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
        </div>

        <button type="submit" class="uk-button uk-button-primary">
            <span uk-icon="icon: check"></span> Simpan
        </button>
    </form>
</div>
<div style="margin-bottom: 4rem;"></div>
<?= $this->endSection() ?>