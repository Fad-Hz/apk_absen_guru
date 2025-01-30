<?= $this->extend('layouts/admin'); ?>
<?= $this->section('content'); ?>

<!-- Flash Messages -->
<?php if (session()->getFlashdata('success')): ?>
    <div class="uk-alert-success uk-margin-small uk-flex uk-flex-middle" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <span uk-icon="icon: check; ratio: 1.5"></span>
        <span class="uk-margin-small-left"><?= session()->getFlashdata('success'); ?></span>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="uk-alert-danger uk-margin-small uk-flex uk-flex-middle" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <span uk-icon="icon: close; ratio: 1.5"></span>
        <span class="uk-margin-small-left"><?= session()->getFlashdata('error'); ?></span>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('info')): ?>
    <div class="uk-alert-primary uk-margin-small uk-flex uk-flex-middle" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <span uk-icon="icon: info; ratio: 1.5"></span>
        <span class="uk-margin-small-left"><?= session()->getFlashdata('info'); ?></span>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('warning')): ?>
    <div class="uk-alert-warning uk-margin-small uk-flex uk-flex-middle" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <span uk-icon="icon: bolt; ratio: 1.5"></span>
        <span class="uk-margin-small-left"><?= session()->getFlashdata('warning'); ?></span>
    </div>
<?php endif; ?>

<!-- Form -->
<form action="/admin/setalpa" method="post" class="uk-margin">
    <button type="submit" class="uk-button uk-button-primary uk-border-rounded">
        Set Alpa
    </button>
</form>
<!-- Table -->
<div class="uk-overflow-auto">
    <table class="uk-table uk-table-divider uk-table-striped uk-table-hover uk-box-shadow-small">
        <thead>
            <tr>
                <th><span uk-icon="icon: list"></span> No</th>
                <th><span uk-icon="icon: user"></span> Nama Guru</th>
                <th><span uk-icon="icon: calendar"></span> Tanggal</th>
                <th><span uk-icon="icon: ban"></span> Total Alpa</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($alpa as $a): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $a['nama_guru']; ?></td>
                    <td><?= $a['tanggal']; ?></td>
                    <td>
                        <?php
                        // Pastikan nilai 'poin' diambil dengan benar
                        foreach ($poin as $p) {
                            if ($p['id_guru'] === $a['id_guru']) { // Sesuaikan logika sesuai kebutuhan
                                echo $p['total_poin'];
                                break;
                            }
                        }
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<div style="margin-bottom: 5rem;"></div>

<?= $this->endSection(); ?>