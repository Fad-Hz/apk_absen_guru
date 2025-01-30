<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="uk-container uk-margin-top">
    <h2 class="uk-heading-line uk-text-center"><span>Edit Data Guru</span></h2>
    <div class="uk-card uk-card-default uk-card-body uk-width-1-2@m uk-margin-auto">
        <form action="/admin/editguru/<?= $guru['id'] ?>" method="post" enctype="multipart/form-data">
            <!-- Nama Guru -->
            <div class="uk-margin">
                <label for="nama_guru" class="uk-form-label"><strong>Nama Guru</strong></label>
                <div class="uk-form-controls">
                    <input id="nama_guru" type="text" name="nama_guru" class="uk-input" placeholder="Nama Guru" value="<?= $guru['nama_guru'] ?>" required>
                </div>
            </div>

            <!-- Mata Pelajaran -->
            <div class="uk-margin">
                <label for="mata_pelajaran" class="uk-form-label"><strong>Mata Pelajaran</strong></label>
                <div class="uk-form-controls">
                    <select id="mata_pelajaran" name="mata_pelajaran" class="uk-select" required>
                        <option value="<?= $guru['mata_pelajaran_id'] ?>" selected><?= $guru['nama_mata_pelajaran']; ?></option>
                        <?php foreach ($mapel as $m): ?>
                            <option value="<?= $m['id'] ?>"><?= $m['nama_mata_pelajaran']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <!-- Status -->
            <div class="uk-margin">
                <label for="status" class="uk-form-label"><strong>Status</strong></label>
                <div class="uk-form-controls">
                    <select id="status" name="status" class="uk-select">
                        <option value="<?= $guru['status'] ?>" selected><?= ucfirst($guru['status']); ?></option>
                        <option value="belum absen">Belum Absen</option>
                        <option value="ijin">Ijin</option>
                        <option value="alpa">Alpa</option>
                        <option value="hadir">Hadir</option>
                    </select>
                </div>
            </div>

            <!-- Foto Guru -->
            <div class="uk-margin">
                <label for="foto_guru" class="uk-form-label"><strong>Foto Guru</strong></label>
                <div class="uk-margin-small">
                    <img src="/uploads/<?= $guru['foto_guru'] ?>" alt="<?= $guru['foto_guru'] ?>" class="uk-border-rounded" width="150" height="150">
                </div>
                <div uk-form-custom="target: true">
                    <input id="foto_guru" type="file" name="foto_guru">
                    <input class="uk-input uk-form-width-medium" type="text" placeholder="Pilih file baru (opsional)" disabled>
                </div>
            </div>

            <!-- Tombol Simpan -->
            <div class="uk-margin">
                <button type="submit" class="uk-button uk-button-primary">
                    <span uk-icon="icon: save"></span> Simpan
                </button>
            </div>
        </form>
    </div>

    <div class="uk-margin-top uk-text-center" style="margin-bottom: 5rem;">
        <a href="/admin/dataguru" class="uk-button uk-button-secondary">
            <span uk-icon="icon: arrow-left"></span> Kembali
        </a>
    </div>
</div>
<?= $this->endSection() ?>