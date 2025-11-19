<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {

        // Buat Permissions
        $permissions = [
            'view posts',
            'create posts',
            'edit posts',
            'delete posts',
            'manage users',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Buat Roles
        $writerRole = Role::firstOrCreate(['name' => 'writer']);
        $editorRole = Role::firstOrCreate(['name' => 'editor']);
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Assign Permissions ke Roles
        $writerRole->syncPermissions(['view posts', 'create posts']);
        $editorRole->syncPermissions(['view posts', 'create posts', 'edit posts']);
        $adminRole->syncPermissions(Permission::all());

        // Buat User Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ]
        );
        $admin->syncRoles(['admin']);

        // Buat User Writer
        $writer = User::firstOrCreate(
            ['email' => 'writer@example.com'],
            [
                'name' => 'Writer User',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ]
        );
        $writer->syncRoles(['writer']);

        // Buat User Editor
        $editor = User::firstOrCreate(
            ['email' => 'editor@example.com'],
            [
                'name' => 'Editor User',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ]
        );
        $editor->syncRoles(['editor']);
    }
}