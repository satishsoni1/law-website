<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoMeta extends Model
{
    protected $table = 'seo_meta';

    protected $fillable = [
        'page_identifier', 'meta_title', 'meta_description', 'meta_keywords',
        'og_title', 'og_description', 'og_image', 'canonical_url'
    ];

    public static function getForPage(string $identifier): ?self
    {
        return static::where('page_identifier', $identifier)->first();
    }
}
