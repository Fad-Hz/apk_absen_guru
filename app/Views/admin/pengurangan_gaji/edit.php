<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<h1>Kurangi Gaji</h1>

<?php if (session()->get('errors')) : ?>
    <div class="uk-alert-danger" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <ul>
            <?php foreach (session()->get('errors') as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>

<form action="/admin/kurangigaji/<?= $gaji['id'] ?>" method="post">

    <div class="uk-margin">
        <label class="uk-form-label" for="mapel">Mata Pelajaran</label>
        <div class="uk-form-controls">
            <textarea class="uk-textarea" id="mapel" readonly rows="5"><?php foreach ($mapel as $m) : ?><?= $m['nama_mapel'] . " (" . $m['jp'] . " JP - Rp " . $m['harga_per_jp'] . "/JP)\n" ?><?php endforeach ?></textarea>
        </div>
    </div>

    <div class="uk-margin">
        <label class="uk-form-label" for="jumlah_pengurangan">Jumlah Pengurangan</label>
        <div class="uk-form-controls">
            <input class="uk-input" type="number" name="jumlah_pengurangan" id="jumlah_pengurangan" value="<?= old('jumlah_pengurangan') ?>">
        </div>
    </div>

    <div class="uk-margin">
        <button type="submit" class="uk-button uk-button-primary">Simpan</button>
    </div>

</form>

<?= $this->endSection() ?>