<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Prasat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_prasat' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'kode_brg' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'nama_brg' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'spesifikasi' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'thn_pembelian' => [
                'type' => 'INT',
                'constraint' => 4,
            ],
            'kategori' => [
                'type' => 'ENUM',
                'constraint' => ['Aset', 'Alat', 'Alat dan Bahan', 'BHP', 'Hibah'],
            ],
            'kondisi_baik' => [
                'type' => 'INT',
            ],
            'kondisi_rusak' => [
                'type' => 'INT',
            ],
            'jml_akhir' => [
                'type' => 'INT',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_prasat', true);
        $this->forge->addForeignKey('kode_brg', 'databarang', 'kode_brg', 'RESTRICT', 'RESTRICT');
        $this->forge->createTable('prasat');
    }

    public function down()
    {
        $this->forge->dropTable('prasat');
    }
}
