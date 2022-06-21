<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = DB::table('books')->join('genres', 'books.genre_id', '=', 'genres.id')->
                select('books.id','books.booktitle', 'books.author', 'books.publicationyear', 'genres.genrename')->get();
        return view('all_books', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add_book');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'bookname' => 'required|min:2|max:200',
            'author' => 'required|min:2|max:200',
            'publicationyear' => 'required|integer|min:0|max:2025'
        );
        $this->validate($request, $rules);
        $book = new Book();
        $book->book_name = $request->book_name;
        $book->book_authors = $request->book_authors;
        $book->year_published = $request->year_published;
        $book->save();
        return redirect('/'); //change the redirect later
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) ///only available for admins
    {
        $book = Books::findOrFail($id);
        return view('book_update', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) ///only available for admins
    {
        $rules = array(
            'bookname' => 'required|min:2|max:200',
            'author' => 'required|min:2|max:200',
            'publicationyear' => 'required|integer|min:0|max:2025'
        );
        $book = Book::find($request->id);
        $book->book_name = $request->book_name;
        $book->book_authors = $request->book_authors;
        $book->year_published = $request->year_published;
        $book->save();
        return redirect('/'); //change the redirect later
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) ///only available for admins
    {
        Book::findOrFail($id)->delete();
    }
}
