<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('featureds', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');

            $table->unsignedBigInteger('category_id')->nullable();

            $table->string('title');

            $table->longText('description')->nullable();

            $table->string('number')->nullable();

            $table->decimal('price', 8, 2);

            $table->string('image')->nullable();

            $table->boolean('status')->default(true);

            $table->unsignedInteger('view_count')->default(0);
            $table->unsignedInteger('subscription_count')->default(0);

            $table->timestamps();
        });


        Schema::table('featured', function (Blueprint $table) {
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('featureds');
    }
};
