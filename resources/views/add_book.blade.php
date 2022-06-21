<!DOCTYPE html>
<html>
    <head>
        <title>Add new book to system - Reading Recs</title>
    </head>
    <body>
        We will add a book to the Reading Recs database:
        <form method="POST"
              action="{{action([App\Http\Controllers\BookController::class, 'store']) }}">
            @csrf
            <label for="booktitle">Book Name: </label>
            <input type="text" name="booktitle" id="booktitle">
            <label for="author">Author: </label>
            <input type="text" name="author" id="author">
            <label for="publicationyear">Publication Year </label>
            <input type="number" name="publicationyear" id="publicationyear">
            <label for="genre">Genre: </label>
            <input type="text" name="genre" id="genre"> <!-- make a genre table and a spinner a la book search from the other project -->
            <input type="submit" value="add">
            @if (count($errors) > 0)
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </form>
    </body>
</html>