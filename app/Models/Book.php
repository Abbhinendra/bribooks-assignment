<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'cover_image',
        'price',
        'published_date',
        '_deleted',
    ];

    protected $casts = [
        'published_date' => 'date',
    ];

    public static function booted()
    {
        static::addGlobalScope('_deleted', function ($builder) {
            $builder->where('_deleted', 0);
        });

        static::deleting(function ($book) {
            $book->update(['_deleted' => 1]);
            return false; // Prevent actual deletion
        });
    }

    public function scopeFilter($query, $filters)
    {
        if (isset($filters['title'])) {
            $query->where('title', 'like', '%' . $filters['title'] . '%');
        }

        if (isset($filters['author'])) {
            $query->where('author', 'like', '%' . $filters['author'] . '%');
        }

        return $query;
    }
}
