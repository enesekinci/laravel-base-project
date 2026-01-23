<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Todos table
        Schema::create('todos', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('category')->default('Kişisel'); // İş, Kişisel, Sağlık, Alışveriş, vb.
            $table->enum('priority', ['Düşük', 'Orta', 'Yüksek', 'Kritik'])->default('Orta');
            $table->boolean('completed')->default(false);
            $table->timestamp('deadline')->nullable();
            $table->integer('order')->default(0);
            $table->json('recurring_config')->nullable(); // {enabled: bool, frequency: string, interval: int, lastCompleted: timestamp}
            $table->timestamps();
            $table->softDeletes();

            $table->index(['user_id', 'completed']);
            $table->index(['user_id', 'category']);
            $table->index(['user_id', 'priority']);
            $table->index('deadline');
        });

        // Todo subtasks table
        Schema::create('todo_subtasks', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('todo_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->boolean('completed')->default(false);
            $table->integer('order')->default(0);
            $table->timestamps();

            $table->index(['todo_id', 'completed']);
        });

        // Pomodoro sessions table
        Schema::create('pomodoro_sessions', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('todo_id')->nullable()->constrained()->nullOnDelete();
            $table->string('task_title')->nullable(); // Görev adı (todo silinirse bile saklanır)
            $table->timestamp('start_time');
            $table->timestamp('end_time')->nullable();
            $table->integer('duration')->default(25); // dakika
            $table->enum('type', ['work', 'short-break', 'long-break'])->default('work');
            $table->boolean('completed')->default(false);
            $table->timestamps();

            $table->index(['user_id', 'start_time']);
            $table->index(['user_id', 'completed']);
        });

        // Pomodoro settings table
        Schema::create('pomodoro_settings', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->unique();
            $table->integer('work_duration')->default(25); // dakika
            $table->integer('short_break_duration')->default(5); // dakika
            $table->integer('long_break_duration')->default(15); // dakika
            $table->integer('pomodoros_until_long_break')->default(4);
            $table->boolean('auto_start_breaks')->default(false);
            $table->boolean('auto_start_pomodoros')->default(false);
            $table->boolean('sound_enabled')->default(true);
            $table->boolean('notification_enabled')->default(true);
            $table->decimal('sound_volume', 3, 2)->default(0.70); // 0.00 - 1.00
            $table->timestamps();
        });

        // Reminders table
        Schema::create('reminders', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->timestamp('datetime');
            $table->enum('priority', ['Düşük', 'Orta', 'Yüksek', 'Kritik'])->default('Orta');
            $table->string('category')->default('Kişisel');
            $table->json('recurring_config')->nullable(); // {enabled: bool, frequency: string}
            $table->boolean('completed')->default(false);
            $table->timestamp('snoozed_until')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['user_id', 'datetime']);
            $table->index(['user_id', 'completed']);
            $table->index('snoozed_until');
        });

        // Goals table
        Schema::create('goals', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('type', ['daily', 'weekly', 'monthly', 'yearly']);
            $table->integer('progress')->default(0); // 0-100
            $table->date('start_date');
            $table->date('target_date')->nullable();
            $table->boolean('completed')->default(false);
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['user_id', 'type']);
            $table->index(['user_id', 'completed']);
            $table->index('target_date');
        });

        // Goal sub goals table
        Schema::create('goal_sub_goals', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('goal_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->boolean('completed')->default(false);
            $table->integer('order')->default(0);
            $table->timestamps();

            $table->index(['goal_id', 'completed']);
        });

        // Achievements table
        Schema::create('achievements', function (Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('icon')->nullable(); // icon adı veya path
            $table->string('condition_type'); // completed_todos, completed_pomodoros, streak_days, completed_goals
            $table->integer('condition_value'); // Örn: 10 görev, 50 pomodoro, 7 gün streak
            $table->timestamps();
        });

        // User achievements table
        Schema::create('user_achievements', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('achievement_id')->constrained()->cascadeOnDelete();
            $table->timestamp('unlocked_at');
            $table->timestamps();

            $table->unique(['user_id', 'achievement_id']);
            $table->index('user_id');
        });

        // Statistics table
        Schema::create('statistics', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->date('date');
            $table->integer('completed_todos_count')->default(0);
            $table->integer('pomodoro_count')->default(0);
            $table->integer('focus_duration_minutes')->default(0);
            $table->integer('streak_days')->default(0); // Kesintisiz gün sayısı
            $table->timestamps();

            $table->unique(['user_id', 'date']);
            $table->index(['user_id', 'date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('statistics');
        Schema::dropIfExists('user_achievements');
        Schema::dropIfExists('achievements');
        Schema::dropIfExists('goal_sub_goals');
        Schema::dropIfExists('goals');
        Schema::dropIfExists('reminders');
        Schema::dropIfExists('pomodoro_settings');
        Schema::dropIfExists('pomodoro_sessions');
        Schema::dropIfExists('todo_subtasks');
        Schema::dropIfExists('todos');
    }
};
