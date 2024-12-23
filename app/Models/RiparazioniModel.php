<?php

namespace App\Models;

use CodeIgniter\Model;

class RiparazioniModel extends Model
{
    protected $table = 'schede';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nome',
        'telefono',
        'email',
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
        return $this->findAll();
    }

}
