<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = "books";

    protected $fillable = [
        "title",
        "author",
        "year",
        "genre",
        "created_at",
        "updated_at"
    ];

    protected $casts = [
        "year" => "integer",
        "created_at" => "datetime",
        "updated_at" => "datetime"
    ];
}
