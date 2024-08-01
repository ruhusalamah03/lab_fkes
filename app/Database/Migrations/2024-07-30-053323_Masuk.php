<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Masuk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user'           => [
                'type'              => 'BIGINT',
                'constraint'        => 20,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'name_user'         => [
                'type'              => 'VARCHAR',
                'constraint'        => '50',
            ],
            'email'               => [
                'type'              => 'VARCHAR',
                'constraint'        => '30',
            ],
            'password_user'     => [
                'type'              => 'VARCHAR',
                'constraint'        => '60',
            ],     
        ]);
        $this->forge->addKey('id_user', true);
        $this->forge->createTable('login_user');
    }

    public function down()
    {
        $this->forge->dropTable('login_user');
    }
}
