<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class tabellaClienti extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        if (!$this->db->tableExists('schede')) {
            $this->forge->addField([
                'id' => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'unsigned'       => true,
                    'auto_increment' => true,
                ],
                'nome' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '100',
                ],
                'cognome' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '100',
                ],
                'telefono' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '15',
                ],
                'email' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '255',
                    'null'       => true,
                ],
                'creato_il' => [
                    'type'    => 'DATETIME',
                    'null'    => true,
                ],
                'modificato_il' => [
                    'type'    => 'DATETIME',
                    'null'    => true,
                ],
            ]);

            // Definire la chiave primaria
            $this->forge->addKey('id', true);

            // Creare la tabella
            $this->forge->createTable('clienti');
        }
    }

    public function down()
    {
        // Eliminare la tabella in caso di rollback
        $this->forge->dropTable('clienti');
    }
}
