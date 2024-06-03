<?php

namespace Database\Seeders;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        //вносим в таблицу БД authors имена авторов книг
        DB::table('authors')->insert([
            ['name' => 'Стив Макконнелл'],
            ['name' => 'Михаил Фленов'],
            ['name' => 'Мэтт Стаффер'],
            ['name' => 'Дэвид Скляр'],
            ['name' => 'Адам Трахтенберг'],
            ['name' => 'Бэрон Шварц'],
            ['name' => 'Вадим Ткаченко'],
            ['name' => 'Петр Зайцев'],
            ['name' => 'Ральф Джонсон'],
            ['name' => 'Джон Влиссидес'],
            ['name' => 'Ричард Хелм'],
            ['name' => 'Эрих Гамма'],
         ]);
        //вносим в таблицу БД books названия книг
        DB::table('books')->insert([
            ['name' => 'Совершенный код'],
            ['name' => 'PHP глазами хакера'],
            ['name' => 'Laravel. Полное руководство'],
            ['name' => 'PHP. Рецепты программирования'],
            ['name' => 'MySQL по максимуму'],
            ['name' => 'Паттерны объектно-ориентированного проектирования'],
         ]);
        //создаем массив с массивами в которых элемент с индексом 0 - id книги, с
        //индексом 1 - id автора
        $book_author_array = [
                        [1,1],
                        [2,2],
                        [3,3],
                        [4,[4,5]],
                        [5,[6,7,8]],
                        [6,[9,10,11,12]],
        ];
        //вносим в таблицу БД book_author отношения книг к их авторам
        foreach ($book_author_array as $item)
        {
            $book = Book::find($item[0]);
            $book->authors()->attach($item[1]); 
        }
    }
}
