<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $superAdmin = Role::create(['name' => 'super-admin']);
        $admin = Role::create(['name'=> 'admin']);
        $president = Role::create(['name' => 'president']);
        $vicePresident = Role::create(['name' => 'vice-president']);
        $secretary = Role::create(['name' => 'secretary']);
        $treasurer = Role::create(['name' => 'treasurer']);
        $member = Role::create(['name' => 'member']);

        User::create([
            'name' => 'Ethan Chen',
            'branch_id' => 1,
            'username' => 'CSH_EC',
            'email' => 'ethan@cshaap.com',
            'email_verified_at' => now(),
            'password' => hash('sha512', 'password'),
            'remember_token' => Str::random(10),
            'avatar_url' => '/storage/default_avatar/panda.png'
        ])->assignRole($superAdmin);

        User::create([
            'name' => 'Ethan Chen',
            'branch_id' => 1,
            'username' => 'CSH_EC',
            'email' => 'ethan@cshaap.com',
            'email_verified_at' => now(),
            'password' => hash('sha512', 'password'),
            'remember_token' => Str::random(10),
            'avatar_url' => '/storage/default_avatar/panda.png'
        ])->assignRole($admin);
    }
}
