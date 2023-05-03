<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class Review extends Model
{
    use HasFactory;

    public function products() {
        return $this->belongsTo(Book::class);
    }

    protected $fillable = [
        'customer',
        'review',
        'star',
    ];
}
