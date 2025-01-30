<?= $this->extend('layouts/admin'); ?>
<?= $this->section('content'); ?>

<!-- Breadcrumbs -->
<ul class="uk-breadcrumb">
    <li><a href="/admin/datamapel"><span uk-icon="icon: arrow-left"></span> Kembali</a></li>
    <li><span>Tambah Mata Pelajaran</span></li>
</ul>

<!-- Form Title -->
<h1 class="uk-heading-line uk-text-center uk-margin-medium-bottom"><span>Tambah Mata Pelajaran</span></h1>

<!-- Form -->
<div class="uk-flex uk-flex-center">
    <form action="/admin/tambahmapel" method="post" class="uk-form-stacked uk-width-1-2@s uk-width-1-3@m uk-box-shadow-large uk-padding uk-background-muted uk-border-rounded" style="margin-bottom: 2rem;">
        <!-- Nama Mata Pelajaran -->
        <div class="uk-margin">
            <label class="uk-form-label" for="nama_mata_pelajaran">
                <span uk-icon="icon: bookmark"></span> Nama Mata Pelajaran
            </label>
            <div class="uk-form-controls">
                <input class="uk-input" id="nama_mata_pelajaran" name="nama_mata_pelajaran" type="text" placeholder="Masukkan nama mata pelajaran" required>
            </div>
        </div>

        <!-- Tombol Simpan -->
        <div class="uk-margin uk-text-center">
            <button type="submit" class="uk-button uk-button-primary uk-button-large uk-border-rounded">
                <span uk-icon="icon: check"></span> Simpan
            </button>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>