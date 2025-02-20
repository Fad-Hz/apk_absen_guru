<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="uk-container uk-margin-top">
    <h2 class="uk-heading-line uk-text-center"><span>Edit Data Guru</span></h2>
    <div class="uk-card uk-card-default uk-card-body uk-width-1-2@m uk-margin-auto">
        <form action="<?= base_url('admin/editguru/'.$guru["id"]) ?>" method="post" enctype="multipart/form-data">
            <!-- Nama Guru -->
            <div class="uk-margin">
                <label for="nama_guru" class="uk-form-label"><strong>Nama Guru</strong></label>
                <div class="uk-form-controls">
                    <input id="nama_guru" type="text" name="nama_guru" 
                    value="<?=$guru['nama_guru']?>" class="uk-input" placeholder="Nama Guru" required>
                </div>
            </div>

            <!-- Status Kehadiran -->
            <div class="uk-margin">
                <label for="status" class="uk-form-label"><strong>Status Kehadiran</strong></label>
                <div class="uk-form-controls">
                    <select id="status" name="status" class="uk-select">
                        <option value="belum absen">Belum Absen</option>
                        <option value="ijin">Ijin</option>
                        <option value="alpa">Alpa</option>
                        <option value="hadir">Hadir</option>
                    </select>
                </div>
            </div>

            <!-- Jam Masuk -->
            <div class="uk-margin">
                <label for="jam_masuk" class="uk-form-label"><strong>Jam Masuk</strong></label>
                <div class="uk-form-controls">
                    <input id="jam_masuk" type="time" name="jam_masuk"
                    value="<?=$guru['jam_masuk']?>" class="uk-input" required>
                </div>
            </div>

            <!-- Jam Keluar -->
            <div class="uk-margin">
                <label for="jam_keluar" class="uk-form-label"><strong>Jam Keluar</strong></label>
                <div class="uk-form-controls">
                    <input id="jam_keluar" type="time" name="jam_keluar"
                    value="<?=$guru['jam_keluar']?>" class="uk-input" required>
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
        <a href="<?= base_url('admin/dataguru') ?>" class="uk-button uk-button-secondary">
            <span uk-icon="icon: arrow-left"></span> Kembali
        </a>
    </div>
</div>
<?= $this->endSection() ?>