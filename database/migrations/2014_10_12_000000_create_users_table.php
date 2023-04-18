<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\Role;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('role')->default(Role::User->value);

            $table->string('first_name')->nullable();

            $table->string('last_name')->nullable();

            $table->string('phone')->nullable();

            $table->text('address')->nullable();

            $table->string('city')->nullable();

            $table->string('province')->nullable();

            $table->string('postal_code')->nullable();

            $table->string('country')->default('LK')->nullable();

            $table->tinyInteger('status')->default(1);

            $table->rememberToken();

            $table->foreignId('current_team_id')->nullable();

            $table->string('profile_photo_path', 2048)->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
