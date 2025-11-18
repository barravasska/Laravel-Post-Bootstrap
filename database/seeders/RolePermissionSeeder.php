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
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Buat Permissions - pakai firstOrCreate agar tidak duplikat
        $permissions = [
            'view posts',
            'create posts',
            'edit posts',
            'delete posts',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]); // ✅ Ubah jadi firstOrCreate
        }

        // Buat Roles - pakai firstOrCreate
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $writerRole = Role::firstOrCreate(['name' => 'writer']);
        $viewerRole = Role::firstOrCreate(['name' => 'viewer']);

        // Assign Permissions ke Roles (sync untuk menghindari duplikat)
        $adminRole->syncPermissions(Permission::all()); // ✅ Pakai sync
        $writerRole->syncPermissions(['view posts', 'create posts', 'edit posts']);
        $viewerRole->syncPermissions(['view posts']);

        // Buat User Admin (jika belum ada)
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ]
        );
        $admin->syncRoles(['admin']); // ✅ Pakai sync

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

        // Buat User Viewer
        $viewer = User::firstOrCreate(
            ['email' => 'viewer@example.com'],
            [
                'name' => 'Viewer User',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ]
        );
        $viewer->syncRoles(['viewer']);
    }
}