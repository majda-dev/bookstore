<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Writer;
use App\Models\Publisher;

class Book extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'description',
        'id_category',
        'photo',
        'price',
        'publication_date',
        'quantity',
        'id_writer',
        'id_publisher'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

    public function writer()
    {
        return $this->belongsTo(Writer::class, 'id_writer');
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'id_publisher');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }




}
