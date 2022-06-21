<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ReadingList;
use App\Models\Tag;

class Book extends Model
{
    use HasFactory;
    //FK relationships - assigned to pivot tables
    public function reading_lists()
    {
        return $this->belongsToMany(ReadingList::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
