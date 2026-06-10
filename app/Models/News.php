<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    protected $fillable = [
        'title', 'slug', 'excerpt', 'content', 'image', 'type',
        'event_date', 'event_venue', 'is_active', 'views',
        'meta_title', 'meta_description', 'published_at'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'event_date' => 'date',
        'published_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->title);
            }
            if (empty($model->published_at)) {
                $model->published_at = now();
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('published_at', 'desc');
    }

    public function scopeNews($query)
    {
        return $query->where('type', 'news');
    }

    public function scopeEvents($query)
    {
        return $query->where('type', 'event');
    }
}
