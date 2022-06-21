<!DOCTYPE html>
<html>
    <head>
        <title>All reading lists</title>
    </head>
    <body>
        @if (count($lists) == 0)
        <p color='red'> There are no records in the database!</p>
        @else
        <table style="border: 1px solid black">
            <tr>
                <td> ID </td>
                <td> Name </td>
                <td> By: </td>
                <td> Description </td>
                <td> </td>
            </tr>
            @foreach ($lists as $list)
            <tr>
                <td> {{ $list->id }} </td>
                <td> {{ $list->name }} </td>
                <td> {{ $list->owner }} </td>
                <td> {{ $list->description }} </td>
                @endforeach
        </table>
        @endif
<!--        <p> <input type="button" value="New Book" onclick="addCountry({})"> </p>
        <p> <input type="button" value="Search books" onclick="filterBooks({})"> </p>-->
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