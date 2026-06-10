<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = [
        'title', 'content', 'attachment', 'publish_date',
        'expiry_date', 'is_pinned', 'is_active', 'views'
    ];

    protected $casts = [
        'is_pinned' => 'boolean',
        'is_active' => 'boolean',
        'publish_date' => 'date',
        'expiry_date' => 'date',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)
            ->where('publish_date', '<=', now())
            ->where(function ($q) {
                $q->whereNull('expiry_date')->orWhere('expiry_date', '>=', now());
            });
    }

    public function scopeLatest($query)
    {
        return $query->orderBy('is_pinned', 'desc')->orderBy('publish_date', 'desc');
    }
}
