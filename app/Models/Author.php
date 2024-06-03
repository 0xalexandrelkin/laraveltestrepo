<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //отключаем поле timestamps которое laravel хочет заполнять при обращении
    //к БД по умолчанию, так как у наших моделей нет такого поля
    public $timestamps = false;
    //функция возвращает все книги конкретного автора
    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_author', 'author_id', 'book_id');
    }
}
