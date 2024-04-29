<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserRoleSeeder extends Seeder
{
    public function run()
    {
        Role::create(['name' => 'super_admin']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'lpm']);

        $super_admin = User::create([
            'name' => 'Erdi Nurikhsan',
            'email' => 'yunidmi@unukaltim.ac.id',
            'password' => bcrypt('mugiwara'),
        ]);

        $admin = User::create([
            'name' => 'Fiskep',
            'email' => 'fiskep@unukaltim.ac.id',
            'password' => bcrypt('12345678'),
        ]);

        $lpm = User::create([
            'name' => 'Lembaga Penjaminan Mutu',
            'email' => 'lpm@unukaltim.ac.id',
            'password' => bcrypt('12345678')
        ]);

        $super_admin->assignRole('super_admin');
        $admin->assignRole('admin');
        $lpm->assignRole('lpm');
    }
}
