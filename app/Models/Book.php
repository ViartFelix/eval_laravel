<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = "books";

    protected $primaryKey = "id";

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

    protected $visible = [
        "id",
        "title",
        "author",
        "year",
        "genre",
        "created_at",
        "updated_at"
    ];

    private $rules = [
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'year' => 'integer',
        'genre' => 'string'
    ];

    public function getRules(): array
    {
        return $this->rules;
    }
}
