<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Peminjaman extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'userId' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
            ],
            'barangId' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['pending', 'accept', 'reject'],
                'default'    => 'pending',
            ],
            'isDikembalikan' => [
                'type'       => 'BOOLEAN',
                'default'    => false,
            ],
        ]);

        // Tambah Primary Key
        $this->forge->addKey('id', true);

        // Tambah Foreign Key
        $this->forge->addForeignKey('userId', 'manajemen_user', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('barangId', 'databarang', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('peminjamanbarang');
    }

    public function down()
    {
        $this->forge->dropTable('peminjamanbarang');
    }
}
