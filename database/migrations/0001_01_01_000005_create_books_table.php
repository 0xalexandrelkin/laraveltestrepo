<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        //создаем в таблице books поля id и имя книги name
        Schema::create('books', function (Blueprint $table)
        {
            $table->id('id');
            $table->string('name');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
