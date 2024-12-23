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
                'id_cliente' => [
                    'type'       => 'INT',
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
                ],
                'data_consegna' => [
                    'type'    => 'DATE',
                    'null'    => true,
                ],
            ]);

            $this->forge->addKey('id', true); // Chiave primaria
            $this->forge->createTable('schede');
            // Aggiungere manualmente il valore di default per creato_il
            $db->query("ALTER TABLE schede MODIFY creato_il DATETIME DEFAULT CURRENT_TIMESTAMP");
        }
    }

    public function down()
    {
        $this->forge->dropTable('schede');
    }
}
