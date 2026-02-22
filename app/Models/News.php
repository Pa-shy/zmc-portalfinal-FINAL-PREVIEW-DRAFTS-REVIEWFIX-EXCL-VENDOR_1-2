<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = [
        'title',
        'slug',
        'body',
        'image_path',
        'attachment_path',
        'attachment_original_name',
        'attachment_mime',
        'is_published',
        'published_at',
        'created_by',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public static function makeSlug(string $title): string
    {
        $slug = Str::slug($title);
        if ($slug === '') $slug = 'news';
        $base = $slug;
        $i = 2;
        while (self::where('slug', $slug)->exists()) {
            $slug = $base . '-' . $i;
            $i++;
        }
        return $slug;
    }
}
