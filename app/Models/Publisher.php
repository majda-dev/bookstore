<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class Publisher extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'email','phone', 'adress'];

    public function book()
    {
        return $this->hasMany(Book::class,'id_publisher');
    }
}
