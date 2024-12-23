<?= $this->extend('layouts/main') ?>

<?= $this->section('content'); ?>

<form action="<?= base_url('/salva-dati'); ?>" method="post">
    
    <div class="card">
        <div class="card-header">
            Dati Cliente
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" placeholder="Inserisci il nome" required>
            </div>
            <div class="form-group">
                <label for="telefono">Telefono</label>
                <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Inserisci il telefono" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Inserisci l'email">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Salva</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
    </div>
    
</form>
<?= $this->endSection(); ?>