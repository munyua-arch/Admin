<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        //Create an admin from seeder

        $adminData =[
            'username' => 'Dennis Murimi',
            'email' => 'dmurimi919@gmail.com',
            'phone' => '254740289746',
            'uniid' => md5(str_shuffle('abcdefghijklmnopqrstuvwxyz'.time())),
            'password' => 'reyes38'
        ];

        $this->db->table('admin')->insert($adminData);

    }
}
