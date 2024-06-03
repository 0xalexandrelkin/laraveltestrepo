<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Author;
use Illuminate\Support\Facades\DB;

class bookController extends Controller
{
    //параметр по умолчанию all подставляется при переходе в корень сайта
    //для того чтобы отобразить все книги
    public function getBook($author_id = 'all')
    {
        $books = [];
        //если запрошена страница all извлекаем из БД все книги
        if ($author_id == 'all')
        {
            $books = Book::all()->sortByDesc('name');
        }
        //иначе пытаемся найти автора с id равным запрошенному адресу страницы
        else
        {
            $author = Author::find($author_id);
            //если автор существует в БД и его id равен запрошенному адресу страницы
            //получаем в $books все книги этого автора и сортируем их по названию
            //(вторая часть условия && $author_id === strval($author->id) это костыль
            //против того что php приводит строку "4абвгд" в int как 4
            //иначе запрос страницы /4абвгд сработает и будут отображены книги
            //автора с id 4)
            if ($author && $author_id === strval($author->id))
            {
                $books = $author->books;
                $books->sortBy('name');
            }
            //иначе если автор с запрошенным id не существует в БД возвращаем 404 ошибку
            else
            {
                abort(404);
            }
        }
        //создаем массив в который будем помещать данные каждой книги
        //имя книги - строка, количество авторов книги - число,
        //автор(ы) книги - массив, так как авторов у книги может быть несколько
        $data = [];
        foreach ($books as $book)
        {
            $bookNameString = $book->name;
            $bookAuthorsArray = $book->authors;
            $bookAuthorsQtyInt = count($bookAuthorsArray);
            $dataSet = ['bookNameString' => $bookNameString,
                        'bookAuthorsArray' => $bookAuthorsArray,
                        'bookAuthorsQtyInt' => $bookAuthorsQtyInt];
            //добавляем в массив $data массив с данными книги
            $data[] = $dataSet;
        }
        //возвращаем представление и передаем в него данные
        //data - массив с данными всех книг автора для из отображения в таблице
        //authors - массив с автором(авторами) этой книги отсортированными по имени
        //для отображения в таблице и заполнения их именами выпадающего списка
        //при выборе пункта которого будет произведен переход на страницу с книгами
        //выбранного автора
        //current_author_id - id автора, книги которого будут отображены на странице
        //для того чтобы этот же автор был выбран в выпадающем списке
        return view('index', ['data'=>$data, 'authors'=>Author::all()->sortBy('name'), 'current_author_id'=>$author_id]);
    }
}
