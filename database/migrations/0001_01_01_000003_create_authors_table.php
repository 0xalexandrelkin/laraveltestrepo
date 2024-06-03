<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        //создаем в таблице authors поля id и имя автора name
        Schema::create('authors', function (Blueprint $table)
        {
            $table->id('id');
            $table->string('name');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('authors');
    }
};
