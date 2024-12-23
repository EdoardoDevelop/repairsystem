<div class="card m-2">
    <div class="card-header">
    Cliente
    </div>
    <div class="card-body">
        <!-- Dati Cliente -->
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-text" id="basic-addon1"><a href="#" class="text-success" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCliente"><i class="fas fa-fw fa-plus"></i></a></span>
                <div class="form-control">
                    <select class="form-control select2" name="id_cliente" id="id_cliente" required>
                        <?php if (isset($dati['id_cliente'])): ?>
                            <option value="<?= $cliente['id']; ?>" selected>
                                <?= esc($cliente['nome'] . ' ' . $cliente['cognome']); ?>
                            </option>
                        <?php endif; ?>
                    </select>
                </div>
                    
                
                <script>
                   $('#id_cliente').select2({
                        ajax: {
                            url: '<?= base_url('/clienti/cerca'); ?>', // URL del controller
                            dataType: 'json', // Tipo di dati della risposta
                            delay: 250, // Ritardo per evitare troppe richieste
                            minimumInputLength: 3, // Minimo numero di caratteri per attivare la ricerca
                            data: function (params) {
                                return {
                                    search: params.term // Passa il termine di ricerca al controller
                                };
                            },
                            processResults: function (data) {
                                // Processa i risultati e restituisce un formato comprensibile da Select2
                                return {
                                    results: data.map(function (item) {
                                        return {
                                            id: item.id, // ID del cliente
                                            text: item.nome // Nome del cliente
                                        };
                                    })
                                };
                            }
                        },
                        placeholder: 'Seleziona un cliente',
                        allowClear: true
                    });

                </script>
            </div>
        </div>
        <!-- modalCliente -->
        <div class="modal fade" id="modalCliente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalClienteLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalClienteLabel">Aggiungi Cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <!-- Dati Cliente -->
                            <div class="form-group">
                                <label for="nome">Cliente</label>
                                <input type="text" id="nome" class="form-control" placeholder="Inserisci il nome">
                            </div>
                            
                            <div class="form-group">
                                <label for="telefono">Telefono</label>
                                <input type="text" id="telefono" class="form-control" placeholder="Inserisci il telefono">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-control" placeholder="Inserisci l'email">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="aggiungiCliente()">Aggiungi</button>
                </div>
                </div>
            </div>
        </div>
        <!-- /modalCliente -->
         <script>
            function aggiungiCliente(){
                $.ajax({
                    url: '<?= base_url('/clienti/salva'); ?>',
                    method: 'POST',
                    data: {
                        nome: $('#nome').val(),
                        email: $('#email').val(),
                        telefono: $('#telefono').val()
                    },
                    success: function(response) {
                        $('#modalCliente').modal('hide');
                        $('#nome').val('');
                        $('#email').val('');
                        $('#telefono').val('');
                        $('#id_cliente').val(response.id).trigger('change')
                        console.log('Cliente aggiunto con successo:', response);
                    },
                    error: function(error) {
                        alert('Errore durante l\'inserimento del cliente.');
                        console.error('Errore:', error.responseJSON);
                    }
                });

            }
        </script>
    </div>
</div>

<div class="card m-2">
    <div class="card-header">
    Dati Dispositivo
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tipo_dispositivo">Tipo Dispositivo</label>
                    <select name="tipo_dispositivo" id="tipo_dispositivo" class="form-control" required>
                        <option value="">Seleziona il tipo</option>
                        <option value="Smartphone" <?= (isset($dati['tipo_dispositivo']) && $dati['tipo_dispositivo'] == 'Smartphone') ? 'selected' : '' ?>>Smartphone</option>
                        <option value="Laptop" <?= (isset($dati['tipo_dispositivo']) && $dati['tipo_dispositivo'] == 'Laptop') ? 'selected' : '' ?>>Laptop</option>
                        <option value="Tablet" <?= (isset($dati['tipo_dispositivo']) && $dati['tipo_dispositivo'] == 'Tablet') ? 'selected' : '' ?>>Tablet</option>
                        <option value="Altro" <?= (isset($dati['tipo_dispositivo']) && $dati['tipo_dispositivo'] == 'Altro') ? 'selected' : '' ?>>Altro</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="marca">Marca</label>
                    <input type="text" name="marca" id="marca" class="form-control" placeholder="Inserisci la marca" value="<?= $dati['marca'] ?? '' ?>" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="modello">Modello</label>
                    <input type="text" name="modello" id="modello" class="form-control" placeholder="Inserisci il modello" value="<?= $dati['modello'] ?? '' ?>" required>
                </div>
                <div class="form-group">
                    <label for="numero_serie">Numero di Serie</label>
                    <input type="text" name="numero_serie" id="numero_serie" class="form-control" placeholder="Inserisci il numero di serie" value="<?= $dati['numero_serie'] ?? '' ?>">
                </div>
            </div>
        </div>
       
        
    </div>
</div>

<div class="card m-2">
    <div class="card-header">
    Dettagli Riparazione
    </div>
    <div class="card-body">
        <!-- Dettagli Riparazione -->
        <div class="form-group">
            <label for="difetto">Difetto Segnalato</label>
            <textarea name="difetto" id="difetto" class="form-control" placeholder="Descrivi il difetto" rows="3" required><?= $dati['difetto'] ?? '' ?></textarea>
        </div>
        <div class="form-group">
            <label for="data_consegna">Data di Consegna</label>
            <input type="date" name="data_consegna" id="data_consegna" class="form-control" value="<?= $dati['data_consegna'] ?? '' ?>">
        </div>
        <div class="form-group">
            <label for="note">Note Aggiuntive</label>
            <textarea name="note" id="note" class="form-control" placeholder="Inserisci eventuali note" rows="3"><?= $dati['note'] ?? '' ?></textarea>
        </div>
    </div>
</div>
