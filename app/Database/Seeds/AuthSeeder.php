<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name_user' => "Administrator",
                'email'     => "sarahrambe073@ummi.ac.id",
                'password_user' => password_hash('sarah', PASSWORD_BCRYPT),
                'role' => 'admin'
            ],
            [
                'name_user' => "Siti Ruhu Salamah",
                'email'     => "sruhusalamah@gmail.com",
                'password_user' => password_hash('ruhu', PASSWORD_BCRYPT),
                'role' => 'user'
            ]
           
        ];
        $this->db->table('login')->insertBatch($data);
    }
}
