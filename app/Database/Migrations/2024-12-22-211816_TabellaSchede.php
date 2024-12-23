<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class tabellaSchede extends Migration
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
                    'constraint' => '255',
                ],
                'telefono' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '15',
                ],
                'tipo_dispositivo' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '255',
                ],
                'marca' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '255',
                ],
                'modello' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '255',
                ],
                'numero_serie' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '255',
                ],
                'difetto' => [
                    'type' => 'TEXT',
                ],
                'note' => [
                    'type' => 'TEXT',
                ],
                'stato' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '50',
                    'default'    => 'in lavorazione',
                ],
                'creato_il' => [
                    'type'    => 'DATETIME',
                    'null'    => true,
                    'default' => 'CURRENT_TIMESTAMP',
                ],
                'data_consegna' => [
                    'type'    => 'DATE',
                    'null'    => true,
                ],
            ]);

            $this->forge->addKey('id', true); // Chiave primaria
            $this->forge->createTable('schede');
        }
    }

    public function down()
    {
        $this->forge->dropTable('schede');
    }
}
