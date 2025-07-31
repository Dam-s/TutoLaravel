<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Creation de mes migrations dans la fonction up
     */
    public function up(): void
    {
        //migration  de la table posts ( php artisan make:migration CreatePostTable)
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); #Defines an auto-incrementing primary key
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('content');
            $table->timestamps(); #Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
