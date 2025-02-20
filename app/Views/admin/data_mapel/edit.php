<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="uk-container uk-margin-top">
    <h2 class="uk-heading-line uk-text-center"><span>Edit Mata Pelajaran</span></h2>
    <div class="uk-card uk-card-default uk-card-body uk-width-1-2@m uk-margin-auto">
        <form action="<?= base_url('admin/editmapel/'.$mapel['id']) ?>" method="post">
            <!-- Nama Mata Pelajaran -->
            <div class="uk-margin">
                <label for="nama_mapel" class="uk-form-label"><strong>Nama Mata Pelajaran</strong></label>
                <div class="uk-form-controls">
                    <input id="nama_mapel" type="text" name="nama_mapel" 
                    value="<?=$mapel['nama_mapel']?>" class="uk-input" placeholder="Nama Mata Pelajaran" required>
                </div>
            </div>

            <!-- Jam Pelajaran -->
            <div class="uk-margin">
                <label for="jp" class="uk-form-label"><strong>Jumlah JP</strong></label>
                <div class="uk-form-controls">
                    <input id="jp" type="number" name="jp" 
                    value="<?=$mapel['jp']?>" class="uk-input" placeholder="Jam Pelajaran Per Hari (1-8)" required>
                </div>
            </div>

            <!-- Harga per JP -->
            <div class="uk-margin">
                <label for="harga_per_jp" class="uk-form-label"><strong>Harga per JP</strong></label>
                <div class="uk-form-controls">
                    <input id="harga_per_jp" type="number" name="harga_per_jp" 
                    value="<?=$mapel['harga_per_jp']?>" class="uk-input" placeholder="Harga per JP" required>
                </div>
            </div>

            <!-- Angkatan -->
            <div class="uk-margin">
                <label for="angkatan" class="uk-form-label"><strong>Angkatan </strong></label>
                <div class="uk-form-controls">
                    <input id="angkatan" type="number" value="<?=$mapel['angkatan']?>"
                     name="angkatan" class="uk-input" placeholder="Angkatan ke (1 - 3)" required>
                </div>
            </div>

            <!-- Guru Pengampu -->
            <div class="uk-margin">
                <label for="id_guru" class="uk-form-label"><strong>Guru Pengampu</strong></label>
                <div class="uk-form-controls">
                    <select id="id_guru" name="id_guru" class="uk-select">
                        <option value="<?= $mapel['id_guru'] ?>">Pilih Guru</option>
                        <?php foreach ($guru as $g) : ?>
                            <option value="<?= $g['id'] ?>"><?= esc($g['nama_guru']) ?></option>
                        <?php endforeach; ?>
                    </select>
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
        <a href="<?= base_url('admin/datamapel') ?>" class="uk-button uk-button-secondary">
            <span uk-icon="icon: arrow-left"></span> Kembali
        </a>
    </div>
</div>
<?= $this->endSection() ?>