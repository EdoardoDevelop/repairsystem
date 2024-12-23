<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Telefono</th>
                    <th>Dispositivo</th>
                    <th>Data Consegna</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dati as $riparazione): ?>
                <tr>
                    <td><?= $riparazione['id']; ?></td>
                    <td><?= $riparazione['cliente_nome']; ?></td>
                    <td><?= $riparazione['telefono']; ?></td>
                    <td><?= $riparazione['tipo_dispositivo']; ?></td>
                    <td><?= $riparazione['data_consegna']; ?></td>
                    <td>
                        <a href="<?= base_url('/modifica-scheda/' . $riparazione['id']); ?>" class="text-warning m-2"><i class="fas fa-fw fa-pen"></i></a>
                        <a href="<?= base_url('/stampa-scheda/' . $riparazione['id']); ?>" class="text-success m-2" target="_blank"><i class="fas fa-fw fa-print"></i></a>
                        <a href="<?= base_url('/elimina-scheda/' . $riparazione['id']); ?>" class="text-danger m-2" onclick="return confirm('Sei sicuro di voler eliminare questa scheda?');"><i class="fas fa-fw fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>