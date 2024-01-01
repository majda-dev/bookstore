<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;


class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'photo'
    ];

    public function book()
    {
        return $this->hasMany(Book::class,'id_category');
    }

    public function book_serie()
    {
        return $this->hasMany(Book_serie::class,'id_category');
    }


}
