<?= $this->extend('layouts/main') ?>

<?= $this->section('content'); ?>

<form action="<?= base_url('/salva-dati'); ?>" method="post" id="formScheda">
    <?= $this->setVar('dati', [])->include('parts/form_scheda') ?>

    <div class="card m-2">
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Salva</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
    </div>
    
</form>
<?= $this->endSection(); ?>