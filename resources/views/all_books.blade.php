<!DOCTYPE html>
<html>
    <head>
        <title>Countries</title>
    </head>
    <body>
        @if (count($books) == 0)
        <p color='red'> There are no records in the database!</p>
        @else
        <table style="border: 1px solid black">
            <tr>
                <td> ID </td>
                <td> Book Title </td>
                <td> Author </td>
                <td> Publication Year </td>
                <td> Genre </td>
                <td> </td>
            </tr>
            @foreach ($books as $book)
            <tr>
                <td> {{ $book->id }} </td>
                <td> {{ $book->booktitle }} </td>
                <td> {{ $book->author }} </td>
                <td> {{ $book->publicationyear }} </td>
                <td> {{ $book->genrename }} </td>
                @endforeach
        </table>
        @endif
        <p> <input type="button" value="New Book" onclick="addCountry({})"> </p>
        <p> <input type="button" value="Search books" onclick="filterBooks({})"> </p>
<!--        <script> ///sample code for later
            function addCountry() {
                window.location.href = "/country/create";
            }
            function filterBooks() {
                window.location.href = "filter";
            }
        </script>-->
    </body>
</html>