
<?= $this->extend('layouts/main') ?>

<?= $this->section('content'); ?>
    <form action="<?= base_url('/aggiorna/' . $dati['id']); ?>" method="post" id="formScheda">
    <?= $this->setVar('dati', $dati)->include('parts/form_scheda') ?>
    <div class="card">        
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Aggiorna</button>
        </div>
    </div>
    </form>
<?= $this->endSection(); ?>
