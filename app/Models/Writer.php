<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class Writer extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'first_name', 'last_name', 'bio', 'email','phone', 'adress','photo'];

    public function book()
    {
        return $this->hasMany(Book::class, 'id_writer');
    }

    public function book_serie()
    {
        return $this->hasMany(Book_serie::class,'id_writer');
    }
}
