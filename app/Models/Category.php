<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";

    protected $fillable = [
        'title',
        'slug',
        'description'
    ];

    // protected $hidden = [
    //     'id'
    // ];

    // protected $casts = [
    //     'slug' => "string",
    // ];

    public function books() {
        return $this->hasMany(Book::class, 'category_id');
    }
}
