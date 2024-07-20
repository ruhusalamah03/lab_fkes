<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name_user' => "Sarah Syakira Rambe",
                'email'     => "sarahrambe073@ummi.ac.id",
                'password_user' => password_hash('12345', PASSWORD_BCRYPT),
            ],
            [
                'name_user' => "Siti Ruhu Salamah",
                'email'     => "sruhusalamah@gmail.com",
                'password_user' => password_hash('ruhu', PASSWORD_BCRYPT),
            ]
           
        ];
        $this->db->table('login')->insertBatch($data);
    }
}
