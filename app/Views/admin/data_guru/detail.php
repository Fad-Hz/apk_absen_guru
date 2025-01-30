<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="uk-container uk-margin-top">
    <h2 class="uk-heading-line uk-text-center"><span>Detail Data Guru</span></h2>
    <div class="uk-card uk-card-default uk-card-body uk-width-1-2@m uk-margin-auto">
        <div class="uk-margin-small-bottom">
            <strong>Nama:</strong> <?= $guru['nama_guru']; ?>
        </div>
        <div class="uk-margin-small-bottom">
            <strong>Mata Pelajaran:</strong> <?= $guru['nama_mata_pelajaran']; ?>
        </div>
        <div class="uk-margin-small-bottom">
            <strong>Status:</strong>
            <?= $guru['status'] ?>
        </div>
        <div class="uk-margin">
            <strong>Foto:</strong>
            <div class="uk-margin-small-top">
                <img class="uk-border-circle" src="/uploads/<?= $guru['foto_guru'] ?>" alt="<?= $guru['foto_guru'] ?>" width="150" height="150">
            </div>
        </div>
    </div>
    <div class="uk-margin-top uk-text-center" style="margin-bottom: 5rem;">
        <a href="/admin/dataguru" class="uk-button uk-button-secondary">
            <span uk-icon="icon: arrow-left"></span> Kembali
        </a>
    </div>
</div>
<?= $this->endSection() ?>