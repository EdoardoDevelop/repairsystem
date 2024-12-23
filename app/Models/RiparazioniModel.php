<?php

namespace App\Models;

use CodeIgniter\Model;

class RiparazioniModel extends Model
{
    protected $table = 'schede';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_cliente',
        'tipo_dispositivo',
        'marca',
        'modello',
        'numero_serie',
        'difetto',
        'data_consegna',
        'note',
    ];

    public function getAll()
    {
        return $this->select('schede.*, clienti.nome AS cliente_nome, clienti.cognome AS cliente_cognome, clienti.telefono, clienti.email')
            ->join('clienti', 'clienti.id = schede.id_cliente', 'left')
            ->findAll();
    }

}
