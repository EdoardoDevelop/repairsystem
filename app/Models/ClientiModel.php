<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientiModel extends Model
{
    protected $table = 'clienti'; // Nome della tabella
    protected $primaryKey = 'id';
    protected $allowedFields = ['nome', 'email', 'telefono'];
    protected $useTimestamps = true;
    protected $createdField  = 'creato_il';
    protected $updatedField  = 'modificato_il';
}
