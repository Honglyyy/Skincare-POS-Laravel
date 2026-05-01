<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Permission;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Role::create(['name' => 'ADMIN']);
        Role::create(['name' => 'MANAGER']);
        Role::create(['name' => 'CASHIER']);

        User::factory()->create([
            'name' => 'ADMIN',
            'email' => 'admin@example.com',
        ])->assignRole('ADMIN');

        User::factory()->create([
            'name' => 'MANAGER',
            'email' => 'manager@example.com',
        ])->assignRole('MANAGER');

        User::factory()->create([
            'name' => 'CASHIER',
            'email' => 'cashier@example.com',
        ])->assignRole('CASHIER');

        Permission::create([
            'name' => 'CREATE USERS'
        ])->assignRole(['ADMIN', 'MANAGER']);

        Permission::create([
            'name' => 'UPDATE USERS'
        ])->assignRole(['ADMIN', 'MANAGER']);

        Permission::create([
            'name' => 'DELETE USERS'
        ])->assignRole('ADMIN');


        Category::create(
            ['name' => 'Face']
        );

        Category::create(
            ['name' => 'Body']
        );
    }
}
