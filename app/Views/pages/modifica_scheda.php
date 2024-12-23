
<?= $this->extend('layouts/main') ?>

<?= $this->section('content'); ?>
    <form action="<?= base_url('/aggiorna-scheda/' . $dati['id']); ?>" method="post" id="formScheda">
    <?= $this->setVar('dati', $dati)->include('parts/form_scheda') ?>
    <div class="card m-2">        
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Aggiorna</button>
        </div>
    </div>
    </form>
<?= $this->endSection(); ?>
