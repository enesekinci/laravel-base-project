<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('modules', function (Blueprint $table): void {
            $table->id();
            $table->string('code')->unique();
            $table->string('name');
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index('code');
            $table->index('is_active');
        });

        Schema::create('role_types', function (Blueprint $table): void {
            $table->id();
            $table->string('code')->unique();
            $table->string('name');
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index('code');
            $table->index('is_active');
        });

        Schema::create('roles', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('role_type_id')->nullable();
            $table->string('name');
            $table->string('code')->unique();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index('code');
            $table->index('is_active');
            $table->index('role_type_id');

            $table->foreign('role_type_id', 'roles_role_type_id_foreign')->references('id')->on('role_types')->nullOnDelete();
        });

        Schema::create('role_modules', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('module_id');
            $table->timestamps();

            $table->index('role_id');
            $table->index('module_id');

            $table->foreign('role_id', 'role_modules_role_id_foreign')->references('id')->on('roles')->cascadeOnDelete();

            $table->foreign('module_id', 'role_modules_module_id_foreign')->references('id')->on('modules')->cascadeOnDelete();
        });

        Schema::create('users', function (Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->index();
            $table->string('phone')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('is_active')->default(true)->index();
            $table->boolean('is_admin')->default(false);
            $table->rememberToken();
            $table->timestamps();

            $table->index(['email', 'is_active']);
        });

        Schema::create('user_roles', function (Blueprint $table): void {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('role_id');
            $table->timestamps();

            $table->index('user_id');
            $table->index('role_id');
            $table->unique(['user_id', 'role_id']);
            $table->index(['user_id', 'role_id']);

            $table->foreign('user_id', 'user_roles_user_id_foreign')->references('id')->on('users')->cascadeOnDelete();

            $table->foreign('role_id', 'user_roles_role_id_foreign')->references('id')->on('roles')->cascadeOnDelete();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table): void {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table): void {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();

            $table->index('ip_address');
        });

        $now = now();

        // Boilerplate modülleri (e-commerce özellikleri çıkarıldı)
        $modules = [
            'auth' => 'Auth',
            'blog' => 'Blog',
            'cms' => 'CMS',
            'crm' => 'CRM',
            'media' => 'Media',
            'settings' => 'Settings',
        ];

        foreach ($modules as $code => $name) {
            DB::table('modules')->insertOrIgnore([
                'code' => str($code)->slug()->toString(),
                'name' => $name,
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        $modules = DB::table('modules')->get()->keyBy('code');

        // Rol modül atamaları (boilerplate modülleri)
        $roleModules = [
            'super' => [
                $modules['auth']->id,
                $modules['blog']->id,
                $modules['cms']->id,
                $modules['crm']->id,
                $modules['media']->id,
                $modules['settings']->id,
            ],
            'admin' => [
                $modules['auth']->id,
                $modules['blog']->id,
                $modules['cms']->id,
                $modules['crm']->id,
                $modules['media']->id,
                $modules['settings']->id,
            ],
            'user' => [
                $modules['blog']->id,
                $modules['cms']->id,
            ],
            'customer' => [],
        ];

        $roleTypes = [
            'super' => 'Super Admin',
            'admin' => 'Admin',
            'user' => 'User',
            'customer' => 'Customer',
        ];

        foreach ($roleTypes as $code => $name) {
            DB::table('role_types')->insertOrIgnore([
                'code' => str($code)->slug()->toString(),
                'name' => $name,
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        $roleTypes = DB::table('role_types')->get()->keyBy('code');

        $roles = [
            'super' => 'Super Admin',
            'admin' => 'Admin',
            'user' => 'User',
            'customer' => 'Customer',
        ];

        foreach ($roles as $roleTypeCode => $name) {
            DB::table('roles')->insertOrIgnore([
                'code' => str($roleTypeCode)->slug()->toString(),
                'name' => $name,
                'role_type_id' => $roleTypes[$roleTypeCode]->id,
                'is_active' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        $roles = DB::table('roles')->get()->keyBy('code');

        foreach ($roles as $roleCode => $name) {
            foreach ($roleModules[$roleCode] as $moduleId) {
                DB::table('role_modules')->insertOrIgnore([
                    'role_id' => $roles[$roleCode]->id,
                    'module_id' => $moduleId,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
        }

        // Test kullanıcıları oluştur
        $users = [
            [
                'name' => 'Test User',
                'email' => 'enes.eknc.96@gmail.com',
                'roles' => [
                    $roles['super']->id,
                    $roles['admin']->id,
                    $roles['user']->id,
                ],
            ],
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'roles' => [
                    $roles['admin']->id,
                    $roles['user']->id,
                ],
            ],
            [
                'name' => 'Regular User',
                'email' => 'user@example.com',
                'roles' => [
                    $roles['user']->id,
                ],
            ],
        ];

        $password = Hash::make('password');

        // Kullanıcıları ekle (eğer yoksa)
        foreach ($users as $user) {
            DB::table('users')->insertOrIgnore([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $password,
                'is_admin' => in_array($roles['super']->id, $user['roles']) || in_array($roles['admin']->id, $user['roles']),
                'remember_token' => Str::random(10),
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            $userId = DB::table('users')->where('email', $user['email'])->first()->id;

            foreach ($user['roles'] as $roleId) {
                DB::table('user_roles')->insertOrIgnore([
                    'user_id' => $userId,
                    'role_id' => $roleId,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('user_roles');
        Schema::dropIfExists('users');
        Schema::dropIfExists('role_modules');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('role_types');
        Schema::dropIfExists('modules');
    }
};
