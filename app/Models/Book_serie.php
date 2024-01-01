<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book_serie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'id_writer',
        'id_category',
        'price',
        'photo',
        'number_of_books'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'id_category');
    }


    public function writer()
    {
        return $this->belongsTo(Writer::class,'id_writer');
    }

}
