<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $user1 = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123'),
        ]);

        // $user2 = User::factory()->create([
        //     'name' => 'Recruiter',
        //     'email' => 'rec1@gmail.com',
        //     'password' => bcrypt('rec123'),
        // ]);
        $role = Role::create(['name' => 'Admin']);
        $user1->assignRole($role);
        // $role = Role::create(['name' => 'Recruiter']);
        // $user2->assignRole($role);
    }
}
