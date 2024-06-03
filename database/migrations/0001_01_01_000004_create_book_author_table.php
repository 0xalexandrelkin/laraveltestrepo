<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        //создаем в таблице book_author поля id авторов и книг
        //таблица показывает связи между авторами и книгами
        Schema::create('book_author', function (Blueprint $table)
        {
            $table->integer('book_id')->nullable();
            $table->integer('author_id')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('book_author');
    }
};
