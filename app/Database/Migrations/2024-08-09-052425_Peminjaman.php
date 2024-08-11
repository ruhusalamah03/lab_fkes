<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Peminjaman extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id' => [
        'type' => 'BIGINT',
        'constraint' => 20,
        'unsigned' => true,
        'auto_increment' => true
      ],
      'nim' => [
        'type' => 'INT',
        'constraint' => 10,
      ],
      'kode_brg' => [
        'type' => 'VARCHAR',
        'constraint' => 20,
      ],
      'status' => [
        'type'       => 'ENUM',
        'constraint' => ['pending', 'review', 'approve', 'reject'],
        'default'    => 'pending',
      ],
      'tgl_pinjam' => [
        'type' => 'DATE'
      ],
      'tgl_kembali' => [
        'type' => 'DATE'
      ],
      'catatan' => [
        'type' => 'TEXT',
        'null' => true
      ],
      'is_dikembalikan' => [
        'type' => 'BOOLEAN',
        'default' => false
      ],
      'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
      'updated_at' => [
        'type' => 'DATETIME',
        'null' => true,
        'default' => null,
        'on_update' => 'CURRENT_TIMESTAMP'
      ]
    ]);
    $this->forge->addKey('id', true);
    $this->forge->addForeignKey('nim', 'manajemen_user', 'nim', 'CASCADE', 'CASCADE');
    $this->forge->addForeignKey('kode_brg', 'databarang', 'kode_brg', 'CASCADE', 'CASCADE');
    $this->forge->createTable('peminjaman');
  }

  public function down()
  {
    $this->forge->dropTable('peminjaman');
  }
}
