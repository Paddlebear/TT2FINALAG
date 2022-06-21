<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Book;
use App\Models\Tag;
use App\Models\ReadingList;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $user = User::create([
            'name' => 'testuser',
            'email' => 'test@example.com',
            'password' => bcrypt('secret')
        ]);
        DB::table('genres')->insert(['genrename' => 'yes']);
        DB::table('genres')->insert(['genrename' => 'smth']);
        DB::table('genres')->insert(['genrename' => 'paper']);
        $book = Book::create([
            'booktitle' => 'testbook1',
            'author' => 'author1',
            'publicationyear' => 1999,
            'genre_id' => 1
            ]);
        $book = Book::create([
            'booktitle' => 'testbook2',
            'author' => 'author1',
            'publicationyear' => 2015,
            'genre_id' => 2
            ]);
        $book = Book::create([
            'booktitle' => 'testbook3',
            'author' => 'author2',
            'publicationyear' => 2001,
            'genre_id' => 3
            ]);
        $tag = Tag::create([
            'tagname' => 'tag1'
        ]);
        $tag = Tag::create([
            'tagname' => 'tag2'
        ]);
        $tag = Tag::create([
            'tagname' => 'tag3'
        ]);
        $readinglist = ReadingList::create([
            'name' => 'testlist1',
            'description' => 'this is me just testing whether the lists even work...',
            'user_id' => 1,
            'visible' => 1
        ]);
        DB::table('book_reading_list')->insert(['reading_list_id' => 1, 'book_id' => 1]);
        DB::table('book_reading_list')->insert(['reading_list_id' => 1, 'book_id' => 2]);
        DB::table('book_reading_list')->insert(['reading_list_id' => 1, 'book_id' => 3]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
