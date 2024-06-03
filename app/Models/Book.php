<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //отключаем поле timestamps которое laravel хочет заполнять при обращении
    //к БД по умолчанию, так как у наших моделей нет такого поля
    public $timestamps = false;
    //функция возвращает всех авторов конкретной книги
    public function authors()
    {
        return $this->belongsToMany(Author::class, 'book_author', 'book_id', 'author_id');
    }
}
