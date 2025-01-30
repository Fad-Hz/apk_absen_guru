<?= $this->extend('layouts/admin'); ?>
<?= $this->section('content'); ?>

<!-- Breadcrumbs -->
<ul class="uk-breadcrumb">
    <li><a href="/admin/dashboard"><span uk-icon="icon: home"></span> Dashboard</a></li>
    <li><span>Mata Pelajaran</span></li>
</ul>
<?php if (session()->getFlashdata('success')): ?>
    <div class="uk-alert-success" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <p><span uk-icon="icon: check"></span> Berhasil Create Data. </p>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('succes')): ?>
    <div class="uk-alert-success" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <p><span uk-icon="icon: check"></span> Berhasil Delete Data. </p>
    </div>
<?php endif; ?>

<!-- Title -->
<h1 class="uk-heading-line uk-text-center uk-margin-medium-bottom"><span>Data Mata Pelajaran</span></h1>

<!-- Tambah Mata Pelajaran Button -->
<div class="uk-flex uk-flex-right uk-margin-medium-bottom">
    <a href="/admin/tambahmapel" class="uk-button uk-button-primary uk-button-large uk-border-rounded">
        <span uk-icon="icon: plus-circle"></span> Tambah Mata Pelajaran
    </a>
</div>

<!-- Mata Pelajaran Grid -->
<div class="uk-grid-small uk-child-width-1-2@s uk-child-width-1-3@m uk-grid-match" uk-grid style="margin-bottom: 2rem;">
    <?php $no = 1;
    foreach ($mata_pelajaran as $m): ?>
        <div>
            <div class="uk-card uk-card-default uk-card-hover uk-card-body uk-text-center">
                <!-- Card Title -->
                <h3 class="uk-card-title">
                    <span uk-icon="icon: bookmark"></span> <?= $m['nama_mata_pelajaran']; ?>
                </h3>
                <!-- Subtitle -->
                <p class="uk-text-muted">No: <?= $no++; ?></p>

                <!-- Actions -->
                <div class="uk-margin-top">
                    <!-- Button: Hapus -->
                    <form action="/admin/hapusmapel/<?= $m['id'] ?>" method="post" style="display: inline;">
                        <button
                            class="uk-button uk-button-danger uk-border-rounded uk-margin-small-right"
                            onclick=
                            "return confirm(`yakin ingin hapus mata pelajaran <?= $m['nama_mata_pelajaran'] ?>?`)"
                            >
                            <span uk-icon="icon: trash"></span> Hapus
                        </button>

                    </form>

                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?= $this->endSection(); ?>