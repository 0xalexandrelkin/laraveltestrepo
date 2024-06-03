<?php

use App\Http\Controllers\bookController;
//параметр по умолчанию all подставляется в переменную
//author_id при переходе в корень сайта
//для того чтобы отобразить все книги
Route::get('/{author_id?}', [bookController::class, 'getBook' ]);
