<!DOCTYPE html>
<html>

<head>
    <title>Analisa Kehadiran</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="container">
        <h1>Analisa Kehadiran</h1>
        
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif ?>
        
        <?php if (isset($message)): ?>
            <div class="alert alert-info"><?= $message ?></div>
        <?php endif ?>


        
        <form method="get">
            <div class="form-group">
                <label for="nama_guru">Nama Guru:</label>
                <select class="form-control" id="nama_guru" name="nama_guru">
                    <?php if (isset($data_guru) && !empty($data_guru)): ?>
                        <?php foreach ($data_guru as $guru): ?>
                            <option value="<?= $guru['nama_guru'] ?>" <?= (isset($nama_guru) && $nama_guru == $guru['nama_guru']) ? 'selected' : '' ?>>
                                <?= $guru['nama_guru'] ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="tahun">Tahun:</label>
                <input type="number" class="form-control" id="tahun" name="tahun"
                value="<?= isset($tahun) ? $tahun : date('Y') ?>">
            </div>
            <div class="flex">
                <button type="submit" class="btn btn-primary">Tampilkan</button>
                <a href="<?= base_url('/admin/dashboard') ?>" class="btn btn-secondary" style="margin-left: 80%;">Kembali</a>
            </div>
        </form>

        <?php if (isset($chart_data) && !empty($chart_data)): ?>
            <h2>Data Kehadiran Guru: <?= isset($nama_guru) ? $nama_guru : '' ?>
                (<?= isset($tahun) ? $tahun : '' ?>)</h2>
            <canvas id="myChart" width="400" height="200"></canvas>
            <script>
                const ctx = document.getElementById('myChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: <?= json_encode($labels) ?>,
                        datasets: [{
                                label: 'Kehadiran',
                                data: <?= json_encode(array_values($chart_data['kehadiran'])) ?>,
                                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 1
                            },
                            {
                                label: 'Ijin',
                                data: <?= json_encode(array_values($chart_data['ijin'])) ?>,
                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 1
                            },
                            {
                                label: 'Alpa',
                                data: <?= json_encode(array_values($chart_data['alpa'])) ?>,
                                backgroundColor: 'rgba(255, 205, 86, 0.2)',
                                borderColor: 'rgba(255, 205, 86, 1)',
                                borderWidth: 1
                            }
                        ]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                                max: 30
                            }
                        }
                    }
                });
            </script>
        <?php endif ?>
    </div>
</body>

</html>