<!DOCTYPE html>
<html>
	<head>
		<title>Books</title>
		<style>
   			TABLE
			{
    			width: 600px;
    			border-collapse: collapse;
   			}
   			TD, TH
			{
    			padding: 3px;
    			border: 1px solid black;
   			}
   			TH
			{
    			background: gray;
				text-align: left;
   			}
  		</style>
	</head>
	<body>
		<table>
			<tr><th >Книга</th><th>Автор</th><th>Кол-во авторов</th></tr>
			@foreach ($data as $book)
				<tr><td>{{$book['bookNameString']}}</td>
				@php
				$authorNames = $book['bookAuthorsArray']->implode('name', ', ');
				@endphp
				<td>{{$authorNames}}</td>
				<td>{{$book['bookAuthorsQtyInt']}}</td>
				</tr>
			@endforeach
		</table>
		<p>Показать книги, в написании которых участвовал автор:
		<select id="select" onchange="document.location=this.options[this.selectedIndex].id">
		<option id="all" value="authorName" selected>Все</option>
		@foreach ($authors as $author)
		@php
		$authorName = $author->name;
		$authorId = $author->id;
		$selectValue = '';
		if ($current_author_id == $authorId)
			{
				$selectValue = 'selected';
			}
		@endphp
		<option id="{{$authorId}}" value="authorName" {{$selectValue}}>{{$authorName}}</option>
		@endforeach
		</select>
		</p>
	</body>
</html>