<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    protected $fillable = [
        'title', 'description', 'file', 'file_type',
        'category', 'is_active', 'download_count', 'order'
    ];

    protected $casts = ['is_active' => 'boolean'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order');
    }

    public function incrementDownload(): void
    {
        $this->increment('download_count');
    }
}
